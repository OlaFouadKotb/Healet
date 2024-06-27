<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class BackUpDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filename = "backup-" . now()->format('Y-m-d') . ".sql";
        $compressedFilename = "backup-" . now()->format('Y-m-d') . ".7z";
        $storagePath = storage_path('app/backup');

        // Ensure the backup directory exists
        if (!Storage::exists('backup')) {
            Storage::makeDirectory('backup');
        }

        // Specify the full path to the mysqldump executable
        $mysqldumpPath = 'C:\\xampp\\mysql\\bin\\mysqldump.exe'; // Update this path as per your installation

        // Specify the full path to the 7z executable
        $sevenZipPath = 'C:\\Program Files\\7-Zip\\7z.exe'; // Update this path as per your installation

        // Generate the SQL dump
        $commandDump = sprintf(
            '%s --user=%s --password=%s --host=%s %s > %s/%s',
            escapeshellarg($mysqldumpPath),
            escapeshellarg(env('DB_USERNAME')),
            escapeshellarg(env('DB_PASSWORD')),
            escapeshellarg(env('DB_HOST')),
            escapeshellarg(env('DB_DATABASE')),
            escapeshellarg($storagePath),
            escapeshellarg($filename)
        );

        // Compress the SQL dump
        $commandCompress = sprintf(
            '%s a %s/%s %s/%s',
            escapeshellarg($sevenZipPath),
            escapeshellarg($storagePath),
            escapeshellarg($compressedFilename),
            escapeshellarg($storagePath),
            escapeshellarg($filename)
        );

        $returnVar = null;
        $output = null;

        // Execute the dump command
        exec($commandDump, $output, $returnVar);

        if ($returnVar !== 0) {
            $this->error('Failed to create the database dump.');
            return;
        }

        // Execute the compress command
        exec($commandCompress, $output, $returnVar);

        if ($returnVar !== 0) {
            $this->error('Failed to compress the database dump.');
        } else {
            // Optionally, delete the uncompressed SQL file
            unlink($storagePath . '/' . $filename);
            $this->info('Database backup and compression completed successfully.');
        }
    }
}
