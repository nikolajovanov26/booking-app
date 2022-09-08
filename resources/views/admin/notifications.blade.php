@extends('layouts.auth')

@section('content')
    <div class="flex flex-col w-full space-y-8">
        <div class="py-4 px-6 bg-blue-200 rounded shadow hover:shadow-xl transition ">
            <h2 class="font-bold text-3xl mb-3">Notification Title</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus ad adipisci aspernatur
                consequuntur cumque debitis delectus dicta dignissimos ducimus eligendi enim et hic laboriosam laborum,
                magni mollitia obcaecati odio odit qui quibusdam quis quos recusandae rem repellat reprehenderit sequi
                tempora ullam voluptas voluptatum? A aperiam asperiores assumenda commodi distinctio ea eligendi, error
                expedita facilis ipsam natus necessitatibus, omnis quaerat recusandae veniam voluptates voluptatibus. Et
                impedit incidunt minima natus nemo. Dolorum ex explicabo placeat, possimus reiciendis tenetur! Aperiam
                assumenda id ipsam quam? Ab alias aliquam amet assumenda aut beatae cumque deserunt dignissimos eaque
                eius enim, est eum hic illo illum ipsa ipsum, iste labore libero minus molestias nemo numquam odit
                placeat, provident quas quasi quisquam reiciendis sapiente soluta tempore temporibus voluptatibus
                voluptatum. Ab architecto dolores dolorum id, incidunt labore perferendis perspiciatis quibusdam rerum
                tempore ullam vel voluptate, voluptatum. Ab accusamus autem enim, et, eveniet impedit ipsam maxime
                nesciunt nostrum quisquam reiciendis repellat tempora tenetur unde veritatis!</p>
            <div class="flex justify-between items-baseline mt-4">
                <div class="flex items-center space-x-8">
                    <a href="{{ route('properties.show') }}" class="text-blue-600 hover:text-blue-800 transition hover:underline">View Property</a>
                    <a href="{{ route('properties.show') }}" class="text-blue-600 hover:text-blue-800 transition hover:underline">View Reports</a>
                </div>
                <button class="py-2 px-4 border-2 rounded border-blue-600 hover:border-blue-900 bg-blue-600 hover:bg-blue-900 text-white font-semibold text-lg">Mark as read</button>
            </div>
        </div>
        <div class="py-4 px-6 bg-white rounded shadow hover:shadow-xl transition ">
            <h2 class="font-bold text-3xl mb-3">Notification Title</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus ad adipisci aspernatur
                consequuntur cumque debitis delectus dicta dignissimos ducimus eligendi enim et hic laboriosam laborum,
                magni mollitia obcaecati odio odit qui quibusdam quis quos recusandae rem repellat reprehenderit sequi
                tempora ullam voluptas voluptatum? A aperiam asperiores assumenda commodi distinctio ea eligendi, error
                expedita facilis ipsam natus necessitatibus, omnis quaerat recusandae veniam voluptates voluptatibus. Et
                impedit incidunt minima natus nemo. Dolorum ex explicabo placeat, possimus reiciendis tenetur! Aperiam
                assumenda id ipsam quam? Ab alias aliquam amet assumenda aut beatae cumque deserunt dignissimos eaque
                eius enim, est eum hic illo illum ipsa ipsum, iste labore libero minus molestias nemo numquam odit
                placeat, provident quas quasi quisquam reiciendis sapiente soluta tempore temporibus voluptatibus
                voluptatum. Ab architecto dolores dolorum id, incidunt labore perferendis perspiciatis quibusdam rerum
                tempore ullam vel voluptate, voluptatum. Ab accusamus autem enim, et, eveniet impedit ipsam maxime
                nesciunt nostrum quisquam reiciendis repellat tempora tenetur unde veritatis!</p>
            <div class="flex justify-between items-baseline mt-4">
                <div class="flex items-center space-x-8">
                    <a href="{{ route('properties.show') }}" class="text-blue-600 hover:text-blue-800 transition hover:underline">View Property</a>
                    <a href="{{ route('properties.show') }}" class="text-blue-600 hover:text-blue-800 transition hover:underline">View Reports</a>
                </div>
                <button class="py-2 px-4 border-2 rounded border-blue-600 hover:bg-blue-100 text-blue-600 font-semibold text-lg">Mark as unread</button>
            </div>
        </div>
    </div>
@endsection
