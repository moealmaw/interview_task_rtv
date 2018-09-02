<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;

/**
 * Class CubesTest
 *
 * @author Mohammad Almawali <moealmaw@gmail.com>
 */
final class FunctionsTest extends TestCase
{
    /**
     * Tests the colored cubes function for Problem #1 in the exercise
     */
    public function tests_cubes_function(): void
    {
        static::assertEquals(1, cubes(3, "RRG"));
        static::assertEquals(4, cubes(5, "RRRRR"));
        static::assertEquals(0, cubes(4, "BRBG"));
    }

    /**
     * Tests the friend's visit function for Problem #2 in the exercise
     */
    public function tests_visit_function(): void
    {
        static::assertEquals(3, visit(12));
        static::assertEquals(4, visit(16));
        static::assertEquals(1, visit(5));
        static::assertEquals(0, visit(0));
    }
    /**
     * Tests the odd item function for Problem #3 in the exercise
     */
    public function test_differ_evenness_function(): void
    {
        static::assertEquals(3, differEvenness(5, "2 4 7 8 10"));
        static::assertEquals(2, differEvenness(4, "1 2 1 1"));
    }
    /**
     * Tests the odd item function for Problem #3 in the exercise
     */
    public function test_differ_evenness_functional_function(): void
    {
        static::assertEquals(3, differEvennessFunctional(5, "2 4 7 8 10"));
        static::assertEquals(2, differEvennessFunctional(4, "1 2 1 1"));
    }
}