<?php

namespace Hasanberkm\CurrencyFormat;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class CurrencyFormatServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(CurrencyFormat::class, function () {
            return new CurrencyFormat();
        });
    }

    public function boot()
    {
        // Blade directive
        Blade::directive('currency', function ($expression) {
            return "<?php echo \\CurrencyFormat::format($expression); ?>";
        });
    }
}
