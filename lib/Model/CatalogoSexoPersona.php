<?php

namespace tl\simulacion\mx\Client\Model;
use \tl\simulacion\mx\Client\ObjectSerializer;

class CatalogoSexoPersona
{
    
    const F = 'F';
    const M = 'M';
    
    
    public static function getAllowableEnumValues()
    {
        return [
            self::F,
            self::M,
        ];
    }
}
