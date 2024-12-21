<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
        //aqui  pagina 56
        //facile de faire jusqu'a 58, 63 aprés
        public function indexByCategory($id) {
            $categories = Category::all();

            if ($id == 0) {
                $products = Product::all();
            } else {
                $category = Category::find($id);
                $products = $category->products;
            }

            return view('products.index', [
                'produtos' => $products,
                'categorias' => $categories,
                'idCategoriaAtiva' => $id
            ]);
        }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $produtos = Product::all();
        // return  view('products.index', ['produtos' => $produtos]);
        return $this->indexByCategory(0);
    }

    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        if ( ! Auth::user()->isAdmin)
            return back();

        $categorias = Category::all();
        return view('products.create', ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $url = '';

    if ($request->has('img')) {
        $image = $request->file('img');

        $iname = "prod_" . time();
        $folder = "/img/created_products/";

        $fileName = $iname . "." . $image->getClientOriginalExtension();
        $filePath = $folder . $fileName;

        $image->storeAs($folder, $fileName, 'public');
        $url = "/storage/" . $filePath;
    }

    $produto = new Product;

    $produto->Name = $request->name;
    $produto->Description = $request->desc;
    $produto->img = $url;
    $produto->Cost = $request->cost;
    $produto->category_id = $request->cat;
    $produto->owner_id = Auth::user()->id;

    $produto->save();

    return redirect(route('products.show', $produto->id));
}
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produto = Product::find($id);
        $categoria = Category::find($produto->category_id);
        return view('products.show', ['produto' => $produto, 'categoria' => $categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!Auth::user()->isAdmin)
            return back();

        $produto = Product::find($id);
        $categorias = Category::all();

        return view('products.create', ['categorias' => $categorias, 'produto' => $produto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $produto = Product::find($id);

        $url = $produto->img;
        if ($request->has('img')) {
            $image = $request->file('img');

            $iname = "prod_" . time();
            $folder = "/img/created_products/";
            $fileName = $iname . "." . $image->getClientOriginalExtension();
            $filePath = $folder . $fileName;

            $image->storeAs($folder, $fileName, 'public');
            $url = "/storage/" . $filePath;
        }

        $produto = new Product;

        $produto->Name = $request->name;
        $produto->Description = $request->desc;
        $produto->img = $url;
        $produto->Cost = $request->cost;
        $produto->category_id = $request->cat;
        $produto->owner_id = Auth::user()->id;

        $produto->save();

        return redirect()->route('products.show', $produto->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Vérifie si l'utilisateur est un administrateur
        if (!Auth::user()->isAdmin) {
            return back(); // Redirige vers la page précédente si ce n'est pas un admin
        }

        // Récupère le produit à supprimer à partir de son ID
        $produit = Product::find($id);

        // Supprime le produit de la base de données
        $produit->delete();

        // Redirige vers la liste des produits après la suppression
        return redirect()->route('products.index');
    }
}
