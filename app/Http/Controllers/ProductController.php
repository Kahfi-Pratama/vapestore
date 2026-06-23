<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;     
class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
$category = $request->category;

$products = Product::query();

if($search){
    $products->where(
        'name',
        'like',
        '%'.$search.'%'
    );
}

if($category){
    $products->where(
        'category',
        $category
    );
}

$products = $products->paginate(6);

return view(
    'products.index',
    compact('products')
);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(
            public_path('uploads'),
            $imageName
        );

        Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imageName
        ]);

        return redirect('/products')
            ->with(
                'success',
                'Produk berhasil ditambahkan'
            );
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view(
            'products.edit',
            compact('product')
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required|numeric'
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {

            $imageName = time() . '.' .
                $request->image->extension();

            $request->image->move(
                public_path('uploads'),
                $imageName
            );

        } else {

            $imageName = $product->image;
        }

        $product->update([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imageName
        ]);

        return redirect('/products')
            ->with(
                'success',
                'Produk berhasil diupdate'
            );
            
    }
    public function export()
{
    return Excel::download(
        new ProductsExport,
        'products.xlsx'
    );
    
}
public function exportPdf()
{
    $products = Product::all();

    $pdf = Pdf::loadView(
        'products.pdf',
        compact('products')
    );

    return $pdf->download(
        'laporan-produk.pdf'
    );
}

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect('/products')
            ->with(
                'success',
                'Produk berhasil dihapus'
            );
    }
}