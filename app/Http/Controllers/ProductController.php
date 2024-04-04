<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return response(view('index', ['products' => $products]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('products.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $this->validate($request, [
            'kode' => 'required|string|max:255|unique:products',
            'name' => 'required|string|max:255',
            'price' => ['nullable', 'numeric', 'regex:/^[+-]?(\d+\.\d+|\d+)$/'],
            'stock' => 'integer|min:0',
        ]);


        if (Product::create($validatedData)) {
            return redirect(route('index'))->with('success', 'Added!');
        }

        return redirect(route('kosong'));
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return response(view('products.edit', ['product' => $product]));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $this->validate($request, [
            'kode' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'price' => ['nullable', 'numeric', 'regex:/^[+-]?(\d+\.\d+|\d+)$/'],
            'stock' => 'integer|min:0',
        ]);

        $product = Product::findOrFail($id);
        if ($product->update($validatedData)) {
            return redirect(route('index'))->with('success', 'Updated!');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->delete()) {
            return redirect(route('index'))->with('success', 'Deleted!');
        }
        return redirect(route('index'))->with('error', 'Sorry, unable to delete this!');
    }
}
