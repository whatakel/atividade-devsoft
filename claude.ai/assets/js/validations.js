$(document).ready(function() {
    // Aplicar máscaras nos campos
    $('#telefone').mask('(00) 00000-0000');
    $('#data').mask('00/00/0000');
    
    // Impedir letras em campos numéricos
    $('.numeric-only').on('keypress', function(e) {
        // Aceitar apenas números e teclas de controle
        if (e.which < 48 || e.which > 57) {
            if (e.which !== 8 && e.which !== 0 && e.which !== 9) {
                e.preventDefault();
            }
        }
    });
    
    // Validação do formulário de agendamento
    $('#form-agendamento').on('submit', function(e) {
        let isValid = true;
        
        // Validar nome
        const nome = $('#nome').val().trim();
        if (nome === '') {
            showError('#nome', 'O nome é obrigatório');
            isValid = false;
        } else {
            hideError('#nome');
        }
        
        // Validar telefone
        const telefone = $('#telefone').val().trim();
        if (telefone === '') {
            showError('#telefone', 'O telefone é obrigatório');
            isValid = false;
        } else if (telefone.replace(/[^0-9]/g, '').length !== 11) {
            showError('#telefone', 'Telefone inválido');
            isValid = false;
        } else {
            hideError('#telefone');
        }
        
        // Validar serviço
        const servico = $('#servico').val();
        if (servico === '') {
            showError('#servico', 'Selecione um serviço');
            isValid = false;
        } else {
            hideError('#servico');
        }
        
        // Validar data
        const data = $('#data').val().trim();
        if (data === '') {
            showError('#data', 'A data é obrigatória');
            isValid = false;
        } else {
            // Validar formato da data
            const regex = /^\d{2}\/\d{2}\/\d{4}$/;
            if (!regex.test(data)) {
                showError('#data', 'Formato de data inválido (DD/MM/AAAA)');
                isValid = false;
            } else {
                hideError('#data');
            }
        }
        
        // Validar hora
        const hora = $('#hora').val();
        if (hora === '') {
            showError('#hora', 'Selecione um horário');
            isValid = false;
        } else {
            hideError('#hora');
        }
        
        // Validar pet
        const pet = $('#pet').val().trim();
        if (pet === '') {
            showError('#pet', 'O nome do pet é obrigatório');
            isValid = false;
        } else {
            hideError('#pet');
        }
        
        // Se houver erros, impedir o envio do formulário
        if (!isValid) {
            e.preventDefault();
        }
    });
    
    // Validação do formulário de contato
    $('#form-contato').on('submit', function(e) {
        let isValid = true;
        
        // Validar nome
        const nome = $('#nome').val().trim();
        if (nome === '') {
            showError('#nome', 'O nome é obrigatório');
            isValid = false;
        } else {
            hideError('#nome');
        }
        
        // Validar email
        const email = $('#email').val().trim();
        if (email === '') {
            showError('#email', 'O email é obrigatório');
            isValid = false;
        } else if (!isValidEmail(email)) {
            showError('#email', 'Email inválido');
            isValid = false;
        } else {
            hideError('#email');
        }
        
        // Validar telefone
        const telefone = $('#telefone').val().trim();
        if (telefone === '') {
            showError('#telefone', 'O telefone é obrigatório');
            isValid = false;
        } else if (telefone.replace(/[^0-9]/g, '').length !== 11) {
            showError('#telefone', 'Telefone inválido');
            isValid = false;
        } else {
            hideError('#telefone');
        }
        
        // Validar assunto
        const assunto = $('#assunto').val().trim();
        if (assunto === '') {
            showError('#assunto', 'O assunto é obrigatório');
            isValid = false;
        } else {
            hideError('#assunto');
        }
        
        // Validar mensagem
        const mensagem = $('#mensagem').val().trim();
        if (mensagem === '') {
            showError('#mensagem', 'A mensagem é obrigatória');
            isValid = false;
        } else {
            hideError('#mensagem');
        }
        
        // Se houver erros, impedir o envio do formulário
        if (!isValid) {
            e.preventDefault();
        }
    });
    
    // Filtro de produtos
    $('.filter-btn').on('click', function() {
        const category = $(this).data('category');
        
        // Atualizar botão ativo
        $('.filter-btn').removeClass('active');
        $(this).addClass('active');
        
        // Filtrar produtos
        if (category === 'todos') {
            $('.card').show();
        } else {
            $('.card').hide();
            $(`.card[data-category="${category}"]`).show();
        }
    });
    
    // Funções auxiliares
    function showError(field, message) {
        $(field).closest('.form-group').addClass('error');
        $(field).siblings('.error-message').text(message);
    }
    
    function hideError(field) {
        $(field).closest('.form-group').removeClass('error');
    }
    
    function isValidEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }
});