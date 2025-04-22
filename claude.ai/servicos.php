<?php
$page_title = "Serviços";
$active_page = "servicos";
require_once "includes/header.php";
?>

<h2 class="page-title">Nossos Serviços</h2>

<section>
    <div class="card-container">
        <?php
        $services = get_services();
        foreach ($services as $service) {
        ?>
        <div class="card">
            <h3><?php echo $service['nome']; ?></h3>
            <p><?php echo $service['descricao']; ?></p>
            <p class="price">R$ <?php echo format_price($service['preco']); ?></p>
            <p class="duration">Duração: <?php echo $service['duracao']; ?></p>
            <div style="text-align: center; margin-top: 15px;">
                <a href="agendamento.php?service=<?php echo $service['id']; ?>" style="background-color: #4CAF50; color: white; padding: 8px 16px; text-decoration: none; border-radius: 4px; font-size: 0.9rem;">Agendar</a>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</section>

<?php
require_once "includes/footer.php";
?>