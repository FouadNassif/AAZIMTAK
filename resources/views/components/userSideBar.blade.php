<x-sidebar>
    <button id="toggleBtn" onclick="toggleSidebar()" class="toggle-btn">☰</button>
    <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
    <li>
        <button onclick="toggleDropdown('guestDropdown')">Guests</button>
        <ul id="guestDropdown" class="hidden">
            <li><a href="{{ route('user.dashboard.allGuests') }}">Guests List</a></li>
            <li><a href="{{ route('user.dashboard.addGuest') }}">Add Guest</a></li>
        </ul>
    </li>

    <li>
        <button onclick="toggleDropdown('weddingDropdown')">Wedding</button>
        <ul id="weddingDropdown" class="hidden">
            <li><a href="{{ route('user.wedding.edit') }}">Edit Wedding</a></li>
            <li><a href="{{ route('user.wedding') }}">Show Wedding</a></li>
        </ul>
    </li>

    <li>
        <button onclick="toggleDropdown('Account')">Account</button>
        <ul id="Account" class="hidden">
            <li><a href="{{ route('user.account.settings') }}">Settings</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
        </ul>
    </li>
</x-sidebar>
