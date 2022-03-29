<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function afterLogin()
    {
        $user = Auth::user();
        $role = $user->role;

        if ($role === 'admin') {
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('agent.index');
        }
    }
}
