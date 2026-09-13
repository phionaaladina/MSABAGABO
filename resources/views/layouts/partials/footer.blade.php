<footer class="hc-footer">
    <div class="hc-footer-inner">
        <div class="hc-footer-col hc-footer-brand">
            <a href="{{ route('home') }}" class="hc-footer-logo"><img src="{{ asset('logo.png') }}" alt="Municipal Council logo" width="64"></a>
            <p>Serving the people of Makindye Ssabagabo with transparent, accessible, and effective local government.</p>
        </div>
        <div class="hc-footer-col"><h4>Quick Links</h4><ul>
            @foreach(['About Us' => route('about'), 'Divisions' => route('divisions'), 'Departments' => route('departments.show', 'administration'), 'Programs' => route('programs'), 'News & Events' => route('gallery'), 'Jobs & Opportunities' => route('jobs'), 'Contact' => route('contact')] as $label => $href)
                <li><a href="{{ $href }}">{{ $label }}</a></li>
            @endforeach
        </ul></div>
        <div class="hc-footer-col"><h4>Resourceful Links</h4><ul>
            @foreach(['Wakiso District' => 'https://www.wakiso.go.ug/', 'Nansana Municipal Council' => 'https://www.nansana.go.ug', 'Kira Municipal Council' => 'https://www.kira.go.ug/', 'Ministry of Public Service' => 'https://www.publicservice.go.ug/', 'Ministry of Finance' => 'https://www.finance.go.ug/', 'Ministry of Local Government' => 'https://www.molg.go.ug/', 'MoICT&NG' => 'https://ict.go.ug/', 'Parliament' => 'https://www.parliament.go.ug/'] as $label => $href)
                <li><a href="{{ $href }}" target="_blank" rel="noreferrer">{{ $label }}</a></li>
            @endforeach
        </ul></div>
        <div class="hc-footer-col"><h4>Connect With Us</h4><ul class="hc-footer-contact">
            <li>⌖ <span>{{ explode("\n", $site?->address ?? 'Makindye Ssabagabo Municipal Council, P.O Box 1872, Kampala, Uganda')[0] }}</span></li>
            @foreach($phones as $phone)<li>☎ <span><a href="tel:{{ preg_replace('/\s+/', '', $phone['number'] ?? '') }}">{{ $phone['number'] ?? '' }}</a> ({{ $phone['label'] ?? 'Phone' }})</span></li>@endforeach
            <li>✉ <span><a href="mailto:{{ $generalEmail }}">{{ $generalEmail }}</a></span></li>
        </ul><div class="hc-footer-socials">
            @foreach($socials as $social)<a href="{{ $social['href'] ?? '#' }}" target="_blank" rel="noreferrer" aria-label="{{ $social['label'] ?? 'Social media' }}">●</a>@endforeach
        </div></div>
    </div>
    <div class="hc-footer-bottom"><p>&copy; {{ date('Y') }} Makindye Ssabagabo Municipal Council. All rights reserved.</p></div>
</footer>
