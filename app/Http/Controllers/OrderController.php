<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use App\Notifications\OrderStatusUpdated;
use App\Notifications\ReminderAlert;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::where('user_id', Auth::id());

        // Apply filters
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('id', 'like', '%' . $request->search . '%')
                  ->orWhere('customer_name', 'like', '%' . $request->search . '%')
                  ->orWhere('product_name', 'like', '%' . $request->search . '%');
            });
        }

        // Paginate results
        $orders = $query->paginate(10);

        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with(['products', 'supplier'])->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    public function modify(Request $request, $id)
    {
        $order = Order::with('products')->findOrFail($id);

        // Update delivery address
        $order->delivery_address = $request->delivery_address;
        $order->save();

        // Update product quantities
        foreach ($request->quantities as $productId => $quantity) {
            $order->products()->updateExistingPivot($productId, ['quantity' => $quantity]);
        }

        return redirect()->route('orders.show', $id)->with('success', 'Order modified successfully.');
    }

    public function printInvoice($id)
    {
        $order = Order::with(['products', 'supplier'])->findOrFail($id);
        $pdf = new Dompdf();
        $pdf->loadHtml(view('orders.invoice', compact('order')));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream('invoice.pdf');
    }

    public function cancel($id)
    {
        $order = Order::findOrFail($id);
        if ($order->status === 'Pending') {
            $order->status = 'Canceled';
            $order->save();

            // Notify user
            $order->user->notify(new OrderStatusUpdated($order));

            return redirect()->route('orders.show', $id)->with('success', 'Order canceled successfully.');
        }
        return redirect()->route('orders.show', $id)->with('error', 'Order cannot be canceled.');
    }

    public function reorder($id)
    {
        $order = Order::with('products')->findOrFail($id);
        $newOrder = Order::create([
            'user_id' => Auth::id(),
            'status' => 'Pending',
            // Add other necessary fields
        ]);

        foreach ($order->products as $product) {
            $newOrder->products()->attach($product->id, ['quantity' => $product->pivot->quantity]);
        }

        // Notify user
        $newOrder->user->notify(new OrderStatusUpdated($newOrder));

        return redirect()->route('orders.show', $newOrder->id)->with('success', 'Order created successfully.');
    }

    public function bulkUpdate(Request $request)
    {
        $orderIds = $request->order_ids;
        // Perform bulk update logic here
        return redirect()->route('orders.index')->with('success', 'Orders updated successfully.');
    }

    public function addNote(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->notes()->create(['content' => $request->note]);
        return redirect()->route('orders.show', $id)->with('success', 'Note added successfully.');
    }

    public function setPriority(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->priority = $request->priority;
        $order->save();
        return redirect()->route('orders.show', $id)->with('success', 'Order priority updated successfully.');
    }

    public function metrics()
    {
        $totalOrders = Order::count();
        $averageOrderValue = Order::average('value');
        $deliverySuccessRate = Order::where('status', 'Delivered')->count() / $totalOrders * 100;
        $returnRate = Order::where('status', 'Returned')->count() / $totalOrders * 100;

        return view('orders.metrics', compact('totalOrders', 'averageOrderValue', 'deliverySuccessRate', 'returnRate'));
    }
} 