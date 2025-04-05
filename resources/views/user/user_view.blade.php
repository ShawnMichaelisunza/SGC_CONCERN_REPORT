<div class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center">

    <!-- hoverlay  -->
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <!-- Add modal content here -->
        <div class="modal-content py-4 text-left px-6">
            <div class=" pb-3">
                <p class="text-2xl font-bold uppercase">{{ $user->name }}</p>
                <p class="text-xs font-bold text-red-500">{{ $user->email }}</p>
            </div>
            <div class="flex justify-between mt-2">
                <p class="text-sm text-red-400 font-medium">Company name <br><span class="text-gray-800 text-sm">{{ $user->company_name}}</span></p>
                <p class="text-sm text-red-400 font-medium text-right">Department <br><span class="text-gray-800 text-sm">{{ $user->dept}}</span></p>
            </div>
            <div class="flex justify-between mt-6">
                <p class="text-sm text-red-400 font-medium">Employee No<br><span class="text-gray-800 text-sm uppercase">{{ $user->emp_no}}</span></p>
                <p class="text-sm text-red-400 font-medium text-right">User Type<br><span class="text-gray-800 text-sm">{{ $user->usertype }}</span></p>
            </div>
            <br>

            <div class="mt-5 flex justify-end">
                <a href="" class="modal-close px-4 border border-gray-500 bg-red-100 p-3 rounded-lg text-black hover:bg-red-500 hover:text-white">Back</a>
                {{-- <button class="px-4 hover:bg-red-500 bg-red-300 p-3 ml-3 rounded-lg text-black hover:text-white">Send To Email</button> --}}
            </div>
        </div>
    </div>

</div>

