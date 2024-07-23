<?php

namespace App\Http\Controllers\Rgpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TinymceController extends Controller
{
    public function index(Request $request)
    {
        $path = $request->file('file')->store('tinymce/upload', 'public');
        return response()->json(['location' => asset("/storage/$path")]);
    }
}