# Bauhaus PHP - Package Container

[![Latest Stable Version](https://poser.pugx.org/bauhaus/container/v/stable?format=flat-square)](https://packagist.org/packages/bauhaus/container)
[![Latest Unstable Version](https://poser.pugx.org/bauhaus/container/v/unstable?format=flat-square)](https://packagist.org/packages/bauhaus/container)
[![Total Downloads](https://poser.pugx.org/bauhaus/container/downloads?format=flat-square)](https://packagist.org/packages/bauhaus/container)
[![License](https://poser.pugx.org/bauhaus/container/license?format=flat-square)](LICENSE)

[![Build Status](https://img.shields.io/travis/bauhausphp/package-container/master.svg?style=flat-square)](https://travis-ci.org/bauhausphp/package-container)
[![Coverage Status](https://img.shields.io/coveralls/bauhausphp/package-container/master.svg?style=flat-square)](https://coveralls.io/github/bauhausphp/package-container?branch=master)
[![Codacy Badge](https://img.shields.io/codacy/9e4bf1d8a6e649b1b48c5a2251d1c78e.svg?style=flat-square)](https://www.codacy.com/app/fefas/bauhausphp-package-container)

## Introduction

The goal of this package is to provide useful interface and implementation of
containers with the `readable` behaviors which can be used as superclass to
create more complex implementations.

To understand how to work with the container, read the
[features](https://github.com/bauhausphp/package-container/blob/master/tests/acceptance/features/)
used in the acceptance tests implemented using
[behat](http://docs.behat.org/en/v3.0/):

## Install

The easiest way to install is by using [composer](https://getcomposer.org/):

```
$ composer require bauhaus/container:~v1.0
```

## Contribute

1. Did you find some problem? You easy can open an issue
   [here](https://github.com/bauhausphp/package-container/issues)
2. Do you want to make this project better? Follow the next section to start
   code together :)

## Code Together

First you will need to clone this repository:

```
$ git clone git@github.com:bauhausphp/package-container.git bauhausphp-package-container
$ cd bauhausphp-package-container
```

Second, now you have to install the dependencies which are already with the
versions locked by the `composer.lock`. So, you just have to install them using
[composer](https://getcomposer.org/):

```
$ composer install
```

Third, the tests! There are *unit* and *acceptance* tests that were implemented
using [phpunit](https://phpunit.de/) and [behat](http://docs.behat.org/en/v3.0/)
frameworks respectively and you can run them by runnig the following commands:

```
$ vendor/bin/phpunit -c tests/config/phpunit.xml
$ vendor/bin/behat --config tests/config/behat.yml
```
