<?php

namespace App\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart, $totalPrice = 0;

    public function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            if ($cartData->quantity > 1) {

                $cartData->decrement('quantity');

                $this->dispatch(
                    'message',
                    text: 'Quantity Updated',
                    type: 'success',
                    status: 200,
                );
            } else {

                $this->dispatch(
                    'message',
                    text: 'Quantity cannot be less than 1',
                    type: 'success',
                    status: 200,
                );
            }
        } else {
            $this->dispatch(
                'message',
                text: 'Something Went Wrong!',
                type: 'error',
                status: 404,
            );
        }
    }
    public function incrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            if ($cartData->productColor()->where('id', $cartData->product_color_id)->exists()) {
                $productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->first();
                if ($productColor->quantity > $cartData->quantity) {
                    $cartData->increment('quantity');
                    $this->dispatch(
                        'message',
                        text: 'Quantity Updated',
                        type: 'success',
                        status: 200,
                    );
                } else {
                    $this->dispatch(
                        'message',
                        text: 'Only' . $productColor->quantity . 'Quantity Available',
                        type: 'success',
                        status: 200,
                    );
                }
            } else {

                if ($cartData->product->quantity > $cartData->quantity) {
                    $cartData->increment('quantity');
                    $this->dispatch(
                        'message',
                        text: 'Quantity Updated',
                        type: 'success',
                        status: 200,
                    );
                } else {
                    $this->dispatch(
                        'message',
                        text: 'Only' . $cartData->product->quantity . 'Quantity Available',
                        type: 'error',
                        status: 404,
                    );
                }
            }
        } else {
            $this->dispatch(
                'message',
                text: 'Something went wrong',
                type: 'error',
                status: 404,
            );
        }
    }

    public function removeCartItem(int $cartId)
    {
        $cartRemoveData = Cart::where('user_id', auth()->user()->id)->where('id', $cartId)->first();
        if ($cartRemoveData) {
            $cartRemoveData->delete();
            $this->dispatch('CartAddedUpdated');
            $this->dispatch(
                'message',
                text: 'Cart Item Removed Succesfully',
                type: 'success',
                status: 200,
            );
        } else {
            $this->dispatch(
                'message',
                text: 'Something Went Wrong',
                type: 'error',
                status: 500,
            );
        }
    }



    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show', [
            'cart' => $this->cart
        ]);
    }
}




// {

//     public function updateQuantity(int $cardId, int $amount)
//     {
//         $cartData = Cart::where('id', $cardId)->where('user_id', auth()->user()->id)->first();

//         if (!$cartData) {
//             $this->dispatchMessage('Something went wrong', 'error', 404);
//             return;
//         }

//         $productQuantity = $cartData->productColor ? $cartData->productColor->quantity : $cartData->product->quantity;

//         if ($productQuantity >= $cartData->quantity + $amount) {
//             $cartData->increment('quantity', $amount);
//             $this->dispatchMessage('Quantity updated', 'success', 200);
//         } else {
//             $this->dispatchMessage("Quantity {$productQuantity} not available", 'error', 422);
//         }
//     }

//     public function incrementQuantity(int $cardId)
//     {
//         $this->updateQuantity($cardId, 1);
//     }

//     public function decrementQuantity(int $cardId)
//     {
//         $cartData = Cart::where('id', $cardId)->where('user_id', auth()->user()->id)->first();

//         if (!$cartData) {
//             $this->dispatchMessage('Something went wrong', 'error', 404);
//             return;
//         }

//         if ($cartData->quantity > 1) {
//             $cartData->decrement('quantity');
//             $this->dispatchMessage('Quantity updated', 'success', 200);
//         } else {
//             $this->dispatchMessage('Quantity cannot be less than 1', 'error', 422);
//         }
//     }


//     public function removeCartItem(int $cartId)
//     {
//         Cart::where('user_id', auth()->user()->id)->where('id', $cartId)->delete();
//         $this->dispatch('CartAddedUpdated');
//         $this->dispatchMessage('Cart item removed successfully', 'success', 200);
//     }

//     public function render()
//     {
//         $cart = Cart::where('user_id', auth()->user()->id)->get();
//         return view('livewire.frontend.cart.cart-show', [
//             'cart' => $cart
//         ]);
//     }

//     private function dispatchMessage($text, $type, $status)
//     {
//         $this->dispatch('message',
//             text: $text,
//             type: $type,
//             status: $status
//         );
//     }
// }
