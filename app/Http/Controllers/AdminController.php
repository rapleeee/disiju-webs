<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Mail\BookingConfirmed;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        $bookings = Booking::all();
        return view('admin.dashboard', compact('bookings'));
    }

    public function confirmBuktiTransfer(Booking $booking)
    {
        $booking->update([
            'status_bukti_transfer' => 'confirmed',
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Bukti transfer berhasil dikonfirmasi.');
    }

    public function confirmBooking($id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->status = 'confirmed';
            $booking->save();
            return redirect()->route('admin.dashboard')->with('success', 'Booking confirmed successfully');
        }
        return redirect()->route('admin.dashboard')->with('error', 'Booking not found');
    }

    public function confirmPayment($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->status = 'confirmed';
        $payment->save();

        return redirect()->route('admin.dashboard');
    }

    public function getEvents()
    {
        return response()->json(Event::all());
    }

    public function storeEvent(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'start' => 'required|date',
        ]);

        $event = Event::create([
            'title' => $request->title,
            'start' => $request->start,
        ]);

        return response()->json($event);
    }

    public function deleteBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Booking deleted!');
    }

    public function deleteEvent($id)
    {
        $event = Event::find($id);
        if ($event) {
            $event->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Event not found'], 404);
    }
}
