<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-pink-200 via-pink-100 to-white">

  <div class="w-full max-w-md bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl p-8">
    <h2 class="text-3xl font-semibold text-center text-pink-600 mb-6">Login</h2>

    <?php if (!empty($error)): ?>
      <div class="bg-pink-100 text-pink-700 border border-pink-400 rounded-md p-3 text-center text-sm mb-4">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('auth/login') ?>" class="space-y-5">
      <div class="relative">
        <input 
          type="text" 
          name="username" 
          placeholder="Username" 
          required
          class="w-full px-4 py-3 rounded-md border border-pink-300 focus:ring-2 focus:ring-pink-500 focus:outline-none text-pink-700"
        >
      </div>

      <div class="relative">
        <input 
          type="password" 
          name="password" 
          id="password" 
          placeholder="Password" 
          required
          class="w-full px-4 py-3 rounded-md border border-pink-300 focus:ring-2 focus:ring-pink-500 focus:outline-none text-pink-700"
        >
        <i class="fa-solid fa-eye absolute right-3 top-1/2 -translate-y-1/2 text-pink-600 cursor-pointer" id="togglePassword"></i>
      </div>

      <button 
        type="submit" 
        id="btn"
        class="w-full py-3 bg-pink-600 text-white font-medium rounded-md hover:bg-pink-700 transition"
      >
        Login
      </button>
    </form>

    <div class="text-center mt-4">
      <p class="text-sm text-gray-700">
        Don't have an account? 
        <a href="<?= site_url('auth/register'); ?>" class="text-pink-600 font-medium hover:underline">
          Register here
        </a>
      </p>
    </div>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);

      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>
</body>
</html>
