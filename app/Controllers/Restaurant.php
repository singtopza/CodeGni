<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
#use App\models\RestaurantModel;

class Restaurant extends ResourceController
{
    use ResponseTrait;
    protected $modelName = 'App\Models\RestaurantModel';
    protected $format = 'json';

    //$this->model->method()

    // Get all Restaurants
    public function index(){

#        $model = new RestaurantModel();
#        $data['restaurants'] = $model->orderBy('id', 'DESC')->findAll();
$data['restaurants'] = $this->model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }

    //GET Restaurant by Id
    public function show($id = null){
        $data = $this->model->getWhere(['id' => $id])->getResult();
        if($data){
            return $this->respond($data);
        } else{
            return $this->failNotFound('No Restaurant found with id: ' . $id);
        }
    }
}