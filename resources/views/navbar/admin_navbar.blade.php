<!-- Mobile menu toggle button -->
<input type="checkbox" id="menu-toggle" class="hidden peer">

<!-- Sidebar -->
<div class="hidden peer-checked:flex md:flex flex-col w-64 bg-red-800 transition-all duration-300 ease-in-out">
    <div class="flex items-center justify-between h-16 bg-white px-4">

        <img src="{{ asset('assets/image/logo_3.jpg') }}" alt="" class="h-10 w-10 mr-2">
        <a href="{{ route('user.profile', encrypt(auth()->user()->id) ) }}" class="text-gray-800 font-semibold uppercase mx-auto">{{ auth()->user()->name }}</a>

        <label for="menu-toggle" class="text-red-800 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:hidden" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </label>
        <!-- <span class="text-white font-bold uppercase">Sidebar</span> -->
    </div>
    <div class="flex flex-col flex-1 overflow-y-auto">
        <nav class="flex-1 px-2 py-4 bg-gray-100">
            <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-gray-800 hover:bg-red-700 hover:text-gray-100 group">
                <i class="fa-solid fa-list h-7 w-7 mr-2 pt-2"></i>
                DASHBOARD
            </a>

            <a href="{{ route('report_pending') }}"
                class="flex items-center px-4 py-2 text-gray-800 hover:bg-red-700 hover:text-gray-100 group">
                <i class="fa-solid fa-spinner  h-7 w-7 mr-2 pt-2"></i>
                PENDING REPORT
            </a>

            <a href="{{ route('report_processed') }}"
                class="flex items-center px-4 py-2 text-gray-800 hover:bg-red-700 hover:text-gray-100 group">
                <i class="fa-solid fa-stopwatch h-7 w-7 mr-2 pt-2"></i>
                PROCESSING REPORT
            </a>

            <a href="{{ route('report_completed') }}"
                class="flex items-center px-4 py-2 text-gray-800 hover:bg-red-700 hover:text-gray-100 group">
                <i class="fa-solid fa-star  h-7 w-7 mr-2 pt-2"></i>
                COMPLETED REPORT
            </a>

            <a href="{{ route('report_disapproved') }}"
                class="flex items-center px-4 py-2 text-gray-800 hover:bg-red-700 hover:text-gray-100 group">
                <i class="fa-solid fa-ban h-7 w-7 mr-2 pt-2"></i>
                CANCELED REPORT
            </a>
            @if (auth()->user()->usertype == 'superAdmin')
                <a href="{{ route('user.index') }}"
                    class="flex items-center px-4 py-2 text-gray-800 hover:bg-red-700 hover:text-gray-100 group">
                    <i class="fa-solid fa-users h-7 w-7 mr-2 pt-2"></i>
                    USER DASHBOARD
                </a>

                <a href="{{ route('user.deleted') }}"
                    class="flex items-center px-4 py-2 text-gray-800 hover:bg-red-700 hover:text-gray-100 group">
                    <i class="fa-solid fa-user-slash h-7 w-7 mr-2 pt-2"></i>
                    DELETED USER ACCOUNT
                </a>
            @endif

            <a href="{{ route('logout') }}"
                class="flex items-center px-4 py-2 my-8 text-gray-800 hover:bg-red-700 hover:text-gray-100 group">
                <i class="fa-solid fa-right-from-bracket h-7 w-7 mr-2 pt-2"></i>
                LOGOUT
            </a>

        </nav>
    </div>
</div>



<script src="https://cdn.tailwindcss.com"></script>
