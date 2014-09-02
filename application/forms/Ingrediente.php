<?php

class Application_Form_Ingrediente extends Application_Form_TwitterBootstrap
{

    public function init()
    {
        $this->setAction('inserir')
            ->setMethod('post')
            ->setAttrib('class', 'form-horizontal')
            ->setName('form1');
        
        // Validadores
        // Validate para tamanho de campo
        $validacaoTamanho = new Zend_Validate_StringLength();
        $validacaoTamanho->setMin(5)
            ->setMax(100)
            ->setMessage('O nome deve ter entre 5 e 100 caracteres.');
        
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
        
        $validacaoCombo = new Zend_Validate_NotEmpty();
        $validacaoCombo->setMessage('Selecione um valor');
        
        // Campo select "Combo"
        $unidadeMedida = new Zend_Form_Element_Select('unidadeMedida');
        $unidadeMedida->setLabel("Unidade de Medida:")
            ->setAttrib('class', 'input-large')
            ->addValidator($validacaoCombo)
            ->addMultiOptions(array(
            null => 'Selecione...',
            'kg' => 'Kg',
            'lt' => 'Litro',
            'g' => 'Grama',
            'un' => 'Unidade',
            'Pç' => 'Porção'
        ));
        
        // Campo descrição
        $descricao = new Zend_Form_Element_Textarea('descricao');
        $descricao->setLabel('Descrição:')
            ->setAttrib('class', 'span8')
            ->setAttrib('rows', '5');
        
        $botaoGravar = new Zend_Form_Element_Submit('Gravar');
        $botaoGravar->setAttrib('class', 'btn btn-success');
        
        $botaoLimpar = new Zend_Form_Element_Reset('Limpar');
        $botaoLimpar->setAttrib('class', 'btn btn-danger');
        
        $datanasc = new ZendX_JQuery_Form_Element_DatePicker('datanasc');
        $datanasc->setLabel('Data Nasc.:')
            ->setAttrib('class', 'input-medium')
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
            $unidadeMedida,
            $descricao,
            $datanasc,
            $botaoGravar,
            $botaoLimpar
        ));
        
        $this->addDisplayGroup(array(
            $botaoGravar,
            $botaoLimpar
        ), 'botoes');
    }
}

