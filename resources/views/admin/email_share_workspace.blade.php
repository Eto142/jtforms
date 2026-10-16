@include('admin.header')
@include('admin.navbar')

<div class="page-header">
    <div>
        <nav class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="separator">/</span>
            <span class="current">Create {{ $providerLabel }} Share</span>
        </nav>
        <h1 class="page-title">Create {{ $providerLabel }} Share</h1>
        <p class="page-subtitle">Generate an email share draft from an image and writeup</p>
    </div>
</div>

@include('admin.share_composer_styles')

<div class="share-flex-container">
    <div class="share-form-col">
        @include('admin.share_composer_form', [
            'platform' => 'Email',
            'storeRoute' => route('admin.email.share.store'),
            'selectedMailProvider' => $selectedMailProvider,
        ])
    </div>

    @if (isset($shareUrl, $actionUrl))
        <div class="share-result-col">
            @include('admin.share_result', [
                'platform' => 'Email',
                'actionLabel' => 'Open ' . $providerLabel . ' draft',
            ])
        </div>
    @endif

    @if (isset($history) && $history->count())
        <div class="share-history-col">
            @include('admin.share_history', ['history' => $history])
        </div>
    @endif
</div>

@include('admin.share_composer_scripts')
@include('admin.footer')