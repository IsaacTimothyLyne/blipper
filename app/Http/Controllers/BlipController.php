<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlipRequest;
use App\Models\Blip;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BlipController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        return Inertia::render('home', [
            'blips' => Blip::with('user')->latest()->get(),
        ]);
    }

    public function store(BlipRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        Blip::create($data);
        return redirect()->route('home');
    }

    public function destroy(Blip $blip)
    {
        $this->authorize('delete', $blip);

        $blip->delete();
        return redirect()->route('home');
    }

    public function update(BlipRequest $request, Blip $blip)
    {
        $this->authorize('update', $blip);

        $data = $request->validated();

        $blip->update($data);
        return redirect()->route('home');
    }
}
