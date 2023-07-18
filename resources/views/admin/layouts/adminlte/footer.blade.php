	<footer class="main-footer">
		<div class="float-right d-none d-sm-block">
			MADE WITH <i class="fas fa-heart text-danger"></i> BY <a href="https://lighthinkstudio.com">LIGHTHINK STUDIO</a>
		</div>
		&copy; {{ konfigurasi('tahun')->deskripsi ?? '2020' }} - {{ date('Y') }}. {{ konfigurasi('singkatan')->deskripsi }} LTS {{ konfigurasi('versi')->deskripsi ?? 'v.1.0.0' }}
	</footer>