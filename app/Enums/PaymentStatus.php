<?php

namespace App\Enums;

enum PaymentStatus: string
{
    case PAID = 'Оплачен';
    case UNPAID = 'Не оплачен';
    case Error = 'Ошибка оплаты';

    public static function random(): self {
        return self::cases()[array_rand(self::cases())];
    }
}
