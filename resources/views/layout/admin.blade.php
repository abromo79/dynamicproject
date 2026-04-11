<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Admin Panel' }} - Kijana Hub Africa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --kh-primary: #41e081;
            --kh-accent: #d8dc5a;
            --kh-dark: #1a4d2e;
            --kh-light: #e8f5e8;
            --sidebar-width: 280px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--kh-light);
            overflow-x: hidden;
        }
        
        /* Sidebar Styles */
        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(135deg, var(--kh-dark) 0%, #0d3d1f 100%);
            color: white;
            z-index: 1000;
            transition: transform 0.3s ease;
            overflow-y: auto;
        }
        
        .sidebar-header {
            padding: 25px 20px;
            background: rgba(0, 0, 0, 0.2);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .sidebar-logo img {
            width: 40px;
            height: 40px;
            border-radius: 8px;
        }
        
        .sidebar-logo h4 {
            margin: 0;
            font-size: 1.2rem;
            font-weight: 600;
        }
        
        .sidebar-menu {
            padding: 20px 0;
        }
        
        .menu-section {
            margin-bottom: 25px;
        }
        
        .menu-title {
            padding: 0 20px;
            margin-bottom: 10px;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255, 255, 255, 0.6);
            font-weight: 600;
        }
        
        .menu-item {
            display: block;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
            position: relative;
        }
        
        .menu-item:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-left-color: var(--kh-accent);
        }
        
        .menu-item.active {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            border-left-color: var(--kh-primary);
        }
        
        .menu-item i {
            width: 20px;
            margin-right: 12px;
            text-align: center;
        }
        
        .menu-badge {
            background: var(--kh-primary);
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.7rem;
            margin-left: auto;
        }
        
        /* Top Navigation */
        .admin-navbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-width);
            right: 0;
            height: 70px;
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 999;
            display: flex;
            align-items: center;
            padding: 0 30px;
            transition: left 0.3s ease;
        }
        
        .navbar-left {
            display: flex;
            align-items: center;
            gap: 20px;
            flex: 1;
        }
        
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--kh-dark);
            cursor: pointer;
        }
        
        .search-box {
            position: relative;
            max-width: 400px;
            flex: 1;
        }
        
        .search-box input {
            width: 100%;
            padding: 10px 40px 10px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 25px;
            outline: none;
            transition: all 0.3s ease;
        }
        
        .search-box input:focus {
            border-color: var(--kh-primary);
            box-shadow: 0 0 0 0.2rem rgba(65, 224, 129, 0.25);
        }
        
        .search-box i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }
        
        .navbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .nav-item {
            position: relative;
        }
        
        .nav-btn {
            background: none;
            border: none;
            padding: 8px;
            border-radius: 8px;
            color: var(--kh-dark);
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .nav-btn:hover {
            background: var(--kh-light);
            color: var(--kh-primary);
        }
        
        .notification-badge {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 8px;
            height: 8px;
            background: #ff4757;
            border-radius: 50%;
            border: 2px solid white;
        }
        
        .user-menu {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 12px;
            border-radius: 25px;
            background: var(--kh-light);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .user-menu:hover {
            background: #d4edd4;
        }
        
        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--kh-primary), var(--kh-accent));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }
        
        .user-info {
            display: flex;
            flex-direction: column;
        }
        
        .user-name {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--kh-dark);
            line-height: 1;
        }
        
        .user-role {
            font-size: 0.75rem;
            color: #666;
            line-height: 1;
        }
        
        /* Main Content */
        .admin-main {
            margin-left: var(--sidebar-width);
            padding: 100px 30px 30px;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }
        
        /* Dropdown Styles */
        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 10px;
        }
        
        .dropdown-item {
            padding: 10px 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .dropdown-item:hover {
            background: var(--kh-light);
            color: var(--kh-primary);
        }
        
        .dropdown-divider {
            margin: 10px 0;
            border-color: #e0e0e0;
        }
        
        /* Theme Toggle */
        .theme-toggle {
            background: none;
            border: none;
            padding: 8px;
            border-radius: 8px;
            color: var(--kh-dark);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .theme-toggle:hover {
            background: var(--kh-light);
            color: var(--kh-primary);
        }
        
        /* Dark Theme */
        body.dark-theme {
            --kh-light: #1a1a1a;
            background: #0a0a0a;
        }
        
        body.dark-theme .admin-navbar {
            background: #1a1a1a;
            color: white;
        }
        
        body.dark-theme .search-box input {
            background: #2a2a2a;
            border-color: #3a3a3a;
            color: white;
        }
        
        body.dark-theme .user-menu {
            background: #2a2a2a;
        }
        
        body.dark-theme .user-name {
            color: white;
        }
        
        body.dark-theme .dropdown-menu {
            background: #2a2a2a;
            color: white;
        }
        
        body.dark-theme .dropdown-item:hover {
            background: #3a3a3a;
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }
            
            .admin-sidebar.show {
                transform: translateX(0);
            }
            
            .admin-navbar {
                left: 0;
            }
            
            .admin-main {
                margin-left: 0;
            }
            
            .menu-toggle {
                display: block;
            }
            
            .search-box {
                display: none;
            }
            
            .user-info {
                display: none;
            }
        }
        
        /* Alert Styles */
        .alert {
            border: none;
            border-radius: 12px;
            padding: 15px 20px;
            margin-bottom: 20px;
        }
        
        .alert-success {
            background: linear-gradient(135deg, #d4edd4, #e8f5e8);
            color: #1a4d2e;
            border-left: 4px solid var(--kh-primary);
        }
        
        .alert-danger {
            background: linear-gradient(135deg, #ffe0e0, #fff0f0);
            color: #d32f2f;
            border-left: 4px solid #ff4757;
        }
        
        .alert-warning {
            background: linear-gradient(135deg, #fff3cd, #fef9e7);
            color: #856404;
            border-left: 4px solid #ffc107;
        }
        
        /* Loading Spinner */
        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid var(--kh-primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Card Styles */
        .admin-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            border: none;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .admin-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--kh-light), white);
            border-bottom: 2px solid var(--kh-primary);
            padding: 20px;
        }
        
        .card-body {
            padding: 25px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <img src="{{ asset('assets/logo.png') }}" alt="Kijana Hub Africa">
                <h4>KIJANA HUB AFRICA</h4>
            </div>
        </div>
        
        <nav class="sidebar-menu">
            <div class="menu-section">
                <div class="menu-title">Main</div>
                <a href="{{ route('admin.dashboard') }}" class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
            </div>
            
            <div class="menu-section">
                <div class="menu-title">Content Management</div>
                <a href="{{ route('admin.module.index', 'programs') }}" class="menu-item {{ request()->routeIs('admin.module.index', 'programs') ? 'active' : '' }}">
                    <i class="fas fa-graduation-cap"></i>
                    Programs
                </a>
                <a href="{{ route('admin.module.index', 'opportunities') }}" class="menu-item {{ request()->routeIs('admin.module.index', 'opportunities') ? 'active' : '' }}">
                    <i class="fas fa-briefcase"></i>
                    Opportunities
                </a>
                <a href="{{ route('admin.module.index', 'events') }}" class="menu-item {{ request()->routeIs('admin.module.index', 'events') ? 'active' : '' }}">
                    <i class="fas fa-calendar"></i>
                    Events
                </a>
                <a href="{{ route('admin.module.index', 'blog') }}" class="menu-item {{ request()->routeIs('admin.module.index', 'blog') ? 'active' : '' }}">
                    <i class="fas fa-blog"></i>
                    Blog
                </a>
                <a href="{{ route('admin.module.index', 'innovations') }}" class="menu-item {{ request()->routeIs('admin.module.index', 'innovations') ? 'active' : '' }}">
                    <i class="fas fa-lightbulb"></i>
                    Innovations
                </a>
                <a href="{{ route('admin.module.index', 'success-stories') }}" class="menu-item {{ request()->routeIs('admin.module.index', 'success-stories') ? 'active' : '' }}">
                    <i class="fas fa-trophy"></i>
                    Success Stories
                </a>
            </div>
            
            <div class="menu-section">
                <div class="menu-title">Community</div>
                <a href="{{ route('admin.module.index', 'applications') }}" class="menu-item {{ request()->routeIs('admin.module.index', 'applications') ? 'active' : '' }}">
                    <i class="fas fa-user-plus"></i>
                    Applications
                    <span class="menu-badge">New</span>
                </a>
                <a href="{{ route('admin.module.index', 'partners') }}" class="menu-item {{ request()->routeIs('admin.module.index', 'partners') ? 'active' : '' }}">
                    <i class="fas fa-handshake"></i>
                    Partners
                </a>
                <a href="{{ route('admin.module.index', 'impact-stats') }}" class="menu-item {{ request()->routeIs('admin.module.index', 'impact-stats') ? 'active' : '' }}">
                    <i class="fas fa-chart-line"></i>
                    Impact Stats
                </a>
            </div>
            
            <div class="menu-section">
                <div class="menu-title">Communication</div>
                <a href="{{ route('admin.module.index', 'newsletter') }}" class="menu-item {{ request()->routeIs('admin.module.index', 'newsletter') ? 'active' : '' }}">
                    <i class="fas fa-envelope"></i>
                    Newsletter
                </a>
                <a href="{{ route('admin.module.index', 'contact-messages') }}" class="menu-item {{ request()->routeIs('admin.module.index', 'contact-messages') ? 'active' : '' }}">
                    <i class="fas fa-comments"></i>
                    Contact Messages
                    <span class="menu-badge">3</span>
                </a>
            </div>
            
            <div class="menu-section">
                <div class="menu-title">System</div>
                <a href="{{ route('admin.module.index', 'users') }}" class="menu-item {{ request()->routeIs('admin.module.index', 'users') ? 'active' : '' }}">
                    <i class="fas fa-users"></i>
                    Users
                </a>
                <a href="{{ route('admin.module.index', 'settings') }}" class="menu-item {{ request()->routeIs('admin.module.index', 'settings') ? 'active' : '' }}">
                    <i class="fas fa-cog"></i>
                    Settings
                </a>
            </div>
        </nav>
    </aside>
    
    <!-- Top Navigation -->
    <nav class="admin-navbar">
        <div class="navbar-left">
            <button class="menu-toggle" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>
            
            <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class="fas fa-search"></i>
            </div>
        </div>
        
        <div class="navbar-right">
            <!-- Language Switcher -->
            <div class="nav-item dropdown">
                <button class="nav-btn dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fas fa-globe"></i>
                    <span class="ms-1">EN</span>
                </button>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item" onclick="changeLanguage('en')">
                        <i class="fas fa-flag-usa me-2"></i>English
                    </a>
                    <a href="#" class="dropdown-item" onclick="changeLanguage('sw')">
                        <i class="fas fa-flag me-2"></i>Kiswahili
                    </a>
                </div>
            </div>
            
            <!-- Theme Toggle -->
            <button class="theme-toggle" onclick="toggleTheme()">
                <i class="fas fa-moon" id="themeIcon"></i>
            </button>
            
            <!-- Notifications -->
            <div class="nav-item dropdown">
                <button class="nav-btn dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="#" class="dropdown-item">
                        <strong>New Application</strong><br>
                        <small>John Doe applied for Web Development</small>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <strong>New Contact Message</strong><br>
                        <small>Sarah Johnson sent a message</small>
                    </a>
                </div>
            </div>
            
            <!-- User Menu -->
            <div class="nav-item dropdown">
                <div class="user-menu dropdown-toggle" data-bs-toggle="dropdown">
                    <div class="user-avatar">
                        {{ auth()->user()->name[0] ?? 'A' }}
                    </div>
                    <div class="user-info">
                        <span class="user-name">{{ auth()->user()->name ?? 'Admin User' }}</span>
                        <span class="user-role">Administrator</span>
                    </div>
                </div>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-user me-2"></i>Profile
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-cog me-2"></i>Settings
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Main Content -->
    <main class="admin-main">
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ session('error') }}
            </div>
        @endif
        
        @yield('content')
    </main>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle Sidebar
        function toggleSidebar() {
            const sidebar = document.getElementById('adminSidebar');
            sidebar.classList.toggle('show');
        }
        
        // Toggle Theme
        function toggleTheme() {
            const body = document.body;
            const themeIcon = document.getElementById('themeIcon');
            
            body.classList.toggle('dark-theme');
            
            if (body.classList.contains('dark-theme')) {
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
                localStorage.setItem('theme', 'dark');
            } else {
                themeIcon.classList.remove('fa-sun');
                themeIcon.classList.add('fa-moon');
                localStorage.setItem('theme', 'light');
            }
        }
        
        // Change Language
        function changeLanguage(lang) {
            // This would typically make an AJAX call to change the language
            console.log('Changing language to:', lang);
            // You can implement actual language switching logic here
        }
        
        // Load saved theme
        document.addEventListener('DOMContentLoaded', function() {
            const savedTheme = localStorage.getItem('theme');
            const themeIcon = document.getElementById('themeIcon');
            
            if (savedTheme === 'dark') {
                document.body.classList.add('dark-theme');
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
            }
        });
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('adminSidebar');
            const menuToggle = document.querySelector('.menu-toggle');
            
            if (window.innerWidth <= 768 && 
                !sidebar.contains(event.target) && 
                !menuToggle.contains(event.target) &&
                sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
            }
        });
    </script>
</body>
</html>
