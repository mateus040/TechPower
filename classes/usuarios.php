<?php

class Usuario
{
    private $conexao;
    public $msgErro = "";

    public function __construct()
    {
        global $conexao;

        try 
        {
            $dsn = "mysql:host=localhost:3307;dbname=db_techpower";

            $this->conexao = new PDO($dsn, 'root', 'etecjau');
        }
        catch (PDOException $e)
        {
            $msgErro = $e->getMessage();
        }

    }
    

    public function cadastrar($nome, $telefone, $email, $senha)
    {
        global $conexao;

        // Verificar se já existe o email cadastrado
        /*$sql = $conexao->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");

        $sql->bindValue(":e",$email);
        $sql->execute(); */

        $sql = "SELECT id_usuarios FROM usuarios WHERE email = :e";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":e",$email);
        $stmt->execute();

        if($stmt->rowCount() > 0) 
        {
            return false; // Já está cadastrado
        }
        else
        {
            // Caso não, cadastrar
            /*$sql = $conexao->prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            return true; // Cadastrado com sucesso */

            $sql = "INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:n, :t, :e, :s)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(":n",$nome);
            $stmt->bindValue(":t",$telefone);
            $stmt->bindValue(":e",$email);
            $stmt->bindValue(":s",md5($senha));
            $stmt->execute();


        }



    }

    public function login($email, $senha)
    {
        global $conexao;
        
        // Verificar se o email e senha estão cadastrados, se sim
        /*$sql = $conexao->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();*/

        $sql = "SELECT id_usuarios FROM usuarios WHERE email = :e AND senha = ;s";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":e",$email);
        $stmt->bindValue(":s",md5($senha));
        $stmt->execute();

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