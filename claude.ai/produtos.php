<?php
$page_title = "Produtos";
$active_page = "produtos";
require_once "includes/header.php";
?>

<h2 class="page-title">Nossos Produtos</h2>

<section>
    <div class="filter-container">
        <button class="filter-btn active" data-category="todos">Todos</button>
        <?php
        $categories = get_unique_categories();
        foreach ($categories as $category) {
            echo '<button class="filter-btn" data-category="' . strtolower($category) . '">' . $category . '</button>';
        }
        ?>
    </div>

    <div class="card-container">
        <?php
        $products = get_products();
        foreach ($products as $product) {
            $category_lower = strtolower($product['categoria']);
        ?>
        <div class="card" data-category="<?php echo $category_lower; ?>">
            <h3><?php echo $product['nome']; ?></h3>
            <p><?php echo $product['descricao']; ?></p>
            <p class="price">R$ <?php echo format_price($product['preco']); ?></p>
            <p class="duration">Categoria: <?php echo $product['categoria']; ?></p>
        </div>
        <?php
        }
        ?>
    </div>
</section>

<?php
require_once "includes/footer.php";
?>