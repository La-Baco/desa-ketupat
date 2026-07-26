<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Potensi;
use Illuminate\Http\Request;

class PotensiPublicController extends Controller
{
    public function index(Request $request)
    {
        $query = Potensi::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $potensis = $query->latest()->paginate(8)->withQueryString();
        
        $categories = [
            'Perikanan', 'Pertanian', 'UMKM', 'Wisata', 'Kerajinan', 'Produk Unggulan'
        ];

        return view('public.potensi.index', compact('potensis', 'categories'));
    }

    public function show($slug)
    {
        $potensi = Potensi::where('slug', $slug)->firstOrFail();
        
        $relatedPotensi = Potensi::where('id', '!=', $potensi->id)
            ->where('category', $potensi->category)
            ->take(3)
            ->get();

        return view('public.potensi.show', compact('potensi', 'relatedPotensi'));
    }
}
