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
            $table->timestamps();
            $table->foreignId('category_id')->constrained('product_categories')->onDelete('restrict');
            $table->foreignId('unit_id')->constrained('product_units')->onDelete('restrict');
            $table->string('name', 150);
            $table->string('clave_sat', 50)->nullable();
            $table->decimal('costo', 10, 2)->default(0);
            $table->decimal('descuento_monto', 10, 2)->default(0);
            $table->decimal('descuento_porcentaje', 5, 2)->default(0);
            $table->decimal('flete_monto', 10, 2)->default(0);
            $table->decimal('flet_porcentaje', 5, 2)->default(0);
            $table->decimal('iva_monto', 10, 2)->default(0);
            $table->decimal('iva_porcentaje', 5, 2)->default(0);
            $table->decimal('mayoreo_monto', 10, 2)->default(0);
            $table->decimal('mayoreo_porcentaje', 5, 2)->default(0);
            $table->decimal('menudeo_monto', 10, 2)->default(0);
            $table->decimal('menudeo_porcentaje', 5, 2)->default(0);
            $table->decimal('stock', 10, 2)->default(0);
            $table->boolean('is_active')->default(true);
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
