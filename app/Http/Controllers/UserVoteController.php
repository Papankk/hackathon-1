<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voting;
use App\Models\Option;

class UserVoteController extends Controller
{
    public function index()
    {
        $data_voting = Voting::all();

        return view('welcome', compact('data_voting'));
    }


    public function vote($id)
    {
        $data_option = Option::with('voting')->get();

        $data_voting = Voting::findOrFail($id);

        return view('vote', compact('data_option', 'data_voting'));
    }
}
