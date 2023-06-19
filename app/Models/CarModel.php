<?php

namespace App\Models;
use App\Libraries\MongoDB;
use CodeIgniter\Model;
use App\Libraries\DatabaseConnector;

class CarModel extends Model
{
    private $database = 'demo';
	private $collection = 'cars';
	private $conn;


    function __construct() {
        $connection = new DatabaseConnector();
        $database = $connection->getDatabase();
        $this->collection = $database->cars;
    }

    public function getCar($id) {
        try {
            $book = $this->collection->findOne(['_id' => new \MongoDB\BSON\ObjectId($id)]);

            return $book;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while fetching book with ID: ' . $id . $ex->getMessage(), 500);
        }
    }

    function getCars() {
        try {
            $cursor = $this->collection->find();
            $books = $cursor->toArray();

            return $books;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while fetching cars: ' . $ex->getMessage(), 500);
        }
    }

    function insert($data = null, bool $returnID = true) {
        try {
            echo var_dump($data);
            $insertOneResult = $this->collection->insertOne([
                'brand' => $data['brand'],
                'model' => $data['model'],
                'year' => $data['year'],
                'price' => $data['price'],
            ]);

            if($insertOneResult->getInsertedCount() == 1) {
                return true;
            }

            return false;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while creating a car: ' . $ex->getMessage(), 500);
        }
    }

    function updateCar($id, $brand, $model, $year, $price) {
        try {
            $result = $this->collection->updateOne(
                ['_id' => new \MongoDB\BSON\ObjectId($id)],
                ['$set' => [
                    'brand' => $brand,
                    'model' => $model,
                    'year' => $year,
                    'price' => $price,
                ]]
            );

            if($result->getModifiedCount()) {
                return true;
            }

            return false;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while updating a book with ID: ' . $id . $ex->getMessage(), 500);
        }
    }

    function deleteCar($id) {
        try {
            $result = $this->collection->deleteOne(['_id' => new \MongoDB\BSON\ObjectId($id)]);

            if($result->getDeletedCount() == 1) {
                return true;
            }

            return false;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while deleting a book with ID: ' . $id . $ex->getMessage(), 500);
        }
    }
}

?>