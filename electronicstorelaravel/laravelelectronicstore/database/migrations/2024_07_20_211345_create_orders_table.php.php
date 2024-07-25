<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('customer_name'); 
            $table->string('customer_email'); 
            $table->text('address'); 
            $table->decimal('total_amount', 8, 2); 
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}