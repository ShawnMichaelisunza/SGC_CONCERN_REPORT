<div class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center">

    <!-- hoverlay  -->
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <!-- Add modal content here -->
        <div class="modal-content py-4 text-left px-6">
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold uppercase">{{ $report->name }}</p>
            </div>
            <div class="flex justify-end">
                <p class="text-sm text-red-400 font-medium">Date : <span class="text-gray-800 text-sm">{{ Carbon\Carbon::parse($report->created_at)->format('M d, Y') }}</span></p>
            </div>
            <div class="mt-6">
                <p class="text-sm text-red-400 font-medium">Department : <span class="text-gray-800 text-sm">{{ $report->dept}}</span></p>
            </div>
            <div class="flex justify-between mt-6">
                <p class="text-sm text-red-400 font-medium">Classification :<br><span class="text-gray-800 text-sm uppercase">{{ $report->classification }}</span></p>
                <p class="text-sm text-red-400 font-medium">Urgency of Request :<br><span class="text-gray-800 text-sm">{{ $report->urgent }}</span></p>
            </div>
            <br>
            <div>
                <p class="text-sm text-red-400 font-medium">Reason: <br><span class="text-gray-800 text-sm">{{ $report->reason }}</span></p>
            </div>

            <div class="mt-5 flex justify-end">
                <a href="" class="modal-close px-4 border border-gray-500 bg-red-100 p-3 rounded-lg text-black hover:bg-red-500 hover:text-white">Back</a>
                {{-- <button class="px-4 hover:bg-red-500 bg-red-300 p-3 ml-3 rounded-lg text-black hover:text-white">Send To Email</button> --}}
            </div>
        </div>
    </div>

</div>

