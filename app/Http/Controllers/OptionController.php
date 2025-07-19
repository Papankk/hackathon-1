<?php

namespace App\Http\Controllers;

use App\Http\Requests\VotingRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Option;

class OptionController extends Controller
{
    public function index()
    {
        $data_option = Option::with('voting')->get();
        $no = 1;

        return view('option.index', compact('data_option', 'no'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validateWithBag('votingStore', [
            'voting_id' => 'required|exists:votings,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Option::create([
            'voting_id' => $request->voting_id,
            'name' => $request->name,
            'description' => $request->description,
            'photo' => 'photos/andi.jpg',
        ]);

        return redirect(route('option.index', absolute: false));
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

        $voting = Option::findOrFail($id);

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
        $voting = Option::findOrFail($id);

        $voting->delete();

        return redirect(route('voting.index', absolute: false));
    }
}
