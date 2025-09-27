<?php

namespace Hasanberkm\CurrencyFormat;
use NumberFormatter;

class CurrencyFormat
{
    protected $price;
    protected $locale;
    protected $currency;
    protected $hideSymbol;
    protected $alignment;
    protected $fractionDigits;

    public function __construct()
    {
        $this->price = 0;
        $this->locale = 'tr_TR';
        $this->currency = 'try';
        $this->hideSymbol = false;
        $this->alignment = 'right';
        $this->fractionDigits = 2;
    }

    /**
     * Set the price
     * 
     * Default: 0
     * 
     * @param float $val
     * @return static
     */
    public function setPrice(float $val): static
    {
        $this->price = $val;

        return $this;
    }

    /**
     * Set the locale
     * 
     * Default: tr_TR
     * 
     * @param string $val
     * @return static
     */
    public function setLocale(string $val): static
    {
        $this->locale = $val;

        return $this;
    }

    /**
     * Set the currency
     * 
     * Default: TRY
     * 
     * @param string $val
     * @return static
     */
    public function setCurrency(string $val): static
    {
        $this->currency = $val;

        return $this;
    }

    /**
     * set show or hide the currency symbol
     * 
     * default: false
     * 
     * @param bool $val
     * @return static
     */
    public function setHideSymbol(bool $val): static
    {
        $this->hideSymbol = $val;

        return $this;
    }

    /**
     * Align the symbol left or right
     * 
     * Default: "right"
     * 
     * @param "left"|"right" $val
     * @return static
     */
    public function symbolAlignment(string $val)
    {
        $this->alignment = $val;
        return $this;
    }

    /**
     * Set fraction digits. 
     * 
     * Default: 2
     * 
     * @param int $val
     * @return static
     */
    public function setFractionDigits(int $val)
    {
        $this->fractionDigits = $val;
        return $this;
    }

    /**
     * Converts number to currency
     * @param float|null $number
     * @return bool|string
     */
    public function format(float|null $number = 0): string|bool
    {
        if ($number) {
            $this->setPrice($number);
        }

        $format = new NumberFormatter($this->locale, NumberFormatter::DECIMAL);

        if ($this->fractionDigits) {
            $format->setAttribute(NumberFormatter::FRACTION_DIGITS, $this->fractionDigits);
        }

        $result = $format->format($this->price);

        return $this->alignment == 'right'
            ? $result . $format->getSymbol(NumberFormatter::CURRENCY_SYMBOL)
            : $format->getSymbol(NumberFormatter::CURRENCY_SYMBOL) . $result;
    }
}
