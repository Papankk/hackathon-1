<?php

namespace App\Http\Controllers;

use App\Models\Voting;

abstract class Controller
{
    public function index()
    {
        $data_voting = Voting::all();

        return view('welcome', compact('data_voting'));
    }
}
