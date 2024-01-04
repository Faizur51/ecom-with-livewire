<?php

namespace App\Http\Livewire;

use App\Library\SslCommerz\SslCommerzNotification;
use App\Mail\OrderMail;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Cart;
class CheckoutComponent extends Component
{

    public $address_type;
    public $name;
    public $phone;
    public $email;
    public $city;
    public $post_code;
    public $address;

    public $deleteId='';

    public $ids;
    public $user_id;

    public $paymentmode;

    public $additional_info;

    public $thankyou;

    public function deleteId($id){
        $this->deleteId=$id;
    }

    public function delete(){
        $shipping=Shipping::find($this->deleteId);

        $shipping->delete();
        noty()->closeWith(['click', 'button'])->addInfo('Shipping Address has been deleted successfully');
    }

    public function updated($fields){

        $this->validateOnly($fields,[
            'address_type'=>'required',
            'name'=>'required|string|max:20',
            'phone'=>'required|min:11|max:11',
            'city'=>'required',
            'address'=>'required',
        ]);
    }


    public function addShipinfo(){
        $this->validate([
            'address_type'=>'required',
            'name'=>'required|string|max:20',
            'phone'=>'required|min:11|max:11',
            'city'=>'required',
            'address'=>'required',
        ]);

        $shipping=new Shipping();
        $shipping->user_id=Auth::user()->id;
        $shipping->address_type=$this->address_type;
        $shipping->name=$this->name;
        $shipping->phone=$this->phone;
        $shipping->email=$this->email;
        $shipping->city=$this->city;
        $shipping->post_code=$this->post_code;
        $shipping->address=$this->address;
        $shipping->save();
        noty()->closeWith(['click', 'button'])->addInfo('Address has been added successfully');
        $this->reset();
        $this->emit('addShippingAddress');


    }



    public function editShippinfo($id){
        $shipping=Shipping::where('id',$id)->first();
        $this->user_id =$shipping->user_id ;
        $this->address_type =$shipping->address_type ;
        $this->name =$shipping->name ;
        $this->phone=$shipping->phone;
        $this->email=$shipping->email;
        $this->city=$shipping->city;
        $this->post_code=$shipping->post_code;
        $this->address=$shipping->address;
        $this->ids=$shipping->id;
    }

   public function UpdateShipinfo(){

       $this->validate([
           'address_type'=>'required',
           'name'=>'required|string|max:20',
           'phone'=>'required|min:11|max:11',
           'email'=>'required',
           'city'=>'required',
           'address'=>'required',
       ]);

       $shipping=Shipping::find($this->ids);
       $shipping->user_id=Auth::user()->id;
       $shipping->address_type=$this->address_type;
       $shipping->name=$this->name;
       $shipping->phone=$this->phone;
       $shipping->email=$this->email;
       $shipping->city=$this->city;
       $shipping->post_code=$this->post_code;
       $shipping->address=$this->address;
       $shipping->save();

       noty()->closeWith(['click', 'button'])->addInfo('Shipping Address has been updated');
       $this->reset();
       $this->emit('editShippingAddress');
   }


    public function placeOrder()
    {
        $shippings=Shipping::where('user_id',Auth::user()->id)->first();

       if($shippings){
           $this->validate([
               'paymentmode' => 'required',
           ]);

           if($this->paymentmode=="cod"){
           $order=new Order();
           $order->user_id=Auth::user()->id;
           $order->subtotal=Cart::instance('cart')->subtotal();
           $order->total=Cart::instance('cart')->total();
           $order->name=$shippings->name;
           $order->email=$shippings->email;
           $order->phone=$shippings->phone;
           $order->city=$shippings->city;
           $order->address=$shippings->address;
           $order->status='ordered';
           $order->additional_info=$this->additional_info;
           $order->save();

           foreach (Cart::instance('cart')->content() as $item)
           {
               $orderitem=new OrderItem();
               $orderitem->product_id=$item->id;
               $orderitem->order_id=$order->id;
               $orderitem->price=$item->price;
               $orderitem->quantity=$item->qty;
               if($item->options){
                   $orderitem->options = serialize($item->options);
               }
               $orderitem->save();

           }

               /*$transaction=new Transaction();
               $transaction->user_id=Auth::user()->id;
               $transaction->order_id=$order->id;
               $transaction->mode="cod";
               $transaction->status="pending";
               $transaction->save();*/
               $this->makeTransaction($order->id,'pending');
               $this->resetCart();
               $this->sendOrderConfirmMail($order);

           }else if($this->paymentmode =="card"){

               dd('Online payment gateway');
           }

       }else{
           noty()->closeWith(['click', 'button'])->addInfo('Shipping Address not found');
       }

    }

    public function sendOrderConfirmMail($order){
      Mail::to($order->email)->send(new OrderMail($order));
    }

    public function resetCart(){
        $this->thankyou=1;
        Cart::instance('cart')->destroy();
    }

    public function makeTransaction($order_id,$status){

        $transaction=new Transaction();
        $transaction->user_id=Auth::user()->id;
        $transaction->order_id=$order_id;
        $transaction->mode=$this->paymentmode;
        $transaction->status=$status;
        $transaction->save();

    }


    public function varifyForCheckout()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
        else if($this->thankyou)
        {
            return redirect()->route('thankyou');
        }
        else if(Cart::instance('cart')->count()<1)
        {
            return redirect()->route('shop');
        }
    }

    public function render()
    {

        $this->varifyForCheckout();
        $shippings=Shipping::where('user_id',Auth::user()->id)->get();
        $districts=District::orderBy('name','asc')->get();
        return view('livewire.checkout-component',['shippings'=>$shippings,'districts'=>$districts]);
    }
}
