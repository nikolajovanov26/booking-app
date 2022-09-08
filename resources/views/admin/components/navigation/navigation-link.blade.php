@if (Route::has($route) && Route::current()->getName() == ($route))
    <a href="{{ route($route) }}"
       class="flex items-center space-x-3 text-white text-xl w-full py-2 px-3 rounded bg-white bg-opacity-30 border border-blue-grad-light/50">
        @include("icons." . $icon, ['attributes' => 'w-6 h-6'])
        <span>{{ $label }}</span>
    </a>
@elseif(Route::has($route))
    <a href="{{ route($route) }}"
       class="flex items-center space-x-3 text-white text-xl w-full py-2 px-3 rounded hover:bg-white border border-transparent hover:bg-opacity-20 transition">
        @include("icons." . $icon, ['attributes' => 'w-6 h-6'])
        <span>{{ $label }}</span>
    </a>
@else
    <a href="#"
       class="flex items-center space-x-3 text-white text-xl w-full py-2 px-3 rounded hover:bg-white border border-transparent hover:bg-opacity-20 transition">
        @include("icons." . $icon, ['attributes' => 'w-6 h-6'])
        <span>{{ $label }}</span>
    </a>
@endif
