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

        $result = [];
        foreach ($lines as $key => $line) {
            if (array_key_exists($key + 1, $lines)) {
                $result[] = $line - $lines[$key + 1];
            } else {
                $result[] = 8 - $lines[0] + $line;
            }
        }

        $triangle = (array_map(function ($side) {
            return $side === 4 ? $side + 1 : $side + 2;
        }, $result));

        sort($triangle);

        return join($triangle);
    }
}
