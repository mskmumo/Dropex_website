<?php

namespace App\Http\Controllers;

use App\Models\Parcel; // Assuming you have a Parcel model
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Notifications\ParcelStatusUpdated;
use Illuminate\Support\Facades\Crypt;

class ParcelController extends Controller
{
    public function index(): View
    {
        $parcels = Parcel::with('milestones')->where('user_id', auth()->id())->get(); // Eager load milestones
        return view('parcels.index', compact('parcels'));
    }

    public function show($id): View
    {
        $parcel = Parcel::with('milestones')->findOrFail($id); // Fetch milestones
        return view('parcels.show', compact('parcel'));
    }

    public function updateParcelStatus(Request $request, $id)
    {
        $parcel = Parcel::findOrFail($id);
        $oldStatus = $parcel->status;
        $parcel->status = $request->status;
        $parcel->save();

        // Notify user about the status change
        if ($oldStatus !== $parcel->status) {
            $parcel->notify(new ParcelStatusUpdated($parcel));
        }

        return redirect()->route('parcels.show', $id)->with('success', 'Parcel status updated successfully.');
    }

    public function calculateETA($parcel): string
    {
        // Placeholder logic for ETA calculation
        // In a real application, you would use Google Maps API or similar to get traffic data
        $currentLocation = $parcel->current_location; // Get current location
        $destination = $parcel->destination; // Assuming you have a destination field
        $trafficData = $this->getTrafficData($currentLocation, $destination); // Fetch traffic data

        // Calculate ETA based on traffic data
        $eta = $this->estimateDeliveryTime($trafficData);
        return $eta;
    }

    private function getTrafficData($currentLocation, $destination)
    {
        // Placeholder for traffic data fetching logic
        return 30; // Assume 30 minutes for now
    }

    private function estimateDeliveryTime($trafficData)
    {
        // Placeholder for ETA calculation logic
        return $trafficData . ' minutes';
    }

    public function store(Request $request)
    {
        $parcel = new Parcel();
        $parcel->tracking_number = Crypt::encryptString($request->tracking_number); // Encrypt tracking number
        // Other fields...
        $parcel->save();
    }
} 