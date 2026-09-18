<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = [
            'Andi',
            'Budi',
            'Citra',
            'Dewi',
            'Eko'
        ];
        return view('member.index', compact('members'));
    }
}