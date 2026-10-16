<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title">
            <i class="bi bi-link-45deg"></i>
            {{ $platform }} Share Link
        </h3>
    </div>
    <div class="admin-card-body">
        <input type="text" id="generatedShareLink" class="form-input share-result-link" value="{{ $shareUrl }}" readonly aria-label="Generated share link">
        <a href="{{ $actionUrl }}" class="btn-admin btn-admin-primary" @if (in_array($platform, ['Email', 'X'], true)) target="_blank" rel="noopener" @endif>
            {{ $actionLabel ?? ($platform === 'Email' ? 'Open email draft' : 'Open X composer') }}
        </a>
        <button type="button" id="copyShareLink" class="btn-admin">Copy</button>
    </div>
</div>