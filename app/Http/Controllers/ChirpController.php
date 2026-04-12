<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ChirpRequest;
use App\Models\chirp;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ChirpController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        return Inertia::render('home', [
            'chirps' => Chirp::with('user')->latest()->get(),
        ]);
    }

    public function store(ChirpRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        Chirp::create($data);
        return redirect()->route('home');
    }

    public function destroy(Chirp $chirp)
    {
        $this->authorize('delete', $chirp);

        $chirp->delete();
        return redirect()->route('home');
    }

    public function update(ChirpRequest $request, Chirp $chirp)
    {
        $this->authorize('update', $chirp);

        $data = $request->validated();

        $chirp->update($data);
        return redirect()->route('home');
    }
}
