<?php

session_start();

/**
 * Classe responsável por gerenciar o login do usuário.
 */
class Login { 
    /**
     * @var string Nome de usuário padrão para login.
     */
    private $name = 'estagio'; 
    
    /**
     * @var string Senha padrão para login.
     */
    private $password = 'estagio';
    
    /**
     * Verifica as credenciais do usuário.
     *
     * @param string $name Nome de usuário inserido pelo usuário.
     * @param string $password Senha inserida pelo usuário.
     * @return bool Retorna TRUE se as credenciais estão corretas, FALSE caso contrário.
     */
    public function verificar_credenciais($name, $password) { 
        if ($name === $this->name && $password === $this->password) {
            $_SESSION["logged_in"] = true;
            return true;
        }
        return false;
    } 

    /**
     * Verifica se o usuário está logado.
     *
     * @return bool Retorna TRUE se o usuário está logado, FALSE caso contrário.
     */
    public function verificar_logado() { 
        return isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true;
    } 

    /**
     * Realiza o logout do usuário.
     *
     * Destroi a sessão do usuário.
     */
    public function logout() { 
        session_unset();
        session_destroy();
    } 
}
