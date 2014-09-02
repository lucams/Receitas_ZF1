<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initView()
    {
        $view = new Zend_View();
        $view->cssPath = '/css';
        $view->jsPath = '/js';
        $view->headLink()->appendStylesheet($view->cssPath . '/bootstrap.css', 'screen');
        $view->headLink()->appendStylesheet($view->cssPath . '/bootstrap-responsive.css', 'screen');
        
        //Script customizado
        $view->headScript()->appendFile($view->jsPath.'/meuScript.js','text/javascript');
        
        // Js do Jquery
  
        $view->addHelperPath('ZendX/JQuery/View/Helper', 'ZendX_JQuery_View_Helper');
        $view->JQuery()
            ->setLocalPath($view->jsPath . '/jquery-1.9.1.js')
            ->setUiLocalPath($view->jsPath . '/jquery-ui-1.10.3.custom.min.js')
            ->addStyleSheet($view->cssPath . '/jquery-ui-1.10.3.custom.min.css')
            ->addJavascriptFile($view->jsPath . '/jquery.ui.datepicker-pt-BR.min.js');
        
        $viewRenderer = new Zend_Controller_Action_Helper_ViewRenderer();
        $viewRenderer->setView($view);
        Zend_Controller_Action_HelperBroker::addHelper($viewRenderer);
        return;
    }
}

