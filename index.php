<?php
// index.php - Página inicial
include("includes/header.php");
?>

<div class="conteudo">
    <h1>Bem-vindo ao Pet Shop Amigo Fiel</h1>
    
    <div class="destaque">
        <h2>Seu pet merece o melhor cuidado!</h2>
        <p>Oferecemos serviços completos para cães e gatos:</p>
        <ul>
            <li>Banho e tosa</li>
            <li>Consultas veterinárias</li>
            <li>Produtos de qualidade</li>
            <li>Acessórios exclusivos</li>
        </ul>
    </div>
    
    <div class="promocoes">
        <h2>Promoções da Semana</h2>
        <?php
        $promocoes = [
            "Banho e tosa com 20% de desconto às terças-feiras",
            "Na compra de 5kg de ração, leve 1kg grátis",
            "Consulta veterinária com preço especial para novos clientes"
        ];
        
        foreach ($promocoes as $promo) {
            echo "<div class='promo-item'>$promo</div>";
        }
        ?>
    </div>
</div>

<?php
include("includes/footer.php");
?>