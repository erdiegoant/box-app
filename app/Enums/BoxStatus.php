<?php

namespace App\Enums;

enum BoxStatus: string
{
    case DRAFT = 'draft';
    case CREATED = 'created';
    case IN_PROGRESS = 'in_progress';
    case DELIVERED = 'delivered';
}
