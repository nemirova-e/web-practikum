<?php


namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AgentController extends Controller
{

    public function index () {

        $user = Auth::user();

        return view ('agent.index',[
            'user'=>$user,
        ]);

    }
}
