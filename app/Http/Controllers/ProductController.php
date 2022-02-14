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
use App\Models\InsuranceCompany;
use App\Models\Category;


class ProductController extends Controller
{
    public function search(Request $request, ProductsRepository $repository)
    {
        if ($request->get('q')) {
            $productsQuery = $repository->search($request->get('q'));
        } else {
            $productsQuery = Product::query();
        }

        if ($request->get('insurance_company_id')) {
            $productsQuery = $productsQuery->where('insurance_company_id', (int)$request->get('insurance_company_id'));
        }
        if ($request->get('category_id')) {
            $productsQuery = $productsQuery->where('category_id', (int)$request->get('category_id'));
        }
        if ($request->get('rateMin')) {
            $productsQuery = $productsQuery->where('rate', '>=', (int)$request->get('rateMin'));
        }
        if ($request->get('rateMax')) {
            $productsQuery = $productsQuery->where('rate', '<=', (int)$request->get('rateMax'));
        }
        if ($request->get('monthsMin')) {
            $productsQuery = $productsQuery->where('months', '>=', (int)$request->get('monthsMin'));
        }
        if ($request->get('monthsMax')) {
            $productsQuery = $productsQuery->where('months', '<=', (int)$request->get('monthsMax'));
        }

        $products = $productsQuery->with(['category', 'company'])->get();
        $insurance_companies = InsuranceCompany::all();
        $categories = Category::all();

        return view('startpage', [
            'products' => $products,
            'insurance_companies' => $insurance_companies,
            'categories' => $categories,
        ]);
    }
}
