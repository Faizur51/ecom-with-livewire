<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Carbon\Carbon;
use Livewire\Component;

class AdminDashboardComponent extends Component
{

    public function render()

    {
        $orders=Order::orderBy('id','desc')->get()->take(10);
        $totalSales=Order::where('status','delivery')->count();
        $totalAmount=Order::where('status','delivery')->sum('total');
        $todaySales=Order::where('status','delivery')->whereDate('created_at',Carbon::today())->count();
        $todayAmount=Order::where('status','delivery')->whereDate('created_at',Carbon::today())->sum('total');
        return view('livewire.admin.admin-dashboard-component',[
            'orders'=>$orders,
            'totalSales'=>$totalSales,
            'totalAmount'=>$totalAmount,
            'todaySales'=>$todaySales,
            'todayAmount'=>$todayAmount,
        ]);
    }
}
