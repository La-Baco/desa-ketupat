<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AparaturDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AparaturDesaController extends Controller
{
    public function index()
    {
        $aparaturList = AparaturDesa::orderBy('order', 'asc')->get();
        return view('admin.aparatur.index', compact('aparaturList'));
    }

    public function create()
    {
        return view('admin.aparatur.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'required|integer',
            'is_active' => 'boolean',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('aparatur', 'public');
        }

        AparaturDesa::create($validated);

        return redirect()->route('admin.aparatur.index')->with('success', 'Data aparatur desa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $aparatur = AparaturDesa::findOrFail($id);
        return view('admin.aparatur.edit', compact('aparatur'));
    }

    public function update(Request $request, $id)
    {
        $aparatur = AparaturDesa::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'required|integer',
            'is_active' => 'boolean',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('photo')) {
            if ($aparatur->photo && Storage::disk('public')->exists($aparatur->photo)) {
                Storage::disk('public')->delete($aparatur->photo);
            }
            $validated['photo'] = $request->file('photo')->store('aparatur', 'public');
        }

        $aparatur->update($validated);

        return redirect()->route('admin.aparatur.index')->with('success', 'Data aparatur desa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $aparatur = AparaturDesa::findOrFail($id);

        if ($aparatur->photo && Storage::disk('public')->exists($aparatur->photo)) {
            Storage::disk('public')->delete($aparatur->photo);
        }
        $aparatur->delete();

        return redirect()->route('admin.aparatur.index')->with('success', 'Data aparatur desa berhasil dihapus.');
    }
}
