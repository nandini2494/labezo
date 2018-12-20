<?php

App::uses('AppController', 'Controller');

class PagesController extends AppController {

    private $pages_model;

    public function beforeFilter() {
        $this->loadModel('PagesModel');
        $this->pages_model = new PagesModel();
        session_start();
    }

    public function index() {
        
    }

    public function about() {
        
    }

    public function faq() {
        
    }

    public function work() {
        
    }

    public function sell() {
        if ($this->request->is('post')) {
            $this->set('message',$this->pages_model->sellerInfo($this->request->data));
        }
    }

    public function contact() {
        
    }

    public function term_conditions() {
        
    }

    public function seller() {
        
    }

    public function buyer() {
        
    }

    public function privacy() {
        
    }

    public function login() {
        if ($this->request->is('post')) {
            $st = $this->pages_model->loginUser($this->request->data);
            if ($st['status'] == FALSE) {
                $this->set("message", $st['msg']);
            } else {
                $this->Session->write('user_id', $st['msg']);
                $this->redirect("/sellerDashboard/index.html");
            }
        }
    }

}
