@if (Route::has($route) && Route::current()->getName() == ($route))
    <a href="{{ route($route) }}"
       class="block rounded-md px-3 py-2 text-base font-medium text-white bg-gray-600">{{ $label }}</a>
@elseif(Route::has($route))
    <a href="{{ route($route) }}"
       class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">{{ $label }}</a>
@else
    <a href="#"
       class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">{{ $label }}</a>
@endif
