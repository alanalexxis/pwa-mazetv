<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teamMembers = [
            [
                'name' => 'Alan Jiménez',
                'role' => 'Desarrollador Frontend',
                'image' => asset('images/alan.jpeg'),
            ],
            [
                'name' => 'Feliciano López',
                'role' => 'Desarrollador Backend',
                'image' => asset('images/felix.jpeg'),
            ],
            [
                'name' => 'Manrique Lara',
                'role' => 'Diseñador UX/UI',
                'image' => asset('images/manri.jpeg'),
            ],
            [
                'name' => 'Anahi Álvarez',
                'role' => 'Scrum Master',
                'image' => asset('images/anahi.jpeg'),
            ],
            [
                'name' => 'Daniel Trujillo',
                'role' => 'Tester',
                'image' => asset('images/daniel.jpeg'),
            ],
        ];

        return view('equipo', compact('teamMembers'));
    }
}
