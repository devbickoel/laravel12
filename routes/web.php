<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

// Cek apakah pengguna sudah login sebelum menampilkan halaman utama
Route::get('/', function (Request $request) {
    if (!Auth::check()) {
        return redirect('/auth-telegram'); // Redirect ke autentikasi jika belum login
    }
    return view('welcome'); // Jika sudah login, tampilkan halaman utama
});

// Route untuk autentikasi pengguna melalui WebApp Telegram
Route::post('/auth-telegram', function (Request $request) {
    $authData = $request->input('auth_data');
    $hashReceived = $request->input('hash');
    $secretKey = env('TELEGRAM_BOT_TOKEN');

    // Validasi hash agar hanya menerima data dari Telegram yang sah
    $calculatedHash = hash_hmac('sha256', $authData, $secretKey);

    if ($hashReceived !== $calculatedHash) {
        return response()->json(['error' => 'Data tidak valid!'], 403);
    }

    // Parse data pengguna dari string ke array
    $data = [];
    parse_str($authData, $data);

    // Cek apakah pengguna sudah ada di database, jika belum buat akun baru
    $user = User::updateOrCreate(
        ['telegram_id' => $data['id']],
        ['name' => $data['first_name'] ?? '', 'username' => $data['username'] ?? '']
    );

    // Login otomatis ke Laravel
    Auth::login($user);

    return redirect('/'); // Setelah login, kembali ke halaman utama
});
