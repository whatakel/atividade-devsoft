<?php
$page_title = "Agendamento";
$active_page = "agendamento";
require_once "includes/header.php";

// Verificar se há um serviço pré-selecionado
$pre_selected_service = isset($_GET['service']) ? (int)$_GET['service'] : '';
$selected_service = null;

if ($pre_selected_service) {
    $selected_service = get_service_by_id($pre_selected_service);
}

// Verificar mensagens de sucesso ou erro
$success_message = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : '';
$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';

// Limpar mensagens da sessão
unset($_SESSION['success_message']);
unset($_SESSION['error_message']);
?>

<h2 class="page-title">Agende um Serviço</h2>

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
    <form id="form-agendamento" action="process_forms.php" method="post">
        <input type="hidden" name="form_type" value="agendamento">
        
        <div class="form-row">
            <div class="form-group">
                <label for="nome">Nome Completo*</label>
                <input type="text" id="nome" name="nome" required>
                <span class="error-message">Este campo é obrigatório</span>
            </div>
            
            <div class="form-group">
                <label for="telefone">Telefone*</label>
                <input type="text" id="telefone" name="telefone" required>
                <span class="error-message">Este campo é obrigatório</span>
            </div>
        </div>
        
        <div class="form-group">
            <label for="servico">Serviço*</label>
            <select id="servico" name="servico" required>
                <option value="">Selecione um serviço</option>
                <?php 
                $services = get_services();
                foreach ($services as $service) {
                    $selected = ($pre_selected_service == $service['id']) ? 'selected' : '';
                    echo '<option value="' . $service['id'] . '" ' . $selected . '>' . $service['nome'] . ' - R$ ' . format_price($service['preco']) . '</option>';
                }
                ?>
            </select>
            <span class="error-message">Selecione um serviço</span>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="data">Data*</label>
                <input type="text" id="data" name="data" placeholder="DD/MM/AAAA" required>
                <span class="error-message">Este campo é obrigatório</span>
            </div>
            
            <div class="form-group">
                <label for="hora">Horário*</label>
                <select id="hora" name="hora" required>
                    <option value="">Selecione um horário</option>
                    <?php
                    // Horários disponíveis
                    $horarios = [
                        '09:00', '10:00', '11:00', '12:00', '14:00', '15:00', '16:00', '17:00'
                    ];
                    
                    foreach ($horarios as $horario) {
                        echo '<option value="' . $horario . '">' . $horario . '</option>';
                    }
                    ?>
                </select>
                <span class="error-message">Selecione um horário</span>
            </div>
        </div>
        
        <div class="form-group">
            <label for="pet">Nome do Pet*</label>
            <input type="text" id="pet" name="pet" required>
            <span class="error-message">Este campo é obrigatório</span>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="tipo_pet">Tipo de Pet*</label>
                <select id="tipo_pet" name="tipo_pet" required>
                    <option value="">Selecione</option>
                    <option value="Cachorro">Cachorro</option>
                    <option value="Gato">Gato</option>
                    <option value="Ave">Ave</option>
                    <option value="Roedor">Roedor</option>
                    <option value="Outro">Outro</option>
                </select>
                <span class="error-message">Selecione o tipo do pet</span>
            </div>
            
            <div class="form-group">
                <label for="idade_pet">Idade do Pet</label>
                <input type="text" id="idade_pet" name="idade_pet" class="numeric-only">
                <span class="error-message">Informe a idade</span>
            </div>
        </div>
        
        <div class="form-group">
            <label for="observacoes">Observações</label>
            <textarea id="observacoes" name="observacoes"></textarea>
        </div>
        
        <div style="text-align: center;">
            <button type="submit">Agendar</button>
        </div>
    </form>
</div>

<?php
require_once "includes/footer.php";
?>