@extends('layouts.auth')

@section('content')
    <div class="flex flex-col h-full space-y-10">
        <div class="flex justify-end">
            <div>
                <button
                    class="bg-blue-600 hover:bg-blue-900 transition py-4 px-6 text-white font-semibold text-lg rounded-xl">Add
                    User
                </button>
            </div>

        </div>
        <div class="bg-white shadow-xl rounded-xl overflow-hidden">
            <div>
                <table class="text-left w-full">
                    <thead class="bg-gray-800 text-white text-lg">
                    <tr>
                        <th class="w-1/12 px-6 py-6">#</th>
                        <th class="w-3/12 px-6 py-6">Full Name</th>
                        <th class="w-3/12 px-6 py-6">E-Mail</th>
                        <th class="w-3/12 px-6 py-6">Role</th>
                        <th class="w-2/12 px-6 py-6"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr class="hover:bg-gray-100 transition">
                            <td class="px-6 py-4">{{ $user->id }}</td>
                            <td class="px-6 py-4 capitalize">{{ $user->profile->fullName() }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4">{{ $user->role->label }}</td>
                            <td class="flex items-center justify-end px-6 py-4 text-right space-x-4">
                                <button class="bg-blue-600 text-white rounded px-3 py-2 hover:bg-blue-800 transition">Edit</button>
                                <button class="bg-red-700 text-white rounded px-3 py-2">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
