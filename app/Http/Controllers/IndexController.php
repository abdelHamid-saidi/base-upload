<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function home()
    {
        return view("welcome");
    }

    public function getPrivateDocument(string $filename)
    {
        // Write code here
        $path = 'private/documents/' . $filename;

        if (!Storage::exists($path)) {
            abort(404, 'Fichier non trouvé');
        }

        return Storage::response($path);
    }
}
