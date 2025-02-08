<?php

namespace Jcodify\Snazzyportfolio;

use ZipArchive;

class ComposerScripts
{
    /**
     * Downloads the icons folder from the Lucide GitHub repository.
     *
     * @param mixed $event The event object (optional).
     */
    public static function downloadIcons($event = null)
    {
        $url = 'https://github.com/lucide-icons/lucide/archive/refs/heads/main.zip';
        $zipFile = __DIR__ . '/../lucide.zip';
        $extractPath = __DIR__ . '/../resources/svg';
        $tempExtractPath = __DIR__ . '/../lucide-main';

        // Ensure the resources/svg directory exists.
        self::createDirectoryIfNotExists($extractPath);
        self::clearDirectory($extractPath);

        // Download the ZIP file
        file_put_contents($zipFile, fopen($url, 'r'));

        // Extract the ZIP file
        $zip = new ZipArchive();
        if ($zip->open($zipFile) === true) {
            $zip->extractTo(__DIR__ . '/../');
            $zip->close();

            // Move the icons folder to the desired location
            rename($tempExtractPath . '/icons', $extractPath);

            // Clean up
            unlink($zipFile);
            self::deleteDirectory($tempExtractPath);

            if ($event) {
                $event->getIO()->write("Icons downloaded and extracted to: $extractPath");
            }
        } else {
            if ($event) {
                $event->getIO()->writeError('Failed to download or extract icons.');
            }
        }
    }

    /**
      * Recursively deletes a directory and its contents.
      *
      * @param string $path The directory path.
      * @return void
      */
    private static function clearDirectory(string $path): void
    {
        if (is_dir($path)) {
            $files = array_diff(scandir($path), ['.', '..']);
            foreach ($files as $file) {
                (is_dir("$path/$file")) ? self::clearDirectory("$path/$file") : unlink("$path/$file");
            }
            rmdir($path);
        }
    }

    /**
        * Creates a directory if it doesn't exist.
        *
        * @param string $path The directory path.
        * @return void
        */
    private static function createDirectoryIfNotExists(string $path): void
    {
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }
    }
    /**
     * Recursively deletes a directory.
     *
     * @param string $dir
     * @return void
     */
    private static function deleteDirectory(string $dir): void
    {
        if (!is_dir($dir)) {
            return;
        }

        $files = array_diff(scandir($dir), ['.', '..']);
        foreach ($files as $file) {
            $filePath = "$dir/$file";
            is_dir($filePath) ? self::deleteDirectory($filePath) : unlink($filePath);
        }
        rmdir($dir);
    }
}
