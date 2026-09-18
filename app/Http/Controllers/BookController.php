<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $title = 'Daftar Buku';
        $description = 'Daftar buku yang tersedia di perpustakaan';
        $books = [
            'Pemrograman PHP',
            'Laravel untuk pemula',
            'Basis Data',
            'Algoritma dan Pemrograman',
            'Pemrograman Berorientasi Objek',
            'AI untuk Dunia',
            'Ultraman',
            'NasionalIsMe'
        ];
 
        $authors = [
            'Ahmad Fauzi',
            'Dewi Lestari',
            'Budi Raharjo',
            'Siti Nurhaliza',
            'Rian Ardiansyah',
            'Putri Wulandari',
            'Eko Prasetyo',
            'Maya Kartika',
        ];

        $years = [
            2015,
            2018,
            2020,
            2012,
            2023,
            2017,
            2019,
            2021,
        ];

        $stock = 7;
        return view('book.index' , compact('title', 'description', 'books','authors','years' , 'stock'));
    }
    public function show ($id){ 
            return 'ID Buku' . $id;
        }
}