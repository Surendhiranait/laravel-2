<?php

namespace App\Services;

use App\Interfaces\CivilInternInterface;
use Illuminate\Http\Request;
use App\DTOs\CivilInternDTO;

class CivilInternService
{
    protected $civilInternRepository;

    public function __construct(CivilInternInterface $civilInternRepository)
    {
        $this->civilInternRepository = $civilInternRepository;
    }

    public function getAllInterns()
    {
        return $this->civilInternRepository->getAll();
    }

    public function getOneInterns($id)
    {
        return $this->civilInternRepository->getOne($id);
    }

    public function createInternForm()
    {
        return $this->civilInternRepository->create();
    }

    public function storeIntern(CivilInternDTO $dto)
    {
        return $this->civilInternRepository->store($dto);
    }

    public function updateIntern(CivilInternDTO $dto, $id)
    {
        return $this->civilInternRepository->update($dto, $id);
    }
    
    public function deleteIntern($id)
    {
        return $this->civilInternRepository->delete($id);
    }
}
