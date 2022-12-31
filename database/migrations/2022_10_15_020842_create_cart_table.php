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
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->string('customer_username');
            $table->string('customer_phone')->nullable();
            $table->string('customer_email');
            $table->string('customer_address')->nullable();
            $table->string('product_name');
            $table->string('product_image');
            $table->string('is_accessory')->nullable();
            $table->string('clothing_type')->nullable();
            $table->enum('product_category',['men','women','kids'])->nullable();
            $table->decimal('price');
            $table->decimal('discount')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('customer_id');
            $table->integer('update_user_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
};
