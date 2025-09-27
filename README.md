# Currency Format

A simple **Laravel package** for formatting numbers as currencies with locale, symbol alignment, and fraction digits support.  

---

## 📦 Installation

1. Require the package via Composer:

```bash
composer require hasanberkm/currency-format
```

2. You need to define the repo in your composer.json
```json
"repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/hasanberkm/currency-format"
        }
    ],
```

---

## ⚙️ Usage

### Basic Example

```blade
{{ CurrencyFormat::format(1234.56) }}
```

Output:

```
1.234,56₺
```

---

### Fluent API

```php
use Hasanberkm\CurrencyFormat\CurrencyFormat;

new CurrencyFormat()->setPrice(123456)
              ->setLocale('tr_TR')
              ->setCurrency('TRY')
              ->setFractionDigits(2)
              ->symbolAlignment('left')
              ->format();
```

```php
use Hasanberkm\CurrencyFormat\CurrencyFormat;

$formatter = new CurrencyFormat();
$formatter->format(123456);
```

```php
use Hasanberkm\CurrencyFormat\CurrencyFormat;

class {
    public $formatter;

    public function __construct(CurrencyFormat $currencyFormat){
        $this->formatter = $currencyFormat
    }

    public function index(){
        $this->formatter->format(123456);
    }
}
```

Output:

```
1.234,56₺
```

---

### Available Methods

| Method | Description | Default |
|--------|-------------|---------|
| `setPrice(float $val)` | Set the numeric value to format | 0 |
| `setLocale(string $val)` | Set the locale for formatting | 'tr_TR' |
| `setCurrency(string $val)` | Set the currency symbol | 'TRY' |
| `setHideSymbol(bool $val)` | Hide the currency symbol | false |
| `symbolAlignment('right')` | Align symbol left or right | 'right' |
| `setFractionDigits(int $val)` | Number of decimal digits | 2 |
| `format(float|null $number)` | Format the value as a currency string | N/A |

---

## 📝 Notes

- Requires **PHP 8.0+**  
- Compatible with **Laravel 10, 11, 12+**  
- Make sure the `intl` PHP extension is enabled for `NumberFormatter`.  

---

## 📄 License

MIT License © hasanberkm
