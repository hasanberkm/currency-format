<?php

namespace Hasanberkm\CurrencyFormat\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string|bool format(float|null $number = 0)
 * @method static \Hasanberkm\CurrencyFormat\CurrencyFormat setPrice(float $val)
 * @method static \Hasanberkm\CurrencyFormat\CurrencyFormat setLocale(string $val)
 * @method static \Hasanberkm\CurrencyFormat\CurrencyFormat setCurrency(string $val)
 * @method static \Hasanberkm\CurrencyFormat\CurrencyFormat setHideSymbol(bool $val)
 * @method static \Hasanberkm\CurrencyFormat\CurrencyFormat symbolAlignment(string $val)
 * @method static \Hasanberkm\CurrencyFormat\CurrencyFormat setFractionDigits(int $val)
 */
class CurrencyFormat extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Hasanberkm\CurrencyFormat\CurrencyFormat::class;
    }
}
