<?php

namespace App\Services;

use App\Interfaces\CivilInternInterface;
use Illuminate\Http\Request;

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

    public function storeIntern(Request $request)
    {
        return $this->civilInternRepository->store($request);
    }

    public function updateIntern(Request $request, $id)
    {
        return $this->civilInternRepository->update($request, $id);
    }
    
    public function deleteIntern($id)
    {
        return $this->civilInternRepository->delete($id);
    }
}
