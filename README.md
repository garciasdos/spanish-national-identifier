# Spanish National Identifier for PHP

**Implementation for SNI (aka DNI) VO.**

## Usage
Example: Generate new SNI

```php
use SNI\Domain\SNI;

...

$sni = SNI::fromString('84253610X');

```

## Requirements

PHP in 7.4 or higher version.

## Installation

### Via GitHub

```bash
$ git@github.com:garciasdos/spanish-national-identifier.git
```

### Via [Composer](https://getcomposer.org/doc/00-intro.md)

Package hosted in [Packagist](https://packagist.org/packages/garciasdos/spanish-national-identifier).

Require the latest version of `garciasdos/spanish-national-identifier` with Composer

```bash
$ composer require garciasdos/spanish-national-identifier
