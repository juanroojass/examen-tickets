<div>
    <form wire:submit.prevent="save">
        @if($image)
            Preview:
            <div>
                @foreach($image as $im)
                    <img src="{{$img->temporaryUrl()}}" alt="">
                @endforeach
            </div>
        @endif
        <input type="file" wire:model="image" multiple>
        @error('image') 
            <span>$message</span>
        @enderror

        <button type="submit">Save photo</button>
    </form>
    <div>
        @foreach($image as $image)
            <img src="{{$image}}" alt="">
        @endforeach
    </div>
</div>
