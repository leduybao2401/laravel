<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Wishlist;

class WishlistShow extends Component
{
    public function removeWishlish(int $wishlistId)
    {
        Wishlist::where('user_id' ,auth()->user()->id)->where('id', $wishlistId)->delete();
        // session()->flash('message','Wishlist item removed Successfully');
        $this->emit('wishlistAddUpdate');
        $this->dispatchBrowserEvent('message', [
            'text' => 'Wishlist item removed Successfully',
            'type' => 'success',
            'status' => 200
        ]);
        return false;
    }
    public function render()
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show',[
            'wishlist' => $wishlist
    ]);
    }
}