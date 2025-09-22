<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create User</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-pink-100 via-pink-50 to-white flex items-center justify-center min-h-screen">
  
  <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md border border-pink-100 relative">
    
    <div class="mb-6">
      <a href="<?=site_url('users');?>"
         class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 rounded-lg shadow hover:bg-gray-300 transition">
        Back
      </a>
    </div>

    <!-- Title -->
    <h1 class="text-3xl font-extrabold text-pink-600 text-center mb-8">Create Your Account</h1>

    <!-- Form -->
    <form action="<?=site_url('users/create');?>" method="POST" class="space-y-6">
      
      <!-- Username -->
      <div>
        <label for="username" class="block text-pink-700 font-semibold mb-2">Username</label>
        <input 
          type="text" 
          id="username" 
          name="username" 
          required
          class="w-full px-4 py-3 border border-pink-300 rounded-lg focus:ring-2 focus:ring-pink-400 focus:outline-none placeholder-gray-400 shadow-sm"
          placeholder="Enter username">
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-pink-700 font-semibold mb-2">Email Address</label>
        <input 
          type="email" 
          id="email" 
          name="email" 
          required
          class="w-full px-4 py-3 border border-pink-300 rounded-lg focus:ring-2 focus:ring-pink-400 focus:outline-none placeholder-gray-400 shadow-sm"
          placeholder="Enter email">
      </div>

      <!-- Sign Up Button -->
      <button type="submit"
        class="w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-3 px-4 rounded-lg shadow-md transition duration-300">
        Sign Up
      </button>
    </form>
  </div>

</body>
</html>
