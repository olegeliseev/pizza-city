@props(['order', 'lineNumber'])
<tr>
    <td>{{ $lineNumber }}</td>
    <td>{{ $order->quantity }}</td>
    <td>
        <x-panels.price :price="$order->sum" />
    </td>
    <td>
        <x-panels.profile.order_status :status="$order->status"/>
    </td>
</tr>
