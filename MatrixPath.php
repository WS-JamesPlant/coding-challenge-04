<?php

/**
 * Coding Challenge #4 File Doc Comment
 * 
 * PHP Version 8.0.7
 * 
 * @category WhiteStores
 * @package  WhiteStores_CodingChallenge
 * @author   James Plant <james.plant@whitestores.co.uk>
 * @license  https://whitestores.co.uk UNLICENSED
 * @link     https://github.com/White-Stores/coding-challenge/
 */

namespace App\CodingChallengeFour;

/**
 * Matrix Path Class
 *
 * @category WhiteStores
 * @package  WhiteStores_CodingChallenge
 * @author   James Plant <james.plant@whitestores.co.uk>
 * @license  https://whitestores.co.uk UNLICENSED
 * @link     https://github.com/White-Stores/coding-challenge/
 */
class MatrixPath
{
    /**
     * Calculates the number of different paths to get to the bottom
     * right of the data array. This is a recursive function.
     * Each function call either returns a 0 (if a 1 is detected in the current
     * location), or returns the result of itself x2, to the right and below the
     * current coordinates. We return a 1 if the current coordinates are the
     * bottom right.
     * 
     * @param array $arr This input data array / matrix
     * @param int   $x   The x position in the matrix
     * @param int   $y   The y position in the matrix
     * 
     * @return int
     */
    public static function calc(&$arr, $x=0, $y=0)
    {
        // Out of bounds OR we have hit a wall
        if (($x >= count($arr)) || ($y >= count($arr[$x])) || ($arr[$x][$y] === 1)) {
            return 0;
        }

        // We are at the end, success!
        if (($x === count($arr) - 1) && ($y === count($arr[$x]) - 1)) {
            return 1;
        }

        // Walk to the other coordinates
        return self::calc($arr, $x + 1, $y) + self::calc($arr, $x, $y + 1);
    }
}


// Execute tests
$test = [
    [0, 0, 1],
    [0, 0, 1],
    [1, 0, 0],
];
echo 'Test 1: ' . MatrixPath::calc($test) . "\n";

$test = [
    [0, 0, 0, 0],
    [0, 0, 1, 0],
    [1, 0, 0, 0],
];
echo 'Test 2: ' . MatrixPath::calc($test) . "\n";

$test = [
    [0, 0, 1],
    [0, 0, 1],
    [1, 0, 0],
    [0, 0, 0],
];
echo 'Test 3: ' . MatrixPath::calc($test) . "\n";

$test = [
    [0, 0, 1],
    [0, 1, 1],
    [1, 0, 0],
];
echo 'Test 4: ' . MatrixPath::calc($test) . "\n";