<?php
Class teaController Extends baseController {
    public function index() {
        
            $menu_model = $this->model->get('menuModel');
            $menus = $menu_model->getAllMenu();
            $this->view->data['menus'] = $menus;
            $this->view->data['title'] = 'Tea';


            $this->view->show('tea/index');
    }


}
?>