<?php

namespace App\Http\Livewire;

use App\Models\Work;
use Livewire\Component;

class AddComment extends Component
{
    public $comment;

    public $workId;

    public function addComment()
    {
        Work::find($this->workId)->comments()->create([
            'text' => $this->comment,
            'user_id' => 1,
        ]);

        $this->comment = "";
    }
    public function render()
    {
        return view('livewire.add-comment');
    }
}
