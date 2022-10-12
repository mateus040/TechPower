<?php

class Usuario
{
    private $conexao;
    public $msgErro = "";

    public function __construct()
    {
        include_once '../sql/MySQL.php';

        $this->conexao = new MySQL();
    }


    /*public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;

        try 
        {
            $pdo = new PDO("mysql:db_techpower=".$nome.";host=".$host,$usuario,$senha);
        }
        catch (PDOException $e)
        {
            $msgErro = $e->getMessage();
        }

    }
    */

    public function cadastrar($nome, $telefone, $email, $senha)
    {
        global $conexao;

        // Verificar se já existe o email cadastrado
        $sql = $conexao->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");

        $sql->bindValue(":e",$email);
        $sql->execute();

        if($sql->rowCount() > 0) 
        {
            return false; // Já está cadastrada
        }
        else
        {
            // Caso não, cadastrar
            $sql = $conexao->prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",$senha);
            $sql->execute();
            return true;
        }



    }

    public function login($email, $senha)
    {
        global $conexao;
        
        // Verificar se o email e senha estão cadastrados, se sim
        $sql = $conexao->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",$senha);
        $sql->execute();

        if ($sql->rowCount() > 0)
        {
            // Entrar no sistema (sessão)
            $dado = $sql->apc_fetch(); // Transformando em array
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true; // Logado com sucesso
        }
        else
        {
            return false; // Não foi possível logar
        }
    }
}

?>