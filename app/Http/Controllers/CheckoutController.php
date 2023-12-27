<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function showForm()
    {
        return view('user.checkout', [
            'title' => 'Checkout',
        ]);
    }

    public function processCheckout(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:20',
            'total_amount' => 'required|numeric', // Tambahkan validasi untuk total_amount
        ]);


        // Set your Midtrans Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transactions).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;


        $params = array(
            'transaction_details' => array(
                'order_id' => uniqid(), // Gunakan checkout ID sebagai order_id
                'gross_amount' => $validatedData['total_amount'], // Ambil nilai total_amount dari formulir
            ),
            'customer_details' => array(
                'first_name' => $request->nama,
                'phone' => $request->telepon,
            ),
        );

        // Generate Snap Token
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // Simpan data checkout ke dalam database bersama dengan Snap Token
        $checkout = new Checkout();
        $checkout->total_harga = $validatedData['total_amount'];
        $checkout->nama = $validatedData['nama'];
        $checkout->alamat = $validatedData['alamat'];
        $checkout->telepon = $validatedData['telepon'];
        $checkout->snap_token = $snapToken; // Simpan Snap Token ke dalam database
        $checkout->save();

        // Redirect atau lakukan tindakan tambahan jika diperlukan
        return redirect()->back()->with('success', 'Checkout successful!')->with('checkout', $checkout);
    }
}
