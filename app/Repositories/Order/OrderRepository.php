<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Enums\OrderStatus;

class OrderRepository implements OrderRepositoryInterface 
{
    public function getAllOrders()
    {
        return Order::query()
            ->orderByDesc('id')
            ->paginate(20);
    }

    public function getOrderById(int $orderId)
    {
        return Order::query()
            ->where('id', $orderId)
            ->first();
    }

    public function getOrdersByUser(int $userId)
    {
        return Order::query()
            ->where('user_id', $userId)
            ->orderByDesc('id')
            ->paginate(20);
    }

    public function getOrdersByStatus(OrderStatus $status)
    {
        return Order::query()
            ->where('status', $status)
            ->orderByDesc('id')
            ->paginate(20);
    }

    public function createOrderFromRequest($request)
    {
        return Order::query()
            ->create($request);
    }

    public function updateOrderStatus(int $orderId, OrderStatus $status)
    {
        return Order::query()
            ->where('id', $orderId)
            ->update(['status' => $status]);
    }

}