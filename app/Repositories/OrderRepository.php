<?php


namespace App\Repositories;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;

use Gloudemans\Shoppingcart\Facades\Cart;

class OrderRepository
{
    public function storeOrderDetails(array $params)
    {
        $order = Order::create([
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'user_id' => auth()->user()->id,
            'status' => 'pending',
            'grand_total' => floatval(Cart::priceTotal()),
            'item_count' => Cart::count(),
            'payment_status' => 0,
            'payment_method' => null,
            'payment_id' => '',
            'first_name' => $params['first_name'],
            'last_name' => $params['last_name'],
            'address' => $params['address'],
            'city' => $params['city'],
            'country' => $params['country'],
            'zipcode' => $params['zipcode'],
            'phone' => $params['phone'],
            'notes' => "",
        ]);

        if ($order) {
            $items = Cart::content();

            foreach( $items as $item){
                $product = Product::find($item->id);

                $orderItem = new \App\Models\OrderItem([
                    'product_id' => $product->id,
                    'order_id' => $order->id,
                    'quantity' => $item->qty,
                    'price' => $item->price,
                ]);

                $order->items()->save($orderItem);
            }
        }
        return $order;
    }
}
