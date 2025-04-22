<?php
// includes/header.php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Shop Amigo Fiel</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>PetShop Amigo Fiel</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="servicos.php">Serviços</a></li>
                    <li><a href="produtos.php">Produtos</a></li>
                    <li><a href="contato.php">Contato</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="container">

<?php
// includes/footer.php
?>
    </main>
    <footer>
        <div class="container">
            <div class="rodape-info">
                <div class="coluna">
                    <h3>Pet Shop Amigo Fiel</h3>
                    <p>O melhor para seu melhor amigo!</p>
                </div>
                <div class="coluna">
                    <h3>Horário de Funcionamento</h3>
                    <p>Segunda a Sexta: 8h às 19h</p>
                    <p>Sábados: 8h às 18h</p>
                    <p>Domingos e Feriados: 9h às 14h</p>
                </div>
                <div class="coluna">
                    <h3>Contato</h3>
                    <p>Telefone: (11) 5555-1234</p>
                    <p>Email: contato@petshopamigofiel.com</p>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; <?php echo date("Y"); ?> Pet Shop Amigo Fiel - Todos os direitos reservados</p>
            </div>
        </div>
    </footer>
</body>
</html>