<?php
class Application_Model_IngredienteMapper {
	protected $dbTable;
	public function getDbTable() {
		if (null === $this->dbTable) {
			$this->setDbTable ( 'Application_Model_DbTable_Ingrediente' );
		}
		return $this->dbTable;
	}
	public function setDbTable($dbTable) {
		if (is_string ( $dbTable )) {
			$dbTable = new $dbTable ();
		}
		if (! $dbTable instanceof Zend_Db_Table_Abstract) {
			throw new Exception ( 'Tipo inválido!' );
		}
		$this->dbTable = $dbTable;
		return $this;
	}
	public function listar() {
		$resultset = $this->getDbTable ()->fetchAll ();
		$registros = array ();
		foreach ( $resultset as $linha ) {
			$obj = new Application_Model_Ingrediente ( $linha->toArray () );
			$registros [] = $obj;
		}
		return $registros;
	}
}

