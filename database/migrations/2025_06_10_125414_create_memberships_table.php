<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('paket_id');
            $table->foreign('user_id')->references('id_pengguna')->on('users')->onDelete('cascade');
            $table->foreign('paket_id')->references('id')->on('paket_membership')->onDelete('cascade');
            $table->string('bukti_transfer')->nullable();
            $table->integer('jumlah')->nullable();
            $table->enum('status', ['Menunggu', 'Aktif', 'Ditolak'])->default('Menunggu');
            $table->timestamp('tanggal_aktif')->nullable();
            $table->timestamp('tanggal_berakhir')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
