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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userId')
            ->constrained(table: 'users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('nOrder', 40)->unique()->comment('example[dateMonth-orderNumber 15-999345276]');
            $table->double('orderSum', 7,2)->nullable();        // число длиной 7 цифр и 2 из каторых после запятой
            $table->tinyInteger('amountInCart')->nullable();    // tinyint	(От 0 до 255) - 1 байт
            $table->json('inCart')->nullable()->comment('example[[id, price, amount], [5, 36.85, 3], ...]');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
