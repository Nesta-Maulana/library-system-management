<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        switch (Auth::user()->roles->pluck('name')[0]) {
            case 'Super Admin':
                $route  = 'admin.dashboard';
            break;
            case 'User':
                $route  = 'cso.dashboard';
            break;
        }
        return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect()->intended(
                        route($route)
                    );
    }

}
