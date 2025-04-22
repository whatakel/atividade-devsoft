<?php
// servicos.php - Página de serviços
include("includes/header.php");
?>

<div class="conteudo">
    <h1>Nossos Serviços</h1>
    
    <div class="servicos-lista">
        <?php
        $servicos = [
            [
                "nome" => "Banho e Tosa",
                "descricao" => "Serviço completo de higiene para seu pet, com produtos de qualidade.",
                "preco" => 60.00
            ],
            [
                "nome" => "Consulta Veterinária",
                "descricao" => "Atendimento com profissionais experientes para cuidar da saúde do seu pet.",
                "preco" => 120.00
            ],
            [
                "nome" => "Hospedagem",
                "descricao" => "Cuidamos do seu pet enquanto você viaja, oferecendo conforto e segurança.",
                "preco" => 80.00
            ],
            [
                "nome" => "Tosa Higiênica",
                "descricao" => "Tosa rápida para manter a higiene do seu pet.",
                "preco" => 35.00
            ]
        ];
        
        foreach ($servicos as $servico) {
            echo "<div class='servico-item'>";
            echo "<h3>" . $servico["nome"] . "</h3>";
            echo "<p>" . $servico["descricao"] . "</p>";
            echo "<p class='preco'>R$ " . number_format($servico["preco"], 2, ',', '.') . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</div>

<?php
include("includes/footer.php");
?>