<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Picqer\Barcode\BarcodeGeneratorPNG;

class AdminProductPdfComponent extends Component
{

    public function productPDF($id){
        $order=Order::find($id);

        $generator = new BarcodeGeneratorPNG();
        $barcode = base64_encode($generator->getBarcode($order->id, $generator::TYPE_CODE_128));
        $data = [
            'title' => 'Welcome',
            'barcode' => $barcode
        ];

        $pdf = Pdf::loadView('livewire.admin.admin-product-pdf-component',['order'=>$order,'data'=>$data]);

        return $pdf->download('invoice'.rand(1,9999).'.pdf');


    }


    public function render()
    {
        return view('livewire.admin.admin-product-pdf-component');
    }
}
