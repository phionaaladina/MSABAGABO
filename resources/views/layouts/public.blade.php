@php
    $media = static function (?string $path): ?string {
        if (blank($path)) {
            return null;
        }
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://') || str_starts_with($path, '/')) {
            return $path;
        }
        return asset('storage/' . ltrim($path, '/'));
    };
    $site = \App\Models\SiteSetting::first();
    $phones = $site?->phones ?? [];
    $emails = $site?->emails ?? [];
    $socials = $site?->socials ?? [];
    $tollFree = data_get(collect($phones)->firstWhere('label', 'Toll Free'), 'number', '0800 2562 60');
    $generalEmail = $emails[0]['email'] ?? 'info@msabagabo.go.ug';
@endphp
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Makindye Ssabagabo Municipal Council')</title>
    <meta name="description" content="@yield('description', 'Official website of Makindye Ssabagabo Municipal Council.')">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>
<body>
    @include('layouts.partials.navbar')
    <main class="site-main">@yield('content')</main>
    @include('layouts.partials.footer')
    <a href="https://wa.me/{{ preg_replace('/\D+/', '', $site?->whatsapp_number ?? '256772653980') }}" target="_blank" rel="noreferrer" class="hc-whatsapp" aria-label="Chat with us on WhatsApp">
        <span aria-hidden="true">◔</span>
    </a>
    <script>
        (() => {
            const toggle = document.querySelector('.hc-mobile-toggle');
            const nav = document.querySelector('.hc-nav-links');
            toggle?.addEventListener('click', () => {
                const open = nav.classList.toggle('open');
                toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            });
            document.querySelectorAll('.hc-drop-toggle').forEach((button) => {
                button.addEventListener('click', () => {
                    const item = button.closest('.hc-dropdown');
                    const open = item.classList.toggle('open');
                    button.setAttribute('aria-expanded', open ? 'true' : 'false');
                });
            });
            const header = document.querySelector('.hc-navbar');
            window.addEventListener('scroll', () => header?.classList.toggle('hc-navbar--scrolled', window.scrollY > 8), { passive: true });
        })();
    </script>
    @stack('scripts')
</body>
</html>
