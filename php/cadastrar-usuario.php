<?php

    include("conexao.php");
    
    try{
        //verificar se o nome do usuario ja existe 
        $varVerifica = $pdo->prepare("SELECT COUNT(*) FROM login WHERE usuario = :usuario");
        $varVerifica -> bindParam(':usuario', $usuario);
        $varVerifica -> execute();

        if($varVerifica->fetchColumn() > 0){
           echo "Usuario ja cadastrado";
           exit;
        }

        //criptografar a senha 
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        //iniciar uma transação
        $pdo->beginTransaction();

        //Cadastrar/Inserir usuarios na tabela
        $varLogin = $pdo->prepare("INSERT INTO login (usuario, login) VALUES (:usuario, :senha)");
        $varLogin -> bindParam(':usuario', $usuario);
        $varLogin -> bindParam(':senha', $senha);
        $varLogin -> execute();

        //Preciso pegar o ID do login para inserir na tabela usuario, pois existe um relacionamento entre elas.
        $id_login = $pdo->lastInsertId();
        $varUsuario = $pdo->prepare("INSERT INTO usuario (nome, email, idLogin) VALUES (:nome, :email, :idLogin)");
        $varUsuario -> bindParam(":idLogin", $id_login);
        $varUsuario -> bindParam(":nome", $nome);
        $varUsuario -> bindParam(":email", $email);
        $varUsuario->execute();

        $pdo->commit();
        echo"Cadastro realizado com Sucesso!";

    }catch(PDOException $e){
        $pdo->rollBack();
        echo "Erro ao cadastrar". $e->getMessage();
    }


?>