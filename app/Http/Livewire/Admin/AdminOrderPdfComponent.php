<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class AdminOrderPdfComponent extends Component
{

    public function OrderPDF(){
        $orders=Order::all();
        $pdf = Pdf::loadView('livewire.admin.admin-order-pdf-component',['orders'=>$orders]);
        return $pdf->download('invoice'.rand(1,9999).'.pdf');
    }

    public function render()
    {
        $orders=Order::all();
        return view('livewire.admin.admin-order-pdf-component',['orders'=>$orders]);
    }
}
