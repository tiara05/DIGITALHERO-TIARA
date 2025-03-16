<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->string('id');
            $table->string('user_name');
            $table->string('alamat');
            $table->string('telp');
            $table->date('booking_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('rental_type', ['PS4', 'PS5']);
            $table->integer('total_price');
            $table->integer('qty');
            $table->string('payment_status')->default('pending');
            $table->string('status_barang')->default('belum diambil');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
