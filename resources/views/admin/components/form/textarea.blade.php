<div class="w-full flex flex-col justify-between border border-blue-grad-dark/25 focus-within:border-blue-grad-dark focus-within:shadow-xl hover:border-blue-grad-dark/75 hover:shadow-lg transition rounded flex flex-col px-3 pt-1.5 pb-2 space-y-1">
    <label class="text-sm text-blue-800 font-semibold">{{ $label }}</label>
    <input type="{{ $type ?? 'text' }}" value="" placeholder="{{ $placeholder }}" name="{{ $name }}"
           class="border-0 text-gray-800 px-0 py-0 border-b-2 border-transparent focus:ring-0 focus:border-b-2 focus:border-blue-grad-light">
</div>
