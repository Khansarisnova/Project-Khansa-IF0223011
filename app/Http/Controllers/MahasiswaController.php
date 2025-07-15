<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('pages.jadwal.index', [
            'jadwal' => $jadwal,
        ]);
    }

    public function create()
    {
        return view('pages.jadwal.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no' => 'required',
            'tanggal' => 'required|date',
            'hari' => 'required',
            'jam' => 'required',
            'ruangan' => 'required',
            'mata_kuliah' => 'required',
            'status_ujian' => 'required',
        ]);

        Jadwal::create($validated);

        return redirect('/jadwal')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id); // lebih aman daripada DB::table
        return view('pages.jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no' => 'required',
            'tanggal' => 'required|date',
            'hari' => 'required',
            'jam' => 'required',
            'ruangan' => 'required',
            'mata_kuliah' => 'required',
            'status_ujian' => 'required',
        ]);

        Jadwal::where('id', $id)->update([
            'no' => $request->no,
            'tanggal' => $request->tanggal,
            'hari' => $request->hari,
            'jam' => $request->jam,
            'ruangan' => $request->ruangan,
            'mata_kuliah' => $request->mata_kuliah,
            'status_ujian' => $request->status_ujian,
        ]);

        return redirect('/jadwal')->with('success', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect('/jadwal')->with('success', 'Data berhasil dihapus');
    }
}
