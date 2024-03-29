<?php

namespace App\Livewire\Frontend\Wishlist;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistCount extends Component
{
    public $wishlistCount;

    public $listener = ['wishlistAddedUpdated' => 'WishlistCount'];

    public function WishlistCount()
    {
        if(Auth::check()){

            return $this->wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
        }
        else{
            return $this->wishlistCount = 0;
        }
    }
    public function render()
    {
        $this->wishlistCount = $this->WishlistCount();
        return view('livewire.frontend.wishlist.wishlist-count', [
            'wishlistCount' => $this->wishlistCount
        ]);
    }
}
