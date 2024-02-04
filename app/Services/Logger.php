<?php
declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Storage;

/**
 * Class Logger
 * @package App\Services
 */
class Logger
{
    const FILENAME = 'logs.txt';

    /**
     * @param string $message
     * @return void
     */
    public function logMessage(string $message): void
    {
        Storage::append(self::FILENAME, $message);
    }

    /**
     * @return array
     */
    public function getLogs(): array
    {
        $fileContent = Storage::get(self::FILENAME);

        $linesArray = explode(PHP_EOL, $fileContent);

        return array_filter($linesArray);
    }
}

