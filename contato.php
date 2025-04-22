<?php
// contato.php - Página de contato com formulário
include("includes/header.php");

// Inicializar variáveis
$nome = $email = $telefone = $data = $mensagem = "";
$errors = [];
$success = false;

// Processar o formulário quando enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validação do nome
    if (empty($_POST["nome"])) {
        $errors["nome"] = "Nome é obrigatório";
    } else {
        $nome = limpar_input($_POST["nome"]);
    }
    
    // Validação do email
    if (empty($_POST["email"])) {
        $errors["email"] = "Email é obrigatório";
    } else {
        $email = limpar_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Formato de email inválido";
        }
    }
    
    // Validação do telefone
    if (empty($_POST["telefone"])) {
        $errors["telefone"] = "Telefone é obrigatório";
    } else {
        $telefone = limpar_input($_POST["telefone"]);
        // Remover caracteres não numéricos para validação
        $telefone_num = preg_replace("/[^0-9]/", "", $telefone);
        if (strlen($telefone_num) < 10 || strlen($telefone_num) > 11) {
            $errors["telefone"] = "Telefone deve ter entre 10 e 11 dígitos";
        }
    }
    
    // Validação da data
    if (empty($_POST["data"])) {
        $errors["data"] = "Data é obrigatória";
    } else {
        $data = limpar_input($_POST["data"]);
        // Validar formato da data (dd/mm/aaaa)
        if (!preg_match("/^(\d{2})\/(\d{2})\/(\d{4})$/", $data, $matches)) {
            $errors["data"] = "Formato de data inválido. Use dd/mm/aaaa";
        } else {
            // Verificar se é uma data válida
            $dia = (int)$matches[1];
            $mes = (int)$matches[2];
            $ano = (int)$matches[3];
            
            if (!checkdate($mes, $dia, $ano)) {
                $errors["data"] = "Data inválida";
            }
        }
    }
    
    // Validação da mensagem
    if (empty($_POST["mensagem"])) {
        $errors["mensagem"] = "Mensagem é obrigatória";
    } else {
        $mensagem = limpar_input($_POST["mensagem"]);
    }
    
    // Se não houver erros, processar o formulário
    if (empty($errors)) {
        // Aqui você pode adicionar código para salvar os dados ou enviar email
        $success = true;
        $nome = $email = $telefone = $data = $mensagem = ""; // Limpar os campos
    }
}

// Função para limpar e sanitizar inputs
function limpar_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<div class="conteudo">
    <h1>Entre em Contato</h1>
    
    <?php if ($success): ?>
        <div class="sucesso">
            <p>Sua mensagem foi enviada com sucesso! Entraremos em contato em breve.</p>
        </div>
    <?php endif; ?>
    
    <div class="contato-info">
        <p>Estamos disponíveis para atender você pelos seguintes canais:</p>
        <ul>
            <li>Telefone: (11) 5555-1234</li>
            <li>Email: contato@petshopamigofiel.com</li>
            <li>Endereço: Rua dos Bichinhos, 123 - São Paulo/SP</li>
        </ul>
    </div>
    
    <div class="formulario">
        <h2>Formulário de Contato</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-grupo">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>">
                <?php if (isset($errors["nome"])): ?>
                    <span class="erro"><?php echo $errors["nome"]; ?></span>
                <?php endif; ?>
            </div>
            
            <div class="form-grupo">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="<?php echo $email; ?>">
                <?php if (isset($errors["email"])): ?>
                    <span class="erro"><?php echo $errors["email"]; ?></span>
                <?php endif; ?>
            </div>
            
            <div class="form-grupo">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" value="<?php echo $telefone; ?>">
                <?php if (isset($errors["telefone"])): ?>
                    <span class="erro"><?php echo $errors["telefone"]; ?></span>
                <?php endif; ?>
            </div>
            
            <div class="form-grupo">
                <label for="data">Data para Agendamento:</label>
                <input type="text" id="data" name="data" value="<?php echo $data; ?>">
                <?php if (isset($errors["data"])): ?>
                    <span class="erro"><?php echo $errors["data"]; ?></span>
                <?php endif; ?>
            </div>
            
            <div class="form-grupo">
                <label for="mensagem">Mensagem:</label>
                <textarea id="mensagem" name="mensagem" rows="5"><?php echo $mensagem; ?></textarea>
                <?php if (isset($errors["mensagem"])): ?>
                    <span class="erro"><?php echo $errors["mensagem"]; ?></span>
                <?php endif; ?>
            </div>
            
            <div class="form-grupo">
                <button type="submit">Enviar Mensagem</button>
            </div>
        </form>
    </div>
</div>

<?php
include("includes/footer.php");
?>

<script>
// Máscara para telefone
document.getElementById('telefone').addEventListener('input', function(e) {
    let valor = e.target.value.replace(/\D/g, ''); // Remove não-números
    
    if (valor.length > 0) {
        // Formatar como (XX) XXXXX-XXXX ou (XX) XXXX-XXXX
        if (valor.length <= 10) {
            // Formato: (XX) XXXX-XXXX
            valor = valor.replace(/^(\d{2})(\d{4})(\d{0,4}).*/, '($1) $2-$3');
        } else {
            // Formato: (XX) XXXXX-XXXX
            valor = valor.replace(/^(\d{2})(\d{5})(\d{0,4}).*/, '($1) $2-$3');
        }
    }
    
    e.target.value = valor;
});

// Permitir apenas números no campo de telefone
document.getElementById('telefone').addEventListener('keypress', function(e) {
    var char = String.fromCharCode(e.keyCode);
    if (!/[0-9]/.test(char)) {
        e.preventDefault();
    }
});

// Máscara para data
document.getElementById('data').addEventListener('input', function(e) {
    let valor = e.target.value.replace(/\D/g, ''); // Remove não-números
    
    if (valor.length > 0) {
        valor = valor.replace(/^(\d{0,2})(\d{0,2})(\d{0,4}).*/, function(match, dia, mes, ano) {
            let resultado = '';
            if (dia) resultado += dia;
            if (mes) resultado += '/' + mes;
            if (ano) resultado += '/' + ano;
            return resultado;
        });
    }
    
    e.target.value = valor;
});

// Permitir apenas números no campo de data
document.getElementById('data').addEventListener('keypress', function(e) {
    var char = String.fromCharCode(e.keyCode);
    if (!/[0-9]/.test(char)) {
        e.preventDefault();
    }
});
</script>