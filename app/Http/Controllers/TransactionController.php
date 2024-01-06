<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Tamu;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use PDF;

class TransactionController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Booking',
            'rooms' => Room::where('status', 0)->with('category_rooms')->get()
        ];
        return view('booking.index', $data);
    }

    public function create($id)
    {
        $data = [
            'title' => 'Booking',
            'rooms' => Room::where('id', $id)->with('category_rooms')->first(),
            'tamus' => Tamu::get()
        ];
        return view('booking.create', $data);
    }

    public function list_booking()
    {
        $data = [
            'title' => 'List Booking',
            'bookings' => Transaction::where('status', 'terpakai')->with('rooms', 'tamus')->get()
        ];
        return view('booking.list', $data);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'tamu_id' => 'required',
                'jumlah_tamu' => 'required',
                'checkin' => 'required',
                'checkout' => 'required',
                'total' => 'required'
            ]
        );

        $invoice = IdGenerator::generate(['table' => 'transactions', 'field' => 'invoice', 'length' => 10, 'prefix' => 'INV-']);
        $save = Transaction::create([
            'tamu_id' => $request->tamu_id,
            'room_id' => $request->room_id,
            'invoice' => $invoice,
            'jumlah_tamu' => $request->jumlah_tamu,
            'checkin' => $request->checkin,
            'checkout' => $request->checkout,
            'total' => $request->total,
            'status' => 'terpakai'
        ]);
        if ($save) {
            Room::where('id', $request->room_id)->update(['status' => 1]);
            return redirect()->route('bookings.list')->with('success', 'Berhasil melakukan booking');
        } else {
            return redirect()->route('bookings.list')->with('failed', 'Gagal melakukan booking');
        }
    }

    public function destroy(Transaction $transaction)
    {
        $delete = $transaction->delete();
        if ($delete) {
            Room::where('id', $transaction->room_id)->update(['status' => 0]);
            return redirect()->route('bookings.list')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('bookings.list')->with('failed', 'Data gagal dihapus');
        }
    }

    public function edit(Transaction $transaction)
    {
        $data = [
            'title' => 'Booking',
            'bookings' => $transaction,
            'rooms' => Room::where('id', $transaction->room_id)->with('category_rooms')->first(),
            'tamus' => Tamu::get()
        ];
        return view('booking.edit', $data);
    }
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate(
            [
                'tamu_id' => 'required',
                'jumlah_tamu' => 'required',
                'checkin' => 'required',
                'checkout' => 'required',
                'total' => 'required',
                'status' => 'required'
            ]
        );
        $update = $transaction->update([
            'tamu_id' => $request->tamu_id,
            'room_id' => $request->room_id,
            'jumlah_tamu' => $request->jumlah_tamu,
            'checkin' => $request->checkin,
            'checkout' => $request->checkout,
            'total' => $request->total,
            'status' => $request->status
        ]);
        if ($update) {
            Room::where('id', $request->room_id)->update(['status' => 1]);
            return redirect()->route('bookings.list')->with('success', 'Data berhasil melakukan diupdate');
        } else {
            return redirect()->route('bookings.list')->with('failed', 'Data gagal melakukan diupdate');
        }
    }

    public function checkout(Transaction $transaction)
    {
        $data = [
            'title' => 'Invoice',
            'bookings' => Transaction::where('id', $transaction->id)->with('rooms', 'tamus')->first(),
            'rooms' => Room::where('id', $transaction->room_id)->with('category_rooms')->first()
        ];
        return view('booking.invoice', $data);
    }
    public function invoice_print(Request $request)
    {
        $booking = Transaction::where('id', $request->booking_id)->with('rooms', 'tamus')->first();
        $update = Transaction::where('id', $request->booking_id)->update([
            'status' => 'selesai'
        ]);
        if ($update) {
            Room::where('id', $booking->room_id)->update([
                'status' => 0
            ]);
            $data = [
                'title' => 'Invoice',
                'bookings' => $booking,
                'rooms' => Room::where('id', $booking->room_id)->with('category_rooms')->first()
            ];
            return view('booking.invoice-print', $data);
        } else {
            return redirect()->route('bookings.list')->with('failed', 'Gagal transaksi');
        }

    }
    public function generate_pdf(Transaction $transaction)
    {
        $data = [
            'title' => 'Invoice',
            'bookings' => Transaction::where('id', $transaction->id)->with('rooms', 'tamus')->first(),
            'rooms' => Room::where('id', $transaction->room_id)->with('category_rooms')->first()
        ];
        $pdf = PDF::loadView('booking.pdf', $data);
        return $pdf->download($transaction->invoice . '.pdf');
    }

    public function riwayat()
    {
        $data = [
            'title' => 'Riwayat Booking',
            'bookings' => Transaction::where('status', 'selesai')->with('rooms', 'tamus')->get()
        ];
        return view('booking.riwayat', $data);
    }
    public function laporan()
    {
        $data = [
            'bookings' => Transaction::where('status', 'selesai')->with('rooms', 'tamus')->get()
        ];
        $pdf = PDF::loadView('admin.laporan', $data);
        return $pdf->download('Booking.pdf');
    }
}
