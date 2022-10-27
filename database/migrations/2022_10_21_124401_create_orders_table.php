<?php

use App\Enums\OrderStutsEnum;
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
            $table->foreignId('user_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->integer('count');
            $table->decimal('total');
            $table->foreignId('coupon_id')->nullable()->constrained();
            $table->decimal('result');
            $table->string('address');
            $table->enum('status',[OrderStutsEnum::CANCELLED->value,OrderStutsEnum::PENDING->value,OrderStutsEnum::ONSHIP->value
                ,OrderStutsEnum::COMPLETE->value]);
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
        Schema::dropIfExists('orders');
    }
};
