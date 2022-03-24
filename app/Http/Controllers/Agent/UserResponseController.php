<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\UserResponse;
use Illuminate\Support\Facades\Auth;

class UserResponseController extends Controller
{
    public function index()
    {
        $companyId = Auth::user()->insurance_company_id;
        $userResponses = UserResponse::query()
            ->join('products', 'user_responses.product_id', '=', 'products.id')
            ->join('insurance_companies', 'insurance_companies.id', '=', 'products.insurance_company_id')
            ->where('insurance_companies.id', '=' , $companyId)
            ->get();

       return view('agent.user-response.index', [
            'userResponses'=>$userResponses,
        ]);
    }

    public function show(UserResponse $userResponse)
    {
        return view ('agent.user-response.show',[
            'response' => $userResponse,
        ]);
    }
}
