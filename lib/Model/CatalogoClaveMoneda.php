<?php

namespace tl\simulacion\mx\Client\Model;
use \tl\simulacion\mx\Client\ObjectSerializer;

class CatalogoClaveMoneda
{
    
    const MXP = 'MXP';
    const USD = 'USD';
    const EUR = 'EUR';
    
    
    public static function getAllowableEnumValues()
    {
        return [
            self::MXP,
            self::USD,
            self::EUR,
        ];
    }
}
