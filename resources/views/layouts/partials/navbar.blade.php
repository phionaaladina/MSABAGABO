<header class="hc-navbar">
    <div class="hc-utility-bar">
        <div class="hc-utility-inner">
            <span class="hc-utility-flag"><img src="{{ asset('flag.jpg') }}" alt="Flag of Uganda" width="20" height="14"></span>
            <span class="hc-utility-right">
                <a href="tel:{{ preg_replace('/\s+/', '', $tollFree) }}" class="hc-utility-item">☎ {{ $tollFree }} (Toll Free)</a>
                <a href="mailto:{{ $generalEmail }}" class="hc-utility-item">✉ {{ $generalEmail }}</a>
                <a href="{{ route('contact') }}" class="hc-utility-item hc-utility-item--accent">Report an Issue</a>
            </span>
        </div>
    </div>
    <div class="hc-nav-inner">
        <div class="hc-brand">
            <a href="{{ route('home') }}" class="hc-logo-link">
                <img src="{{ asset('logo.png') }}" alt="Makindye Ssabagabo Municipal Council logo" width="104" height="112">
                <span class="hc-brand-text"><strong>Makindye Ssabagabo</strong><small>Municipal Council</small></span>
            </a>
        </div>
        <button class="hc-mobile-toggle" aria-label="Toggle navigation" aria-expanded="false"><span class="hc-hamburger"></span></button>
        <nav class="hc-nav-links">
            <ul>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('divisions') }}">Divisions</a></li>
                <li class="hc-dropdown columns"><button class="hc-drop-toggle" aria-expanded="false">Departments</button>
                    <ul class="hc-dropdown-menu">
                        @foreach([
                            'administration' => 'Administration',
                            'community-based-services' => 'Community Based Services',
                            'statutory-bodies' => 'Statutory Bodies',
                            'education' => 'Education',
                            'finance-accounting' => 'Finance & Accounting',
                            'works-engineering' => 'Works and Engineering',
                            'health' => 'Health',
                            'natural-resources' => 'Natural Resources',
                            'production-marketing' => 'Production & Marketing',
                            'trade-industry-led' => 'Trade, Industry & LED',
                            'internal-audit' => 'Internal Audit',
                        ] as $slug => $label)
                            <li><a href="{{ route('departments.show', $slug) }}">{{ $label }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ route('programs') }}">Programs</a></li>
                <li class="hc-dropdown"><button class="hc-drop-toggle" aria-expanded="false">Opportunities</button>
                    <ul class="hc-dropdown-menu"><li><a href="{{ route('jobs') }}">Jobs, Internships & Trainees</a></li><li><a href="{{ route('library') }}">E-Library</a></li></ul>
                </li>
                <li class="hc-dropdown hc-dropdown--end"><button class="hc-drop-toggle" aria-expanded="false">News & Events</button>
                    <ul class="hc-dropdown-menu"><li><a href="{{ route('news') }}">News</a></li><li><a href="{{ route('gallery') }}">Gallery</a></li></ul>
                </li>
                <li><a href="{{ route('contact') }}" class="hc-nav-cta">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>
