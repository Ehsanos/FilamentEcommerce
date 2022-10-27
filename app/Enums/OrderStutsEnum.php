<?php

namespace App\Enums;

enum OrderStutsEnum:string
{
    case PENDING="pending";
    case ONSHIP="onship";
    case COMPLETE="complete";
    case CANCELLED="cancelled";
    public  function stutus(): string
    {
        return match ($this) {
            self::CANCELLED => "ملغي",
            self::ONSHIP => "بالشحن",
            self::COMPLETE => "مكتمل",
            self::PENDING => "في الانتظار",

        };
    }
}

