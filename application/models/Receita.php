<?php

class Application_Model_Receita
{
    private $id;
    private $nome;
    private $origem;
    private $rendimento;
    private $modoPreparo;
    private $dataCriacao;
    private $situacao;
    private $ingredientes;
    
    public function __construct(array $options = null) {
        if (is_array ( $options )) {
            $this->popula ( $options );
        }
    }
    public function __get($name) {
        return $this->$name;
    }
    public function __set($name, $value) {
        if (property_exists ( $this, $name )) {
            $this->$name = $value;
        }
        return $this;
    }
    public function popula(array $dados) {
        foreach ( $dados as $key => $value ) {
            if (gettype($value)=='array'){
                foreach ($value as $item) {
                  $this->ingredientes[]=$item;
                }
            } else{
            $this->__set ( $key, $value );
            }
        }
    }
    
    public function toArray(){
        return get_object_vars($this);
    }

}

