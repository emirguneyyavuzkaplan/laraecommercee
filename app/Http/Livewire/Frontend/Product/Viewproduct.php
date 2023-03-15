<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Viewproduct extends Component
{
    public $category, $product, $prodColorSelectedQuantity;

    public function addToWishList($productId)
    {
       if (Auth::check())
       {
           if (Wishlist::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists())
           {
               session()->flash('message','Already Added to wishlist ');
               $this->dispatchBrowserEvent('message', [
                   'text' => 'Already Added to wishlist',
                   'type'=>'success',
                   'status'=>409
               ]);
               return false;
           }
           else
           {
               Wishlist::create([
                   'user_id'=>auth()->user()->id,
                   'product_id'=>$productId
               ]);
               session()->flash('message','wishlist  added succesfully!');
               $this->dispatchBrowserEvent('message', [
                   'text' => 'wishlist  added succesfully!',
                   'type'=>'success',
                   'status'=>200
               ]);
           }

       }
       else{
           session()->flash('message','Please login to continue');
           $this->dispatchBrowserEvent('message', [
               'text' => 'Please login to continue',
               'type'=>'info',
               'status'=>401
           ]);
           return false;
       }

    }
    public function colorSelected($productColorId)
    {
        $productColor=$this->product->productColors()->where('id',$productColorId)->first();
        $this->prodColorSelectedQuantity=$productColor->quantity;
        if ($this->prodColorSelectedQuantity==0){
            $this->prodColorSelectedQuantity='outOfStock';
        }

    }

    public function mount($category,$product)
    {
        $this->category=$category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.viewproduct',[
            'category'=>$this->category,
            'product'=>$this->product
        ]);
    }
}
