<?php

namespace tl\simulacion\mx\Client\Model;
use \tl\simulacion\mx\Client\ObjectSerializer;

class CatalogoEntidadAfiliadora
{
    
    const IM = 'IM';
    const IS = 'IS';
    const SP = 'SP';
    
    
    public static function getAllowableEnumValues()
    {
        return [
            self::IM,
            self::IS,
            self::SP,
        ];
    }
}
