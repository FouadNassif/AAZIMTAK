<x-sidebar>
    <button id="toggleBtn" onclick="toggleSidebar()" class="toggle-btn">☰</button>
    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li>
        <button onclick="toggleDropdown('weddingDropdown')">Weddings</button>
        <ul id="weddingDropdown" class="dropdown">
            <li><a href="/admin/weddingList">Wedding List</a></li>
            <li><a href="/admin/addWedding">Add Wedding</a></li>
        </ul>
    </li>
    <li>
        <button onclick="toggleDropdown('guestsDropdown')">Guests</button>
        <ul id="guestsDropdown" class="dropdown">
            <li><a href="/admin/allGuests">All Guests</a></li>
            <li><a href="/admin/addGuest">Add Guests</a></li>
        </ul>
    </li>
    <li><a href="#rsvp">RSVP</a></li>
    <li><a href="#settings">Settings</a></li>
</x-sidebar>
