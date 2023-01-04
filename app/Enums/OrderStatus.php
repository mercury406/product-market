<?php

namespace App\Enums;

enum OrderStatus: int
{
   case Created = 0;
   case Paid = 1;
   case Proccessing = 2;
   case ReadyToDelivery = 3;
   case Delivering = 4;
   case Done = 5;
   case CancelledByUser = 6;
   case CancelledByAdmin = 7;

   public static function values(): array
   {
      return array_column(self::cases(), 'value');
   }

   public static function names(): array
   {
      return array_column(self::cases(), 'name');
   }

   public static function random()
   {
      $len = count(self::values()) - 1;
      return self::values()[random_int(0, $len)];
   }
}
