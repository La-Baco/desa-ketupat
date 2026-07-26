<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DesaProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DesaProfileController extends Controller
{
    public function index()
    {
        $profile = DesaProfile::firstOrCreate(['id' => 1]);
        return view('admin.profil.index', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = DesaProfile::firstOrCreate(['id' => 1]);

        $validated = $request->validate([
            'sejarah' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'sambutan' => 'nullable|string',
            'foto_kantor' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        if ($request->hasFile('foto_kantor')) {
            if ($profile->foto_kantor && Storage::disk('public')->exists($profile->foto_kantor)) {
                Storage::disk('public')->delete($profile->foto_kantor);
            }
            $validated['foto_kantor'] = $request->file('foto_kantor')->store('profile', 'public');
        }

        $profile->update($validated);

        return redirect()->back()->with('success', 'Profil Desa Ketupat berhasil diperbarui.');
    }
}
