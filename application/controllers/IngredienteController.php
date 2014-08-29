<?php
class IngredienteController extends Zend_Controller_Action {
	public function init() {
		/* Initialize action controller here */
	}
	public function indexAction() {
		// action body
	}
	public function listarAction() {
		$this->view->titulo = 'Listagem de Ingredientes';
		$mapper = new Application_Model_IngredienteMapper();
		$this->view->registros = $mapper->listar ();
	}
}



