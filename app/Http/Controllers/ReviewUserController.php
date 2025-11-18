<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewUserController extends Controller
{
    public function create()
    {
        return view('reviews.create'); // create review page for users
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_review' => 'required|string|max:255',
            'comment' => 'required|string',
            'rate' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'name_review' => $request->name_review,
            'comment' => $request->comment,
            'rate' => $request->rate,
        ]);

        return redirect()->back()->with('success', 'Terima kasih! Review Anda berhasil dikirim.');

        if (auth()->user()->role !== 'user') {abort(403, 'Unauthorized');}
    }
}
