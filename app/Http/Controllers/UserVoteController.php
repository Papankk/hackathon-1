<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voting;

class UserVoteController extends Controller
{
    public function index()
    {
        $data_voting = Voting::all();

        return view('welcome', compact('data_voting'));
    }


    public function vote()
    {
        return "vote";
    }
}
