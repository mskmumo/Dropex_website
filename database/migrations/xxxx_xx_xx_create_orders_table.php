$table->foreignId('supplier_id')->constrained()->onDelete('cascade');
$table->string('shipment_status')->default('Pending');
$table->decimal('shipment_lat', 10, 8)->nullable();
$table->decimal('shipment_lng', 11, 8)->nullable(); 