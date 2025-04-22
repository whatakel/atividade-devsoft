<?php
  // Importante incluir as funções em todas as páginas via header
  require_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetShop Amigo Fiel - <?php echo $page_title; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>PetShop Amigo Fiel</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php" <?php echo ($active_page == 'home') ? 'class="active"' : ''; ?>>Home</a></li>
                    <li><a href="servicos.php" <?php echo ($active_page == 'servicos') ? 'class="active"' : ''; ?>>Serviços</a></li>
                    <li><a href="produtos.php" <?php echo ($active_page == 'produtos') ? 'class="active"' : ''; ?>>Produtos</a></li>
                    <li><a href="agendamento.php" <?php echo ($active_page == 'agendamento') ? 'class="active"' : ''; ?>>Agendar</a></li>
                    <li><a href="contato.php" <?php echo ($active_page == 'contato') ? 'class="active"' : ''; ?>>Contato</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="container">