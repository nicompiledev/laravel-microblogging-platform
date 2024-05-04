<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Http\Controllers\Controller;

use Illuminate\Http\RedirectRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Inertia\Response;
use App\Http\Requests\UpdateChirpRequest;



class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(): Response
    {

        return Inertia::render('Chirps/Index', [
            //
            'chirps' => Chirp::with('user:id,name')->latest()->get(),

        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $request->user()->chirps()->create($validated);

        return redirect()->route('chirps.index');

    }

    public function update(Request $request, Chirp $chirp): RedirectResponse
    {
        //
        Gate::authorize('update', $chirp);

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $chirp->update($validated);

        return redirect()->route('chirps.index');

    }




}
