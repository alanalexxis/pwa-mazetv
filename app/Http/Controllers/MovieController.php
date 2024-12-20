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

        // Obtener los IDs de los shows favoritos del usuario actual
        $favoritedShows = \DB::table('liked_shows')
            ->where('user_id', auth()->id()) // Asumiendo que tienes un campo 'user_id'
            ->pluck('show_id') // Obtener solo los show_id
            ->toArray();

        // Si no hay consulta, cargar los shows favoritos del usuario
        if (empty($query)) {
            foreach ($favoritedShows as $showId) {
                try {
                    $response = Http::get("https://api.tvmaze.com/shows/{$showId}");
                    $shows[] = ['show' => $response->json()]; // Ajustar la estructura del array
                } catch (\Exception $e) {
                    // Si no se puede conectar a la API, retornar la vista offline
                    return view('vendor/laravelpwa/offline');
                }
            }
        } else {
            try {
                $response = Http::get("https://api.tvmaze.com/search/shows", [
                    'q' => $query
                ]);
                $shows = $response->json();
            } catch (\Exception $e) {
                // Si no se puede conectar a la API, retornar la vista offline
                return view('vendor/laravelpwa/offline');
            }
        }

        return view('movies.search', compact('shows', 'query', 'favoritedShows'));
    }
}
