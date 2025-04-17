<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Collection
     */
    public function index(): Collection
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return product
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required'
        ]);

        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     * @param string $id
     * @return product
     */
    public function show(string $id)
    {
        return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param string $id
     * @return product
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     * @param string $id
     * @return response
     */
    public function destroy(string $id): Response
    {
        Product::destroy($id);
        return response("product deleted successfully");
    }
}
