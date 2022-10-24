<?php

namespace App\Http\Controllers\AuthCustom;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['successMessage' => 'Link konfirmasi reset password telah dikirim ke email anda. Silahkan cek email anda.'])
            : back()->withErrors(['errorMessage' => 'Koneksi Terputus. Silahkan coba lagi']);
    }
}
