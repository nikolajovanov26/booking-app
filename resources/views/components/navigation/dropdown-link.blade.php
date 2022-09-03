@if (Route::has($route) && Route::current()->getName() == ($route))
    <a href="{{ route($route) }}" class="block px-4 py-2 text-sm text-gray-700 bg-gray-100 hover:bg-gray-200"
       role="menuitem" tabindex="-1" id="user-menu-item-0">{{ $label }}</a>
@elseif(Route::has($route))
    <a href="{{ route($route) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200"
       role="menuitem" tabindex="-1" id="user-menu-item-0">{{ $label }}</a>
@else
    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200"
       role="menuitem" tabindex="-1" id="user-menu-item-0">{{ $label }}</a>
@endif
