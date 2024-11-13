<?php 

class promotionController extends BaseController
{
    public $promotionModel;
    public function loadModels() {
        $this->promotionModel = new Promotion();
    }

    public function  list() {
        echo "....asdfjas;ldfj;la";
        // $data = $this->promotionModel->allTable();
        $data = ['1,2,3'];
        $this->viewApp->requestView('Promotions.list.index', ['data' => $data]);
    }
}