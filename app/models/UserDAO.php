<?php
namespace App\Models;

class UserDAO
{
    private PDO $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function create(User $user): void
    {
        try {
            $query = "INSERT INTO usuarios (nome, email, senha) VALUES (:NOME, :EMAIL, :SENHA)";

            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(":NOME", $user->getNome());
            $stmt->bindValue(":EMAIL", $user->getEmail());
            $stmt->bindValue(":SENHA", $user->getSenha());

            $stmt->execute();

        } catch (PDOException $e) {
            echo "Erro ao cadastrar". $e->getMessage();
        }
    }

    public function email_existe($email)
    {
        $stmt = $this->pdo->prepare("SELECT id FROM usuarios WHERE email = :EMAIL");
        $stmt->bindValue(":EMAIL", $email);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function procurar_email($email)
    {
        $stmt = $this->pdo->prepare("SELECT id , nome, email, senha FROM usuarios WHERE email = :EMAIL");
        $stmt->bindValue(":EMAIL", $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ?: null;
    }
}