<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CleanLivewireTemp extends Command
{
    protected $signature = 'livewire:clean';
    protected $description = 'Clean up temporary Livewire files';

    public function handle()
    {
        $path = storage_path('app/private/livewire-tmp');

        if (File::exists($path)) {
            File::cleanDirectory($path);
            $this->info('Temporary Livewire files have been cleaned up.');
        } else {
            $this->error('Directory does not exist.');
        }
    }
}
