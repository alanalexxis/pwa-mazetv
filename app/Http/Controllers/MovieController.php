<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $shows = [];

        if ($query) {
            $response = Http::get("https://api.tvmaze.com/search/shows", [
                'q' => $query
            ]);

            $shows = $response->json();
        }

        return view('movies.search', compact('shows', 'query'));
    }
}
