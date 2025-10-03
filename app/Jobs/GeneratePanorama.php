<?php

namespace App\Jobs;

use App\Services\Panorama\StitchPanoramaService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GeneratePanorama implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var array<string,string> */
    private array $inputs;

    private ?string $outputFilename;

    public function __construct(array $inputs, ?string $outputFilename = null)
    {
        $this->inputs = $inputs;
        $this->outputFilename = $outputFilename;
        $this->onQueue('panoramas');
    }

    public function handle(StitchPanoramaService $service): void
    {
        $service->run($this->inputs, $this->outputFilename);
    }
}



