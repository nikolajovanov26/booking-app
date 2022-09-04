<div class="space-x-1">
    {{ $label }}
    <div class="flex items-center space-x-4">
        <div class="relative mt-1 rounded h-3 w-full overflow-hidden bg-gray-200">
            <div class="absolute inset-0 bg-blue-600" style="width: {{ $progress*10 }}%"></div>
        </div>
        <span class="text-gray-600  text-sm">{{ number_format($progress, 1) }}</span>
    </div>
</div>
