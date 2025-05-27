<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class TelegramAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $authData = $request->input('auth_data');
        $hashReceived = $request->input('hash');
        $secretKey = env('TELEGRAM_BOT_TOKEN');

        // Hitung hash berdasarkan token bot
        $calculatedHash = hash_hmac('sha256', $authData, $secretKey);

        if ($hashReceived !== $calculatedHash) {
            Log::warning('Autentikasi Telegram gagal', ['auth_data' => $authData]);
            return redirect('/403'); // Jika gagal, arahkan ke halaman error
        }

        // Simpan data pengguna ke session Laravel
        $data = [];
        parse_str($authData, $data);
        session(['telegram_user' => $data]);

        return $next($request);
    }
}
