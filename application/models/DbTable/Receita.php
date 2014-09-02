<?php

class Application_Model_DbTable_Receita extends Zend_Db_Table_Abstract
{

    protected $_name = 'receita';

    protected $_dependentTables = array(
        'Application_Model_DBTable_IngredienteReceita'
    );
}

