<?php

class User
{
    private $id, $nome, $email, $senha, $tempo;

    public function __construct($nome, $email, $senha, $tempo = null)
    {
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setSenha($senha);
        $this->setTempo($tempo);
    }

    # setters
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    public function setEmail($email): void 
    {
        $this->email = $email;
    }

    public function setSenha($senha): void
    {
        $this->senha = $senha;
    }

    public function setTempo($tempo): void
    {
        $this->tempo = $tempo;
    }

    # getters

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function getTempo()
    {
        return $this->tempo;
    }

}