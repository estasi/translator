# Estasi Translator

Estasi\Translator - internationalization system using the GNU gettext and/or 
ICU MessageFormat libraries.

Currently, there is no native implementation, you must use one of the following components 
(via the appropriate adapters):
- [Symfony Translation Component](https://github.com/symfony/translation): 
    `composer require symfony/translation`
- [Laminas i18n Component](https://github.com/laminas/laminas-i18n): 
    `composer require laminas/laminas-i18n`

## Installation
To install with a composer:
```
composer require estasi/translator
```

## Requirements
- PHP 7.4 or newer

## License
All contents of this package are licensed under the [BSD-3-Clause license]().