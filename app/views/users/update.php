<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Update User</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    body {
      min-height: 100vh;
      margin: 0;
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #ffe6f0, #ffbfd8, #ffdee9);
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .glass-container {
      width: 100%;
      max-width: 480px;
      padding: 40px;
      background: rgba(255, 240, 245, 0.75);
      backdrop-filter: blur(16px);
      border-radius: 20px;
      box-shadow: 0 12px 28px rgba(214, 51, 132, 0.25);
      border: 1px solid rgba(255, 182, 193, 0.5);
      text-align: center;
      animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .glass-container h1 {
      font-size: 2em;
      font-weight: 600;
      color: #d63384;
      margin-bottom: 30px;
      letter-spacing: 1px;
    }

    .form-group {
      margin-bottom: 20px;
      position: relative;
      text-align: left;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 12px 14px;
      border: 1px solid #ffcce0;
      border-radius: 12px;
      font-size: 14px;
      background: #fff0f7;
      color: #d81b60;
      transition: 0.3s ease;
      box-sizing: border-box;
      box-shadow: inset 0 2px 6px rgba(255, 182, 193, 0.25);
    }

    .form-group input:focus,
    .form-group select:focus {
      border-color: #d63384;
      box-shadow: 0 0 8px rgba(214, 51, 132, 0.4);
      outline: none;
    }

    .toggle-password {
      position: absolute;
      right: 14px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: #d63384;
    }

    .btn-submit {
      width: 100%;
      padding: 14px;
      border: none;
      border-radius: 12px;
      background: linear-gradient(135deg, #ff4d94, #d63384);
      color: #fff;
      font-size: 1.1em;
      font-weight: 500;
      cursor: pointer;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn-submit:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(214, 51, 132, 0.35);
    }

    .btn-return {
      display: inline-block;
      margin-top: 20px;
      padding: 12px 22px;
      background: #ff80b5;
      color: #fff;
      border-radius: 10px;
      text-decoration: none;
      font-weight: 500;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn-return:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(214, 51, 132, 0.3);
      background: #d63384;
    }
  </style>
</head>
<body>
  <div class="glass-container">
    <h1>Update User</h1>
    <form action="<?=site_url('users/update/'.$user['id'])?>" method="POST">
      <div class="form-group">
        <input type="text" name="username" value="<?=html_escape($user['username']);?>" placeholder="Username" required>
      </div>
      <div class="form-group">
        <input type="email" name="email" value="<?=html_escape($user['email']);?>" placeholder="Email" required>
      </div>

      <?php if(!empty($logged_in_user) && $logged_in_user['role'] === 'admin'): ?>
        <div class="form-group">
          <select name="role" required>
            <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
          </select>
        </div>

        <div class="form-group">
          <input type="password" placeholder="New Password (leave blank if unchanged)" 
                name="password" id="password">
          <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
        </div>
      <?php endif; ?>

      <button type="submit" class="btn-submit">Update User</button>
    </form>
    <a href="<?=site_url('/users');?>" class="btn-return">Cancel</a>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    if (togglePassword) {
      togglePassword.addEventListener('click', function () {
        const type = password.type === 'password' ? 'text' : 'password';
        password.type = type;

        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }
  </script>
</body>
</html>
