<?php
// produtos.php - Página de produtos
include("includes/header.php");

// Função para exibir produtos por categoria
function exibirProdutos($categoria, $produtos) {
    echo "<div class='categoria'>";
    echo "<h2>$categoria</h2>";
    echo "<div class='produtos-grid'>";
    
    foreach ($produtos as $produto) {
        if ($produto["categoria"] == $categoria) {
            echo "<div class='produto-card'>";
            echo "<h3>" . $produto["nome"] . "</h3>";
            echo "<p class='descricao'>" . $produto["descricao"] . "</p>";
            echo "<p class='preco'>R$ " . number_format($produto["preco"], 2, ',', '.') . "</p>";
            echo "<button>Adicionar ao Carrinho</button>";
            echo "</div>";
        }
    }
    
    echo "</div></div>";
}
?>

<div class="conteudo">
    <h1>Nossos Produtos</h1>
    
    <?php
    // Array de produtos
    $produtos = [
        [
            "nome" => "Ração Premium Cães Adultos",
            "descricao" => "Ração balanceada para cães adultos de médio porte",
            "categoria" => "Alimentação",
            "preco" => 89.90
        ],
        [
            "nome" => "Ração Premium Gatos",
            "descricao" => "Ração especial para gatos castrados",
            "categoria" => "Alimentação",
            "preco" => 75.50
        ],
        [
            "nome" => "Coleira Antipulgas",
            "descricao" => "Coleira com proteção por até 4 meses",
            "categoria" => "Acessórios",
            "preco" => 45.00
        ],
        [
            "nome" => "Brinquedo Interativo",
            "descricao" => "Estimula o raciocínio do seu pet",
            "categoria" => "Brinquedos",
            "preco" => 29.90
        ],
        [
            "nome" => "Cama Confortável",
            "descricao" => "Cama macia e lavável para cães de médio porte",
            "categoria" => "Acessórios",
            "preco" => 120.00
        ],
        [
            "nome" => "Bolinhas Coloridas",
            "descricao" => "Conjunto com 3 bolinhas coloridas",
            "categoria" => "Brinquedos",
            "preco" => 15.90
        ]
    ];
    
    // Exibir produtos por categorias
    $categorias = ["Alimentação", "Acessórios", "Brinquedos"];
    
    foreach ($categorias as $categoria) {
        exibirProdutos($categoria, $produtos);
    }
    ?>
</div>

<?php
include("includes/footer.php");
?>