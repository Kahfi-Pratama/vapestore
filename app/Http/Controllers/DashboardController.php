<?php

namespace App\Http\Controllers;

use App\Models\Product;

class DashboardController extends Controller

{
    
    public function index()
{
    $totalProducts = Product::count();

    $totalValue = Product::sum('price');

    $latestProducts = Product::latest()
        ->take(5)
        ->get();

    $categoryData = Product::selectRaw(
        'category, COUNT(*) as total'
    )
    ->groupBy('category')
    ->get();
$disposableCount = Product::where(
    'category',
    'Disposable'
)->count();

$podCount = Product::where(
    'category',
    'Pod'
)->count();

$liquidCount = Product::where(
    'category',
    'Liquid'
)->count();

$aksesorisCount = Product::where(
    'category',
    'Aksesoris'
)->count();
    return view(
        'dashboard',
        compact(
    'totalProducts',
    'totalValue',
    'latestProducts',
    'categoryData',
    'disposableCount',
    'podCount',
    'liquidCount',
    'aksesorisCount'
)
    );
}
}