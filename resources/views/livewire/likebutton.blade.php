<div>
    <div wire:click="like"  style="cursor: pointer;">
        @if($liked)
            <img width="28" height="28" src="https://img.icons8.com/color/48/000000/like.png" alt="liked"/>
        @else
            <img width="30" height="30" src="https://img.icons8.com/ios/50/like--v1.png" alt="like"/>
        @endif
        <span>{{ $likesCount }}</span>
    </div>
</div>
