<header class="flex items-center justify-between lg:justify-end p-3 lg:p-5 border-b bg-white">
    <!-- Left Section: Menu Icon -->
    <div class="lg:hidden">
        <button class="p-2 rounded focus:outline-none" id="mobileMenuButton">
            <img src="{{ asset('images/menu_icon.svg') }}" alt="Menu">
        </button>
    </div>

    <!-- Right Section: Notification + User Dropdown -->
    <div class="flex items-center gap-4">
    <!-- Notification Icon -->
    <button class="p-2 rounded focus:outline-none" id="notificationButton">
        <svg class="h-8 w-8 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 
                00-9.33-4.906M9 17H4l1.405-1.405A2.032 2.032 0 006 14.158V11c0-1.657 
                1.343-3 3-3 .34 0 .674.055.987.157" />
        </svg>
    </button>

    <!-- User Avatar and Dropdown -->
    <div class="relative group">
        <button class="flex items-center gap-2 focus:outline-none">
            <!-- Avatar -->
            <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-gray-200">
                <img src="{{ asset('images/site-logo.png') }}" alt="User Avatar" class="w-full h-full object-contain">
            </div>
            <!-- Username -->
            <span class="text-gray-700 hidden sm:inline">John Doe</span>
            <!-- Dropdown Arrow -->
            <svg class="h-4 w-4 text-gray-500 group-hover:text-gray-700 transition" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10
                10.586l3.293-3.293a1 1 0 111.414
                1.414l-4 4a1 1 0 01-1.414
                0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
        </button>

        <!-- Dropdown Menu -->
        <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg hidden z-50">
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Settings</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 border-t">Logout</a>
        </div>
    </div>
    </div>
</header>
