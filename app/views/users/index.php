<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-50 text-gray-800 text-center min-h-screen p-6">

  <h1 class="text-3xl font-bold text-pink-700 mb-6">Welcome to Index View</h1>

   <!-- Create Record Button -->
  <div class="mb-6">
    <a href="<?=site_url('users/create');?>"
       class="inline-block bg-pink-500 text-white font-semibold px-6 py-2 rounded-lg shadow-md hover:bg-pink-600 hover:shadow-lg transition duration-300">
      Create Record
    </a>
  </div>

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

              <!-- Update Button (lighter pink) -->
              <a href="<?=site_url('users/update/'.$user['id'])?>"
                 class="inline-block bg-pink-400 text-white px-4 py-2 rounded-lg shadow-md hover:bg-pink-500 hover:shadow-lg transition duration-300">
                Update
              </a>

              <!-- Delete Button (darker pink) -->
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

</body>
</html>
