<?php
// Função para sanitizar inputs
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Função para validar se input está vazio
function is_empty($value) {
    return empty(trim($value));
}

// Função para validar email
function is_valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Função para validar telefone (formato: (99) 99999-9999)
function is_valid_phone($phone) {
    // Remove caracteres não numéricos para verificação
    $phone_numbers_only = preg_replace('/[^0-9]/', '', $phone);
    return (strlen($phone_numbers_only) == 11);
}

// Função para validar data (formato: dd/mm/aaaa)
function is_valid_date($date) {
    // Verifica o formato da data
    if (!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $date)) {
        return false;
    }
    
    // Converte para o formato Y-m-d para validação
    list($day, $month, $year) = explode('/', $date);
    
    // Verifica se é uma data válida
    return checkdate($month, $day, $year);
}

// Função para formatar preço
function format_price($price) {
    return number_format($price, 2, ',', '.');
}

// Função para listar serviços
function get_services() {
    return [
        [
            'id' => 1,
            'nome' => 'Banho e Tosa',
            'descricao' => 'Banho completo e tosa higiênica para seu pet.',
            'preco' => 60.00,
            'duracao' => '1 hora'
        ],
        [
            'id' => 2,
            'nome' => 'Consulta Veterinária',
            'descricao' => 'Consulta de rotina com nossos veterinários especializados.',
            'preco' => 120.00,
            'duracao' => '30 minutos'
        ],
        [
            'id' => 3,
            'nome' => 'Hospedagem',
            'descricao' => 'Cuidamos do seu pet enquanto você viaja.',
            'preco' => 80.00,
            'duracao' => 'Diária'
        ],
        [
            'id' => 4,
            'nome' => 'Taxi Dog',
            'descricao' => 'Buscamos e levamos seu pet onde você precisar.',
            'preco' => 40.00,
            'duracao' => 'Por trajeto'
        ],
        [
            'id' => 5,
            'nome' => 'Spa Day',
            'descricao' => 'Dia de spa completo para o seu pet relaxar.',
            'preco' => 150.00,
            'duracao' => '3 horas'
        ]
    ];
}

// Função para listar produtos
function get_products() {
    return [
        [
            'id' => 1,
            'nome' => 'Ração Premium para Cães',
            'descricao' => 'Ração de alta qualidade para cães adultos.',
            'preco' => 89.90,
            'categoria' => 'Alimentação'
        ],
        [
            'id' => 2,
            'nome' => 'Brinquedo Interativo',
            'descricao' => 'Brinquedo para estimular a inteligência do seu pet.',
            'preco' => 49.90,
            'categoria' => 'Brinquedos'
        ],
        [
            'id' => 3,
            'nome' => 'Cama Confortável',
            'descricao' => 'Cama macia e confortável para seu pet descansar.',
            'preco' => 129.90,
            'categoria' => 'Acessórios'
        ],
        [
            'id' => 4,
            'nome' => 'Shampoo Neutro',
            'descricao' => 'Shampoo especial para pets com pele sensível.',
            'preco' => 35.90,
            'categoria' => 'Higiene'
        ],
        [
            'id' => 5,
            'nome' => 'Coleira Personalizada',
            'descricao' => 'Coleira resistente e personalizada para seu pet.',
            'preco' => 28.90,
            'categoria' => 'Acessórios'
        ],
        [
            'id' => 6,
            'nome' => 'Ração para Gatos',
            'descricao' => 'Ração balanceada para gatos de todas as idades.',
            'preco' => 75.90,
            'categoria' => 'Alimentação'
        ]
    ];
}

// Função para listar categorias de produtos únicas
function get_unique_categories() {
    $products = get_products();
    $categories = [];
    
    foreach ($products as $product) {
        if (!in_array($product['categoria'], $categories)) {
            $categories[] = $product['categoria'];
        }
    }
    
    return $categories;
}

// Função para buscar serviço por ID
function get_service_by_id($id) {
    $services = get_services();
    foreach ($services as $service) {
        if ($service['id'] == $id) {
            return $service;
        }
    }
    return null;
}