<?php

class Application_Model_DbTable_IngredienteReceita extends Zend_Db_Table_Abstract
{

    protected $_name = 'ingrediente_receita';



    protected $_referenceMap = array(
        array(
            'refTableClass' => 'Application_Model_DBTable_Ingrediente',
            'refColumns' => 'id',
            'columns' => 'ingrediente_id'
        ),
        array(
            'refTableClass' => 'Application_Model_DBTable_Receita',
            'refColumns' => 'id',
            'columns' => 'receita_id'
        )
    );
}

