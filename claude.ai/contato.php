<?php
$page_title = "Contato";
$active_page = "contato";
require_once "includes/header.php";

// Verificar mensagens de sucesso ou erro
$success_message = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : '';
$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';

// Limpar mensagens da sessão
unset($_SESSION['success_message']);
unset($_SESSION['error_message']);
?>

<h2 class="page-title">Entre em Contato</h2>

<?php if ($success_message): ?>
<div class="message success">
    <?php echo $success_message; ?>
</div>
<?php endif; ?>

<?php if ($error_message): ?>
<div class="message error-alert">
    <?php echo $error_message; ?>
</div>
<?php endif; ?>

<div class="form-container">
    <form id="form-contato" action="process_forms.php" method="post">
        <input type="hidden" name="form_type" value="contato">
        
        <div class="form-row">
            <div class="form-group">
                <label for="nome">Nome Completo*</label>
                <input type="text" id="nome" name="nome" required>
                <span class="error-message">Este campo é obrigatório</span>
            </div>
            
            <div class="form-group">
                <label for="email">Email*</label>
                <input type="email" id="email" name="email" required>
                <span class="error-message">Este campo é obrigatório</span>
            </div>
        </div>
        
        <div class="form-group">
            <label for="telefone">Telefone*</label>
            <input type="text" id="telefone" name="telefone" required>
            <span class="error-message">Este campo é obrigatório</span>
        </div>
        
        <div class="form-group">
            <label for="assunto">Assunto*</label>
            <input type="text" id="assunto" name="assunto" required>
            <span class="error-message">Este campo é obrigatório</span>
        </div>
        
        <div class="form-group">
            <label for="mensagem">Mensagem*</label>
            <textarea id="mensagem" name="mensagem" required></textarea>
            <span class="error-message">Este campo é obrigatório</span>
        </div>
        
        <div style="text-align: center;">
            <button type="submit">Enviar Mensagem</button>
        </div>
    </form>
</div>

<section style="margin-top: 3rem;">
    <h3 class="page-title">Nossa Localização</h3>
    <div style="text-align: center; margin-bottom: 2rem;">
        <p><strong>Endereço:</strong> Av. das Pets, 123 - Centro</p>
        <p><strong>Telefone:</strong> (11) 99999-9999</p>
        <p><strong>Email:</strong> contato@petshopamigofiel.com.br</p>
        <p><strong>Horário de Funcionamento:</strong> Segunda a Sexta, 08h às 19h | Sábados, 09h às 17h</p>
    </div>
</section>

<?php
require_once "includes/footer.php";
?>