<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    //


    public function __construct()
    {
        $this-> middleware('auth')->except(['index', 'show']);
    }
}
