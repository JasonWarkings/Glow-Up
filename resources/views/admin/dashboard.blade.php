<!doctype html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Glow-Up Панель управления</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <meta name="title" content="Glow-Up Панель управления" />
    <meta name="author" content="ColorlibHQ" />
    <meta
        name="description"
        content="Glow-Up Панель управления, 30 примеров страниц с использованием Vanilla JS. Полностью доступно согласно WCAG 2.1 AA."
    />
    <meta
        name="keywords"
        content="bootstrap 5, bootstrap, панель управления, dashboard, графики, календарь, таблицы, datatable, vanilla js datatable, ColorlibHQ, админ панель, доступная админка"
    />
    <link rel="preload" href="{{ asset('assets/css/adminlte.css') }}" as="style" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        crossorigin="anonymous"
        media="print"
        onload="this.media='all'"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
        crossorigin="anonymous"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.css') }}" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
        crossorigin="anonymous"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
        crossorigin="anonymous"
    />
</head>
<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
<div class="app-wrapper">
    <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                        <i class="bi bi-list"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                
                
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img
                            src="{{ asset('assets/img/user2-160x160.jpg') }}"
                            class="user-image rounded-circle shadow"
                            alt="Пользователь"
                        />
                        <span class="d-none d-md-inline">Glow-Up Админ</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                        <li class="user-header text-bg-primary">
                            <img
                                src="{{ asset('assets/img/user2-160x160.jpg') }}"
                                class="rounded-circle shadow"
                                alt="Пользователь"
                            />
                            <p>
                                Glow-Up Админ - Веб-разработчик
                                <small>Участник с нояб. 2023</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <a href="#" class="btn btn-default btn-flat">Профиль</a>
                            <a href="#" class="btn btn-default btn-flat float-end">Выйти</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <div class="sidebar-brand">
            <a href="#" class="brand-link">
                <img
                    src="{{ asset('assets/img/AdminLTELogo.png') }}"
                    alt="Glow-Up Logo"
                    class="brand-image opacity-75 shadow"
                />
                <span class="brand-text fw-light">Glow-Up</span>
            </a>
        </div>
        <div class="sidebar-wrapper">
            <nav class="mt-2">
                <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation">
                    <li class="nav-header">МЕНЮ</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-circle-fill"></i>
                            <p>Уровень 1</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6"><h3 class="mb-0">Панель управления</h3></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Панель управления</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <!-- Контент здесь -->
            </div>
        </div>
    </main>

    <footer class="app-footer">
        <strong>
            &copy; 2014-2025&nbsp;
            <a href="https://adminlte.io" class="text-decoration-none">Glow-Up</a>.
        </strong>
        Все права защищены.
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>

<script src="{{ asset('assets/js/adminlte.js') }}"></script>

<script>
    const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
    const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
    };
    document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined) {
            OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                scrollbars: {
                    theme: Default.scrollbarTheme,
                    autoHide: Default.scrollbarAutoHide,
                    clickScroll: Default.scrollbarClickScroll,
                },
            });
        }
    });
</script>
</body>
</html>
