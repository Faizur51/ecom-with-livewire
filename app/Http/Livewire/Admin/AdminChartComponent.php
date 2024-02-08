<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Carbon\Carbon;
use Livewire\Component;

class AdminChartComponent extends Component
{
    public $order;

    protected $listeners=['collectData'=>'changeData'];
    public function mount(){

        $orders=Order::latest()->limit(20)->get();
           foreach ($orders as $item){
               $data['label'][]=$item->created_at->format('H:i:s');
               $data['data'][]=$item->total;
           }
           $this->order=json_encode($data);
    }

    public function render()
    {
        $orders=Order::orderBy('id','desc')->get()->take(10);
        $totalSales=Order::where('status','delivery')->count();
        $totalAmount=Order::where('status','delivery')->sum('total');
        $todaySales=Order::where('status','delivery')->whereDate('created_at',Carbon::today())->count();
        $todayAmount=Order::where('status','delivery')->whereDate('created_at',Carbon::today())->sum('total');
        return view('livewire.admin.admin-chart-component',[
            'orders'=>$orders,
            'totalSales'=>$totalSales,
            'totalAmount'=>$totalAmount,
            'todaySales'=>$todaySales,
            'todayAmount'=>$todayAmount,
        ]);

    }

    public function changeData(){

        $orders=Order::latest()->limit(20)->get();
            foreach ($orders as $item){
                $data['label'][]=$item->created_at->format('H:i:s');
                $data['data'][]=$item->total;
            }
            $this->order=json_encode($data);

            $this->emit('chartUpdate',['data'=>$this->order]);
    }
}
