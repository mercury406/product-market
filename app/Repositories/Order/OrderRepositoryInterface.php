<?php

namespace App\Repositories\Order;

use App\Enums\OrderStatus;

interface OrderRepositoryInterface
{
    public function getAllOrders();

    public function getOrderById(int $orderId);

    public function getOrdersByUser(int $userId);

    public function getOrdersByStatus(OrderStatus $status);

    public function createOrderFromRequest($request);

    public function updateOrderStatus(int $orderId, OrderStatus $status);
}