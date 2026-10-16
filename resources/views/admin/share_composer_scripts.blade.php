<script>
    const copyShareButton = document.getElementById('copyShareLink');
    if (copyShareButton) {
        copyShareButton.addEventListener('click', function () {
            const shareLink = document.getElementById('generatedShareLink');
            shareLink.select();
            shareLink.setSelectionRange(0, 99999);
            document.execCommand('copy');
            alert('Link copied to clipboard!');
        });
    }
</script>