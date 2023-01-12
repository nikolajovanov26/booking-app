<div class="relative w-full mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 p-4">
    <label class="text-sm text-blue-800 font-semibold absolute top-4 left-4">Main Image</label>
    <div class="space-y-1 text-center h-full flex flex-col items-center justify-center">
        @if(isset($property) && $property->main_photo)
            <img src="{{ Storage::disk('property_main_images')->url($property->main_photo) }}" class="h-32 mb-3">
        @else
            @include('icons.upload-photo')
        @endif
        <div class="flex text-sm text-gray-600">
            <label for="file-upload"
                   class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                <span>Upload a file</span>
                <input id="file-upload" name="main_photo" type="file" class="sr-only">
            </label>
            <p class="pl-1">or drag and drop</p>
        </div>
        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
        @error('main_photo')
            <div class="text-red-600 text-sm">{{ $message }}</div>
        @enderror
    </div>
</div>
