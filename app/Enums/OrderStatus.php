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

   public static function toArray()
   {
      $statuses = [];
      foreach (self::cases() as $value) {
         $statuses[$value->value] = $value->name;
      }
      return $statuses;
   }

   public function label()
   {
      return match($this){
         self::Created => __('custom.order_status.created'),
         self::Paid => __('custom.order_status.paid'),
         self::Proccessing => __('custom.order_status.proccessing'),
         self::ReadyToDelivery => __('custom.order_status.ready_to_delivery'),
         self::Delivering => __('custom.order_status.delivering'),
         self::Done => __('custom.order_status.done'),
         self::CancelledByUser => __('custom.order_status.cancelledByUser'),
         self::CancelledByAdmin => __('custom.order_status.cancelledByAdmin')
      };
   }
   
}
