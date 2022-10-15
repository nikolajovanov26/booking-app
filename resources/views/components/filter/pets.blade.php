<div class="flex space-y-3 items-center h-full">
    <div class="flex">
        <div class="flex items-center h-5">
            <input type="checkbox"
                   @checked(request()->has('pets') || old('pets'))
                   value="allow-pets" name="pets"
                   class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 focus:ring-2">
        </div>
        <div class="ml-2 text-sm">
            <label class="font-medium text-gray-900">Pets allowed?</label>
        </div>
    </div>
</div>
@error('pets')
    <div class="text-red-600 text-sm">{{ $message }}</div>
@enderror



