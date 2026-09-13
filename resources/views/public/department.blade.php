@extends('layouts.public')
@section('title', $department['title'] . ' | Makindye Ssabagabo Municipal Council')
@section('content')
<div class="about-page"><section class="about-hero {{ $slug }}-hero"><div class="about-hero__overlay"></div><div class="about-hero__content"><span class="about-hero__crumb">Home / Departments / {{ $department['title'] }}</span><h1>{{ $department['title'] }}</h1><p class="divisions-hero__tagline">{{ $department['tagline'] }}</p></div></section><div class="about-container">
<section class="about-block admin-section about-intro admin-intro"><div><span class="section-tag">Overview</span><h2>What We Do</h2><p>{{ $department['overview'] }}</p></div>@if($department['mandate'])<blockquote class="admin-mandate"><p>“{{ $department['mandate'] }}”</p><span>Departmental Mandate</span></blockquote>@endif</section>
<section class="about-block admin-section"><span class="section-tag">Duties &amp; responsibilities</span><h2>{{ $department['heading'] }}</h2><ul class="about-list">@foreach($department['items'] as $item)<li>{{ $item }}</li>@endforeach</ul></section>
</div></div>
@endsection
