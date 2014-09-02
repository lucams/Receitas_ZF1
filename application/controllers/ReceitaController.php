<?php

class ReceitaController extends Zend_Controller_Action
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
     $this->view->titulo = 'Listagem de Receitas';
        $mapper = new Application_Model_ReceitaMapper();
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
        $form = new Application_Form_Receita();
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {
                $mapper = new Application_Model_ReceitaMapper();
                $model = new Application_Model_Receita($request->getParams());
                $mapper->inserir($model->toArray());
                $this->view->form = '';
                $this->_redirect('receita/listar');
            }
        }
        $this->view->form = $form;
    }


}





