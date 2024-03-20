<?php

namespace MF\Controller;

abstract class Action {

    protected $view;  

    public function __construct(){
        $this->view = new \stdClass();
    }

    protected function render($view, $layout = 'layout'){
        $this->view->page = $view;

        if (file_exists("../App/Views/".$layout.".phtml")){
            require_once "../App/Views/".$layout.".phtml";
        }
        else {
            $this->content();
        }
       
    }

    protected function content(){
    $classeAtual = get_class($this);

    $classeAtual = str_replace('App\\Controllers\\','',$classeAtual);

    $classeAtual = strtolower(str_replace('Controller', '', $classeAtual));
 
    require_once "../App/Views/".$classeAtual."/".$this->view->page.".phtml";

    }
}
?>