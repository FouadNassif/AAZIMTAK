<div id="sidebar" class="sidebar fixed w-64 h-full transition-all duration-300">
    <h1><a class="text-center flex items-center" href='/'><img src="{{ asset('assets/img/Alogo.png') }}"
                class="w-10">AAZIMTAK</a></h1>
    <ul>
        {{ $slot }}
    </ul>
</div>
<link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}">
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggleBtn');
        const content = document.getElementById('content');

        sidebar.classList.toggle('closed');
        toggleBtn.classList.toggle('closed');
        content.classList.toggle('collapsed');

    }

    function toggleDropdown(id) {
        document.getElementById(id).classList.toggle('hidden');
    }
</script>
