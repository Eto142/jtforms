<div class="admin-card">
	<div class="admin-card-header">
		<h3 class="admin-card-title">
			<i class="bi bi-share-fill"></i>
			Create {{ $platform }} Share Post
		</h3>
	</div>
	<div class="admin-card-body">
		<form method="POST" action="{{ $storeRoute }}" enctype="multipart/form-data">
			@csrf
			@if ($platform === 'Email')
				<div class="form-group">
					<label for="mailProvider" class="form-label">Email provider</label>
					<select name="mail_provider" id="mailProvider" class="form-input" required>
						<option value="gmail" @selected(old('mail_provider', $selectedMailProvider ?? 'gmail') === 'gmail')>Gmail</option>
						<option value="outlook" @selected(old('mail_provider', $selectedMailProvider ?? 'gmail') === 'outlook')>Outlook</option>
						<option value="yahoo" @selected(old('mail_provider', $selectedMailProvider ?? 'gmail') === 'yahoo')>Yahoo</option>
					</select>
				</div>
			@endif
			<div class="form-group">
				<label for="imageInput" class="form-label">File</label>
				<input type="file" name="image" id="imageInput" class="form-input" accept="image/*" required>
			</div>
			<div class="form-group">
				<label for="writeupInput" class="form-label">Writeup</label>
				<textarea name="writeup" id="writeupInput" rows="4" class="form-input" required></textarea>
			</div>
			{{-- @if ($platform === 'Email')
				<div class="form-group">
					<label for="subjectInput" class="form-label">Subject</label>
					<input type="text" name="subject" id="subjectInput" class="form-input" value="Shared link" required>
				</div>
			@endif --}}
			<button type="submit" class="btn-admin btn-admin-primary w-100" style="margin-top: 8px;">
				<i class="bi bi-link-45deg"></i>
				Generate Link
			</button>
		</form>
	</div>
</div>
