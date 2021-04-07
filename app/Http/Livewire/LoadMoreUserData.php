<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class LoadMoreUserData extends Component
{
    public $limitPerPage = 10;

    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    public function loadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 6;
    }

    public function render()
    {
        $users = User::latest()->paginate($this->limitPerPage);
//        $this->emit('userStore');

        return view('livewire.load-more-user-data', ['users' => $users]);
    }
}
