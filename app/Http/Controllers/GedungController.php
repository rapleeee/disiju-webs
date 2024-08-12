<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GedungController extends Controller
{
    public function index()
    {
        $gedungs = [
            [
                'id' => 1,
                'name' => 'Gedung Graha Mandiri',
                'address' => 'Jl. Gatot Subroto Kav. 38, Jakarta Selatan',
                'image' => 'graha_mandiri.jpg'
            ],
            [
                'id' => 2,
                'name' => 'Gedung UOB Plaza',
                'address' => 'Jl. MH Thamrin Kav. 10, Jakarta Pusat',
                'image' => 'uob_plaza.jpg'
            ],
            [
                'id' => 3,
                'name' => 'Gedung Plaza Mandiri',
                'address' => 'Jl. Jenderal Gatot Subroto Kav. 36-38, Jakarta Selatan',
                'image' => 'plaza_mandiri.jpg'
            ],
            [
                'id' => 4,
                'name' => 'Gedung CIMB Niaga Bintaro 7',
                'address' => 'Jl. Jenderal Sudirman Kav. 58, Tangerang Selatan',
                'image' => 'cimb_niaga_bintaro.jpg'
            ],
        ];

        return view('gedung', compact('gedungs'));
    }

    public function show($id)
    {
        // Simulasi data detail gedung
        $details = [
            1 => ['name' => 'Gedung Graha Mandiri', 'capacity' => 500],
            2 => ['name' => 'Gedung UOB Plaza', 'capacity' => 400],
            3 => ['name' => 'Gedung Plaza Mandiri', 'capacity' => 450],
            4 => ['name' => 'Gedung CIMB Niaga Bintaro 7', 'capacity' => 350],
        ];

        $detail = $details[$id];

        return view('gedung_detail', compact('detail'));
    }
}
