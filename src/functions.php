<?php

/**
 * colored cubes for Problem #1 in the exercise
 *
 * @param $n int
 * @param $s string
 *
 * @return mixed
 */
function cubes(int $n, string $s): int
{
    //match count temp. variable. its optional and is set for code readability.
    $mc = 0;
    //find repeating chars of R, B or G
    preg_replace_callback('/(R|B|G)\1+/', function ($matches) use (&$mc) {
        //increment the match count by the length of preceding chars of the match
        $mc += strlen($matches[0]) - 1; # (BBB will increment the count with 2)
        //replace the found match with the pattern. (BBB becomes B)
        return $matches[1];
    }, $s);

    return $mc;
}

/**
 * Friend's visit for Problem #2 in the exercise
 *
 * @param $cord int
 *
 * @return int
 */
function visit(int $cord): int
{
    $pos   = range(5, 1); # allowed positions
    $steps = 0;  # temp val to count the steps needed
    foreach ($pos as $p) { #loop through allowed positions
        if ($cord == 0) {
            break;
        }
        $steps += ($cord < $p) ? 0 : (int)($cord / $p); # steps will increase by $cord / $position
        $cord = $cord % $p; # cord will be updated with the mod. so in next iteration we deal with the left overs.
    }

    return $steps;
}

/**
 * evenness unique item for Problem #3 in the exercise
 * alternate solution is provided below
 *
 * @param $n int
 * @param $s string
 *
 * @return int
 */
function differEvenness(int $n, string $s): int
{

    $numbers = explode(" ", $s); #split the given string
    $even    = 0;
    $odd     = 0;
    // to avoid performance issues on big arrays, we check evenness on the first 3 items,
    // which is enough to find the evenness majority of the items.
    for ($i = 0; $i < 3; $i++) {
        $numbers[$i] & 1 ? $odd++ : $even++;
    }
    $majority = $odd > $even ? 1 : 0;
    // we loop through the $numbers array
    // since we know the majority type, we can break the loop once a
    // value opposite to the majority is found.
    for ($i = 0; $i < $n; $i++) {
        if (($numbers[$i] & 1) != $majority) {
            return $i + 1;
            // +1 is added to adjust the value as per requirements in the original question
            // "...Numbers are numbered from 1 in the input order."
        }
    }
}

/**
 * (ALTERNATE) evenness unique item for Problem #3 in the exercise
 * This solution is more functional, but is suited to smaller arrays, where the evenness of
 * all values is checked first, then the least occurred key/value is found after grouping and sorting results
 *
 * @param $n int
 * @param $s string
 *
 * @return int
 */

function differEvennessFunctional(int $n, string $s): int
{

    $numbers  = explode(" ", $s); #split the given string
    $evenness = array_map(function ($v) { # map each value to evenness representation (0=even, 1=odd)
        return $v & 1;
    }, $numbers);
    // group by value occurrence.
    // key will be evenness (0=even, 1=odd), value will be occurrence in the original array ($evenness).
    $group = array_count_values($evenness);
    // sort by value so the key of the first item will be the least occurred value in original array
    asort($group);

    // +1 is added to adjust the value as per requirements in the original question
    // "...Numbers are numbered from 1 in the input order."
    return array_search(key($group), $evenness) + 1;
}