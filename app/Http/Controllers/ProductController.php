<?php

namespace App\Http\Controllers;

use App\Products\ProductsRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Product;
use App\Models\InsuranceCompany;
use App\Models\Category;
use App\Filters\Models\Product\CategoryFilter;
use App\Filters\Models\Product\InsuranceCompanyFilter;
use Pricecurrent\LaravelEloquentFilters\EloquentFilters;
use App\Filters\Models\Product\RateMinFilter;
use App\Filters\Models\Product\RateMaxFilter;
use App\Filters\Models\Product\MonthsMinFilter;
use App\Filters\Models\Product\MonthsMaxFilter;
use App\Models\UserResponse;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;



class ProductController extends Controller
{
    public function search(Request $request, ProductsRepository $repository)
    {
        if ($request->get('q')) {
            $productsQuery = $repository->search($request->get('q'));
        } else {
            $productsQuery = Product::query();
        }

        $filters =  EloquentFilters::make([
            new InsuranceCompanyFilter($request->get('insurance_company_id')),
            new CategoryFilter($request->get('category_id')),
            new RateMinFilter($request->get('rateMin')),
            new RateMaxFilter($request->get('rateMax')),
            new MonthsMinFilter($request->get('monthsMin')),
            new MonthsMaxFilter($request->get('monthsMax'))
        ]);
        $productsQuery = $productsQuery->filter($filters);


        $products = $productsQuery->with(['category','company'])->get();
        $insurance_companies = InsuranceCompany::all();
        $categories = Category::all();

        return view('startpage', [
            'products' => $products,
            'insurance_companies' => $insurance_companies,
            'categories' => $categories,
        ]);
    }

        public function submissionForm(Product $product) {

        return view('submission_form', [
            'product' => $product,
        ]);
        }

        function sendMail (Product $product, Request $request)
        {
            $response = new UserResponse();
            $response->fill($request->all());
            $response->product_id = $product->id;

            $response->saveOrFail();

            Mail::to($product->company->email)->send(new OrderShipped($response));

            return redirect()->route('search');
        }
}