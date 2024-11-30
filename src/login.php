
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <!-- Link ke Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animasi gradien */
        .bg-gradient {
            background: linear-gradient(90deg, #4f46e5, #3b82f6, #06b6d4);
            background-size: 300% 300%;
            animation: gradientAnimation 6s ease infinite;
        }
        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
</head>
<?php

// Cek apakah form login disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; // Ambil username dari input
    $password = $_POST['password']; // Ambil password dari input

    // Query untuk mengambil data admin berdasarkan username
    $sql = "SELECT * FROM admin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $admin = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $admin['password_hash'])) {
            // Login berhasil
            session_start();
            $_SESSION['admin_id'] = $admin['id']; // Simpan ID admin di sesi
            $_SESSION['username'] = $admin['username']; // Simpan username di sesi

            // Redirect ke dashboard
            header("Location: main.php");
            exit;
        } else {
            // Password salah
            $error_message = "Password salah. Silakan coba lagi.";
        }
    } else {
        // Username tidak ditemukan
        $error_message = "Username tidak ditemukan.";
    }
}
?>
<body class="h-screen flex items-center justify-center bg-gradient">
    <!-- Container Card -->
    <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md">
        <!-- Judul -->
        <h1 class="text-3xl font-extrabold text-center text-gray-800 mb-6">Login Admin</h1>
        <p class="text-gray-600 text-center mb-8">Selamat datang! Silakan login untuk melanjutkan.</p>
        
        <!-- Form -->
        <form action="login.php" method="POST">
            <!-- Input Username -->
            <div class="mb-6">
                <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    placeholder="Masukkan username" 
                    required>
            </div>
            
            <!-- Input Password -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    placeholder="Masukkan password" 
                    required>
            </div>
            
            <!-- Tombol Login -->
            <button 
                type="submit" 
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 rounded-lg shadow-md transition-transform transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-300">
                Login
            </button>
        </form>
        
        <!-- Footer -->
        <p class="text-center text-sm text-gray-500 mt-6">
            &copy; 2024 Sistem Admin. Semua Hak Dilindungi.
        </p>
    </div>
</body>
</html>
