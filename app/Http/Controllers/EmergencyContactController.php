<?php

namespace App\Http\Controllers;

class EmergencyContactController extends Controller
{
    public function index()
    {
        $contacts = [

            [
                'name' => 'Polisi',
                'number' => '110',
                'description' => 'Layanan keamanan dan pelaporan.'
            ],

            [
                'name' => 'Ambulans',
                'number' => '119',
                'description' => 'Layanan kesehatan darurat.'
            ],

            [
                'name' => 'Pemadam Kebakaran',
                'number' => '113',
                'description' => 'Penanganan kebakaran dan evakuasi.'
            ],

            [
                'name' => 'BPBD',
                'number' => '117',
                'description' => 'Penanganan dan koordinasi bencana.'
            ]

        ];

        return view(
            'Citizen.emergency-contact',
            compact('contacts')
        );
    }
}