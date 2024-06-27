<?php
namespace App\Enums;


enum UserRole:string
{
    case ADMIN = 'admin';
    case DOKTER = 'dokter';
    case USER = 'user';

    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'admin',
            self::DOKTER => 'dokter',
            self::USER => 'user',
        };
    }
}
