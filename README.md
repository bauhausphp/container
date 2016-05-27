# Bauhaus PHP Package - Container

[![Latest Stable Version](https://poser.pugx.org/bauhaus/container/v/stable?format=flat-square)](https://packagist.org/packages/bauhaus/container)
[![Latest Unstable Version](https://poser.pugx.org/bauhaus/container/v/unstable?format=flat-square)](https://packagist.org/packages/bauhaus/container)
[![Total Downloads](https://poser.pugx.org/bauhaus/container/downloads?format=flat-square)](https://packagist.org/packages/bauhaus/container)
[![License](https://poser.pugx.org/bauhaus/container/license?format=flat-square)](LICENSE)

[![Build Status](https://img.shields.io/travis/bauhausphp/package-container/master.svg?style=flat-square)](https://travis-ci.org/bauhausphp/package-container)
[![Coverage Status](https://img.shields.io/coveralls/bauhausphp/package-container/master.svg?style=flat-square)](https://coveralls.io/github/bauhausphp/package-container?branch=master)
[![Codacy Badge](https://img.shields.io/codacy/9e4bf1d8a6e649b1b48c5a2251d1c78e.svg?style=flat-square)](https://www.codacy.com/app/fefas/bauhausphp-package-container)
[![Code Climage](https://img.shields.io/codeclimate/github/bauhausphp/package-container.svg?style=flat-square)](https://codeclimate.com/github/bauhausphp/package-container)

## Introduction

The goal of this package is to provide useful interfaces and implementations of
containers with differents behaviors (`readable` and `registrable`) which could
be used as base to more complex implementations.

To undestand how to use the containers, read the tests:

- [Readable Container](https://github.com/bauhausphp/package-container/blob/master/tests/acceptance/features/readable_container.feature)
- [Registrable Container](https://github.com/bauhausphp/package-container/blob/master/tests/acceptance/features/registrable_container.feature)

> If you have issues about the test frameworks, see the
> [references](https://github.com/bauhausphp/package-container#references).

## Contributing

Did you find some problem or do you want to make this project better?

1. You can open an issue [here](https://github.com/bauhausphp/package-container/issues)
2. Or read the next section to code together :)

### Coding

To start coding in this project, you will need first to clone this repository:

```
$ git clone git@github.com:bauhausphp/package-container.git bauhausphp-package-container
$ cd bauhausphp-package-container
```

Second, you will need to get the dependencies which are already with the versions locked in the `composer.lock`. So, you just have to install them:

```
composer install
```

Third, the tests! We have *unit* and *acceptance* tests that were implemented using `phpunit` and `behat` frameworks respectively:

```
$ vendor/bin/phpunit -c tests/phpunit.xml # unit
$ vendor/bin/behat --config tests/behat.yml # acceptance
```

And finally, explore it and may the force be with you!

## References

- [composer](https://getcomposer.org/)
- [phpunit](https://phpunit.de/)
- [behat](http://docs.behat.org/en/v3.0/)
