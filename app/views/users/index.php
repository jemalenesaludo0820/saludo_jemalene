<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Users Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    body {
      min-height: 100vh;
      margin: 0;
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #ffe6f0, #ffbfd8, #ffdee9);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 25px;
    }

    .glass-container {
      width: 95%;
      max-width: 1100px;
      padding: 40px;
      background: rgba(255, 240, 245, 0.75);
      backdrop-filter: blur(16px);
      border-radius: 18px;
      box-shadow: 0 12px 30px rgba(255, 105, 180, 0.25);
      border: 1px solid rgba(255, 182, 193, 0.6);
    }

    h2 {
      text-align: center;
      font-size: 2rem;
      font-weight: 600;
      margin-bottom: 30px;
      color: #d63384;
      letter-spacing: 1px;
    }

    .user-status {
      background: #ffebf3;
      border: 1px solid #ffcce0;
      padding: 12px 20px;
      border-radius: 12px;
      margin: 0 auto 25px;
      text-align: center;
      width: fit-content;
      font-size: 15px;
      color: #b81d5b;
      box-shadow: 0 4px 10px rgba(255, 182, 193, 0.25);
    }
    .user-status.error {
      background: #fff0f5;
      border: 1px solid #ffcce0;
      color: #d81b60;
    }
    .user-status strong { font-weight: 600; }
    .user-status .username { color: #d63384; font-weight: 600; }

    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 15px;
      flex-wrap: wrap;
      margin-bottom: 25px;
    }
    .logout-btn {
      padding: 10px 20px;
      background: linear-gradient(135deg, #ff4d94, #d63384);
      border: none;
      border-radius: 8px;
      font-weight: 600;
      color: #fff;
      cursor: pointer;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .logout-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 14px rgba(214, 51, 132, 0.3);
    }

    .search-form {
      display: flex;
      gap: 8px;
      flex: 1;
      max-width: 350px;
      background: #fff0f7;
      border: 1px solid #ffcce0;
      padding: 6px 10px;
      border-radius: 10px;
      box-shadow: inset 0 2px 6px rgba(255, 182, 193, 0.25);
      position: relative;
    }
    .search-form input {
      border: none;
      background: transparent;
      flex: 1;
      padding: 6px;
      font-size: 14px;
      color: #c2185b;
    }
    .search-form input:focus { outline: none; }
    .search-form button {
      padding: 6px 14px;
      font-size: 14px;
      font-weight: 600;
      border-radius: 6px;
      border: none;
      background: #d63384;
      color: #fff;
      transition: 0.3s ease;
    }
    .search-form button:hover { background: #ff4d94; }

    #clearSearch {
      background: transparent;
      border: none;
      color: #d63384;
      font-size: 18px;
      font-weight: bold;
      cursor: pointer;
      padding: 0 6px;
      line-height: 1;
      transition: color 0.2s ease;
    }
    #clearSearch:hover { color: #ff4d94; }

    .table-responsive {
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 25px;
      box-shadow: 0 6px 18px rgba(255, 182, 193, 0.3);
    }
    table { width: 100%; border-collapse: collapse; }
    th, td { padding: 14px; text-align: center; font-size: 14px; }
    th {
      background: linear-gradient(135deg, #ff80b5, #d63384);
      color: #fff;
      text-transform: uppercase;
      font-size: 13px;
      letter-spacing: 0.05em;
    }
    td { border-bottom: 1px solid #ffe4f0; background: #fff; color: #444; }
    tr:nth-child(even) td { background: #fff5f9; }
    tr:hover td { background: #ffe6f0; }

    a { padding: 6px 12px; border-radius: 6px; font-size: 13px; font-weight: 600; text-decoration: none; margin: 0 4px; display: inline-block; transition: 0.3s ease; }
    a[href*="update"] { background: #ff80b5; color: #fff; }
    a[href*="update"]:hover { background: #d63384; }
    a[href*="delete"] { background: #d63384; color: #fff; }
    a[href*="delete"]:hover { background: #ff4d94; }

    .button-container {
      display: flex;
      justify-content: center;
      margin-top: 25px;
    }
    .btn-create {
      padding: 14px 40px;
      border: none;
      background: linear-gradient(135deg, #ff4d94, #d63384);
      color: #fff;
      font-size: 1.1em;
      font-weight: 500;
      border-radius: 10px;
      cursor: pointer;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .btn-create:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 16px rgba(214, 51, 132, 0.3);
    }

    .pagination { justify-content: center; gap: 6px; margin-top: 20px; display: flex; flex-wrap: wrap; }
    .pagination li a, .pagination li span { padding: 8px 14px; border: 1px solid #ffcce0; border-radius: 6px; background: #fff0f7; color: #d63384; font-size: 14px; }
    .pagination li.active span { background: #d63384; color: #fff; border-color: #880e4f; font-weight: bold; }

    @media (max-width: 768px) {
      .top-bar { flex-direction: column; align-items: stretch; }
      .search-form { max-width: 100%; }
      table { font-size: 13px; }
    }

    /* Delete Modal */
    .modal-overlay {
      position: fixed; top: 0; left: 0; width: 100%; height: 100%;
      background: rgba(255, 182, 193, 0.5); backdrop-filter: blur(6px);
      display: none; align-items: center; justify-content: center; z-index: 1000;
      opacity: 0; transition: opacity 0.3s ease;
    }
    .modal-overlay.show { display: flex; opacity: 1; }
    .modal-content {
      background: rgba(255, 240, 245, 0.95); padding: 30px; border-radius: 18px;
      text-align: center; box-shadow: 0 12px 30px rgba(255, 105, 180, 0.3);
      max-width: 400px; width: 90%; transform: translateY(-50px); transition: transform 0.3s ease;
    }
    .modal-overlay.show .modal-content { transform: translateY(0); }
    .modal-content h3 { color: #d63384; margin-bottom: 15px; }
    .modal-content p { margin-bottom: 25px; color: #444; }
    .modal-buttons button { padding: 10px 20px; border: none; border-radius: 10px; font-weight: 600; margin: 0 10px; cursor: pointer; transition: 0.2s ease; }
    .btn-cancel { background: #ffcce0; color: #d81b60; }
    .btn-cancel:hover { background: #ffb3d1; }
    .btn-confirm { background: #d63384; color: #fff; }
    .btn-confirm:hover { background: #ff4d94; }
  </style>
</head>

<body>
  <div class="glass-container">
    <h2><?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Dashboard'; ?></h2>

    <?php if(!empty($logged_in_user)): ?>
      <div class="user-status">
        <strong>Welcome:</strong> 
        <span class="username"><?= html_escape($logged_in_user['username']); ?></span>
      </div>
    <?php else: ?>
      <div class="user-status error">Logged in user not found</div>
    <?php endif; ?>

    <div class="top-bar">
      <a href="<?=site_url('auth/logout'); ?>"><button class="logout-btn">Logout</button></a>
      <form action="<?=site_url('users');?>" method="get" class="search-form">
        <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
        <input id="searchInput" name="q" type="text" placeholder="Search" value="<?=html_escape($q);?>">
        <button type="button" id="clearSearch" title="Clear Search" style="display:none;">&times;</button>
        <button type="submit">Search</button>
      </form>
    </div>

    <div class="table-responsive">
      <?php if(!empty($users)): ?>
        <table>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <?php if ($logged_in_user['role'] === 'admin'): ?>
              <th>Password</th>
              <th>Role</th>
            <?php endif; ?>
            <th>Action</th>
          </tr>
          <?php foreach ($users as $user): ?>
          <tr>
            <td><?=html_escape($user['id']); ?></td>
            <td><?=html_escape($user['username']); ?></td>
            <td><?=html_escape($user['email']); ?></td>
            <?php if ($logged_in_user['role'] === 'admin'): ?>
              <td>*******</td>
              <td><?= html_escape($user['role']); ?></td>
            <?php endif; ?>
            <td>
              <?php if ($logged_in_user['role'] === 'admin'): ?>
                <a href="<?=site_url('/users/update/'.$user['id']);?>">Update</a>
                <a href="<?=site_url('/users/delete/'.$user['id']);?>">Delete</a>
              <?php else: ?>
                <span class="text-muted">View Only</span>
              <?php endif; ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
      <?php else: ?>
        <div class="alert alert-warning text-center">No users found.</div>
      <?php endif; ?>
    </div>

    <div class="pagination-container">
      <?= $page; ?>
    </div>

    <?php if ($logged_in_user['role'] === 'admin'): ?>
      <div class="button-container">
        <a href="<?=site_url('users/create'); ?>" class="btn-create">+ Create New User</a>
      </div>
    <?php endif; ?>
  </div>

  <!-- Delete Confirmation Modal -->
  <div id="deleteModal" class="modal-overlay">
    <div class="modal-content">
      <h3>Confirm Delete</h3>
      <p>Are you sure you want to delete this user?</p>
      <div class="modal-buttons">
        <button id="cancelBtn" class="btn-cancel">Cancel</button>
        <button id="confirmBtn" class="btn-confirm">Delete</button>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // ---------------- Delete Modal ----------------
      let deleteUrl = null;
      const modal = document.getElementById("deleteModal");
      const confirmBtn = document.getElementById("confirmBtn");
      const cancelBtn = document.getElementById("cancelBtn");

      document.querySelectorAll('a[href*="delete"]').forEach(link => {
        link.addEventListener('click', function(e) {
          e.preventDefault();
          deleteUrl = this.href;
          modal.classList.add('show');
        });
      });

      cancelBtn.addEventListener('click', function() {
        modal.classList.remove('show');
        deleteUrl = null;
      });

      confirmBtn.addEventListener('click', function() {
        if (deleteUrl) {
          window.location.href = deleteUrl;
        }
      });

      modal.addEventListener('click', function(e) {
        if (e.target === modal) {
          modal.classList.remove('show');
          deleteUrl = null;
        }
      });

      // ---------------- Search X Button ----------------
      const clearBtn = document.getElementById('clearSearch');
      const searchInput = document.getElementById('searchInput');

      function toggleClearButton() {
        clearBtn.style.display = searchInput.value.trim() ? 'inline' : 'none';
      }

      toggleClearButton();
      searchInput.addEventListener('input', toggleClearButton);

      clearBtn.addEventListener('click', function() {
        searchInput.value = '';
        toggleClearButton();
        window.location.href = '<?=site_url('users');?>';
      });
    });
  </script>
</body>
</html>
