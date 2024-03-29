<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
     public $product , $category, $prodColorSelectedQuantity, $QuantityCount = 1, $productColorId;

    public function incrementQuantity(){
        if( $this->QuantityCount < 10){
            $this->QuantityCount++;
        }
    }

    public function decrementQuantity(){
        if( $this->QuantityCount > 1){
            $this->QuantityCount--;
        }
    }

     public function addToWishLists(int $productId)
    {

        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                $this->dispatch(
                    'message',
                    text: 'Already added to wishlists',
                    type: 'error',
                    status: 409
                );
                return false;
            } else {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                // $this->emit('wishlistAddedUpdated');
                $this->dispatch('wishlistAddedUpdated');
                $this->dispatch(
                    'message',
                    text: 'Wishlists Added Successfully',
                    type: 'success',
                    status: 200
                );
            }
        } else {
            $this->dispatch('message',
                text: 'Please Login to continue',
                type: 'info',
                status : 401
            );
            return false;
        }
    }
     public function addToCart(int $productId)
    {
        if (Auth::check()) {
            //dd( $productId);

             if ($this->product->where('id', $productId)->where('status','0')->exists()) {

                if($this->product->productColors()->count() > 1){

                    if($this->prodColorSelectedQuantity != NULL){

                        if(Cart::where('user_id',auth()->user()->id)
                                        ->where('product_id',$productId)
                                        ->where('product_color_id',$this->productColorId)
                                        ->exists()){
                            $this->dispatch(
                                'message',
                                text: 'Product Already Added',
                                type: 'success',
                                status: 200
                            );

                        }
                        else{
                            $productColor = $this->product->productColors()->where('id',$this->productColorId)->first();
                            if($productColor->quantity > 0){
                                    if($this->product->quantity > $this->QuantityCount){
                                        //Insert Into Cart
                                        // dd('Added With Color');
                                        Cart::create([
                                            'user_id' => auth()->user()->id,
                                            'product_id' => $productId,
                                            'product_color_id' => $this->productColorId,
                                            'quantity' => $this->QuantityCount,
                                        ]);
                                        $this->dispatch('CartAddedUpdated');
                                        $this->dispatch(
                                            'message',
                                            text: 'Product Added To Cart',
                                            type: 'success',
                                            status: 200
                                        );
                                    }
                                    else
                                    {
                                        $this->dispatch(
                                        'message',
                                        text: 'Only'.$productColor->quantity.'Quantity Available',
                                        type: 'warning',
                                        status: 404
                                        );
                                    }
                            }
                            else{
                                $this->dispatch(
                                    'message',
                                    text: 'Out Of Stock',
                                    type: 'warning',
                                    status: 404
                                );
                            }
                        }
                    }
                    else
                    {
                        $this->dispatch(
                            'message',
                            text: 'Select Color',
                            type: 'info',
                            status: 404
                        );
                    }
                }
                else // this is for without color  if product don't have multiple color
                {
                    if(Cart::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists()){
                        $this->dispatch(
                            'message',
                            text: 'Product Already Added',
                            type: 'success',
                            status: 200
                        );
                    }
                    else{
                        if($this->product->quantity > 0){

                            if($this->product->quantity > $this->QuantityCount){
                                    // dd('Added Without Color');
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'quantity' => $this->QuantityCount,
                                    ]);
                                    $this->dispatch(
                                        'message',
                                        text: 'Product Added To Cart ',
                                        type: 'success',
                                        status: 200
                                    );
                            }
                            else
                            {
                                $this->dispatch(
                                'message',
                                text: 'Only'.$this->product->quantity.'Quantity Available',
                                type: 'warning',
                                status: 404
                                );
                            }
                        }
                        else
                        {
                                $this->dispatch(
                                    'message',
                                    text: 'Out Of Stock',
                                    type: 'warning',
                                    status: 404
                                );
                        }
                    }
                }
            }
             else
            {
                $this->dispatch(
                    'message',
                    text: 'Product Is Not Available',
                    type: 'warning',
                    status: 404
                );
            }
        }
        else
        {
            $this->dispatch('message',
                text: 'Please Login to continue',
                type: 'info',
                status : 401
            );
            return false;
        }
    }

    public function colorSelected($productColorId)
    {
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;

        if ($this->prodColorSelectedQuantity == 0) {
            $this->prodColorSelectedQuantity = 'outOfStock';
        }
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product,
        ]);
    }
}
