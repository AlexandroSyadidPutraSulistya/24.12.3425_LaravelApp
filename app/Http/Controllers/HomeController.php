<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use App\Models\Partner;


class HomeController extends Controller
{
    public function index(Request $request)
{
    // Ambil semua kategori
    $categories = Category::all();

    // Query event
    $query = Event::with('category')
                  ->where('date', '>=', now())
                  ->orderBy('date', 'asc');

    // Filter kategori
    if ($request->has('category') && $request->category != '') {

        $query->whereHas('category', function ($q) use ($request) {

            $q->where('slug', $request->category);

        });

    }

    // Ambil event
    $events = $query->get();

    // Ambil partner
    $partners = Partner::latest()->get();

    return view('welcome', compact(
        'events',
        'categories',
        'partners'
    ));
}

}
