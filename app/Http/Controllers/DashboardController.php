<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $stock = 7;
        $member = 5;
        $category = 5;
        return view('dashboard.index',compact('stock' , 'member' , 'category'));
    }
}
