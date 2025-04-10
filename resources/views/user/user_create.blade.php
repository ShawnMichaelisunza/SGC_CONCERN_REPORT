@extends('layout.app')

@section('content')
    <div class="flex h-screen bg-gray-100">
        @include('navbar.admin_navbar')


        <!-- Main content -->
        <div class="flex flex-col flex-1 overflow-y-auto">

            {{-- button and search bar --}}
            <div class="flex items-center justify-between h-16 bg-white border-b border-gray-200">
                <div class="flex items-center px-4 ">
                    <label for="menu-toggle"
                        class="md:hidden mr-4 bg-red-800 text-white p-2 rounded focus:outline-none cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24"
                            stroke="white">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </label>

                    <i class="fa-solid fa-house h-7 w-7 mt-4 mb-2"></i>

                </div>
                <div>
                    <a href="{{ route('dashboard') }}"
                        class="py-2 px-4 mx-4 bg-red-700 text-white border border-red-700 rounded">BACK</a>
                </div>
            </div>

            <div class="px-4 py-4">

                <div class="bg-white border-4 rounded-lg shadow relative m-6">

                    <div class="flex items-start justify-between p-5 border-b rounded-t">
                        <h3 class="text-xl font-semibold">
                            CREATE A NEW ACCOUNT
                        </h3>
                    </div>

                    <div class="p-6 space-y-6">
                        <form action="{{ route('user.storeUser') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label class="text-sm font-medium text-gray-900 block mb-2">Department</label>
                                    <select name="dept"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5"
                                        id="">
                                        <option value="" selected>select</option>
                                        <option value="ADMIN DEPARTMENT">ADMIN DEPARTMENT</option>
                                        <option value="IT DEPARTMENT">IT DEPARTMENT</option>
                                        <option value="FRONT DESK DEPARTMENT">FRONT DESK DEPARTMENT</option>
                                        <option value="HOUSE KEEPING DEPARTMENT">HOUSE KEEPING DEPARTMENT</option>
                                        <option value="FNB DEPARTMENT">FNB DEPARTMENT</option>
                                    </select>
                                    @error('dept')
                                        <span class="text-xs text-red-700">* {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="" class="text-sm font-medium text-gray-900 block mb-2">Company
                                        name</label>
                                    <select name="company_name" id=""
                                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5">
                                        <option value="" selected>select</option>
                                        <option value="Head Office">Head Office</option>
                                        <option value="Redhotel Cubao">Redhotel Cubao</option>
                                        <option value="Hotel99 Cubao">Hotel99 Cubao</option>
                                        <option value="Platinum Hotel Pasay">Platinum Hotel Pasay</option>
                                    </select>
                                    @error('company_name')
                                        <span class="text-xs text-red-600">* {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for=""class="text-sm font-medium text-gray-900 block mb-2">User type</label>
                                    <select name="usertype" id=""
                                        class=" bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5">
                                        <option value="" selected>select</option>
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                        <option value="headAdmin">Head Admin</option>
                                        <option value="superAdmin">Super Admin</option>
                                    </select>
                                    @error('usertype')
                                        <span class="text-xs text-red-600">* {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="" class="text-sm font-medium text-gray-900 block mb-2">Employee No</label>
                                    <input type="number" class=" bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5"
                                        placeholder="2*21" name="emp_no">
                                    @error('emp_no')
                                        <span class="text-xs text-red-600">* {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="" class="text-sm font-medium text-gray-900 block mb-2">Fullname <span class="text-red-500 text-xs">( last name /first name /middle name )</span></label>
                                    <input type="text" class=" bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5"
                                        placeholder="JUAN DELA CRUZ" name="name">
                                    @error('name')
                                        <span class="text-xs text-red-600">* {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="" class="text-sm font-medium text-gray-900 block mb-2">Email</label>
                                    <input type="email" class=" bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5"
                                        placeholder="example@gmail.com" name="email">
                                    @error('email')
                                        <span class="text-xs text-red-600">* {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="" class="text-sm font-medium text-gray-900 block mb-2">Password</label>
                                    <input type="password" class=" bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5"
                                        placeholder="******" name="password">
                                    @error('password')
                                        <span class="text-xs text-red-600">* {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="" class="text-sm font-medium text-gray-900 block mb-2">Confirm Password</label>
                                    <input type="password" class=" bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5"
                                        placeholder="******" name="password_confirmation">
                                </div>
                            </div>

                            <div class="py-6 mt-7 border-t border-gray-200 rounded-b">
                                <button
                                    class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                    type="submit">Create Account</button>
                            </div>

                    </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
