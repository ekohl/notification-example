# Example repository

[![Build Status](https://travis-ci.org/ekohl/notification-example.svg?branch=master)](https://travis-ci.org/ekohl/notification-example)

This repository is used as an example for a blog item.

# Running tests using docker

    docker pull phpunit/phpunit
    docker run -v $(pwd):/app --rm phpunit/phpunit tests
