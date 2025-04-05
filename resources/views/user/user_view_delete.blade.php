<div class="fixed inset-0 z-40 min-h-full overflow-y-auto overflow-x-hidden transition flex items-center">
    <!-- overlay -->
    <div aria-hidden="true" class="fixed inset-0 w-full h-full bg-black/50 cursor-pointer">
    </div>

    <!-- Modal -->
    <div class="relative w-full cursor-pointer pointer-events-none transition my-auto p-4">
        <div
            class="w-full py-2 bg-white cursor-default pointer-events-auto dark:bg-gray-800 relative rounded-xl mx-auto max-w-sm">

            <a href="" class="absolute top-2 right-2 rtl:right-auto rtl:left-2">
                <i class="fa-solid fa-xmark h-6 w-6 cursor-pointer text-gray-400"></i>
                <span class="sr-only">
                    Close
                </span>
            </a>



            <div class="space-y-2 p-2">
                <div class="p-4 space-y-2 text-center dark:text-white">
                    <h2 class="text-xl font-bold tracking-tight" id="page-action.heading">
                        {{ $user->name }}
                    </h2>

                    <p class="text-gray-500">
                        Are you sure you would like to delete this?
                    </p>
                </div>
            </div>

            <div class="space-y-2">
                <div aria-hidden="true" class="border-t dark:border-gray-700 px-2"></div>

                <div class="px-6 py-2">
                    <div class="grid gap-1 grid-cols-[repeat(auto-fit,minmax(0,1fr))]">
                        <form action="{{ route('user.delete', encrypt($user->id)) }}" method="POST">
                            @csrf
                            @method('delete')

                            <button type="submit" class="border border-red-300 bg-red-200 hover:bg-red-500 hover:text-white text-gray-700 py-2 px-8 rounded-md">
                                Confirm
                            </button>
                        </form>
                        <a href="" class="border border-gray-300 hover:bg-gray-500 hover:text-white bg-gray-200 text-gray-700 py-2 px-6 rounded-md">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>
