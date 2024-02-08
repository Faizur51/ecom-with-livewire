<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice #6</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
      *{
         box-sizing: border-box;
        }

        .box1 {
            float: left;
            width: 30%;

        }
        .box2{
            float: right;
            width: 30%;

        }
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
            margin-top: 20px;
        }

        @font-face{
            font-family: "SolaimanLipi";
            src : url({{storage_path('fonts/SolaimanLipi.ttf')}}) format('truetype');
        }
        .custom-font{
            font: normal 25px/18px SolaimanLipi;
        }

    </style>
</head>
<body>

<table class="order-details">
    <thead>
    <tr>
        <th width="50%" colspan="2">
            <h2 class="text-start">Rafha Ecommerce</h2>

        </th>
        <th width="50%" colspan="2" class="text-end company-data">
            <span>Invoice Id: #{{$order->id}}</span> <br>
            <span>Date: {{\Carbon\Carbon::parse($order->created_at)->format('M d,Y')}}</span> <br>
            <span>Zip code : 1440</span> <br>
            <span>Address: #102,Gazaria,Munshigonj,Dhaka</span> <br>
        </th>
    </tr>
    <tr class="bg-blue">
        <th width="50%" colspan="2">Order Details</th>
        <th width="50%" colspan="2">User Details</th>
    </tr>
    </thead>
    <tbody>

    <tr>
        <td>Order Id:</td>
        <td>{{$order->id}}</td>

        <td>Full Name:</td>
        <td>{{ucwords($order->name)}}</td>
    </tr>
    <tr>
        <td>Tracking Id/No.:</td>
        <td>funda-CRheOqspbA</td>

        <td>Email Id:</td>
        <td>{{$order->email}}</td>
    </tr>
    <tr>
        <td>Ordered Date:</td>
        <td>22-09-2022 10:54 AM</td>

        <td>Phone:</td>
        <td>{{$order->phone}}</td>
    </tr>
    <tr>
        <td>Payment Mode:</td>
        <td>{{ucwords($order->transaction->mode)}}</td>

        <td>Address:</td>
        <td>{{ucwords($order->city)}},{{ucwords($order->address)}}</td>
    </tr>
    <tr>
        <td>Order Status:</td>
        <td>{{ucwords($order->transaction->status)}}</td>

        <td>Barcode:</td>
        <td><img src="data:image/png;base64,{{ $data['barcode']}}"></td>
    </tr>
    </tbody>
</table>

<table>
    <thead>
    <tr>
        <th class="no-border text-start heading" colspan="5">
            Order Items
        </th>
    </tr>
    <tr class="bg-blue">
        <th>ID</th>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>

    @foreach($order->orderItems as $item)
        <tr>
            <td width="10%">{{$item->id}}</td>
            <td>{{ucwords($item->product->name)}}</td>
            <td ><span class="custom-font">&#2547;</span> {{$item->price}}</td>
            <td width="10%">{{$item->quantity}} PCs</td>
            <td width="15%" class="fw-bold"><span class="custom-font">&#2547;</span> {{$item->price*$item->quantity}}</td>
        </tr>
    @endforeach

    <tr>
        <td colspan="3" >Subtotal :</td>
        <td colspan="2" class="text-end"><span class="custom-font">&#2547;</span> {{$order->subtotal}}</td>
    </tr>

    <tr>
        <td colspan="3">Shipping Charge :</td>
        <td colspan="2" class="text-end"><span class="custom-font">&#2547;</span> {{number_format($order->shipping_charge,2)}}</td>
    </tr>
    <tr>
        <td colspan="3" class="total-heading">Total Amount :</td>
        <td colspan="2" class="total-heading text-end"><span class="custom-font">&#2547;</span> {{number_format($order->total,2)}}</td>
    </tr>
    </tbody>
</table>

<br>

<div class="clearfix" style="margin-top: 200px">
    <div class="box1">
        <p>Customer Name/Signature</p>
    </div>
    <div class="box2">
        <p>Authorized Signature</p>
    </div>
</div>
<hr>
<p class="text-center">
    Note: We hope you will keep us in mind for future freelance projects. Thank You!
</p>

</body>
</html>


