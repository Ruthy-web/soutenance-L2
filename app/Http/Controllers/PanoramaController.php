<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanoramaController extends Controller
{
    public function assemble(Request $request)
    {
        $validated = $request->validate([
            'inputs' => 'required|array|min:1',
            'inputs.*' => 'required|string'
        ]);

        exec('python panorama-processing/stitch.py', $output, $status);
        return $status === 0
            ? response()->json(['status' => 'ok', 'message' => 'Panorama généré'])
            : response()->json(['status' => 'error', 'output' => $output], 422);
    }
}
