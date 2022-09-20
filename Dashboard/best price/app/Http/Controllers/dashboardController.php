<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;

use DB;

use Session;

session_start();

class dashboardController extends Controller
{
    /**
     * Dashboard Admin Login functionality
     * 
     */

    public function index()
    {
        return view('adminLogin');
    }

    /**
     * Admin Dashboard Home page functionality
     * 
     */

    public function dashboard(Request $request)
    {
        $admin_username = $request->username;
        $admin_password = md5($request->password);

        $result = DB::table('tbl_admin')
            ->where('admin_username', $admin_username)
            ->where('admin_password', $admin_password)
            ->first();

        /**
         * Admin Dashboard login for correct data
         * 
         */

        if ($result) {

            //this put name data for showing user name

            Session::put('name', $admin_username);
            Session::put('admin_id', $result->admin_id);
            return Redirect::to('/dashboard');
        }

        /**
         * Admin Dashboard login but if its wrong input
         * 
         */

        else {
            Session::put('masg', 'Username or Password are Incorrect. Please Enter Currect Username & Password');
            return Redirect::to('/admin');
        }
    }
}
