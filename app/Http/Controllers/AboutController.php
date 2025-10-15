<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Show edit page
     */
    public function edit()
    {
        $background = About::background()->first();
        $goals = About::goal()->first();
        $dosens = About::dosen()->ordered()->get();
        $mahasiswas = About::mahasiswa()->ordered()->get();
        $mitra = About::mitra()->first();

        return view('dashboard.about', compact(
            'background',
            'goals',
            'dosens',
            'mahasiswas',
            'mitra'
        ));
    }

    /**
     * Update Background
     */
    public function updateBackground(Request $request)
    {
        $request->validate([
            'content' => 'required|string'
        ]);

        About::updateOrCreate(
            ['type' => 'background'],
            ['content' => $request->content]
        );

        return back()->with('success', 'Latar belakang berhasil diperbarui!');
    }

    /**
     * Update Goals
     */
    public function updateGoals(Request $request)
    {
        $request->validate([
            'goals' => 'required|string'
        ]);

        About::updateOrCreate(
            ['type' => 'goal'],
            ['content' => $request->goals]
        );

        return back()->with('success', 'Tujuan project berhasil diperbarui!');
    }

    /**
     * Store new Dosen
     */
    public function storeDosen(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = [
            'type' => 'dosen',
            'name' => $request->name,
            'position' => $request->position,
            'order' => About::dosen()->max('order') + 1
        ];

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('dosens', 'public');
        }

        About::create($data);

        return back()->with('success', 'Dosen berhasil ditambahkan!');
    }

    /**
     * Update Dosen
     */
    public function updateDosen(Request $request, $id)
    {
        $dosen = About::dosen()->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = [
            'name' => $request->name,
            'position' => $request->position
        ];

        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($dosen->photo) {
                Storage::disk('public')->delete($dosen->photo);
            }
            $data['photo'] = $request->file('photo')->store('dosens', 'public');
        }

        $dosen->update($data);

        return back()->with('success', 'Dosen berhasil diperbarui!');
    }

    /**
     * Delete Dosen
     */
    public function destroyDosen($id)
    {
        $dosen = About::dosen()->findOrFail($id);

        // Delete photo if exists
        if ($dosen->photo) {
            Storage::disk('public')->delete($dosen->photo);
        }

        $dosen->delete();

        return back()->with('success', 'Dosen berhasil dihapus!');
    }

    /**
     * Store new Mahasiswa
     */
    public function storeMahasiswa(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = [
            'type' => 'mahasiswa',
            'name' => $request->name,
            'role' => $request->role,
            'order' => About::mahasiswa()->max('order') + 1
        ];

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('mahasiswas', 'public');
        }

        About::create($data);

        return back()->with('success', 'Mahasiswa berhasil ditambahkan!');
    }

    /**
     * Update Mahasiswa
     */
    public function updateMahasiswa(Request $request, $id)
    {
        $mahasiswa = About::mahasiswa()->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = [
            'name' => $request->name,
            'role' => $request->role
        ];

        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($mahasiswa->photo) {
                Storage::disk('public')->delete($mahasiswa->photo);
            }
            $data['photo'] = $request->file('photo')->store('mahasiswas', 'public');
        }

        $mahasiswa->update($data);

        return back()->with('success', 'Mahasiswa berhasil diperbarui!');
    }

    /**
     * Delete Mahasiswa
     */
    public function destroyMahasiswa($id)
    {
        $mahasiswa = About::mahasiswa()->findOrFail($id);

        // Delete photo if exists
        if ($mahasiswa->photo) {
            Storage::disk('public')->delete($mahasiswa->photo);
        }

        $mahasiswa->delete();

        return back()->with('success', 'Mahasiswa berhasil dihapus!');
    }

    /**
     * Update Mitra
     */
    public function updateMitra(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mitra_type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $mitra = About::mitra()->first();

        $data = [
            'type' => 'mitra',
            'name' => $request->name,
            'mitra_type' => $request->mitra_type,
            'description' => $request->description
        ];

        if ($request->hasFile('logo')) {
            // Delete old logo
            if ($mitra && $mitra->logo) {
                Storage::disk('public')->delete($mitra->logo);
            }
            $data['logo'] = $request->file('logo')->store('mitras', 'public');
        }

        if ($mitra) {
            $mitra->update($data);
        } else {
            About::create($data);
        }

        return back()->with('success', 'Mitra berhasil diperbarui!');
    }
}
