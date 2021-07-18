<?php


class Solution
{

    public function getIslandQuantity($fields): int
    {
        $occupiedFields = isset($occupiedFields) ? $occupiedFields : [];

        $width = count($fields[0]);
        $height = count($fields);

        $islandQuantity = 0;

        for ($x = 0; $x < $height; $x++) {
            for ($y = 0; $y < $width; $y++) {
                $isFieldValid = $this->isFieldValid($x, $y, $occupiedFields, $fields);

                if (!$isFieldValid) {
                    continue;
                }

                $islandQuantity++;

                $owner = $fields[$x][$y];

                $this->updateOccupiedFields($occupiedFields, $owner, $fields, $x, $y);
            }
        }

        return $islandQuantity;
    }

    private function updateOccupiedFields(&$occupiedFields, $owner, $fields, $x, $y): void
    {
        if ($this->isFieldValid($x, $y, $occupiedFields, $fields) && $owner == $fields[$x][$y]) {
            $occupiedFields = array_merge($occupiedFields, ["$x.$y" => true]);
            $this->updateOccupiedFields($occupiedFields, $owner, $fields, $x, $y + 1);
            $this->updateOccupiedFields($occupiedFields, $owner, $fields, $x - 1, $y);
            $this->updateOccupiedFields($occupiedFields, $owner, $fields, $x + 1, $y);
        }
    }

    private function isFieldValid($x, $y, $occupiedFields, $fields): bool
    {
        if (!isset($fields[$x][$y])) {
            return false;
        }

        if (array_key_exists("$x.$y", $occupiedFields) || is_null($fields[$x][$y])) {
            return false;
        }

        return true;
    }

}

$fields = [
    [1, null, null, 2, 2, 2, null],
    [null, 3, 3, 2, 2, 2, null],
    [null, null, null, null, null, null, 4],
    [null, 2, 2, null, null, null, 4],
    [null, 2]
];

$s = new Solution();

print ($s->getIslandQuantity($fields));