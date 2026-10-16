<style>
    .share-flex-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
        gap: 32px;
        margin: 0 auto 40px;
        max-width: 1200px;
        width: 100%;
    }
    .share-form-col, .share-result-col, .share-history-col {
        min-width: 0;
        width: 100%;
    }
    .admin-card {
        border-radius: 12px;
        box-shadow: 0 2px 12px rgba(24,119,242,0.08);
        margin-bottom: 24px;
    }
    .admin-card-header { padding: 1.1rem 1.2rem; }
    .admin-card-body { padding: 1.2rem; }
    .form-group { margin-bottom: 18px; }
    .form-label { font-weight: 600; margin-bottom: 6px; }
    .form-input {
        width: 100%;
        padding: 10px;
        border: 1px solid #e4e6eb;
        border-radius: 6px;
        font-size: 1rem;
        margin-bottom: 6px;
    }
    .btn-admin { border-radius: 6px; font-size: 1rem; padding: 10px 18px; }
    .w-100 { width: 100%; }
    .admin-table { width: 100%; border-collapse: collapse; font-size: 0.97rem; }
    .admin-table th, .admin-table td {
        padding: 8px 6px;
        text-align: left;
        border-bottom: 1px solid #eee;
    }
    .admin-table th { background: #f5f6fa; font-weight: 600; }
    .admin-table img { max-width: 60px; height: 40px; object-fit: cover; border-radius: 4px; }
    .share-result-link { overflow-wrap: anywhere; }
    @media (max-width: 900px) {
        .share-flex-container { grid-template-columns: 1fr; }
        .admin-card { margin-bottom: 18px; }
    }
    @media (max-width: 600px) {
        .admin-card-header, .admin-card-body { padding: 0.7rem 0.5rem; }
        .form-input { font-size: 0.95rem; }
        .admin-table th, .admin-table td { padding: 6px 3px; font-size: 0.92rem; }
        .admin-table img { max-width: 40px; height: 28px; }
    }
</style>