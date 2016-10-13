This is my attempt to refactor [BrewBlogger](http://brewblogger.net/) to much better code, and ultimately add features that I want.

The plan of attack is:

1. Move all HTML out of PHP files and into [Twig](http://twig.sensiolabs.org/) templates
2. Move all database access to [Doctrine](http://www.doctrine-project.org/)
3. Add [Silex](http://silex.sensiolabs.org/) for routing and dependency injection. Part of that will involve moving pages into their own controllers.
4. Normalize the database
5. Extract functionality from controller and global functions into objects where it makes sense

As the development progresses, I'll initially be writing [Behat](http://behat.org/) tests to confirm I haven't broken anything. Once the project is more stabilized, I'll be writing [PHPUnit](https://github.com/sebastianbergmann/phpunit/) unit tests and adding CI.

[![Build Status](https://travis-ci.org/georgeh/brewblogger.png?branch=refactor)](https://travis-ci.org/georgeh/brewblogger)

# Docker for local testing

To test locally:

    docker build -t brewblogger .
    docker run -i -d -v /path/to/brewblogger:/home/travis/brewblogger -p 8000:8000 brewblogger

Browse to localhost to view app. run vendor/bin/behat (need php installed
locally) to run test suite.
