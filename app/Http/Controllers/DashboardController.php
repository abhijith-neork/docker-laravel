<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function clear_filter_session()
    {
        session_start(); // Start the session
        session_unset(); // Unset all session variables
        session_destroy(); 
        return true;
    }

    public function index()
    {
        return view('admin.dashboard.index');
    }
    public function clear_filter($value)
    {
        session_start();
        if (isset($_SESSION[$value])) {
            unset($_SESSION[$value]);    
        }
    }

}
