@extends('layout.app')

@section('content')
    <div class="flex justify-center items-center h-full p-10 ">
        <div class="grid md:grid-cols-2 grid-cols-1  border rounded-3xl">
            <div class="">
                <img src="{{ asset('assets/image/register_image.jpg') }}" class="rounded-3xl h-full" alt="">
            </div>
            <div class="flex justify-center items-center p-5">

                <form action="{{ route('user_create') }}" method="post">
                    @csrf
                    <h1 class="text-center mb-2 text-red-700 font-bold text-5xl">Request Report System</h1>
                    <h1 class="text-center mb-10 font-bold text-4xl">SIGN UP</h1>


                    <label for="" class="text-sm text-red-800">Company name</label>
                    <select name="company_name" id=""
                        class=" bg-gray-100 border border-black outline-none rounded-md py-2 w-full px-4">
                        <option value="" selected>select</option>
                        <option value="Head Office">Head Office</option>
                        <option value="Redhotel Cubao">Redhotel Cubao</option>
                        <option value="Hotel99 Cubao">Hotel99 Cubao</option>
                        <option value="Platinum Hotel Pasay">Platinum Hotel Pasay</option>
                    </select>
                    @error('company_name')
                        <span class="text-xs text-red-600">* {{ $message }}</span>
                    @enderror
                    <br>
                    <br>


                    <label for="" class="text-sm text-red-800">Department</label>
                    <select name="dept" class=" bg-gray-100 border border-black outline-none rounded-md py-2 w-full px-4"
                        id="">
                        <option value="" selected>select</option>
                        <option value="ADMIN DEPARTMENT">ADMIN DEPARTMENT</option>
                        <option value="IT DEPARTMENT">IT DEPARTMENT</option>
                        <option value="FRONT DESK DEPARTMENT">FRONT DESK DEPARTMENT</option>
                        <option value="HOUSE KEEPING DEPARTMENT">HOUSE KEEPING DEPARTMENT</option>
                        <option value="FNB DEPARTMENT">FNB DEPARTMENT</option>
                    </select>
                    @error('dept')
                        <span class="text-xs text-red-600">* {{ $message }}</span>
                    @enderror
                    <br>
                    <br>
                    <label for="" class="text-sm text-red-800">Employee No</label>
                    <input type="text" class=" bg-gray-100 border border-black outline-none rounded-md py-2 w-full px-4"
                        placeholder="2*21" name="emp_no">
                    @error('emp_no')
                        <span class="text-xs text-red-600">* {{ $message }}</span>
                    @enderror
                    <br>
                    <br>

                    <label for="" class="text-sm text-red-800">Fullname <span>( last name /first name /middle name
                            )</span></label>
                    <input type="text" class=" bg-gray-100 border border-black outline-none rounded-md py-2 w-full px-4"
                        placeholder="Fullname" name="name">
                    @error('name')
                        <span class="text-xs text-red-600">* {{ $message }}</span>
                    @enderror
                    <br>
                    <br>
                    <label for="" class="text-sm text-red-800">Email</label>
                    <input type="email" class=" bg-gray-100 border border-black outline-none rounded-md py-2 w-full px-4"
                        placeholder="Email" name="email">
                    @error('email')
                        <span class="text-xs text-red-600">* {{ $message }}</span>
                    @enderror
                    <br>
                    <br>
                    <label for="" class="text-sm text-red-800">Password</label>
                    <input type="password"
                        class=" bg-gray-100 border border-black outline-none rounded-md py-2 w-full px-4 "
                        placeholder="Password" name="password">
                    @error('password')
                        <span class="text-xs text-red-600">* {{ $message }}</span>
                    @enderror
                    <br>
                    <br>
                    <label for="" class="text-sm text-red-800">Confirm Password</label>
                    <input type="password"
                        class=" bg-gray-100 border border-black outline-none rounded-md py-2 w-full px-4 "
                        placeholder="Confirm Password" name="password_confirmation">
                    <br>
                    <br>

                    <button type="submit"
                        class=" bg-red-700 hover:bg-red-500 border outline-none rounded-md py-3 w-full px-4 font-semibold text-white ">Sign
                        Up</button>
                </form>

            </div>
        </div>
    </div>
@endsection
