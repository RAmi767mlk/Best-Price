<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
Session_start();

class superadminController extends Controller
{
    public function adminAuth()
    {
        $adminId = Session::get('admin_id');

        if($adminId)
        {
            return;
        }
        else
        {
            return Redirect::to('/admin')->send();
        }
    }

    public function index()
    {
        $this->adminAuth();

        return view('admin.dashboard');
    }

    public function logout()
    {
        Session::flush();

        return Redirect::to('/admin');
    }
}
