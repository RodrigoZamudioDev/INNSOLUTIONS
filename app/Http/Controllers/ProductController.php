<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Display a listing of the resource.

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "category_id" => "required|integer",
            "unit_id" => "required|integer",
            "name" => "required|string",
            "clave_sat" => "required|string",
            "costo" => "required|numeric",
            "descuento_monto" => "required|numeric",
            "descuento_porcentaje" => "required|integer",
            "flete_monto" => "required|numeric",
            "flet_porcentaje" => "required|integer",
            "iva_monto" => "required|numeric",
            "iva_porcentaje" => "required|integer",
            "mayoreo_monto" => "required|numeric",
            "mayoreo_porcentaje" => "required|integer",
            "menudeo_monto" => "required|numeric",
            "menudeo_porcentaje" => "required|integer",
            "stock" => "required|numeric",
            "is_active" => "required|boolean",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "error",
                "messages" => $validator->errors(),
            ], 422);
        }

        // Create the product
        $product = Product::create($request->all());

        if (!$product) {
            return response()->json([
                "status" => "error",
                "message" => "Failed to create product.",
            ], 500);
        }

        return response()->json([
            "status" => "success",
            "data" => $product,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                "status" => "error",
                "message" => "Product not found.",
            ], 404);
        }

        return response()->json([
            "status" => "success",
            "data" => $product,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                "status" => "error",
                "message" => "Product not found.",
            ], 404);
        }

        return response()->json([
            "status" => "success",
            "data" => $product,
        ], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(), [
            "category_id" => "sometimes|required|integer",
            "unit_id" => "sometimes|required|integer",
            "name" => "sometimes|required|string",
            "clave_sat" => "sometimes|required|string",
            "costo" => "sometimes|required|numeric",
            "descuento_monto" => "sometimes|required|numeric",
            "descuento_porcentaje" => "sometimes|required|integer",
            "flete_monto" => "sometimes|required|numeric",
            "flet_porcentaje" => "sometimes|required|integer",
            "iva_monto" => "sometimes|required|numeric",
            "iva_porcentaje" => "sometimes|required|integer",
            "mayoreo_monto" => "sometimes|required|numeric",
            "mayoreo_porcentaje" => "sometimes|required|integer",
            "menudeo_monto" => "sometimes|required|numeric",
            "menudeo_porcentaje" => "sometimes|required|integer",
            "stock" => "sometimes|required|numeric",
            "is_active" => "sometimes|required|boolean",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "error",
                "messages" => $validator->errors(),
            ], 422);
        }

        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                "status" => "error",
                "message" => "Product not found.",
            ], 404);
        }

        $product->update($request->all());

        return response()->json([
            "status" => "success",
            "data" => $product,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $validator = Validator::make(["id" => $id], [
            "id" => "required|integer|exists:products,id",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "error",
                "messages" => $validator->errors(),
            ], 422);
        }

        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                "status" => "error",
                "message" => "Product not found.",
            ], 404);
        }

        $product->delete();

        return response()->json([
            "status" => "success",
            "message" => "Product deleted successfully.",
        ], 200);

    }
}
