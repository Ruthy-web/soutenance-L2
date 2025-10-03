<?php

namespace App\Services\Panorama;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class StitchPanoramaService
{
    /**
     * Exécute le script Python de stitching et retourne le chemin de sortie.
     *
     * @param array<string,string> $inputs  Clé => chemin du fichier image source
     * @param string|null $outputFilename   Nom du fichier de sortie (jpg/png)
     * @param int $timeoutSeconds           Timeout d'exécution du process
     * @return array{success: bool, output_path?: string, message?: string}
     */
    public function run(array $inputs, ?string $outputFilename = null, int $timeoutSeconds = 300): array
    {
        // Prépare répertoire de sortie storage/app/public/panoramas
        $disk = Storage::disk('public');
        $outputDir = 'panoramas';
        if (!$disk->exists($outputDir)) {
            $disk->makeDirectory($outputDir);
        }

        $outputFilename = $outputFilename ?: ('panorama_'.date('Ymd_His').'.jpg');
        $outputRelativePath = $outputDir.'/'.$outputFilename;
        $outputAbsolutePath = $disk->path($outputRelativePath);

        // Construit les arguments pour le script Python
        // Convention: stitch.py --out <output> --inputs <img1> <img2> ...
        $scriptPath = base_path('panorama-processing/stitch.py');
        $pythonBinary = env('PYTHON_BIN', 'python3');

        $inputFiles = array_values($inputs);
        $processArgs = array_merge([
            $pythonBinary,
            $scriptPath,
            '--out',
            $outputAbsolutePath,
            '--inputs',
        ], $inputFiles);

        $process = new Process($processArgs, base_path());
        $process->setTimeout($timeoutSeconds);

        try {
            $process->run();
        } catch (\Throwable $e) {
            return [
                'success' => false,
                'message' => 'Erreur lors du lancement du process: '.$e->getMessage(),
            ];
        }

        if (!$process->isSuccessful()) {
            $error = $process->getErrorOutput() ?: $process->getOutput();
            return [
                'success' => false,
                'message' => trim($error) ?: 'Le process Python a échoué.',
            ];
        }

        if (!$disk->exists($outputRelativePath)) {
            return [
                'success' => false,
                'message' => 'Le fichier de sortie n\'a pas été généré.',
            ];
        }

        return [
            'success' => true,
            'output_path' => asset('storage/'.$outputRelativePath),
        ];
    }
}


