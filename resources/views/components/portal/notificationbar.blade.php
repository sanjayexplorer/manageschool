<!-- Fixed Notification Sidebar -->
<div class="bg-white flex flex-col border-l">

    <!-- Header -->
    <div class="flex items-center justify-between border-b border-gray-200 px-3 py-[28px]">
        <h2 class="text-lg text-[#2464C5] font-semibold">Notifications</h2>
        <div class="flex items-center space-x-4">
            <span class="text-xs text-red-500 cursor-pointer transition-colors duration-300 hover:text-red-600">
                Clear All
            </span>
            <button class="text-gray-400 hover:text-red-500 transition duration-300" aria-label="Close" id="notificationClose">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <div class="h-screen overflow-y-scroll notification-scroll px-3 mt-5 pb-5">
    <!-- Scrollable Notification List -->
    <ul id="notification-list" class="space-y-3 pr-1 flex-1">
        @foreach($notifications as $notification)
            <li class="p-3 rounded-lg shadow-sm text-sm cursor-pointer transition-all duration-300 flex justify-between items-center
                {{ $notification->read_at ? 'bg-white text-gray-500' : 'bg-gray-100' }}
                hover:bg-blue-50">
                <span>
                    {{ $notification->data['message'] ?? 'New Notification' }}
                    <br>
                    <small class="text-xs text-gray-600">
                        {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
                    </small>
                </span>
            </li>
        @endforeach
    </ul>
</div>
</div>