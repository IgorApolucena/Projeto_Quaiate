<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #6a11cb, #2575fc);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .alert-sucesso {
      background-color: #4CAF50;
      color: white;
      padding: 18px 25px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
      font-size: 1.1rem;
      font-weight: 500;
      animation: slideIn 0.4s ease;
    }

    @keyframes slideIn {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>

  <?php if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1): ?>
    <div class="alert-sucesso">✅ Dados salvos com sucesso!</div>
  <?php endif; ?>

</body>
</html>

<?php
header("Refresh: 4; url=../html/login.html");
?>