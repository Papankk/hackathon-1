<?php

namespace App\Http\Controllers;

use App\Http\Requests\VotingRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Voting;

class VotingController extends Controller
{
    public function index()
    {
        $data_voting = Voting::all();
        $data_voting1 = Voting::all();
        $no = 1;

        return view('voting.index', compact('data_voting', 'no', 'data_voting1'));
    }

    public function store(Request $request): RedirectResponse
    {
        $is_checked = false;

        $request->validateWithBag('votingStore', [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_date',
        ]);

        if ($is_checked = $request->has('is_public')) {
            $is_checked = true;
        }

        Voting::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'is_public' => $is_checked
        ]);

        return redirect(route('voting.index', absolute: false));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $is_checked = false;

        $validated = $request->validateWithBag('votingUpdate', [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_date',
        ]);


        if ($is_checked = $request->has('is_public')) {
            $is_checked = true;
        }

        $voting = Voting::findOrFail($id);

        $voting->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'is_public' => $is_checked
        ]);

        return redirect(route('voting.index', absolute: false));
    }

    public function delete($id): RedirectResponse
    {
        $voting = Voting::findOrFail($id);

        $voting->delete();

        return redirect(route('voting.index', absolute: false));
    }
}
