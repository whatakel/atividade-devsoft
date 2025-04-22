<?php
// Iniciar sessão para passar mensagens entre páginas
session_start();

// Incluir o arquivo de funções
require_once 'includes/functions.php';

// Verificar o tipo de formulário enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form_type = isset($_POST['form_type']) ? $_POST['form_type'] : '';
    
    // Processar formulário de agendamento
    if ($form_type === 'agendamento') {
        processAgendamento();
    }
    // Processar formulário de contato
    elseif ($form_type === 'contato') {
        processContato();
    }
    // Tipo de formulário não reconhecido
    else {
        $_SESSION['error_message'] = 'Tipo de formulário não reconhecido.';
        header('Location: index.php');
        exit;
    }
} else {
    // Acesso direto a esta página não é permitido
    header('Location: index.php');
    exit;
}

/**
 * Processa o formulário de agendamento
 */
function processAgendamento() {
    // Validar campos obrigatórios
    $required_fields = ['nome', 'telefone', 'servico', 'data', 'hora', 'pet', 'tipo_pet'];
    $errors = [];
    
    foreach ($required_fields as $field) {
        if (is_empty($_POST[$field])) {
            $errors[] = 'O campo ' . formatFieldName($field) . ' é obrigatório.';
        }
    }
    
    // Validar telefone
    if (!is_empty($_POST['telefone']) && !is_valid_phone($_POST['telefone'])) {
        $errors[] = 'O número de telefone informado é inválido.';
    }
    
    // Validar data
    if (!is_empty($_POST['data']) && !is_valid_date($_POST['data'])) {
        $errors[] = 'A data informada é inválida.';
    }
    
    // Validar se o serviço existe
    $servico_id = isset($_POST['servico']) ? (int)$_POST['servico'] : 0;
    $servico = get_service_by_id($servico_id);
    if (!$servico) {
        $errors[] = 'O serviço selecionado é inválido.';
    }
    
    // Se houver erros, redirecionar de volta com mensagem de erro
    if (!empty($errors)) {
        $_SESSION['error_message'] = 'Erros no formulário: ' . implode(' ', $errors);
        header('Location: agendamento.php');
        exit;
    }
    
    // Sanitizar todos os inputs
    $nome = sanitize_input($_POST['nome']);
    $telefone = sanitize_input($_POST['telefone']);
    $servico_id = (int)$_POST['servico'];
    $data = sanitize_input($_POST['data']);
    $hora = sanitize_input($_POST['hora']);
    $pet = sanitize_input($_POST['pet']);
    $tipo_pet = sanitize_input($_POST['tipo_pet']);
    $idade_pet = isset($_POST['idade_pet']) ? sanitize_input($_POST['idade_pet']) : '';
    $observacoes = isset($_POST['observacoes']) ? sanitize_input($_POST['observacoes']) : '';
    
    // Em um sistema real, aqui você salvaria os dados no banco de dados
    // Simulação de processamento bem-sucedido
    $_SESSION['success_message'] = 'Agendamento realizado com sucesso! Entraremos em contato para confirmar.';
    header('Location: agendamento.php');
    exit;
}

/**
 * Processa o formulário de contato
 */
function processContato() {
    // Validar campos obrigatórios
    $required_fields = ['nome', 'email', 'telefone', 'assunto', 'mensagem'];
    $errors = [];
    
    foreach ($required_fields as $field) {
        if (is_empty($_POST[$field])) {
            $errors[] = 'O campo ' . formatFieldName($field) . ' é obrigatório.';
        }
    }
    
    // Validar email
    if (!is_empty($_POST['email']) && !is_valid_email($_POST['email'])) {
        $errors[] = 'O email informado é inválido.';
    }
    
    // Validar telefone
    if (!is_empty($_POST['telefone']) && !is_valid_phone($_POST['telefone'])) {
        $errors[] = 'O número de telefone informado é inválido.';
    }
    
    // Se houver erros, redirecionar de volta com mensagem de erro
    if (!empty($errors)) {
        $_SESSION['error_message'] = 'Erros no formulário: ' . implode(' ', $errors);
        header('Location: contato.php');
        exit;
    }
    
    // Sanitizar todos os inputs
    $nome = sanitize_input($_POST['nome']);
    $email = sanitize_input($_POST['email']);
    $telefone = sanitize_input($_POST['telefone']);
    $assunto = sanitize_input($_POST['assunto']);
    $mensagem = sanitize_input($_POST['mensagem']);
    
    // Em um sistema real, aqui você salvaria os dados no banco de dados
    // ou enviaria um email com a mensagem
    
    // Simulação de processamento bem-sucedido
    $_SESSION['success_message'] = 'Mensagem enviada com sucesso! Responderemos em breve.';
    header('Location: contato.php');
    exit;
}

/**
 * Formata o nome do campo para exibição na mensagem de erro
 */
function formatFieldName($field) {
    $names = [
        'nome' => 'Nome',
        'telefone' => 'Telefone',
        'servico' => 'Serviço',
        'data' => 'Data',
        'hora' => 'Hora',
        'pet' => 'Nome do Pet',
        'tipo_pet' => 'Tipo de Pet',
        'email' => 'Email',
        'assunto' => 'Assunto',
        'mensagem' => 'Mensagem'
    ];
    
    return isset($names[$field]) ? $names[$field] : $field;
}