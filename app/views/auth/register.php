<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-pink-200 via-pink-100 to-white">

  <div class="w-full max-w-md bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl p-8">
    <h2 class="text-3xl font-semibold text-center text-pink-600 mb-6">Register</h2>

    <form method="POST" action="<?= site_url('auth/register'); ?>" class="space-y-5">
      <!-- Username -->
      <input 
        type="text" 
        name="username" 
        placeholder="Username" 
        required
        class="w-full px-4 py-3 rounded-md border border-pink-300 focus:ring-2 focus:ring-pink-500 focus:outline-none text-pink-700"
      >

      <!-- Email -->
      <input 
        type="email" 
        name="email" 
        placeholder="Email" 
        required
        class="w-full px-4 py-3 rounded-md border border-pink-300 focus:ring-2 focus:ring-pink-500 focus:outline-none text-pink-700"
      >

      <!-- Password -->
      <div class="relative">
        <input 
          type="password" 
          id="password" 
          name="password" 
          placeholder="Password" 
          required
          class="w-full px-4 py-3 rounded-md border border-pink-300 focus:ring-2 focus:ring-pink-500 focus:outline-none text-pink-700"
        >
        <i class="fa-solid fa-eye absolute right-3 top-1/2 -translate-y-1/2 text-pink-600 cursor-pointer" id="togglePassword"></i>
      </div>

      <!-- Confirm Password -->
      <div class="relative">
        <input 
          type="password" 
          id="confirmPassword" 
          name="confirm_password" 
          placeholder="Confirm Password" 
          required
          class="w-full px-4 py-3 rounded-md border border-pink-300 focus:ring-2 focus:ring-pink-500 focus:outline-none text-pink-700"
        >
        <i class="fa-solid fa-eye absolute right-3 top-1/2 -translate-y-1/2 text-pink-600 cursor-pointer" id="toggleConfirmPassword"></i>
      </div>

      <!-- Role -->
      <select 
        name="role" 
        required
        class="w-full px-4 py-3 rounded-md border border-pink-300 focus:ring-2 focus:ring-pink-500 focus:outline-none text-pink-700"
      >
        <option value="user" selected>User</option>
        <option value="admin">Admin</option>
      </select>

      <!-- Register Button -->
      <button 
        type="submit" 
        id="btn"
        class="w-full py-3 bg-pink-600 text-white font-medium rounded-md hover:bg-pink-700 transition"
      >
        Register
      </button>
    </form>

    <div class="text-center mt-4">
      <p class="text-sm text-gray-700">
        Already have an account? 
        <a href="<?= site_url('auth/login'); ?>" class="text-pink-600 font-medium hover:underline">
          Login here
        </a>
      </p>
    </div>
  </div>

<?php if (!empty($error)): ?>
  <div id="error-toast" 
       class="fixed top-20 left-1/2 transform -translate-x-1/2 bg-pink-500/80 text-white px-8 py-4 rounded-xl shadow-2xl opacity-0 transition-opacity duration-500 z-50 text-center text-lg font-semibold flex items-center gap-2">
    <i class="fa-solid fa-circle-exclamation"></i>
    <?= $error ?>
  </div>

  <script>
    const toast = document.getElementById("error-toast");
    if (toast) {
      setTimeout(() => toast.classList.remove("opacity-0"), 100);
      setTimeout(() => toast.classList.add("opacity-0"), 3000);
    }
  </script>
<?php endif; ?>
  

  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);

      toggle.addEventListener('click', function () {
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);

        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }

    toggleVisibility('togglePassword', 'password');
    toggleVisibility('toggleConfirmPassword', 'confirmPassword');
  </script>
</body>
</html>
