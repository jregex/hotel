<?php

namespace App\Http\Controllers;

use App\Models\CategoryRoom;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Kamar',
            'rooms' => Room::with('category_rooms')->get()
        ];
        return view('admin.rooms.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Kamar',
            'categories' => CategoryRoom::get()
        ];
        return view('admin.rooms.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_kamar' => 'required',
            'category_room_id' => 'required',
            'maks' => 'required'
        ]);
        $save = Room::create([
            'no_kamar' => $request->no_kamar,
            'category_room_id' => $request->category_room_id,
            'maks' => $request->maks,
            'status' => 0
        ]);
        if ($save) {
            return redirect()->route('rooms.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('rooms.index')->with('failed', 'Data gagal ditambahkan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $data = [
            'title' => 'Kamar',
            'rooms' => $room,
            'categories' => CategoryRoom::get()
        ];
        return view('admin.rooms.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'no_kamar' => 'required',
            'category_room_id' => 'required',
            'maks' => 'required',
            'status' => 'required'
        ]);

        $update = $room->update([
            'no_kamar' => $request->no_kamar,
            'category_room_id' => $request->category_room_id,
            'maks' => $request->maks,
            'status' => $request->status
        ]);
        if ($update) {
            return redirect()->route('rooms.index')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect()->route('rooms.index')->with('failed', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $delete = $room->delete();
        if ($delete) {
            return redirect()->route('rooms.index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('rooms.index')->with('failed', 'Data gagal dihapus');
        }
    }
}
