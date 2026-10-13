<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Tetap butuh ini untuk memanggil Model Book

class DashboardController extends Controller
{
    public function index(){
        // Ganti dari Book::sum('stock') menjadi Book::count() untuk menghitung jumlah judul buku
        $stock = Book::count(); 
        
        $member = 5;
        $category = 5;
        
        return view('dashboard.index', compact('stock', 'member', 'category'));
    }
}