@php
    $hasEmailHistory = $history->contains('platform', 'email');
    $hasTwitterHistory = $history->contains('platform', 'twitter');
    $historyPlatform = $hasEmailHistory ? 'email' : ($hasTwitterHistory ? 'twitter' : null);
    $clearHistoryRoute = $historyPlatform === 'email'
        ? route('admin.email.share.history.destroy-all')
        : route('admin.twitter.share.history.destroy-all');
    $clearHistoryPrompt = $historyPlatform === 'email'
        ? 'Clear all email share history? This cannot be undone.'
        : 'Clear all X share history? This cannot be undone.';
@endphp

<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title">
            <i class="bi bi-clock-history"></i>
            Share History
        </h3>
        @if ($historyPlatform)
            <form method="POST" action="{{ $clearHistoryRoute }}" onsubmit="return confirm('{{ $clearHistoryPrompt }}');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-admin">Clear all</button>
            </form>
        @endif
    </div>
    <div class="admin-card-body">
        <div style="overflow-x:auto;">
            <table class="admin-table">
                <thead>
                    <tr>
                        @if ($hasEmailHistory)
                            <th>Provider</th>
                        @endif
                        <th>Image</th>
                        <th>Writeup</th>
                        <th>Link</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($history as $item)
                        @php
                            $historyLink = $item->platform === 'email'
                                ? route('email.share.show', ['token' => $item->token])
                                : route('x.share.show', ['token' => $item->token]);
                            $deleteHistoryRoute = $item->platform === 'email'
                                ? route('admin.email.share.history.destroy', ['id' => $item->id])
                                : route('admin.twitter.share.history.destroy', ['id' => $item->id]);
                            $deleteHistoryPrompt = $item->platform === 'email'
                                ? 'Delete this email share?'
                                : 'Delete this X share?';
                        @endphp
                        <tr>
                            @if ($hasEmailHistory)
                                <td>{{ $item->mail_provider ? ucfirst($item->mail_provider) : 'Not recorded' }}</td>
                            @endif
                            <td><img src="{{ asset($item->image) }}" alt="Share image"></td>
                            <td>{{ $item->writeup }}</td>
                            <td>
                                <button type="button" class="copy-history-link" data-copy-link="{{ $historyLink }}">Copy link</button>
                                @if ($item->platform === 'email' || $item->platform === 'twitter')
                                    <a href="{{ $historyLink }}" target="_blank" rel="noopener">Open</a>
                                @endif
                                <form method="POST" action="{{ $deleteHistoryRoute }}" onsubmit="return confirm('{{ $deleteHistoryPrompt }}');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-history-link">Delete</button>
                                </form>
                            </td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.copy-history-link').forEach(function (button) {
        button.addEventListener('click', async function () {
            const link = button.dataset.copyLink;

            try {
                await navigator.clipboard.writeText(link);
            } catch (error) {
                const input = document.createElement('textarea');
                input.value = link;
                input.style.position = 'fixed';
                input.style.opacity = '0';
                document.body.appendChild(input);
                input.select();
                document.execCommand('copy');
                input.remove();
            }

            const originalText = button.textContent;
            button.textContent = 'Copied';
            window.setTimeout(function () {
                button.textContent = originalText;
            }, 1500);
        });
    });
</script>