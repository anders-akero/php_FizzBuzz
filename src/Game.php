<?php

/**
 * Class Iterator
 * Prints out FizzBuzz
 */
final class Game
{
    /**
     * Lowest and highest value the game will iterate between
     */
    const MIN = 0;
    const MAX = 100;

    /**
     * @var int
     */
    private $start = self::MIN;
    /**
     * @var int
     */
    private $stop = self::MAX;

    /**
     * Game constructor.
     *
     * @param int $start
     * @param int $stop
     */
    public function __construct(int $start = self::MIN, int $stop = self::MAX)
    {
        $this->assertValidStart($start);
        $this->assertValidStop($stop);
        $this->start = $start;
        $this->stop = $stop;
    }

    /**
     * @param int $start
     */
    private function assertValidStart(int $start): void
    {
        if ($start < self::MIN) {
            throw new InvalidArgumentException(sprintf('Can not be less then %s', self::MIN));
        }
    }

    /**
     * @param int $stop
     */
    private function assertValidStop(int $stop): void
    {
        if ($stop > self::MAX) {
            throw new InvalidArgumentException(sprintf('Can not be higher then %s', self::MAX));
        }
    }
}