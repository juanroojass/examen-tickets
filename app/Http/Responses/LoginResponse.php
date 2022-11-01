<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        $message = __('The provided two factor authentication code was invalid test 1.2');

        if ($request->wantsJson()) {
            throw ValidationException::withMessages([
                'code' => [$message],
            ]);
        }

        return redirect()->route('two-factor.login')->withErrors(['code' => $message]);
        // return redirect()->back()->withErrors(['code' => $message]);
        // return view('auth.two-factor-challenge')->withErrors(['code' => $message]);
    }
}
