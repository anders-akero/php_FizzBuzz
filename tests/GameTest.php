<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class GameTest extends TestCase
{

    /**
     * Making sure that we can load the class wit
     */
    public function testConstructDefault(): void
    {
        new Game;
        $this->assertTrue(true);
    }

    /**
     * @dataProvider invalidConstructData
     *
     * @param $start
     * @param $stop
     *
     * @expectedException InvalidArgumentException
     */
    public function testConstructInvalid($start, $stop): void
    {
        new Game($start, $stop);
    }

    /**
     * @return array
     */
    public function invalidConstructData(): array
    {
        return [
            'Can not be less then min'   => ['start' => Game::MIN - 1, 'stop' => Game::MAX],
            'Can not be higher then max' => ['start' => Game::MIN, 'stop' => Game::MAX + 1],
        ];
    }
}
