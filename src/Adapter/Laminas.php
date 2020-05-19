<?php

declare(strict_types=1);

namespace Estasi\Translator\Adapter;

use BadMethodCallException;
use Estasi\Translator\Interfaces\Translator;
use Laminas\I18n\Translator\Translator as LaminasTranslator;

/**
 * Class Laminas
 *
 * @package Estasi\Translator\Adapter
 */
class Laminas implements Translator
{
    private LaminasTranslator $translator;

    /**
     * Laminas constructor.
     *
     * @param \Laminas\I18n\Translator\Translator $translator
     */
    public function __construct(LaminasTranslator $translator)
    {
        $this->translator = $translator;
    }

    /**
     * @inheritDoc
     */
    public function gettext(
        string $message,
        ?string $domain = self::DEFAULT_DOMAIN,
        ?string $locale = self::DEFAULT_LOCALE
    ): string {
        return $this->translator->translate($message, $domain ?? 'default', $locale);
    }

    /**
     * @inheritDoc
     */
    public function ngettext(
        string $message,
        string $plural,
        int $number,
        ?string $domain = self::DEFAULT_DOMAIN,
        ?string $locale = self::DEFAULT_LOCALE
    ): string {
        return $this->translator->translatePlural($message, $plural, $number, $domain ?? 'default', $locale);
    }

    /**
     * @inheritDoc
     * @throws \BadMethodCallException
     * @deprecated
     */
    public function messageFormat(
        string $message,
        iterable $parameters = self::WITHOUT_PARAMS,
        ?string $domain = self::DEFAULT_DOMAIN,
        ?string $locale = self::DEFAULT_LOCALE
    ): string {
        throw new BadMethodCallException(
            'The Laminas translator does not support ICU MessageFormat syntax. Use the ngettext method.'
        );
    }
}
