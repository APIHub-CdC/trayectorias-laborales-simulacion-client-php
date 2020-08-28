<?php

namespace tl\simulacion\mx\Client\Model;
use \tl\simulacion\mx\Client\ObjectSerializer;

class CatalogoPeriodoPago
{
    
    const S = 'S';
    const Q = 'Q';
    const M = 'M';
    const C = 'C';
    
    
    public static function getAllowableEnumValues()
    {
        return [
            self::S,
            self::Q,
            self::M,
            self::C,
        ];
    }
}
