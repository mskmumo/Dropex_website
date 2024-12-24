<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ParcelApiController extends Controller
{
    public function getParcelData($id): JsonResponse
    {
        $parcel = Parcel::findOrFail($id);
        return response()->json([
            'parcel_id' => $parcel->id,
            'tracking_number' => $parcel->tracking_number,
            'status' => $parcel->status,
            'current_location' => $parcel->current_location,
            'estimated_delivery' => $parcel->estimated_delivery,
            'milestones' => $parcel->milestones // Assuming you have a milestones relationship
        ]);
    }

    public function updateParcelStatus(Request $request, $id): JsonResponse
    {
        $parcel = Parcel::findOrFail($id);
        $parcel->status = $request->status; // Update status from request
        $parcel->save();

        return response()->json(['message' => 'Parcel status updated successfully.']);
    }

    public function generateETA($id): JsonResponse
    {
        $parcel = Parcel::findOrFail($id);
        // Logic to calculate ETA
        $eta = $this->calculateETA($parcel); // Assume this method exists
        return response()->json(['eta' => $eta]);
    }
} 