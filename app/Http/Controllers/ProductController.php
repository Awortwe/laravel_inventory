<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('backend.products.index', compact('products'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $units = Unit::all();
        $categories = Category::all();

        return view('backend.products.create', compact('suppliers', 'units', 'categories'));
    }

    public function store(Request $request)
    {
        Product::insert([
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'quantity' => '0',
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product added successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('products.index')->with($notification);
    }
}
