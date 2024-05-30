<?php
use App\Models\Currency;
use Illuminate\Support\Facades\Session;

if (!function_exists('currencyHelper')) {
    function currencyHelper($amount)
    {
     
        $exchangeRate = Currency::where('code',Session::get('currency'))->first();
       
        if($exchangeRate)
        {
            return format_currency($amount * $exchangeRate->exchange_rate);
        }
        
    }
}
if (!function_exists('currencySymbol')) {
    function currencySymbol($code)
    {
       $symbol = Currency::where('code',$code)->select('symbol')->first();
       if($symbol)
       {
        return $symbol->symbol;
       }
       
    }
}
if (!function_exists('format_currency')) {
    function format_currency($number, $decimals = 2, $decimalPoint = '.', $thousandSeparator = ',')
    {
        return number_format($number, $decimals, $decimalPoint, $thousandSeparator);
    }
}