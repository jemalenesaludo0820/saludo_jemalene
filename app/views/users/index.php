<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-50 text-gray-800 text-center min-h-screen p-6">

  <h1 class="text-3xl font-bold text-pink-700 mb-6">Students Info</h1>

  <div class="flex justify-between items-center w-4/5 mx-auto mb-6">
    
    <!-- Create Record Button -->
    <a href="<?=site_url('users/create');?>"
       class="bg-pink-500 text-white font-semibold px-6 py-2 rounded-lg shadow-md hover:bg-pink-600 hover:shadow-lg transition duration-300">
      + Create New Record
    </a>

    <!-- Search Form -->
    <form action="<?=site_url('users');?>" method="get" class="flex space-x-2">
      <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
      <input type="text" 
             name="q" 
             placeholder="Search..." 
             value="<?=html_escape($q);?>" 
             class="px-4 py-2 rounded-lg border border-pink-300 focus:ring-2 focus:ring-pink-400 focus:outline-none w-64">
      <button type="submit" 
              class="bg-pink-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-pink-600 transition">
        Search
      </button>
    </form>
  </div>

  <!-- Table -->
  <div class="overflow-x-auto">
    <table class="w-4/5 mx-auto border-4 border-pink-300 rounded-lg shadow-lg">
      <thead>
        <tr class="bg-pink-400 text-white uppercase tracking-wider">
          <th class="px-4 py-3 border border-pink-300">ID</th>
          <th class="px-4 py-3 border border-pink-300">Username</th>
          <th class="px-4 py-3 border border-pink-300">Email</th>
          <th class="px-4 py-3 border border-pink-300">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach(html_escape($users) as $user): ?>
          <tr class="odd:bg-pink-100 even:bg-pink-50 hover:bg-pink-200 transition">
            <td class="px-4 py-3 border border-pink-300"><?= $user['id']; ?></td>
            <td class="px-4 py-3 border border-pink-300"><?= $user['username']; ?></td>
            <td class="px-4 py-3 border border-pink-300"><?= $user['email']; ?></td>
            <td class="px-4 py-3 border border-pink-300 space-x-2">

              <!-- Update Button -->
              <a href="<?=site_url('users/update/'.$user['id'])?>"
                 class="inline-block bg-pink-400 text-white px-4 py-2 rounded-lg shadow-md hover:bg-pink-500 hover:shadow-lg transition duration-300">
                Update
              </a>

              <!-- Delete Button -->
              <a href="<?=site_url('users/delete/'.$user['id'])?>"
                 class="inline-block bg-pink-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-pink-700 hover:shadow-lg transition duration-300">
                Delete
              </a>

            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="mt-6">
    <?= $page ?>
  </div>

</body>

</html>
