<?php

class Application_Model_ReceitaMapper
{

    protected $dbTable;

    public function getDbTable()
    {
        if (null === $this->dbTable) {
            $this->setDbTable('Application_Model_DbTable_Receita');
        }
        return $this->dbTable;
    }

    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (! $dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Tipo inválido!');
        }
        $this->dbTable = $dbTable;
        return $this;
    }

    public function listar()
    {
        $resultset = $this->getDbTable()->fetchAll();
        $registros = array();
        foreach ($resultset as $linha) {
            $obj = new Application_Model_Receita($linha->toArray());
            $registros[] = $obj;
        }
        return $registros;
    }

    public function inserir($dados)
    {
        $this->getDbTable()->insert($dados);
    }

    public function excluir($id)
    {
        settype($id, 'integer');
        $tabela = $this->getDBTable();
        $where = $tabela->getAdapter()->quoteInto('id=?', $id);
        // Exclusão Lógica
        $tabela->update(array(
            'situacao' => 'N'
        ), $where);
        
        // Exclusão física
        // $tabela->delete($where);
    }

    public function buscar($id)
    {
        settype($id, 'integer');
        $tabela = $this->getDBTable();
        $where = $tabela->getAdapter()->quoteInto('id=?', $id);
        $result = $this->getDBTable()->fetchAll($where);
        
        $obj = $result->current();
        $itensObj = $obj->findManyToManyRowset('Receita', 'IngredienteReceita');
        
        // foreach ($result as $linha) {
        // $obj = new Application_Model_Receita($linha->toArray());
        // }
        return $itensObj;
    }

    public function atualizar($dados)
    {
        $id = $dados['id'];
        settype($id, 'integer');
        $tabela = $this->getDBTable();
        $where = $tabela->getAdapter()->quoteInto('id=?', $id);
        $tabela->update($dados, $where);
    }
}

