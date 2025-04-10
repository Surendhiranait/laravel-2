<?php 
namespace App\Interfaces;

use Illuminate\Http\Request;
use App\DTOs\CivilInternDTO;

interface CivilInternInterface
{
    public function getAll();

    public function getOne($id);

    public function create();

    public function store(CivilInternDTO $dto);

    public function update(CivilInternDTO $dto, $id);

    public function delete($id);

}
