@if (Route::has($route) && Route::current()->getName() == ($route))
    <a href="{{ route($route) }}" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium"
       aria-current="page">{{ $label }}</a>
@elseif(Route::has($route))
    <a href="{{ route($route) }}"
       class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">{{ $label }}</a>
@else
    <a href="#"
       class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">{{ $label }}</a>
@endif
