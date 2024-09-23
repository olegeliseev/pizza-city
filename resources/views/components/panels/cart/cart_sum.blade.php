@php
    $sum = 0;
    $cart = session()->get('cart');
    foreach($cart as $id => $item) {
        // $sum += $item['item']->price;
        $sum += $item['price'];
    }
@endphp
<x-panels.price :price="$sum" />
