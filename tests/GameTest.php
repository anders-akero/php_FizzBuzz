<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class GameTest extends TestCase
{

    /**
     * Making sure that we can load the class
     */
    public function test__construct()
    {
        new Game;
        $this->assertTrue(true);
    }
}
