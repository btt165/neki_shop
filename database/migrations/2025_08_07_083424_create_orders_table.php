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
       Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->text('address');
            $table->string('city', 100);
            $table->string('phone', 20);
            $table->string('email')->nullable();
            $table->string('payment_method', 50);
            $table->decimal('total_price', 10, 2);
            $table->timestamp('created_at')->useCurrent();
            $table->string('status', 50)->default('Chờ xác nhận');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
