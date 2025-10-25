<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salesman extends Model
{
    /** @use HasFactory<\Database\Factories\SalesmanFactory> */
    use HasFactory;

    public function clients() {
        return $this->hasMany(Client::class);
    }
}
