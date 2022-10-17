<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

class EmployeeController extends Controller
{
    
    public function index(){

        $employees = DB::table('employees')->all();

        if(request('search')){
            $employees->where('number_of_employees', 'like', '%' . request('search') . '%')
                      ->orWhere('name', 'like', '%' . request('search') . '%')
                      ->orWhere('status_employee', 'like', '%' . request('search') . '%')
                      ->orWhere('national_id', 'like', '%' . request('search') . '%')
                      ;
        }

        return view('employees.index',[
            'employees' => $employees->orderBy('number_of_employees', 'asc')->paginate(10)->withQuerystring(),
            'count' => DB::table('employees')->count()
        ]);
    }
}
