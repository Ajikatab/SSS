<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $params = [
            'transaction_details' => [
                'order_id' => uniqid(), // Gunakan checkout ID sebagai order_id
                'gross_amount' => $validatedData['total_amount'], // Ambil nilai total_amount dari formulir
            ],
            'customer_details' => [
                'first_name' => $request->nama,
                'phone' => $request->telepon,
            ],
        ];

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
        return redirect()->route('confirmation.page', ['id' => $checkout->id]);
    }

    public function confirmation(Request $request)
    {
        // Fetch data from the session or database as needed
        $dataCheckout = [
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'telepon' => $request->input('telepon'),
            'totalAmount' => $request->input('total_amount') // Sesuaikan dengan nama field pada formulir
        ];

        // Retrieve the Snap Token from the database based on the checkout data
        $checkoutRecord = Checkout::where([
            'nama' => $dataCheckout['nama'],
            'alamat' => $dataCheckout['alamat'],
            'telepon' => $dataCheckout['telepon'],
            'total_harga' => $dataCheckout['totalAmount']
        ])->first();

        if ($checkoutRecord) {
            $dataCheckout['snapToken'] = $checkoutRecord->snap_token;
            $dataCheckout['totalAmount'] = $checkoutRecord->total_harga;
        } else {
            // Handle the case where the record is not found (e.g., show an error message)
            // You may redirect the user back or take another appropriate action
            return redirect()->back()->with('error', 'Snap Token not found for the given checkout data.');
        }

        // Pass the data to the confirmation view
        return view('user.confirmation', ['checkoutData' => $dataCheckout, 'title' => 'Konfirmasi']);
    }

    public function showConfirmationPage($id)
    {
        // Ambil data checkout berdasarkan ID
        $checkoutData = Checkout::findOrFail($id);

        if (!$checkoutData->snap_token) {
            return redirect()->back()->with('error', 'Snap Token not found for the given checkout data.');
        }

        // dd($checkoutData->snap_token); // Pastikan Snap Token ada di sini

        return view('user.confirmation', [
            'checkoutData' => $checkoutData,
            'title' => 'Konfirmasi'
        ]);
    }
}
