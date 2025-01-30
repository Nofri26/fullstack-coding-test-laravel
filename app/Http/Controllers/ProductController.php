<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	public function index(): JsonResponse
	{
		$products = Product::query()->with('category')->get();
		return response()->json($products);
    }
}
