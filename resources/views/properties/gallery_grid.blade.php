<div class="grid grid-flow-row-dense grid-cols-5 gap-3">
    @foreach($property->images->take(15) as $image)
        <div class="aspect-square">
            <img src="{{ Storage::disk('property_gallery')->url($property->slug . DIRECTORY_SEPARATOR .$image->path) }}"
                 class="object-cover w-full h-full">
        </div>
    @endforeach
</div>
