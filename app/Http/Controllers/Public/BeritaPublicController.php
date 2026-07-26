<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaPublicController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::where('status', 'published');

        $searchTerm = $request->input('search') ?? $request->input('q');

        if (!empty($searchTerm)) {
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhere('content', 'like', '%' . $searchTerm . '%')
                  ->orWhere('excerpt', 'like', '%' . $searchTerm . '%');
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $beritaList = $query->latest('published_at')->paginate(6)->withQueryString();
        
        $categories = Berita::where('status', 'published')
            ->select('category')
            ->distinct()
            ->pluck('category');

        return view('public.berita.index', compact('beritaList', 'categories'));
    }

    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // Increment view count
        $berita->increment('views');

        $recentBerita = Berita::where('status', 'published')
            ->where('id', '!=', $berita->id)
            ->latest('published_at')
            ->take(5)
            ->get();

        return view('public.berita.show', compact('berita', 'recentBerita'));
    }
}
