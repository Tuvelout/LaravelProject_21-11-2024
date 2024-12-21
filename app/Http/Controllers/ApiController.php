<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    function index()
    {
        return Product::all();
    }

    function show(int $id)
    {
        return Product::find($id);
    }
}
