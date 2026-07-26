<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DesaStatistic;
use Illuminate\Http\Request;

class DesaStatisticController extends Controller
{
    public function index()
    {
        $statistics = DesaStatistic::orderBy('year', 'desc')->get();
        return view('admin.statistik.index', compact('statistics'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'value' => 'required|integer|min:0',
            'unit' => 'required|string|max:50',
            'year' => 'required|integer|min:2000|max:2100',
            'category' => 'required|string|max:100',
        ]);

        DesaStatistic::create($validated);

        return redirect()->back()->with('success', 'Data statistik berhasil ditambahkan.');
    }

    public function update(Request $request, DesaStatistic $statistic)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'value' => 'required|integer|min:0',
            'unit' => 'required|string|max:50',
            'year' => 'required|integer|min:2000|max:2100',
            'category' => 'required|string|max:100',
        ]);

        $statistic->update($validated);

        return redirect()->back()->with('success', 'Data statistik berhasil diperbarui.');
    }

    public function destroy(DesaStatistic $statistic)
    {
        $statistic->delete();
        return redirect()->back()->with('success', 'Data statistik berhasil dihapus.');
    }
}
