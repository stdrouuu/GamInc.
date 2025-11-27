document.addEventListener('DOMContentLoaded', () => {
    // 1. Ambil Nama Pengguna dari Local Storage
    const loggedInUser = localStorage.getItem('loginName');
    
    // Elemen HTML yang akan diubah
    const userNameElement = document.querySelector('.user-name');
    const avatarElement = document.querySelector('.avatar');
    
    // Default values if data is missing
    const defaultName = 'Guest';

    if (userNameElement) {
        // Tampilkan nama pengguna, default ke 'Guest' jika tidak ada
        const displayName = loggedInUser || defaultName;
        userNameElement.textContent = displayName;
        
        // Tampilkan huruf pertama pada avatar
        if (avatarElement) {
            avatarElement.textContent = displayName.charAt(0).toUpperCase();
        }
    }

    // --- Logic Dummy Tambahan (Opsional) ---

    // 2. Dummy Logika EXP Bar (Progress Bar)
    const expFill = document.querySelector('.progress-fill');
    // Kita set progress bar ke 30% sebagai contoh
    if (expFill) {
        expFill.style.width = '30%'; 
    }

    // 3. Logika Logout (Contoh: Menambahkan tombol Logout)
    // Jika Anda menambahkan tombol/tautan dengan ID 'logoutBtn' di user.html
    const logoutBtn = document.getElementById('logoutBtn');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', (e) => {
            e.preventDefault();
            // Hapus data login
            localStorage.removeItem('loginName');
            // Arahkan kembali ke halaman login
            window.location.href = 'index.php?page=auth';
        });
    }

    // 4. Logika Navigasi (Mencegah pengalihan hash default)
    document.querySelectorAll('.list-menu-section a, .help-section a').forEach(link => {
        link.addEventListener('click', (e) => {
            // Mencegah navigasi penuh jika href="#"
            if (link.getAttribute('href') === '#') {
                e.preventDefault();
                console.log(`Navigasi ke: ${link.querySelector('span').textContent} (Halaman ini belum dibuat)`);
                // Di sini Anda bisa menambahkan logika modal atau pengalihan sebenarnya
            }
        });
    });

});