<?php

namespace App\Services;

class GameTurnService
{
    public function generate($numPlayers, $numTurns, $startChar)
    {
        $allPlayers = range('A', 'Z');

        $players = array_slice($allPlayers, 0, $numPlayers);

        $startIndex = array_search($startChar, $players);
        if ($startIndex === false) {
            $startIndex = 0;
        }

        $players = array_merge(
            array_slice($players, $startIndex),
            array_slice($players, 0, $startIndex)
        );

        $result = [];

        for ($i = 0; $i < $numTurns; $i++) {
            $result[] = $players;
            $first = array_shift($players);
            array_push($players, $first);
            if (($i + 1) % $numPlayers == 0) {
                $players = array_reverse($players);
            }
        }

        return $result;
    }

    public function generateExecution($data)
    {
        $numPlayers = $data['players'] ?? 3;
        $numTurns = $data['turns'] ?? 3;
        $startChar = strtoupper($data['start'] ?? 'A');

        return $this->generate($numPlayers, $numTurns, $startChar);
    }

}
