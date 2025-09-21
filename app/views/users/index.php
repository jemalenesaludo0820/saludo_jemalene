<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <h1>Students Info</h1>
    <form action="<?=site_url('users');?>" method="get" class="col-sm-4 float-end d-flex search-form" class="search-form">
		<?php
		$q = '';
		if(isset($_GET['q'])) {
			$q = $_GET['q'];
		}
		?>
        <input class="form-control me-2" name="q" type="text" placeholder="Search" value="<?=html_escape($q);?>">
        <button type="submit" class="btn btn-primary" type="button">Search</button>	
	</form>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php foreach (html_escape($user) as $users): ?>
        <tr>
            <td><?=$users['id']; ?></td>
            <td><?=$users['username']; ?></td>
            <td><?=$users['email']; ?></td>
            <td>
                <a href="<?=site_url('/users/update/'.$users['id']);?>">Update</a>
                <a href="<?=site_url('/users/delete/'.$users['id']);?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php
	echo $page;?>
    <div class="button-container">
        <a href="<?=site_url('users/create'); ?>" class="btn-create">+ Create New User</a>
    </div>
</body>
</html>
