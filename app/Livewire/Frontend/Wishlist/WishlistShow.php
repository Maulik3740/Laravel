<?php

namespace App\Livewire\Frontend\Wishlist;

use Livewire\Component;
use App\Models\Wishlist;

class WishlistShow extends Component
{
    public function removeWishlistItem(int $wishlistId){
        Wishlist::where('user_id',auth()->user()->id)->where('id',$wishlistId)->delete();

        $this->dispatch('wishlistAddedUpdated');
        // $this->dispatchBrowserEvent('wishlistAddedUpdated');
        $this->dispatch('message',
                text: 'Wishlist Item is Removed successfully',
                type: 'success',
                status : 200
            );
    }

    public function render()
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.wishlist.wishlist-show',[
            'wishlist' => $wishlist
        ]);
    }
}
