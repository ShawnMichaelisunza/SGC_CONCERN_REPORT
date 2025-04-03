@extends('layout.app')


@section('content')
    @include('layout.success')
    <div class="flex h-screen bg-gray-100">
        @include('navbar.navbar')

        <div class="flex flex-col flex-1 overflow-y-auto">

            {{-- button and search bar --}}
            <div class="flex items-center justify-between h-16 bg-white border-b border-gray-200 py-4">
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
                    <form action="{{ route('dashboard') }}" method="get" class="flex">
                        @csrf
                        <input class="mx-2 w-full border rounded-md px-4 py-2" type="text" name="search_name"
                            placeholder="Search Name">
                        <button type="submit"
                            class=" border border-red-700 px-3 py-2 rounded text-white bg-red-700">SEARCH</button>
                    </form>
                </div>
                <div>
                    <a href="{{ route('employee_create') }}"
                        class="py-2 px-4 mx-4 bg-red-700 text-white border border-red-700 rounded">CREATE NEW
                        REPORT</a>
                </div>
            </div>

            <div class="px-4 py-8">
                <!-- User Table -->
                <div class="overflow-x-auto bg-white rounded-lg shadow">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-red-700 text-white uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Date</th>
                                <th class="py-3 px-6 text-left">Emp No</th>
                                <th class="py-3 px-6 text-left">Name</th>
                                <th class="py-3 px-6 text-left">Department</th>
                                <th class="py-3 px-6 text-left">Status</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="text-gray-600 text-sm">
                            @foreach ($employees as $employee)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left">
                                        {{ Carbon\Carbon::parse($employee->created_at)->format('M d, Y') }}</td>
                                    <td class="py-3 px-6 text-left">{{ $employee->emp_no }}</td>
                                    <td class="py-3 px-6 text-left">{{ $employee->name }}</td>
                                    <td class="py-3 px-6 text-left">{{ $employee->dept }}</td>
                                    <td class="py-3 px-6 text-left">
                                        @if ($employee->status == 'PENDING')
                                            <span class="text-blue-500">{{ $employee->status }}</span>
                                        @elseif ($employee->status == 'COMPLETED')
                                            <span class="text-green-500">{{ $employee->status }}</span>
                                        @else
                                            <span class="text-red-500">{{ $employee->status }}</span>
                                        @endif
                                    </td>

                                    @if ($employee->status == 'DISAPPROVED')
                                        {{-- no display --}}
                                    @else
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex item-center justify-center">

                                                @if ($employee->status == 'COMPLETED')
                                                    <a href="{{ route('maintenance.view', encrypt($employee->id)) }}"
                                                        target="__blank"
                                                        class="w-4 mr-4 transform hover:text-green-500 text-lg hover:scale-110">
                                                        <i class="fa-solid fa-street-view"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('employee_view', encrypt($employee->id)) }}"
                                                        hx-get="{{ route('employee_view', encrypt($employee->id)) }}"
                                                        hx-swap="outerHTML"
                                                        class="w-4 mr-4 transform hover:text-blue-500 text-lg hover:scale-110">
                                                        <i class="fa-solid fa-street-view"></i>
                                                    </a>

                                                    <a href="{{ route('employee_edit', encrypt($employee->id)) }}"
                                                        class="w-4 mr-4 transform hover:text-yellow-500 text-lg hover:scale-110">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>

                                                    <a href="{{ route('employee_viewDelete', encrypt($employee->id)) }}"
                                                        hx-get="{{ route('employee_viewDelete', encrypt($employee->id)) }}"
                                                        hx-swap="outerHTML"
                                                        class="w-4 mr-4 transform hover:text-red-500 text-lg hover:scale-110">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                @endif
                                            </div>
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-5">
                    {{ $employees->appends(request()->toArray())->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
