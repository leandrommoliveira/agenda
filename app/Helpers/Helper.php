<?php

namespace App\Helpers;

class Helper
{
    public static function formatRealBr($valor)
    {
        return number_format($valor, 2, ',', '.');
    }
}