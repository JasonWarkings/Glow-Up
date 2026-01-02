<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Показываем форму входа
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Логиним пользователя
    public function login(Request $request)
    {
        // Валидируем email и пароль
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        // Пытаемся авторизовать
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate(); // важно для безопасности
            return redirect()->intended('/admin/dashboard'); // редирект на админку
        }

        // Если данные неверны — возвращаем ошибку
        return back()->withErrors([
            'login_error' => 'Неверный email или пароль',
        ])->withInput($request->only('email'));
    }

    // Выход
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
