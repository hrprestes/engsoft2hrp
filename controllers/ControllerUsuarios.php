<?php
namespace controllers;

require_once('../DAO/DAOUsuario.php');
require_once('../models/DAOUsusuario.php');

/**
 * Esta classe é responsável por fazer o tratamento dos dados para
 * apresentação e/ou envio para a DAO executar as consultas no BD.
 * Seu escopo se limita às funções de Usuário, como login e inclusão de novos usuários.
 * 
 * @author Henrique Rodrigues Prestes
 */
class ControllerUsuario {
    /**
     * Método para realizar o login de um usuário no sistema.
     * @param string $login Login do usuário.
     * @param string $senha Senha do usuário.
     * @return Usuario|Exception Retorna um objeto do tipo Usuario com as informações do usuário se o login for bem sucedido, 
     * ou uma exceção caso o login falhe.
     */
    public function logarUsuario($login, $senha){
        $daoUsuario = new DAOUsuario();

        try {
            $usuario = $daoUsuario->logar($login, $senha);
            if($usuario->logado){
                return $usuario;
            }else {
                throw new  \Exception("Login ou senha incorretos.");
            }
        } catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Método para buscar um usuário pelo login.
     * @param string $login Login do usuário.
     * @return Usuario|Exception Retorna um objeto do tipo Usuario com os dados do usuário encontrado,
     * ou uma exceção caso o usuário não seja encontrado.
     */
    public function buscarUsuarioPorLogin($login){
        $daoUsuario = new DAOUsuario();

        try {
            $usuario = $daoUsuario->buscarUsuarioPorLogin($login);
            
            if ($usuario !== null) {
                return $usuario; // Retorna o objeto do usuário encontrado.
            } else {
                throw new \Exception("Usuário não encontrado.");
            }
            } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
            }
        }
    }
    
?>
