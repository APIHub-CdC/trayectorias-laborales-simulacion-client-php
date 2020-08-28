<?php

namespace tl\simulacion\mx\Client\Model;
use \tl\simulacion\mx\Client\ObjectSerializer;

class CatalogoSexoCedula
{
    
    const _1 = 1;
    const _2 = 2;
    
    
    public static function getAllowableEnumValues()
    {
        return [
            self::_1,
            self::_2,
        ];
    }
}
