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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_outlet');
            $table->string('kode_invoice', 100);
            $table->unsignedBigInteger('id_member');
            $table->date('tgl');
            $table->date('batas_waktu');
            $table->date('tgl_bayar');
            $table->integer('biaya_tambahan');
            $table->double('diskon');
            $table->double('pajak');
            $table->enum('status', array('baru','proses','selesai','diambil'));
            $table->enum('dibayar', array('dibayar','belum dibayar'));
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

            $table->foreign('id_member')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('id_outlet')->references('id')->on('outlets')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
