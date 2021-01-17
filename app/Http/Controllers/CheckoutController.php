<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $this->makePagueSeguroSession();

        var_dump(session()->get('pagueseguro_session_code'));

        return view('checkout');
    }

    private function makePagueSeguroSession()
    {
        if (!session()->has('pagueseguro_session_code')) {
            $sessionCode = \PagSeguro\Services\Session::create(
                \PagSeguro\Configuration\Configure::getAccountCredentials()
            );

            return session()->put('pagueseguro_session_code', $sessionCode->getResult());
        }

    }

}
