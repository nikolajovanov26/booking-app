@if (Route::has($route) && Route::current()->getName() == ($route))
    <a href="{{ route($route) }}"
       class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">{{ $label }}</a>
@elseif(Route::has($route))
    <a href="{{ route($route) }}"
       class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">{{ $label }}</a>
@else
    <a href="#"
       class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">{{ $label }}</a>
@endif
