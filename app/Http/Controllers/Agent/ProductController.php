<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $productsOfThisCompany = Product::where('insurance_company_id','=',(Auth::user())->insurance_company_id)->get();

        return view('agent.product.index', [
            'productsOfThisCompany'=>$productsOfThisCompany,
        ]);
    }


    public function create()
    {
        return view ('agent.product.create',[
            'categories' => Category::all(),
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'rate' => 'required',
            'months' => 'required',
            'category_id' => 'required',
        ]);

        $product = new Product();
        $product->fill($request->all());
        $product->insurance_company_id = (Auth::user())->insurance_company_id;
        $product->saveOrFail();


        return redirect()->route('agent.product.index')
            ->with('success', 'Продукт успешно создан!');
    }


    public function show(Product $product)
    {
        return view ('agent.product.show',[
            'product' => $product,
        ]);
    }


    public function edit(Product $product)
    {
        return view('agent.product.edit',[
            'product' => $product,
            'categories' => Category::all(),
        ]);
    }


    public function update(Request $request, Product $product)
    {
        $product->fill($request->all());
        $product->saveOrFail();

        return redirect()->route('agent.product.index')
            ->with('success','Продукт успешно отредактирован!');
    }


    public function destroy(Product $product)
    {
        $product->responses()->deleteOrFail();

        return redirect()->route('agent.product.index');

    }
}
