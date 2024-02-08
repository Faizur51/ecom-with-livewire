<!DOCTYPE html>
<html>
<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 600px;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #EAF1FB;
            color: black;
        }
    </style>
</head>
<body>

<h3> Dear {{$order->user->name}},</h3>
<p>Greetings from Rafa eShop.</p>
<p>You order has been successfully placed.Details below :</p>

<table id="customers">
    <tr>
        <th>Sl</th>
        <th>Image</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price</th>
    </tr>
    @foreach($order->orderItems as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td><img src="{{asset('frontend/assets/images/product')}}/{{$item->product->image}}" alt=""></td>
        <td>{{ucwords($item->product->name)}}</td>
        <td>{{$item->quantity}} Pcs</td>
        <td>&#2547;{{$item->price*$item->quantity}}</td>
    </tr>
    @endforeach
    <tr>
        <td colspan="4" style="text-align: end;font-size: 15px;font-weight: bold">Subtotal:</td>
        <td style="font-size: 15px;font-weight: bold">&#2547;{{$order->subtotal}}</td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: end;font-size: 15px;font-weight: bold">Free Shipping:</td>
        <td style="font-size: 15px;font-weight: bold">&#2547;{{number_format($order->shipping_charge,2)}}</td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: end;font-size: 15px;font-weight: bold">Total:</td>
        <td style="font-size: 15px;font-weight: bold">&#2547;{{$order->total}}</td>
    </tr>
</table>
<p>If you have any question please call 01717578265.</p>
<p>Thank you for using Rafa eShop.</p>
<p>With best wishes,</p>
<p>Rafa eShop</p>
<p>Online ecommerce platform</p>

</body>
</html>

