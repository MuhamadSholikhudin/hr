<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;


class LoginController extends Controller
{
    //

    public function index(){
        Auth::logout();
        return view('login.index'
        
        // , [
            // 'title' => "Login",
            // 'active' => "login"
            // ]
        );
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

 
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password, 'is_active' => 1])) {
            // Authentication was successful...

        //     $tanggal_hari_ini = date('Y-m-d');// pendefinisian tanggal awal

        //     $countdown_date1 = date('Y-m-d', strtotime('-93 days', strtotime($tanggal_hari_ini))); //operasi penjumlahan tanggal sebanyak 6 hari
          
        //     $countdown_date2 = date('Y-m-d', strtotime('-120 days', strtotime($tanggal_hari_ini))); //operasi penjumlahan tanggal sebanyak 6 hari

        //    //tampilkan data hire_date
        //    DB::table('employees')
        //        ->where('date_out', null)
        //        ->where('exit_statement', null)
        //        ->where('hire_date', '>=', $countdown_date2)
        //        ->where('hire_date', '<=', $countdown_date1)
        //        ->where('employee_type', 'Probation')
        //        ->update([
        //            'employee_type' => 'Permanent'
        //    ]);

            $request->session()->regenerate();
            return redirect()->intended('dashboards');
            
        }

        return back()->with(
            'loginError' , 'Username atau password anda salah.',
        );

    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
