<?php

class Application_Model_DbTable_Ingrediente extends Zend_Db_Table_Abstract
{

    protected $_name = 'ingrediente';

    protected $_dependentTables = array(
        'Application_Model_DBTable_IngredienteReceita'
    );

    // // modelos
    // $user = new User();
    // $product = new Product();
    // $order = new Order();
    
    // // lista de usuários
    // $users = $user->fetchAll();
    // $this->view->assign('users', $users);
    
    // // lista de produtos
    // $products = $product->fetchAll();
    // $this->view->assign('products', $products);
    
    // // resgatando o usuário "Diogo Matheus"
    // $diogo = $user->find(1)->current();
    // // quais produtos foram cadastrados por ele?
    // $diogo_products = $diogo->findDependentRowset('Product');
    // $this->view->assign('diogo_products', $diogo_products);
    
    // // resgatando o produto "Casaco"
    // $casaco = $product->find(4)->current();
    // // quem cadastrou esse produto?
    // $casaco_user = $casaco->findParentRow('User');
    // $this->view->assign('casaco_user', $casaco_user);
    
    // // resgata um pedido, usuário que realizou e produtos que comprou
    // $pedido = $order->find(1)->current();
    // $pedido_user = $pedido->findParentRow('User');
    // $pedido_produtos = $pedido->findManyToManyRowset('Product', 'OrderItem');
    // $this->view->assign('pedido', $pedido);
    // $this->view->assign('pedido_user', $pedido_user);
    // $this->view->assign('pedido_produtos', $pedido_produtos);
}

