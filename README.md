FizzBuzz
========

Dependencies (to run with Docker):

  * Docker engine v1.13 or higher.
  * Docker compose v1.12 or higher.

# How to run #

Initialise and start all the containers:
* `docker-compose up -d`

### In browser ###
`http://localhost:5050/X/Y` Where X is the start value and Y is the end value.

Example: `http://localhost:5050/1/100`

### Unit-tests ###
Make sure that the containers are up and running, then run the following:

`docker-compose exec php-fpm ./vendor/bin/phpunit --bootstrap vendor/autoload.php tests --testdox`

# How to stop #

  * Stop containers: `docker-compose stop`
  * Kill containers: `docker-compose kill`

# Idea #
Simple script that takes 2 integers between 1 and 100.
Loop from the first integer to the second integer.
Write out each integer.
If the integer is divisible by 3 also print out “fizz”
If the integer is divisible by 5 also print out “buzz”