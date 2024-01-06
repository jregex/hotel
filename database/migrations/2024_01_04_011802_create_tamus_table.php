<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tamus', function (Blueprint $table) {
            $table->id();
            $table->string('noktp', 18);
            $table->string('nama', 128);
            $table->string('jenkel', 30);
            $table->string('email', 256);
            $table->string('no_hp', 15);
            $table->text('alamat')->nullable();
            $table->string('warga_negara')->default('indonesia');
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
        Schema::dropIfExists('tamus');
    }
};
