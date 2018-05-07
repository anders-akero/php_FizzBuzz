<?php

require __DIR__ . '/../vendor/autoload.php';

$delimiter = '/';
$input = explode($delimiter, $_SERVER['REQUEST_URI']);
$start = $input[1] ?? Game::MIN;
$stop = $input[2] ?? Game::MAX;
try {
    $result = (new Game($start, $stop))->result();
    echo implode('<br>', $result);
} catch (InvalidArgumentException $e) {
    echo $e->getMessage();
} catch (Error $error) {
    echo '<b>Invalid input.</b><br>';
    echo sprintf('Please make sure that you use format X%sY where X is the desired start value and Y is the stop value.<br>', $delimiter);
    echo sprintf('For example: %s/%d%s%d',
        $_SERVER['HTTP_HOST'],
        Game::MIN,
        $delimiter,
        Game::MAX
    );
}
