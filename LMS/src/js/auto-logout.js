const logoutButton = document.getElementById('logout-button');
const lastActiveInput = document.getElementById('last-active');

// Update timestamp terakhir kali user aktif setiap 1 detik
setInterval(() => {
  lastActiveInput.value = Date.now();
}, 1000);

// Tambahkan event listener "beforeunload" pada window object.
window.addEventListener('beforeunload', function(event) {
  if (event.target.location.href !== event.currentTarget.location.href) {
    // Lakukan permintaan logout ke server
    fetch('../../auth/logout.php', {
      method: 'POST',
      body: new FormData(new URLSearchParams({
        last_active: lastActiveInput.value,
      })),
    });
  }
});

// Event listener untuk tombol logout manual.
logoutButton.addEventListener('click', function() {
  // Lakukan permintaan logout ke server
  fetch('logout.php', {
    method: 'POST',
  });
  // Redirect ke halaman login
  window.location.href = 'login.php';
});
