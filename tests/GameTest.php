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

    public function testResultFizz(): void
    {
        $result = (new Game(1, 10))->result();
        $this->assertNotContains('fizz', $result[1]);
        $this->assertNotContains('fizz', $result[2]);
        $this->assertContains('fizz', $result[3]);
        $this->assertContains('fizz', $result[6]);
        $this->assertContains('fizz', $result[9]);
        $this->assertNotContains('fizz', $result[10]);
    }

    public function testResultBuzz(): void
    {
        $result = (new Game(1, 10))->result();
        $this->assertNotContains('buzz', $result[1]);
        $this->assertNotContains('buzz', $result[2]);
        $this->assertNotContains('buzz', $result[3]);
        $this->assertContains('buzz', $result[5]);
        $this->assertNotContains('buzz', $result[6]);
        $this->assertNotContains('buzz', $result[9]);
        $this->assertContains('buzz', $result[10]);
    }

    public function testResultFizzBuzz(): void
    {
        $result = (new Game(10, 20))->result();
        $this->assertNotContains('fizzbuzz', $result[10]);
        $this->assertContains('fizzbuzz', $result[15]);
        $this->assertNotContains('fizzbuzz', $result[20]);
    }
}
