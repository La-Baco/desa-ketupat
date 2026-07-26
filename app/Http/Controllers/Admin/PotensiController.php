<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Potensi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PotensiController extends Controller
{
    public function index()
    {
        $potensis = Potensi::latest()->paginate(10);
        return view('admin.potensi.index', compact('potensis'));
    }

    public function create()
    {
        $categories = ['Perikanan', 'Pertanian', 'UMKM', 'Wisata', 'Kerajinan', 'Produk Unggulan'];
        return view('admin.potensi.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'required|string',
            'location' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        $validated['slug'] = Str::slug($validated['name']) . '-' . time();
        $validated['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('potensi', 'public');
        }

        Potensi::create($validated);

        return redirect()->route('admin.potensi.index')->with('success', 'Potensi desa berhasil ditambahkan.');
    }

    public function edit(Potensi $potensi)
    {
        $categories = ['Perikanan', 'Pertanian', 'UMKM', 'Wisata', 'Kerajinan', 'Produk Unggulan'];
        return view('admin.potensi.edit', compact('potensi', 'categories'));
    }

    public function update(Request $request, Potensi $potensi)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'required|string',
            'location' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        if ($validated['name'] !== $potensi->name) {
            $validated['slug'] = Str::slug($validated['name']) . '-' . time();
        }

        $validated['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('image')) {
            if ($potensi->image && Storage::disk('public')->exists($potensi->image)) {
                Storage::disk('public')->delete($potensi->image);
            }
            $validated['image'] = $request->file('image')->store('potensi', 'public');
        }

        $potensi->update($validated);

        return redirect()->route('admin.potensi.index')->with('success', 'Potensi desa berhasil diperbarui.');
    }

    public function destroy(Potensi $potensi)
    {
        if ($potensi->image && Storage::disk('public')->exists($potensi->image)) {
            Storage::disk('public')->delete($potensi->image);
        }
        $potensi->delete();

        return redirect()->route('admin.potensi.index')->with('success', 'Potensi desa berhasil dihapus.');
    }
}
