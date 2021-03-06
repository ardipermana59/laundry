<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('outlet_id')->constrained()->onDelete('cascade');
            $table->foreignId('member_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('packet_id')->constrained()->onDelete('cascade');
            $table->string('invoice_code',100);
            $table->dateTime('deadline');
            $table->dateTime('pay_date');
            $table->integer('cost_additional')->default(0);
            $table->double('discon')->defaul(0);
            $table->integer('tax')->default(0);
            $table->integer('total')->default(0);
            $table->enum('status',['baru','proses','diambil','selesai'])->default('baru');
            $table->enum('paid',['dibayar','belum_dibayar'])->default('belum_dibayar');
            $table->softDeletes();
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
        Schema::dropIfExists('transaksis');
    }
}
