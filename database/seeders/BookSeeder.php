<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title'=>'Pemrograman PHP',
            'author'=>'Ahmad Fauzi',
            'year'=> 2015,
            'stock'=>5,
            ]);

        Book::create([
            'title'=>'Laravel untuk pemula',
            'author'=>'Dewi Lestari',
            'year'=>2018,
            'stock'=>5,
            ]);
        
        Book::create([    
            'title'=>'Basis Data',
            'author'=>'Budi Raharjo',
            'year'=>2020,
            'stock'=>5, 
            ]);

        Book::create([
            'title'=>'Algoritma dan Pemrograman',
            'author'=>'Siti Nurhaliza',
            'year'=>2012,
            'stock'=>5,
            ]);

        Book::create([    
            'title'=>'Pemrograman Berorientasi Objek',
            'author'=>'Rian Ardiansyah',
            'year'=>2023,
            'stock'=>5,
        ]);
        
        Book::create([
            'title'=>'AI untuk dunia',
            'author'=>'Putri Wulandari',
            'year'=>2017,
            'stock'=>5,
        ]);

        Book::create([
            'title'=>'Ultraman',
            'author'=>'Eko Prasetyo',
            'year'=>2019,
            'stock'=>5,
        ]);
    }
}
