<?php

namespace App\Enums;

enum OrderStatus: string // só permitido a partir do php 8.1
{
    case WAITING = 'waiting';

    case IN_COOKING = 'in_cooking';

    case IN_DELIVERY = 'in_delivery';

    case DELIVERED = 'delivered';
}