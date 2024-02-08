<div>
    <style>
        table, td, th {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th {
            text-align: left;
        }

        @font-face{
            font-family: "kalpurush";
            src : url({{storage_path('fonts/kalpurush.ttf')}}) format('truetype');
        }
        .custom-font{
            font: normal 20px/18px kalpurush;
        }
    </style>

    <table>
        <tr>
            <th>ID</th>
            <th>Total</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>City</th>
            <th>Address</th>
            <th>Barcode</th>
        </tr>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td><span class="custom-font">&#2547; </span>{{$order->total}}</td>
                <td>{{ucwords($order->name)}}</td>
               <td>{{$order->email}}</td>
                <td>{{$order->phone}}</td>
                <td>{{ucwords($order->city)}}</td>
                <td>{{ucwords($order->address)}}</td>
                <td>

                    @php
                        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                        $row=$order->phone
                    @endphp
                    {!! $generator->getBarcode($row,$generator::TYPE_CODE_128,1,20) !!}


                </td>

            </tr>
        @endforeach
    </table>
</div>
