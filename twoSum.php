<?php

class Solution
{

    /**
     * @param  Integer[]  $numbers
     * @param  Integer  $target
     * @return Integer[]
     */
    function twoSum($numbers, $target)
    {
        $left = 0;
        $right = count($numbers) - 1;

        while (($sum = $numbers[$left] + $numbers[$right]) !== $target) {
            if ($target > $sum) {
                $left++;
            } else {
                $right--;
            }
        }

        return [++$left, ++$right];
    }
}

$s = new Solution();

$numbers = [1, 3, 5, 7, 9, 10];
$target = 10;
print_r($s->twoSum($numbers, $target));
