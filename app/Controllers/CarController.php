<?php

namespace App\Controllers;

use App\Models\CarModel;

class CarController extends BaseController
{
    private $usermodel;
 
    public function __construct() {
        $this->usermodel = new CarModel();
    }
    public function index()
    {
        $carModel = new CarModel();
        $cars = $carModel->getCars();

        return view('car/index', ['cars' => $cars]);
    }

    // public function index() {
    //     $data['users'] = $this->usermodel->get_user_list();
    //     return view('users', $data);
    //   }

    public function create()
    {
        return view('car/create');
    }

    public function store()
    {
        $carModel = new CarModel();

        $data = [
            'brand' => $this->request->getPost('brand'),
            'model' => $this->request->getPost('model'),
            'year' => $this->request->getPost('year'),
            'price' => $this->request->getPost('price'),
        ];

        $carModel->insert($data);

        return redirect()->to('/car');
    }

    public function update($segment = null)
    {
        $model = model(CarModel::class);

        $data['car'] = $model->getCar($segment);

        if (empty($data['car'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find car with ID: ' . $segment);
        }

        if ($this->request->getMethod() === 'post') {
            $model->updateCar(
                $data['car']['_id'],
                $this->request->getPost('brand'),
                $this->request->getPost('model'),
                $this->request->getPost('year'),
                $this->request->getPost('price'),
            );

            return redirect()->to('car');
        } else {
            echo view('car/edit', $data);
        }
    }

    public function delete($segment = null) {
        if (!empty($segment) && $this->request->getMethod() == 'get') {
            $model = model(CarModel::class);
            $model->deleteCar($segment);
        }

        return redirect()->to('car');
    }
}
?>