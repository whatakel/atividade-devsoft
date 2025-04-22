<?php
$page_title = "Home";
$active_page = "home";
require_once "includes/header.php";
?>

<section class="banner">
    <div class="container">
        <h2>Bem-vindo ao PetShop Amigo Fiel</h2>
        <p>Oferecemos os melhores produtos e serviços para o seu melhor amigo. Nosso compromisso é cuidar do seu pet com o mesmo amor e carinho que você.</p>
    </div>
</section>

<section>
    <h2 class="page-title">Nossos Serviços em Destaque</h2>
    <div class="card-container">
        <?php
        $featured_services = array_slice(get_services(), 0, 3);
        foreach ($featured_services as $service) {
        ?>
        <div class="card">
            <h3><?php echo $service['nome']; ?></h3>
            <p><?php echo $service['descricao']; ?></p>
            <p class="price">R$ <?php echo format_price($service['preco']); ?></p>
            <p class="duration">Duração: <?php echo $service['duracao']; ?></p>
        </div>
        <?php
        }
        ?>
    </div>
    <div style="text-align: center; margin-top: 2rem;">
        <a href="servicos.php" style="background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px;">Ver todos os serviços</a>
    </div>
</section>

<section style="margin-top: 3rem;">
    <h2 class="page-title">Produtos em Destaque</h2>
    <div class="card-container">
        <?php
        $featured_products = array_slice(get_products(), 0, 3);
        foreach ($featured_products as $product) {
        ?>
        <div class="card">
            <h3><?php echo $product['nome']; ?></h3>
            <p><?php echo $product['descricao']; ?></p>
            <p class="price">R$ <?php echo format_price($product['preco']); ?></p>
            <p class="duration">Categoria: <?php echo $product['categoria']; ?></p>
        </div>
        <?php
        }
        ?>
    </div>
    <div style="text-align: center; margin-top: 2rem;">
        <a href="produtos.php" style="background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px;">Ver todos os produtos</a>
    </div>
</section>

<?php
require_once "includes/footer.php";
?>