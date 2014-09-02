<?php

class Application_Form_Receita extends Application_Form_TwitterBootstrap
{

    public function init()
    {
        $this->setAction('inserir')
            ->setMethod('post')
            ->setAttrib('class', 'form-horizontal')
            ->setName('form1');
        
        // Campos do formulário
        // Campo Id readonly
        $id = new Zend_Form_Element_Text('id');
        $id->setLabel('Id:')
            ->setAttrib('class', 'input-small')
            ->setAttrib('readonly', 'readonly');
        
        $nome = new Zend_Form_Element_Text('nome');
        $nome->setLabel('Nome:')
            ->setAttrib('class', 'input-xlarge')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty')
            ->setAttrib('title', 'Informe o nome');
        
        $origem = new Zend_Form_Element_Text('origem');
        $origem->setLabel('Origem:')
            ->setAttrib('class', 'input-xlarge')
            ->addFilter('StripTags')
            ->addFilter('StringTrim');
        
        $rendimento = new Zend_Form_Element_Text('rendimento');
        $rendimento->setLabel('Rendimento:')
        ->setAttrib('class', 'input-large')
        ->addFilter('StripTags')
        ->addFilter('StringTrim');
        
       
        $modoPreparo = new Zend_Form_Element_Textarea('modoPreparo');
        $modoPreparo->setLabel('Modo de Preparo:')
            ->setAttrib('class', 'span8')
            ->setAttrib('rows', '5');
        
        $botaoGravar = new Zend_Form_Element_Submit('Gravar');
        $botaoGravar->setAttrib('class', 'btn btn-success');
        
        $botaoLimpar = new Zend_Form_Element_Reset('Limpar');
        $botaoLimpar->setAttrib('class', 'btn btn-danger');
        
        $dataCriacao = new ZendX_JQuery_Form_Element_DatePicker('dataCriacao');
        $dataCriacao->setLabel('Data Criação.:')
            ->setJQueryParam('dateFormat', 'dd/mm/yy')
            ->setJQueryParam('changeYear', 'true')
            ->setJqueryParam('changeMonth', 'true')
            ->setJqueryParam('regional', 'pt')
            ->setJqueryParam('yearRange', "1930:2011")
            ->addValidator(new Zend_Validate_Date(array(
            'format' => 'dd/mm/yyyy'
        )))
            ->setRequired(true);
        
        $this->addElements(array(
            $id,
            $nome,
            $origem,
            $rendimento,
            $dataCriacao,
            $botaoGravar,
            $botaoLimpar
        ));
        
        $this->addDisplayGroup(array(
            $botaoGravar,
            $botaoLimpar
        ), 'botoes');
    }
}

