@extends('layout.app')

@section('content')
    <div class="flex h-screen bg-gray-200">
        @include('navbar.admin_navbar')

        @include('layout.success')

        <!-- Main content -->
        <div class="flex flex-col flex-1 overflow-y-auto">

            {{-- button and search bar --}}
            <div class="flex items-center justify-between h-16 bg-gray-300 border-b border-gray-200 py-4">
                <div class="flex items-center px-4 ">
                    <label for="menu-toggle"
                        class="md:hidden mr-4 bg-red-800 text-white p-2 rounded focus:outline-none cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24"
                            stroke="white">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </label>

                    <i class="fa-solid fa-house h-7 w-7 mt-2"></i>
                    <form action="{{ route('user.index') }}" method="get" class="flex">
                        @csrf
                        <input class="mx-2 w-full border rounded-md px-4 py-2" type="text" name="search_name"
                            placeholder="Search Name">
                        <button type="submit"
                            class=" border border-red-700 px-3 py-2 rounded text-white bg-red-700">SEARCH</button>
                    </form>
                </div>
                <div>
                    <a href="{{ route('user.createUser') }}"
                        class="py-2 px-4 mx-4 bg-red-700 text-white border border-red-700 rounded">CREATE NEW
                        ACCOUNT</a>
                </div>
            </div>

            {{-- table --}}
            <div class="px-4 py-5">
                <!-- User Table -->
                <div class="overflow-x-auto bg-white rounded-lg shadow">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-700 text-white uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left font-semibold">ID</th>
                                <th class="py-3 px-6 text-left font-semibold">Emp No</th>
                                <th class="py-3 px-6 text-left font-semibold">Name</th>
                                <th class="py-3 px-6 text-left font-semibold">Department</th>
                                <th class="py-3 px-6 text-left font-semibold">Company name</th>
                                <th class="py-3 px-6 text-left font-semibold">User type</th>
                                <th class="py-3 px-6 text-center font-semibold">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="text-gray-600 text-sm">
                            @foreach ($users as $user)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left font-semibold ">{{ $user->id }}</td>
                                    <td class="py-3 px-6 text-left">{{ $user->emp_no }}</td>
                                    <td class="py-3 px-6 text-left">{{ $user->name }}</td>
                                    <td class="py-3 px-6 text-left">{{ $user->dept }}</td>
                                    <td class="py-3 px-6 text-left">{{ $user->company_name }}</td>

                                    <td class="py-3 px-6 text-left">{{ $user->usertype }}</td>
                                    @if ($user->usertype == 'DELETED')
                                        <td class="py-3 px-6 text-center">
                                            <a href="{{ route('user.viewRestore', encrypt($user->id)) }}"
                                                hx-get="{{ route('user.viewRestore', encrypt($user->id)) }}"
                                                hx-swap="outerHTML"
                                                class="w-4 mr-4 transform hover:text-green-500 text-lg hover:scale-110">
                                                <i class="fa-solid fa-trash-can-arrow-up"></i>
                                            </a>
                                        </td>
                                    @else
                                        <td class="py-3 px-6 text-right">
                                            <a href="{{ route('user.view', encrypt($user->id)) }}"
                                                hx-get="{{ route('user.view', encrypt($user->id)) }}" hx-swap="outerHTML"
                                                class="w-4 mr-4 transform hover:text-green-500 text-lg hover:scale-110">
                                                <i class="fa-solid fa-street-view"></i>
                                            </a>
                                            <a href="{{ route('user.edit', encrypt($user->id)) }}"
                                                class="w-4 mr-4 transform hover:text-yellow-500 text-lg hover:scale-110">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="{{ route('user.viewDelete', encrypt($user->id)) }}"
                                                hx-get="{{ route('user.viewDelete', encrypt($user->id)) }}"
                                                hx-swap="outerHTML"
                                                class="w-4 mr-4 transform hover:text-red-500 text-lg hover:scale-110">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                    @endif

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3 mx-5">
                    {{ $users->appends(request()->toArray())->links() }}
                </div>
            </div>
        @endsection
