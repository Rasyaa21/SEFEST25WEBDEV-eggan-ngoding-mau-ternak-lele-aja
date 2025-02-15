<?php 

namespace App\Interfaces;

interface PondRepositoryInterface{
    public function getUserPond();
    public function addPond($req);
    public function getPondById($id);
    public function editPond($req, $id);
    public function deletePond($id);
}