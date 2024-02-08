<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class AdminDashboardComponent extends Component
{


    public function markAsRead($id){
        auth()->user()->unreadNotifications->where('id',$id)->markAsRead();
        noty()->progressBar(false)->layout('topRight')->addInfo('Mark As Read has been updated.');
    }


    public function markAll(){
        $user = User::find(1);

        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        noty()->progressBar(false)->layout('topLeft')->addInfo('Mark As Read has been updated.');
    }



    public function render()

    {
        $orders=Order::orderBy('id','desc')->get()->take(13);
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
