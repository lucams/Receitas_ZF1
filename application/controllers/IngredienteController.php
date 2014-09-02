<?php

class IngredienteController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function listarAction()
    {
        
    	$this->view->titulo = 'Listagem de Ingredientes';
        $mapper = new Application_Model_IngredienteMapper();
        //Sem paginação
        // $this->view->registros = $mapper->listar();

        //Com Paginação
        $request = $this->getRequest();
        //Busca o numero da página corrente
        $pagina = $request->getParam('p');
        if (is_null($pagina))
            $pagina = 1;
        //Popula o paginator com os dados do select
        $paginator = Zend_Paginator::factory($mapper->listar());
        //Seta a página corrente
        $paginator->setCurrentPageNumber($pagina);
        // Seta a quantidade de registros por página
        $paginator->setItemCountPerPage(5);
        // numero de paginas que serão exibidas
        $paginator->setPageRange(5);
        //devolve o paginator
        $this->view->registros = $paginator;
    
    
    
    }

    public function inserirAction()
    {
        $form = new Application_Form_Ingrediente();
        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {
                $mapper = new Application_Model_IngredienteMapper();
                $model = new Application_Model_Ingrediente($request->getParams());
                $mapper->inserir($model->toArray());
                $this->view->form = '';
                $this->_redirect('ingrediente/listar');
            }
        }
        $this->view->form = $form;
    }

    public function excluirAction()
    {
        $mapper = new Application_Model_IngredienteMapper();
        $request = $this->getRequest();
        // pegar o parametro
        $id = $request->getParam('id');
        // excluir registro do banco
        $mapper->excluir($id);
        // redirecionar
        $this->_redirect('ingrediente/listar');
    }

    public function editarAction()
    {
        // Instancia das classes necessárias
        $model = new Application_Model_Ingrediente();
        $mapper = new Application_Model_IngredienteMapper();
        $form = new Application_Form_Ingrediente();
        //alteração da action para o retorno
        $form->setAction('editar');
      
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {
                // pega os valores do formulario
                $dados = $form->getValues();
                $model->popula($dados);
                $mapper->atualizar($model->toArray());
                unset($this->view->form);
                $this->_redirect('/ingrediente/listar');
            } else {
                // caso não seja valido
                $this->view->form = $form;
            }
        } else {
            // Buscar a informação no bd através do ID
            $id = $request->getParam('id');
            $model = $mapper->buscar($id);
            $form->populate($model->toArray());
            $this->view->form = $form;
        }
    }
}









