<?php

use Livewire\Component;

use App\Models\BlogReaction;

new class extends Component {

    public $blog;
    public $likes = 0;
    public $dislikes = 0;
    public $userReaction = null;

    //constructor
    public function mount($blog)
    {
        $this->blog = $blog;
        $this->likes = $blog->likes_count;
        $this->dislikes = $blog->dislikes_count;
        $this->currentUserReaction();
    }

    public function currentUserReaction()
    {

        $reaction = BlogReaction::where('user_id', auth()->id())->where('blog_id', $this->blog->id)->first();
        $this->userReaction = $reaction ? $reaction->type : null;
    }


    public function react($type)
    {

        if (!auth()->check()) {
            return;
        }

        $reaction = BlogReaction::where('user_id', auth()->id())
            ->where('blog_id', $this->blog->id)
            ->first();

        // same reaction clicked again
        if ($reaction && $reaction->type === $type) {

            $reaction->delete();

            $this->updateCounts($type, 'remove');

            $this->userReaction = null;

            return;
        }

        // switching reaction
        if ($reaction) {

            $oldType = $reaction->type;

            $reaction->update([
                'type' => $type
            ]);

            $this->updateCounts($oldType, 'remove');

            $this->updateCounts($type, 'add');
        } else {

            // creating first reaction
            BlogReaction::create([
                'user_id' => auth()->id(),
                'blog_id' => $this->blog->id,
                'type' => $type
            ]);

            $this->updateCounts($type, 'add');
        }

        $this->userReaction = $type;

    }



    public function updateCounts($type, $action)
    {
        if ($type === 'like') {

            $action === 'add' ? $this->likes++ : $this->likes--;

        } else {

            $action === 'add' ? $this->dislikes++ : $this->dislikes--;
        }
    }


};
?>
<div class="flex items-center gap-4 mt-4">

    {{-- Like Button --}}
    @auth
        <button
            wire:click="react('like')"
            class="btn btn-sm {{ $userReaction === 'like' ? 'btn-info' : 'btn-outline' }}"
        >
            👍 {{ $likes }}
        </button>
    @else
        <div class="text-sm">
            👍 {{ $likes }}
        </div>
    @endauth


    {{-- Dislike Button --}}
    @auth
        <button
            wire:click="react('dislike')"
            class="btn btn-sm {{ $userReaction === 'dislike' ? 'btn-info' : 'btn-outline' }}"
        >
            👎 {{ $dislikes }}
        </button>
    @else
        <div class="text-sm">
            👎 {{ $dislikes }}
        </div>
    @endauth

</div>