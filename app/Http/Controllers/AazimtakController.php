<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AazimtakController extends Controller
{

    public function showHomePage()
    {
        return view('aazimtak.welcome');
    }

    public function showTerms()
    {
        return view('aazimtak.terms');
    }

    public function showPrivacy()
    {
        return view('aazimtak.privacy');
    }

    public function showPricing()
    {
        return view('aazimtak.pricing');
    }

    public function showCheckout()
    {
        return view('aazimtak.checkout');
    }

    public function submit(Request $request)
    {
        // Handle form submission
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'total_price' => 'required|numeric',
            'payment_method' => 'required|string',
        ]);

        // Process payment and save order details
        // ...

        return redirect()->route('checkout.show', ['plan' => 'basic'])->with('success', 'Thank you for your purchase!');
    }
}
