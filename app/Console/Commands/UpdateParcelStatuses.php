<?php

namespace App\Console\Commands;

use App\Models\Parcel;
use Illuminate\Console\Command;

class UpdateParcelStatuses extends Command
{
    protected $signature = 'parcels:update-statuses';
    protected $description = 'Update parcel statuses periodically';

    public function handle()
    {
        // Logic to update parcel statuses
        $parcels = Parcel::all(); // Fetch all parcels
        foreach ($parcels as $parcel) {
            // Update logic here (e.g., check current status, update based on conditions)
            // Example: $parcel->status = 'In Transit'; // Update status based on some logic
            $parcel->save();
        }

        $this->info('Parcel statuses updated successfully.');
    }
} 