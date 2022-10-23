<div class="relative w-full h-52 mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 p-4">
    <label class="text-sm text-blue-800 font-semibold absolute top-4 left-4">Property Gallery</label>
    <div class="space-y-1 text-center h-full flex flex-col items-center justify-center">
        <div class="flex text-sm text-gray-600">
            <label for="multi-file-upload"
                   class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                <span>Upload files</span>
                <input id="multi-file-upload" name="gallery_images[]" type="file" class="sr-only" multiple>
            </label>
            <p class="pl-1">or drag and drop</p>
        </div>
        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
        @error('gallery_images')
            <div class="text-red-600 text-sm">{{ $message }}</div>
        @enderror
    </div>
</div>
