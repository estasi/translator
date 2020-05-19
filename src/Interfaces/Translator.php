<?php

declare(strict_types=1);

namespace Estasi\Translator\Interfaces;

/**
 * Interface Translator
 *
 * @package Estasi\Translator\Interfaces
 */
interface Translator
{
    public const DEFAULT_DOMAIN = null;
    public const DEFAULT_LOCALE = null;
    public const WITHOUT_PARAMS = [];

    /**
     * Lookup a message in the current domain
     *
     * @param string      $message The message being translated or the singular message ID.
     * @param string|null $domain  Domain to override for the current message only
     * @param string|null $locale
     *
     * @return string Returns a translated string if one is found in the translation table, or the submitted message if
     *                not found.
     * @api
     */
    public function gettext(
        string $message,
        ?string $domain = self::DEFAULT_DOMAIN,
        ?string $locale = self::DEFAULT_LOCALE
    ): string;

    /**
     * Plural version of translate
     *
     * @param string      $message The message
     * @param string      $plural  The plural message
     * @param int         $number  The number (e.g. item count) to determine the translation for the respective
     *                             grammatical number.
     * @param string|null $domain  Domain to override for the current message only
     * @param string|null $locale
     *
     * @return string Returns correct plural form of message identified by $message and $plural for count $number.
     * @api
     */
    public function ngettext(
        string $message,
        string $plural,
        int $number,
        ?string $domain = self::DEFAULT_DOMAIN,
        ?string $locale = self::DEFAULT_LOCALE
    ): string;

    /**
     * Search for a message in the current domain using ICU MessageFormat syntax
     *
     * @see http://userguide.icu-project.org/formatparse/messages
     *
     * @param string      $message    The message being translated
     * @param iterable    $parameters An array of parameters for the message
     * @param string|null $domain     Domain to override for the current message only
     * @param string|null $locale
     *
     * @return string The translated string
     * @api
     */
    public function messageFormat(
        string $message,
        iterable $parameters = self::WITHOUT_PARAMS,
        ?string $domain = self::DEFAULT_DOMAIN,
        ?string $locale = self::DEFAULT_LOCALE
    ): string;
}
