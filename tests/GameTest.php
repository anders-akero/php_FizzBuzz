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

    public function testConstants(): void
    {
        $game = new ReflectionClass(Game::class);
        $this->assertArrayHasKey('MAX', $game->getConstants());
        $this->assertArrayHasKey('MIN', $game->getConstants());
    }

    public function testConstantsValue(): void
    {
        $this->assertEquals(100, Game::MAX);
        $this->assertEquals(1, Game::MIN);
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

    /**
     * @dataProvider validConstructData
     *
     * @param $start
     * @param $stop
     */
    public function testConstructValid($start, $stop): void
    {
        new Game($start, $stop);
        $this->assertTrue(true);
    }

    /**
     * @return array
     */
    public function validConstructData(): array
    {
        return [
            'Can be same as min'                     => ['start' => Game::MIN, 'stop' => Game::MIN],
            'Can be same as max'                     => ['start' => Game::MAX, 'stop' => Game::MAX],
            'Can be same as min and max'             => ['start' => Game::MIN, 'stop' => Game::MAX],
            'Can be any integer between min and max' => ['start' => Game::MIN + 5, 'stop' => Game::MAX - 5],
        ];
    }

    public function testResultCorrectAmount(): void
    {
        $start = Game::MIN;
        $stop = Game::MAX;
        $totalShouldBe = count(range($start, $stop));

        $fizzBuzz = new Game($start, $stop);
        $totalIs = count($fizzBuzz->result());
        $this->assertEquals($totalShouldBe, $totalIs);
    }
}
