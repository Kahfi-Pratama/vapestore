<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Product;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    $products = Product::latest()
        ->take(6)
        ->get();

    return view(
        'home',
        compact('products')
    );

});

Route::get('/about', function () {
    return view('about');
});

/*
|--------------------------------------------------------------------------
| PRODUCT CUSTOMER
|--------------------------------------------------------------------------
*/

Route::get('/product', function () {

    $products = Product::all();

    return view(
        'product',
        compact('products')
    );

});

/*
|--------------------------------------------------------------------------
| CART
|--------------------------------------------------------------------------
*/

Route::get(
    '/cart',
    [CartController::class, 'index']
);

Route::get(
    '/cart/add/{id}',
    [CartController::class, 'add']
);

Route::get(
    '/cart/remove/{id}',
    [CartController::class, 'remove']
);

Route::get(
    '/cart/checkout',
    [CartController::class, 'checkout']
);

Route::post(
    '/cart/checkout/store',
    [CartController::class, 'checkoutStore']
);

Route::get(
    '/cart/invoice/{id}',
    [CartController::class, 'invoice']
);

/*
|--------------------------------------------------------------------------
| CHECKOUT SATU PRODUK
|--------------------------------------------------------------------------
*/

Route::get(
    '/checkout/{id}',
    [OrderController::class, 'checkout']
);

Route::post(
    '/checkout/store',
    [OrderController::class, 'store']
);

Route::get(
    '/invoice/{id}',
    [OrderController::class, 'invoice']
);

/*
|--------------------------------------------------------------------------
| EXCEL & PDF
|--------------------------------------------------------------------------
*/

Route::get('/products/export', function () {

    return Excel::download(
        new ProductsExport,
        'products.xlsx'
    );

});

Route::post('/products/import', function (Request $request) {

    Excel::import(
        new ProductsImport,
        $request->file('file')
    );

    return redirect('/products')
        ->with(
            'success',
            'Data berhasil diimport'
        );

});

Route::get(
    '/products/pdf',
    [ProductController::class, 'exportPdf']
);

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {

    return view('auth.login');

})->name('login');

Route::post('/login', function (Request $request) {

    $credentials = [
        'email' => $request->email,
        'password' => $request->password
    ];

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        return redirect()->intended('/dashboard');

    }

    return back()->with(
        'error',
        'Email atau password salah'
    );

})->name('authenticate');

Route::get('/logout', function () {

    Auth::logout();

    return redirect('/login');

})->name('logout');

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get(
    '/dashboard',
    [DashboardController::class, 'index']
);

/*
|--------------------------------------------------------------------------
| PRODUCTS ADMIN
|--------------------------------------------------------------------------
*/

Route::get(
    '/products',
    [ProductController::class, 'index']
);

Route::get(
    '/products/create',
    [ProductController::class, 'create']
);

Route::post(
    '/products',
    [ProductController::class, 'store']
);

Route::get(
    '/products/{id}/edit',
    [ProductController::class, 'edit']
);

Route::put(
    '/products/{id}',
    [ProductController::class, 'update']
);

Route::delete(
    '/products/{id}',
    [ProductController::class, 'destroy']
);