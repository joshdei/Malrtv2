<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Orders;

class OrderPolicy
{
    /**
     * Determine whether the user can approve the order.
     *
     * @param  \App\User  $user
     * @param  \App\Orders  $order
     * @return bool
     */
    public function approve(User $user, Orders $order)
    {
        // Implement your authorization logic here, e.g., check if the user is the seller of the product
        return $user->id === $order->seller_id;
    }
}