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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category')
            ->constrained(table: 'categorys')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('prodEng', 30);
            $table->string('prodRus', 30);
            $table->string('units', 30);
            $table->decimal('price', 5, 2);
            $table->string('country', 30);
            $table->string('picture', 30);
            $table->timestamp('created_at', 3)->useCurrent();
            $table->timestamp('updated_at', 3)->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
