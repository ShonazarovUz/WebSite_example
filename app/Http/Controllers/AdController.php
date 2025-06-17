<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

            
class AdController extends Controller
{
    use AuthorizesRequests; 

    public function index()
    {
        return Ad::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric'
        ]);

        $ad = Ad::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price
        ]);

        return response()->json($ad, 201);
    }

    public function show(Ad $ad)
    {
        return $ad;
    }

    public function update(Request $request, Ad $ad)
    {
        $this->authorize('update', $ad); 
        $ad->update($request->only('title', 'description', 'price'));
        return response()->json($ad);
    }

    public function destroy(Ad $ad)
    {
        $this->authorize('delete', $ad); 
        $ad->delete();
        return response()->json(['message' => 'Ad deleted']);
    }
}
