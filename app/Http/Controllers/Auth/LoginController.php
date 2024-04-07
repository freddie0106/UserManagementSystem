<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            return $this->redirectTo();
        }

        return back()->withErrors(['email' => '提供的凭证不匹配我们的记录。']);
    }

    protected function redirectTo()
    {
        // 根据用户的角色重定向到不同的页面
        if (Auth::user()->hasRole('管理员')) {
            return redirect('/admin/dashboard');
        } elseif (Auth::user()->hasRole('学生')) {
            return redirect('/student/profile');
        }

        // 默认重定向到首页
        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

