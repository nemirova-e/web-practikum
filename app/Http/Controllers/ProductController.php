<?php

namespace App\Http\Controllers;

use App\Products\ProductsRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
//    public function index()
//    {
//        $products = Product::paginate(3);
//
//        return view('startpage', ['products' => $products]);
//    }

    public function search(ProductsRepository $repository, Request $request)
    {
        $q = $request->get('q');
        if (!empty($q)) {
            $products = $repository->search($q);
        } else {
            $products = Product::all();
        }


        return view('startpage', ['products' => $products]);
    }
}
