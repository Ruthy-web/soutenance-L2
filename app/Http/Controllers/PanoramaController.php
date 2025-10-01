<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanoramaController extends Controller
{
    public function assemble()
    {
        exec('python panorama-processing/stitch.py', $output, $status);
        return $status === 0
            ? response()->json(['status' => 'ok', 'message' => 'Panorama généré'])
            : response()->json(['status' => 'error', 'output' => $output]);
    }
}



