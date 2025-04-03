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
                    <a href="{{ route('dashboard') }}" class="py-2 px-4 mx-4 bg-red-700 text-white border border-red-700 rounded">BACK</a>
                </div>
            </div>

            <div class="px-4 py-4">

                <div class="bg-white border-4 rounded-lg shadow relative m-6">

                    <div class="flex items-start justify-between p-5 border-b rounded-t">
                        <h3 class="text-xl font-semibold">
                            UPDATE REPORT
                        </h3>
                    </div>

                    <div class="p-6 space-y-6">
                        <form action="{{ route('report_update', encrypt($report->id)) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label class="text-sm font-medium text-gray-900 block mb-2">Department</label>
                                    <select name="dept"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5"
                                        id="">
                                        <option value="" selected>select</option>
                                        <option value="ADMIN DEPARTMENT" {{ $report->dept == 'ADMIN DEPARTMENT' ? 'selected' : '' }}>ADMIN DEPARTMENT</option>
                                        <option value="IT DEPARTMENT" {{ $report->dept == 'IT DEPARTMENT' ? 'selected' : '' }}>IT DEPARTMENT</option>
                                        <option value="FRONT DESK DEPARTMENT" {{ $report->dept == 'FRONT DESK DEPARTMENT' ? 'selected' : '' }}>FRONT DESK DEPARTMENT</option>
                                        <option value="HOUSE KEEPING DEPARTMENT" {{ $report->dept == 'HOUSE KEEPING DEPARTMENT' ? 'selected' : '' }}>HOUSE KEEPING DEPARTMENT</option>
                                        <option value="FNB DEPARTMENT" {{ $report->dept == 'FNB DEPARTMENT' ? 'selected' : '' }}>FNB DEPARTMENT</option>
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
                                        <option value="Head Office" {{ $report->company_name == 'Head Office' ? 'selected' : '' }}>Head Office</option>
                                        <option value="Redhotel Cubao" {{ $report->company_name == 'Redhotel Cubao' ? 'selected' : '' }}>Redhotel Cubao</option>
                                        <option value="Hotel99 Cubao" {{ $report->company_name == 'Hotel99 Cubao' ? 'selected' : '' }}>Hotel99 Cubao</option>
                                        <option value="Platinum Hotel Pasay" {{ $report->company_name == 'Platinum Hotel Pasay' ? 'selected' : '' }}>Platinum Hotel Pasay</option>
                                    </select>
                                    @error('company_name')
                                        <span class="text-xs text-red-600">* {{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- value name and emp_no --}}
                                    <input type="number" name="emp_no" value="{{ $report->emp_no }}" hidden>
                                    <input type="text" name="name" value="{{ $report->name }}" hidden>
                                {{-- end --}}

                                <div class="col-span-6 sm:col-span-3">
                                    <label class="text-sm font-medium text-gray-900 block mb-2">Classification: (Check
                                        one)</label>
                                    <select name="classification"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5">
                                        <option value="" selected>select</option>
                                        <option value="Minor Repair / Project" {{ $report->classification == 'Minor Repair / Project' ? 'selected' : '' }}>Minor Repair / Project</option>
                                        <option value="Major Repair / Project" {{ $report->classification == 'Major Repair / Project' ? 'selected' : '' }}>Major Repair / Project</option>
                                    </select>
                                    @error('classification')
                                    <span class="text-xs text-red-700">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label class="text-sm font-medium text-gray-900 block mb-2">Urgency of Request: (Check
                                        one)</label>
                                    <select name="urgent"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5"
                                        id="">
                                        <option value="" selected>select</option>
                                        <option value="Emergency" {{ $report->urgent == 'Emergency' ? 'selected' : '' }}>Emergency</option>
                                        <option value="High Priority" {{ $report->urgent == 'High Priority' ? 'selected' : '' }}>High Priority</option>
                                        <option value="Standard Priority" {{ $report->urgent == 'Standard Priority' ? 'selected' : '' }}>Standard Priority</option>
                                    </select>
                                    @error('urgent')
                                    <span class="text-xs text-red-700">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-span-full">
                                    <label class="text-sm font-medium text-gray-900 block mb-2">Description of
                                        Request</label>
                                    <textarea name="reason" rows="6"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-4"
                                        placeholder="Details">{{ $report->reason }}</textarea>
                                        @error('reason')
                                        <span class="text-xs text-red-700">* {{ $message }}</span>
                                        @enderror
                                </div>
                            </div>

                            <div class="py-6  border-t border-gray-200 rounded-b">
                                <button
                                    class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                    type="submit">Update</button>
                            </div>

                    </div>

                    </form>
                </div>

            </div>
        </div>


    </div>
@endsection
