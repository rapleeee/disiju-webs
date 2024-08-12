<!--========== HEADER ==========-->
<header class="header">
    <div class="header__container">
        <a href="#" class="header__logo"></a>
        <div class="header__toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
        <!-- <span id="currentDateTime" class="header__datetime"></span> -->
    </div>
</header>

<!--========== NAV ==========-->
<div class="nav" id="navbar">
    <nav class="nav__container">
    <div>
                    <a href="#" class="nav__link nav__logo">
                        <i class='bx bxs-disc nav__icon' ></i>
                        <span class="nav__logo-name">Disiju Perkasa</span>
                    </a>

                    <div class="nav__list">
                        <div class="nav__items">
                            <h3 class="nav__subtitle">Profile</h3>

                            <a href="/home" class="nav__link">
                                <i class='bx bx-home nav__icon' ></i>
                                <span class="nav__name">Home</span>
                            </a>

                            <div class="nav__dropdown">
                                <a href="#" class="nav__link">
                                    <i class='bx bx-user nav__icon' ></i>
                                    <span class="nav__name">Profile</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="#" class="nav__dropdown-item">Visi & Misi</a>
                                        <a href="#" class="nav__dropdown-item">Tugas & Fungsi</a>
                                        <a href="#" class="nav__dropdown-item">Struktur Organisasi</a>
                                        <a href="/gedung" class="nav__dropdown-item">Gedung Event</a>
                                    </div>
                                </div>
                            </div>

                            <a href="/faq" class="nav__link">
                                <i class='bx bx-message-rounded nav__icon' ></i>
                                <span class="nav__name">Faq</span>
                            </a>
                        </div>

        <div>

            <div class="nav__list">
                <div class="nav__items">
                    <h3 class="nav__subtitle">Menu</h3>

                    @if (Auth::user()->role == 'admin')
                    <div class="nav__dropdown">
                        <a href="#" class="nav__link">
                            <i class='bx bx-bell nav__icon'></i>
                            <span class="nav__name">Admin</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>
                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="/admin/dashboard" class="nav__dropdown-item">Dashboard</a>
                                <a href="/admin/calendar" class="nav__dropdown-item"> Management Calendar Event</a>
                                <!-- Add more admin-specific links here -->
                            </div>
                        </div>
                    </div>
                    @endif

                    @if (Auth::user()->role == 'user')
                    <div class="nav__dropdown">
                        <a href="#" class="nav__link">
                            <i class='bx bx-bell nav__icon'></i>
                            <span class="nav__name">Pengguna</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>
                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="/user/calendar" class="nav__dropdown-item">Calendar Event</a>
                                <a href="/user/dashboard" class="nav__dropdown-item">Booking</a>
                                <a href="/user/bookings" class="nav__dropdown-item">Riwayat Booking</a>
                                <a href="/account" class="nav__dropdown-item">Account</a>
                                <!-- Add more user-specific links here -->
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a href="#" class="nav__link nav__logout"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class='bx bx-log-out nav__icon'></i>
            <span class="nav__name">Log Out</span>
        </a>
    </nav>
</div>
