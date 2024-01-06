<?php

namespace App\Http\Controllers;

use App\Models\CategoryRoom;
use App\Models\Tamu;
use App\Models\Room;
use App\Models\Transaction;
use Illuminate\Http\Request;

use PDF;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            "jml_tamu" => Tamu::count(),
            "booking" => Transaction::where('status', 'terpakai')->count(),
            'jml_kamar' => Room::where('status', 0)->count()
        ];
        // return $data;
        return view('dashboard', $data);
    }

    public function list_tipe()
    {
        $data = [
            'title' => 'Tipe Kamar',
            'categories' => CategoryRoom::get()
        ];
        return view('admin.categoryrooms.index', $data);
    }

    public function create_tipe()
    {
        $data = [
            'title' => 'Tipe Kamar'
        ];
        return view('admin.categoryrooms.create', $data);
    }
    public function edit_tipe(CategoryRoom $categoryRoom)
    {
        $data = [
            'title' => 'Tipe Kamar',
            'categories' => $categoryRoom
        ];
        return view('admin.categoryrooms.edit', $data);
    }

    public function store_tipe(Request $request)
    {
        $request->validate([
            'tipe' => 'required',
            'harga' => 'required|numeric'
        ]);
        $save = CategoryRoom::create([
            'tipe' => $request->tipe,
            'harga' => $request->harga,
            'desc' => $request->desc
        ]);
        if ($save) {
            return redirect()->route('categories.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('categories.index')->with('failed', 'Data gagal ditambahkan');

        }
    }
    public function update_tipe(Request $request, CategoryRoom $categoryRoom)
    {
        $request->validate([
            'tipe' => 'required',
            'harga' => 'required|numeric'
        ]);
        $update = $categoryRoom->update([
            'tipe' => $request->tipe,
            'harga' => $request->harga,
            'desc' => $request->desc
        ]);
        if ($update) {
            return redirect()->route('categories.index')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect()->route('categories.index')->with('failed', 'Data gagal diupdate');

        }
    }

    public function delete_tipe(CategoryRoom $categoryRoom)
    {
        $delete = $categoryRoom->delete();
        if ($delete) {
            return redirect()->route('categories.index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('categories.index')->with('failed', 'Data gagal dihapus');
        }
    }

    public function downloadPdf()
    {
        $data = [
            'title' => 'List Transaction',
        ];
        $pdf = PDF::loadView('admin.jadwalpdf', $data);
        return $pdf->download('transactions.pdf');
    }

    public function detail($jadwal)
    {
        $data = [
            'title' => 'Detail Jadwal',
        ];
        $pdf = PDF::loadView('admin.pdf', $data);
        return $pdf->download('struk.pdf');
    }

}
