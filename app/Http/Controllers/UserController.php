<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user');
    }

    public function index()
    {
        $availableVenues = ['Gedung Graha Mandiri', 'Gedung UOB Plaza', 'Gedung Plaza Mandiri', 'Gedung CIMB Niaga Bintaro 7'];
        return view('user.dashboard', compact('availableVenues'));
    }

    public function bookVenue(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'event_place' => 'required|string',
            'phone' => 'required|string',
            'booking_date' => 'required|date',
            'size' => 'required|string',
        ]);

        $prices = [
            '1x1' => 250000,
            '2x1' => 500000,
            '2x2' => 1000000,
            '3x3' => 2250000,
        ];

        $price = $prices[$request->size];

        Booking::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'event_place' => $request->event_place,
            'phone' => $request->phone,
            'booking_date' => $request->booking_date,
            'size' => $request->size,
            'price' => $price,
            'status' => 'pending',
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Booking berhasil! Silahkan tunggu pada menu riwayat booking untuk status terkonfirmasi atau belum');
    }

    public function getEvents()
    {
        return response()->json(Event::all());
    }

    public function calendar()
    {
        $events = Event::all();
        return view('user.calendar', compact('events'));
    }

    public function bookings()
    {
        $bookings = Booking::where('user_id', Auth::id())->get();
        return view('user.bookings', compact('bookings'));
    }

        public function account()
    {
        $user = Auth::user();
        return view('user.account', compact('user'));
    }
    public function payment(Booking $booking)
    {
        return view('user.payment', [
            'title' => 'Payment',
            'booking' => $booking
        ]);
    }

    public function uploadBuktiTransfer(Request $request, Booking $booking)
    {
        $request->validate([
            'bukti_transfer' => 'required|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->hasFile('bukti_transfer')) {
            $file = $request->file('bukti_transfer');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('bukti_transfer', $filename, 'public');

            $booking->bukti_transfer = $path;
            $booking->status_bukti_transfer = 'confirmed';
            $booking->save();
        }

        return redirect()->route('user.bookings')->with('success', 'Bukti transfer berhasil diupload.');
    }

}
