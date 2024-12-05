<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-500 to-teal-500 p-4">
    <div class="bg-white shadow-2xl rounded-xl overflow-hidden w-full max-w-4xl flex">
        <!-- Left Column: Login Form -->
        <div class="w-1/2 p-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Login Admin</h2>
            <!-- Error Message -->
            <?php if (!empty($_GET['error'])): ?>
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4 transition-opacity duration-500">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php endif; ?>
            <!-- Form -->
            <form method="POST" class="space-y-6">
                <!-- Username -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <div class="mt-1 relative">
                        <input type="text" id="username" name="username" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                               placeholder="Masukkan username">
                        <span class="absolute inset-y-0 right-3 flex items-center text-gray-400">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                </div>
                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="mt-1 relative">
                        <input type="password" id="password" name="password" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                               placeholder="Masukkan password">
                        <span class="absolute inset-y-0 right-3 flex items-center text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                </div>
                <!-- Submit Button -->
                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    <i class="fas fa-sign-in-alt mr-2"></i> Login
                </button>
            </form>
            <!-- Footer -->
            <p class="text-center text-sm text-gray-500 mt-6">
                
            </p>
        </div>
        <!-- Right Column: Image -->
        <div class="w-1/2 relative">
            <img src="gambar1.jpg" 
                 alt="Login Illustration" 
                 class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-30"></div>
        </div>
    </div>
</body>
</html>
