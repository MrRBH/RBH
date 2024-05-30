<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;

class Tagfield extends Component
{
    public $tags = '';

    public function createPosted($id)
    {
        $validatedData = $this->validate([
            'tags' => 'required',
        ]);

        $tagsArray = explode(',', $validatedData['tags']);
        $tags = [];

        foreach ($tagsArray as $tagName) {
            $tag = Tag::where('tags', '=', "#" . $tagName)->first();
            if ($tag) {
                $tags[] = $tag->id;
            } else {
                $newTag = Tag::create(['tags' => $tagName]);
                $tags[] = $newTag->id;
            }
        }

        Post::find($id)->tags()->attach($tags);
        $this->reset('tags');
    }

    public function render()
    {
        return view('livewire.tagfield');
    }
}
