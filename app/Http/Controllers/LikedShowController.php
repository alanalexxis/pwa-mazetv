<?php
// app/Http/Controllers/LikedShowController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LikedShow;

class LikedShowController extends Controller
{
    public function toggle(Request $request)
    {
        $likedShow = LikedShow::where('user_id', auth()->id())
            ->where('show_id', $request->show_id)
            ->first();

        if ($likedShow) {
            $likedShow->delete();
            return response()->json(['success' => true, 'action' => 'removed']);
        } else {
            LikedShow::create([
                'user_id' => auth()->id(),
                'show_id' => $request->show_id,
                'show_name' => $request->show_name,
                'show_image' => $request->show_image,
                'show_premiered' => $request->show_premiered,
                'show_url' => $request->show_url,
            ]);
            return response()->json(['success' => true, 'action' => 'added']);
        }
    }
}
