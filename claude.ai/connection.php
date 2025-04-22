<?php
// Iniciar sessão em todas as páginas que incluírem este arquivo
session_start();

/**
 * Função para conectar ao banco de dados
 * Em um sistema real, seriam usadas credenciais reais aqui
 */
function db_connect() {
    try {
        // Parâmetros de conexão com o banco de dados
        $host = 'localhost';
        $dbname = 'petshop';
        $username = 'root';
        $password = '';
        
        // Criar conexão PDO
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
        // Configurar modo de erro para exceções
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $conn;
    } catch(PDOException $e) {
        // Em produção, você não revelaria detalhes do erro
        die("Erro na conexão com o banco de dados: " . $e->getMessage());
    }
}

/**
 * Esta função não é usada neste projeto de exemplo
 * mas poderia ser útil em uma implementação real
 */
function get_pets_by_owner($owner_id) {
    try {
        $conn = db_connect();
        $stmt = $conn->prepare("SELECT * FROM pets WHERE owner_id = :owner_id");
        $stmt->bindParam(':owner_id', $owner_id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return [];
    }
}

/**
 * Esta função não é usada neste projeto de exemplo
 * mas poderia ser útil em uma implementação real
 */
function create_appointment($data) {
    try {
        $conn = db_connect();
        $sql = "INSERT INTO appointments 
                (cliente_nome, cliente_telefone, servico_id, data, hora, pet_nome, pet_tipo, pet_idade, observacoes) 
                VALUES (:nome, :telefone, :servico, :data, :hora, :pet, :tipo_pet, :idade_pet, :observacoes)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $data['nome'], PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $data['telefone'], PDO::PARAM_STR);
        $stmt->bindParam(':servico', $data['servico'], PDO::PARAM_INT);
        $stmt->bindParam(':data', $data['data'], PDO::PARAM_STR);
        $stmt->bindParam(':hora', $data['hora'], PDO::PARAM_STR);
        $stmt->bindParam(':pet', $data['pet'], PDO::PARAM_STR);
        $stmt->bindParam(':tipo_pet', $data['tipo_pet'], PDO::PARAM_STR);
        $stmt->bindParam(':idade_pet', $data['idade_pet'], PDO::PARAM_STR);
        $stmt->bindParam(':observacoes', $data['observacoes'], PDO::PARAM_STR);
        
        return $stmt->execute();
    } catch(PDOException $e) {
        return false;
    }
}

/**
 * Esta função não é usada neste projeto de exemplo
 * mas poderia ser útil em uma implementação real
 */
function create_contact_message($data) {
    try {
        $conn = db_connect();
        $sql = "INSERT INTO contato (nome, email, telefone, assunto, mensagem) 
                VALUES (:nome, :email, :telefone, :assunto, :mensagem)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $data['nome'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $data['telefone'], PDO::PARAM_STR);
        $stmt->bindParam(':assunto', $data['assunto'], PDO::PARAM_STR);
        $stmt->bindParam(':mensagem', $data['mensagem'], PDO::PARAM_STR);
        
        return $stmt->execute();
    } catch(PDOException $e) {
        return false;
    }
}