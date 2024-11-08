<?php 
namespace controllers;

require_once('../DAO/DAOProspect.php');

use DAO\DAOProspect;

/**
 * Esta classe é resposável por fazer o tratamento dos dados para
 * apresentação e/ou envio para a DAO executar as consultas no bd.
 * Seu escopo se limita às funções da entidade prospect.
 * 
 * @author Henrique Rodrigues Prestes
 */
class ControllerProspect{
    /**
     * Recebe um objeto do tipo Prospect, verifica se é para
     * salvar ou alterar e envia para a DAO executar a operação.
     * @param Prospect
     * @return TRUE|Exception Retorna TRUE caso a operação tenha sido bem sucedida e EXCEPTION caso não tenha.
     */
    public function salvarProspect($prospect){
        $daoProspect = new DAOProspect();

        if($prospect->codigo == null){
            try{
                $daoProspect->incluirProspect($prospect->nome, $prospect->email, $prospect->celular, $prospect->facebook,$prospect->whatsapp);
            }catch(\Exception $e){
                throw new \Exception ($e->getMessage());
            }
        
        }else{
            try{
                $daoProspect->atualizarProspect($prospect->nome, $prospect->email, $prospect->celular, $prospect->facebook,$prospect->whatsapp, $prospect->codigo);
                unset($daoProspect);
                return TRUE;
            }catch(\Exception $e){
                throw new \Exception($e->getMessage());

            }
        }
    }
    /**
     * Recebe de um objeto do tipo Prospect e envia para a DAO concluir
     * @param Prospect
     * @return TRUE|Exception Retorna TRUE caso a operação tenha sido bem sucedida e EXCEPTION caso não tenha.
     */
    public function excluirProspect($prospect){
        $daoProspect = new DAOProspect();
        try{
            $daoProspect->excluirProspect($prospect->codigo);
            unset($daoProspect);
            return TRUE;
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
    /**
         * Método para buscar Prospects por email.
         * Se não for informado o email, serão retornados todos.
         * @param String|null
         * @return Prospect[]
         */
        public function buscarProspects($email=null){
            $daoProspect = new DAOProspect();
            $prospects = array();

            if($email === null){
                $prospects = $daoProspect->buscarProspects();
                unset($daoProspect);
                return $prospects;
            }else{
                $prospects = $daoProspect->buscarProspects();
                unset($daoProspect);
                return $prospects;
            }
        }

}

?>