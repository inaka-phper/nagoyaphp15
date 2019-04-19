<?php

declare(strict_types=1);

namespace Nagoyaphp\Dokaku15;

class Dokaku15
{
    public function run(string $input): string
    {
        $input = (int)$input;

        $lines = [];
        for ($i = 7; $i >= 0; $i--) {
            $root = (2 ** $i);
            if ($root <= $input) {
                $input -= $root;
                $lines[] = $i;
            }
        }

        $sides = [];
        foreach ($lines as $key => $line) {
            $sides[] = array_key_exists($key + 1, $lines) ? $line - $lines[$key + 1] : 8 - $lines[0] + $line;
        }

        $polygon = array_map(function ($side) {
            return $side === 4 ? 5 : $side + 2;
        }, $sides);

        sort($polygon);

        return implode('', $polygon);
    }
}
