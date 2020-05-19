<?php

declare(strict_types=1);

namespace Estasi\Translator\Adapter;

use BadMethodCallException;
use Estasi\Translator\Interfaces\Translator;
use Estasi\Utility\ArrayUtils;
use Symfony\Component\Translation\Translator as SymfonyTranslator;

/**
 * Class Symfony
 *
 * @package Estasi\Translator\Adapter
 */
class Symfony implements Translator
{
    private SymfonyTranslator $translator;

    /**
     * Symfony constructor.
     *
     * @param \Symfony\Component\Translation\Translator $translator
     */
    public function __construct(SymfonyTranslator $translator)
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
        return $this->translator->trans($message, self::WITHOUT_PARAMS, $domain, $locale);
    }

    /**
     * @inheritDoc
     * @throws \BadMethodCallException
     * @deprecated
     */
    public function ngettext(
        string $message,
        string $plural,
        int $number,
        ?string $domain = self::DEFAULT_DOMAIN,
        ?string $locale = self::DEFAULT_LOCALE
    ): string {
        throw new BadMethodCallException(
            'The Symfony translator does not support the ngettext syntax. Use the messageFormat method with support for the MessageFormat syntax.'
        );
    }

    /**
     * @inheritDoc
     */
    public function messageFormat(
        string $message,
        iterable $parameters = self::WITHOUT_PARAMS,
        ?string $domain = self::DEFAULT_DOMAIN,
        ?string $locale = self::DEFAULT_LOCALE
    ): string {
        return $this->translator->trans($message, ArrayUtils::iteratorToArray($parameters), $domain, $locale);
    }
}
