<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        "category_id",
        "unit_id",
        "name",
        "clave_sat",
        "costo",
        "porcentaje_flete",
        "iva_porcentaje",
        "porcentaje_mayoreo",
        "porcentaje_minorista",
        "stock",
        "is_active",
    ];



}
