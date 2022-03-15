<?php

namespace App\Http\Controllers;

use App\Models\User;
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
use App\Jobs\RabbitMQJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function search(Request $request, ProductsRepository $repository) {

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

        $product_id = $product->id;
        Cache::rememberForever('visits'.$product_id, function () {
                return 0;
        });

        $visits = Cache::increment('visits'.$product_id);

        return view('submission_form', [
            'product' => $product,
            'visits' => $visits,
            ]);
    }

    public function sendMail (Product $product, Request $request) {

        $response = new UserResponse();
        $response->fill($request->all());
        $response->product_id = $product->id;
        $response->save();

        RabbitMQJob::dispatch($response);

        return redirect()->route('search');
    }

    public function auth () {

        $user = Auth::user();
        $productsOfThisCompany = Product::where('insurance_company_id','=',$user->insurance_company_id)->get();

        return view ('lk',[
            'user'=>$user,
            'productsOfThisCompany'=>$productsOfThisCompany
            ]);
    }

    public function addProduct () {

        $categories = Category::all();
        $insurance_companies = InsuranceCompany::all();

        return view('add_product',[
            'categories' => $categories,
            'insurance_companies' => $insurance_companies,
            ]);
    }

    public function saveProduct (Request $request) {

        $product = new Product();
        $product->fill($request->all());
        $product->insurance_company_id = auth()->user()->insurance_company_id;
        $product->save();

        return redirect()->route('lk');
    }

}

