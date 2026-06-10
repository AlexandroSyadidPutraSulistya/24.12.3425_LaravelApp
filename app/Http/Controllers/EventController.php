<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function show($id){
    // Mengambil daftar kategori untuk keperluan menu footer
    // $categories = \App\Models\Category::all();
    $event = Event::with('category')->findOrFail($id);
    
        // Me-render view dengan membawa data kategori dan data spesifik acara tersebut
        return view('event-detail', compact('event'));
    }

    public function checkout(){
        return view('checkout');
    }

    public function ticket(){
        return view('ticket');
    }
}
