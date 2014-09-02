<?php

class Application_Model_IngredienteReceita
{

    private $ingrediente_id;

    private $receita_id;

    private $quantidade;

    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->popula($options);
        }
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
        return $this;
    }

    public function popula(array $dados)
    {
        foreach ($dados as $key => $value) {
            $this->__set($key, $value);
        }
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}

