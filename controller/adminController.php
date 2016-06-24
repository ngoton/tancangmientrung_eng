<?php
Class adminController Extends baseController {
    public function index() {
    	$this->view->setLayout('admin');
        /*** set a template variable ***/
            //$this->view->data['welcome'] = 'Welcome to CAI MEP TRADING !';
        /*** load the index template ***/
            $this->view->data['title'] = 'Dịch vụ vận tải, xuất nhập khẩu, thủ tục hải quan, chỉnh sửa manifest';
            $this->view->show('admin/index');
    }


}
?>