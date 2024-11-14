<?php 

class PromotionController extends BaseController
{
    public $promotionModel;
    public function loadModels() {
        $this->promotionModel = new Promotion();
    }

    public function list() {
        $data = $this->promotionModel->allTable();
        $this->viewApp->requestView('Promotions.list.index', ['data' => $data]);
    }
}