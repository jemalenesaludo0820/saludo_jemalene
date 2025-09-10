<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-50 flex items-center justify-center min-h-screen">
  
  <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
    <h1 class="text-2xl font-bold text-pink-600 text-center mb-6">Update Record</h1>

    <form action="<?=site_url('users/update/'.segment(4));?>" method="POST" class="space-y-4">
      <!-- Username -->
      <div>
        <label for="username" class="block text-pink-700 font-medium mb-1">Username</label>
        <input 
        type="text" 
        id="username" 
        name="username"
        value ="<?= html_escape($user['username']); ?>"
        required
        class="w-full px-4 py-2 border border-pink-300 rounded-lg focus:ring-2 focus:ring-pink-400 focus:outline-none">
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-pink-700 font-medium mb-1">Email Address</label>
        <input 
        type="email" 
        id="email" 
        name="email"         
        value = "<?= html_escape($user['email']); ?>"
        required

          class="w-full px-4 py-2 border border-pink-300 rounded-lg focus:ring-2 focus:ring-pink-400 focus:outline-none">
      </div>

     

      <!-- Sign Up Button -->
      <button type="submit"
        class="w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
        Save
      </button>
    </form>

  

</body>
</html>
