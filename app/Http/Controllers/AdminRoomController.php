<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class AdminRoomController extends Controller
{
    // Tampilkan halaman kelola kamar
    public function index()
    {
        $rooms = Room::all();
        return view('rooms', compact('rooms'));
    }

    // Simpan kamar baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_kamar' => 'required|string|max:255',
            'tipe' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if($request->hasFile('foto')){
            $data['foto'] = $request->file('foto')->store('rooms', 'public');
        }

        Room::create($data);

        return redirect()->route('admin.rooms')->with('success', 'Kamar berhasil ditambahkan!');
    }


    // Update kamar
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kamar' => 'required|string|max:255',
            'tipe' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $room = Room::findOrFail($id);
        $data = $request->all();

        if($request->hasFile('foto')){
            // Hapus file lama jika ada
            if($room->foto && file_exists(storage_path('app/public/'.$room->foto))){
                unlink(storage_path('app/public/'.$room->foto));
            }
            $data['foto'] = $request->file('foto')->store('rooms', 'public');
        }

        $room->update($data);

        return redirect()->route('admin.rooms')->with('success', 'Kamar berhasil diupdate!');
    }


    // Hapus kamar
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return redirect()->route('admin.rooms')->with('success', 'Kamar berhasil dihapus!');
    }
}
