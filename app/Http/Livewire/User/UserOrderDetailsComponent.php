<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserOrderDetailsComponent extends Component
{

    public $order_id;
    public $name;
    public $image;
    public $rating;
    public $comment;
    public $order_item_id;

    public $cancel_reason;

    public function mount($order_id){
        $this->order_id=$order_id;

    }


    public function ProductReview($id){
        $orderitem=OrderItem::where('id',$id)->first();
        $this->name =$orderitem->product->name;
        $this->image =$orderitem->product->image;
        $this->order_item_id =$orderitem->id;
    }


    public function updated($fields){
        $this->validateOnly($fields,[
            'rating'=>'required',
            'comment'=>'required',
        ]);
    }

    public function addReview(){

        $this->validate([
            'rating'=>'required',
            'comment'=>'required',
        ]);

        $review=new Review();
        $review->user_id=Auth::user()->id;
        $review->rating=$this->rating;
        $review->comment=$this->comment;
        $review->order_item_id=$this->order_item_id;
        $review->save();

         $orderitem=OrderItem::find($this->order_item_id);
         $orderitem->rstatus=true;
         $orderitem->save();

        noty()->closeWith(['click', 'button'])->addInfo('Review has been added');
        $this->emit('addReview');

    }


    public function cancelOrder(){
          $order=Order::find($this->order_id);
          $order->status='canceled';
          $order->cancel_date=DB::raw('CURRENT_DATE');
          $order->cancel_reason=$this->cancel_reason;
          $order->save();
          session()->flash('cancel_message','Your order has been canceled');
    }




    public function render()
    {
        $order=Order::where('user_id',Auth::user()->id)->where('id',$this->order_id)->first();
        return view('livewire.user.user-order-details-component',['order'=>$order]);
    }
}
