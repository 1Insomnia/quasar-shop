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
        $total = floatval(Cart::total());
        $item_count = Cart::count();
        $user_id = auth()->user()->id;

        $order = Order::create([
            'order_number' => 'ORD' . strtoupper(uniqid()),
            'user_id' => $user_id,
            'status' => 'pending',
            'grand_total' => $total,
            'item_count' => $item_count,
            'payment_status' => 0,
            'payment_method' => null,
            'payment_id' => 'payment_id' . strtoupper(uniqid()),
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

                $orderItem = new OrderItem([
                    'product_id' => $product->id,
                    'order_id' => $order->id,
                    'quantity' => intval($item->qty),
                    'price' => floatval($item->price),
                ]);

                $order->items()->save($orderItem);
            }
        }
        return $order;
    }

    public function deleteOrder ($id)
    {
        $order = Order::find($id);
        return $order->delete();
    }
}
