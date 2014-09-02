<?php

class Application_Form_TwitterBootstrap extends Zend_Form
{
    // Decorator do Form
    protected $_formDecorator = array(
        'FormElements',
        'Fieldset',
        'Form'
    );
    
    // Decorator de todos os elementos do form
    protected $_elementDecorator = array(
        'ViewHelper', // Renderiza a view sem modificações
        'Errors', // Renderiza os erros sem modificações
        'Description', // Renderiza as descrições sem modificações
                       // Cria uma tag div com class controls
        array(
            array(
                'inner' => 'HtmlTag'
            ),
            array(
                'tag' => 'div',
                'class' => 'controls'
            )
        ),
        
        // Adiciona a label com classe control-label dentro da div acima
        array(
            'label',
            array(
                'tag' => 'div',
                'class' => 'control-label'
            )
        ),
        
        // Adiciona uma div dentro da div controls com o a class control-group
        array(
            array(
                'control-group' => 'HtmlTag'
            ),
            array(
                'tag' => 'div',
                'class' => 'control-group'
            )
        )
    );

    protected $_formJQueryElements = array(
        array(
            'UiWidgetElement',
            array(
                'tag' => 'div',
                'class' => ''
            )
        ),
        array(
            'Errors'
        ),
        array(
            'Label',
            array(
                'tag' => 'div',
                'class' => 'control-label'
            )
        ),
        
        array(
            array(
                'control-group' => 'HtmlTag'
            ),
            array(
                'tag' => 'div',
                'class' => 'control-group'
            )
        )
    );

    protected $_submitDecorator = array();

    public function __construct($options = null)
    {
        parent::__construct($options);
        $this->setDecorators($this->_formDecorator);
    }

    public function addDisplayGroup(array $elements, $name, $options = null)
    {
        parent::addDisplayGroup($elements, $name, $options);
        
        if ($name == 'botoes') {
            $this->getDisplayGroup($name)->addDecorators(array(
                'FormElements',
                array(
                    'HtmlTag',
                    array(
                        'tag' => 'div',
                        'class' => 'controls'
                    )
                )
            ));
        } else {
            $this->getDisplayGroup($name)
                ->addDecorators(array(
                'FormElements',
                array(
                    'HtmlTag',
                    array(
                        'tag' => 'div',
                        'class' => 'control-group'
                    )
                )
            ))
                ->removeDecorator('DtDdWrapper');
        }
    }

    public function addElements(array $elements)
    {
        foreach ($elements as $element) {
            $this->addElement($element);
        }
    }

    public function addElement($element, $name = null, $options = null)
    {
        if (! is_string($element)) {
            $element->setDisableLoadDefaultDecorators(true);
            
            if (($element instanceof Zend_Form_Element_Submit) || ($element instanceof Zend_Form_Element_Button) || ($element instanceof Zend_Form_Element_Reset)) {
                $element->addDecorators($this->_submitDecorator)->removeDecorator('DtDdWrapper');
            } else 
                if ($element instanceof ZendX_JQuery_Form_Element_DatePicker) {
                    $element->addDecorators($this->_formJQueryElements)->removeDecorator('DtDdWrapper');
                } else {
                    $element->addDecorators($this->_elementDecorator);
                }
        }
        
        parent::addElement($element, $name, $options);
        
        return $this;
    }
}




