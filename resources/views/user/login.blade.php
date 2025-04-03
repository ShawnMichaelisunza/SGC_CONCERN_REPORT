@extends('layout.app')

@section('content')
    <div class="flex justify-center items-center h-screen p-10 ">
        <div class="grid md:grid-cols-2 grid-cols-1  border rounded-3xl">
            <div class="flex justify-center items-center p-5">

                @include('layout.success')

                <form action="{{ route('user_store') }}" method="POST">
                    @csrf
                    <h1 class="text-center mb-2 text-red-700 font-bold text-5xl">Maintenance</h1>
                    <h1 class="text-center mb-10 font-bold text-4xl">SIGN IN</h1>

                    <label for="" class="text-lg text-red-800">Email</label>
                    <input type="email" name="email"
                        class=" bg-gray-100 border border-black outline-none rounded-md py-3 w-full px-4 mb-2"
                        placeholder="Email">
                    @error('email')
                        <span class="text-xs text-red-600 mb-2 ">* {{ $message }}</span>
                        <br>
                    @enderror

                    <label for="" class="text-lg text-red-800">Password</label>
                    <input type="password" name="password"
                        class=" bg-gray-100 border border-black outline-none rounded-md py-3 w-full px-4 mb-2"
                        placeholder="Password">
                    @error('password')
                        <span class="text-xs text-red-600 mb-2 ">* {{ $message }}</span>
                    @enderror

                    <button type="submit"
                        class=" bg-red-700 hover:bg-red-500 border outline-none rounded-md py-3 w-full px-4 font-semibold text-white mt-5">Sign
                        In</button>
                </form>
            </div>
            <div class="">
                <img src="{{ asset('assets/image/register_image.jpg') }}" class="rounded-3xl" alt="">
            </div>
        </div>
    </div>
@endsection
