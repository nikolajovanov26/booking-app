@extends('layouts.app')

@section('content')
    @include('components.header', ['label' => 'Favorite Properties'])
    <main>
        <div class="mx-auto max-w-screen-2xl py-8 sm:px-6 lg:px-8">
            @if($properties->count() > 0)
                <div class="space-y-6">
                    @foreach($properties as $property)
                        @include('components.properties.card', ['property' => $property])
                    @endforeach
                    {{ $properties->links() }}
                </div>
            @else
                <p class="text-center text-2xl mt-5">You have no favorite properties &#128148;</p>
            @endif

        </div>
    </main>
@endsection
