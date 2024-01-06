<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('invoice', 50);
            $table->foreignId('room_id');
            $table->foreignId('tamu_id');
            $table->integer('jumlah_tamu');
            $table->datetime('checkin');
            $table->datetime('checkout');
            $table->integer('total');
            $table->enum('status', ['terpakai', 'selesai'])->default('terpakai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
