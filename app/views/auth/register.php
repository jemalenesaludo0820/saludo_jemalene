<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    body {
      margin: 0;
      font-family: "Poppins", sans-serif;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #ffe6f0, #ffbfd8, #ffdee9);
      padding: 20px;
    }

    .glass-container {
      width: 100%;
      max-width: 480px;
      padding: 40px;
      background: rgba(255, 240, 245, 0.75);
      backdrop-filter: blur(16px);
      border-radius: 20px;
      border: 1px solid rgba(255, 182, 193, 0.5);
      box-shadow: 0 12px 28px rgba(214, 51, 132, 0.25);
      text-align: center;
    }

    h2 {
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
      background: #fff0f7;
      color: #d81b60;
      font-size: 14px;
      transition: 0.3s ease;
      box-shadow: inset 0 2px 6px rgba(255, 182, 193, 0.25);
      box-sizing: border-box;
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

    .error-message {
      background: #fff0f5;
      color: #d81b60;
      border: 1px solid #ffcce0;
      padding: 10px 15px;
      border-radius: 12px;
      margin-bottom: 20px;
      text-align: center;
      font-size: 0.9em;
    }

    .text-center a {
      color: #d63384;
      font-weight: 500;
      text-decoration: none;
      transition: 0.3s;
    }

    .text-center a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="glass-container">
    <h2>Register</h2>

    <?php if (!empty($error)): ?>
      <div class="error-message"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" action="<?= site_url('auth/register'); ?>">
      <div class="form-group">
        <input type="text" name="username" placeholder="Username" required>
      </div>

      <div class="form-group">
        <input type="email" name="email" placeholder="Email" required>
      </div>

      <div class="form-group">
        <input type="password" name="password" id="password" placeholder="Password" required>
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <div class="form-group">
        <input type="password" name="confirm_password" id="confirmPassword" placeholder="Confirm Password" required>
        <i class="fa-solid fa-eye toggle-password" id="toggleConfirmPassword"></i>
      </div>

      <div class="form-group">
        <select name="role" required>
          <option value="user" selected>User</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <button type="submit" class="btn-submit">Register</button>
    </form>

    <div class="text-center mt-4">
      <p class="text-sm">
        Already have an account? 
        <a href="<?= site_url('auth/login'); ?>">Login here</a>
      </p>
    </div>
  </div>

  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);

      toggle.addEventListener('click', function () {
        const type = input.type === 'password' ? 'text' : 'password';
        input.type = type;

        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }

    toggleVisibility('togglePassword', 'password');
    toggleVisibility('toggleConfirmPassword', 'confirmPassword');
  </script>
</body>
</html>
