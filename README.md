# Bauhaus PHP - Package Container

[![Latest Stable Version](https://poser.pugx.org/bauhaus/container/v/stable?format=flat-square)](https://packagist.org/packages/bauhaus/container)
[![Latest Unstable Version](https://poser.pugx.org/bauhaus/container/v/unstable?format=flat-square)](https://packagist.org/packages/bauhaus/container)
[![Total Downloads](https://poser.pugx.org/bauhaus/container/downloads?format=flat-square)](https://packagist.org/packages/bauhaus/container)
[![License](https://poser.pugx.org/bauhaus/container/license?format=flat-square)](LICENSE)

[![Build Status](https://img.shields.io/travis/bauhausphp/container/master.svg?style=flat-square)](https://travis-ci.org/bauhausphp/container)
[![Coverage Status](https://img.shields.io/coveralls/bauhausphp/container/master.svg?style=flat-square)](https://coveralls.io/github/bauhausphp/container?branch=master)
[![Codacy Badge](https://img.shields.io/codacy/9e4bf1d8a6e649b1b48c5a2251d1c78e.svg?style=flat-square)](https://www.codacy.com/app/fefas/bauhausphp-container)

## Introduction

The goal of this package is to provide useful container which can be used as
superclass to create more complex implementations.

To understand how to work with the container, read the
[unit tests](https://github.com/bauhausphp/package-container/blob/master/tests/unit/ContainerTest.php)
implemented using [phpunit](https://phpunit.de/).

> You can have a behavior summary of this *Dependency Injection Container* by
> runing the tests using the `testdox` option:
>
> ```
> $ vendor/bin/phpunit -c tests/config/phpunit.xml --testdox
> ```
>
> See the *[Code Together](#code-together)* section for more details.

## Install

The easiest way to install it is by using [composer](https://getcomposer.org/):

```
$ composer require bauhaus/container:dev-master
```

## Contribute

1. Did you find some problem? You can easy open an issue
   [here](https://github.com/bauhausphp/package-container/issues/new)
2. Do you want to help coding? Read the next section and let's code together :)

## Code Together

First you will need to clone this repository:

```
$ git clone git@github.com:bauhausphp/package-container.git bauhausphp-package-container
$ cd bauhausphp-package-container
```

Second, you have to install the dependencies which are already with the
versions locked by the `composer.lock`. So, you just have to install them using
[composer](https://getcomposer.org/):

```
$ composer install
```

Third, before starting code, you need to make sure that the tests pass. There
are *unit* that were implemented using [phpunit](https://phpunit.de/) framework.
To run them, use the following command:

```
$ vendor/bin/phpunit -c tests/config/phpunit.xml
```
