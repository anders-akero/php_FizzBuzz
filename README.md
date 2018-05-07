FizzBuzz
========

Dependencies (to run with Docker):

  * Docker engine v1.13 or higher.
  * Docker compose v1.12 or higher.

# How to run #

Initialise and start all the containers:
* `docker-compose up -d`

# How to stop #

  * Stop containers: `docker-compose stop`
  * Kill containers: `docker-compose kill`

# Idea #
Simple script that takes 2 integers between 1 and 100.
Loop from the first integer to the second integer.
Write out each integer.
If the integer is divisible by 3 also print out “fizz”
If the integer is divisible by 5 also print out “buzz”