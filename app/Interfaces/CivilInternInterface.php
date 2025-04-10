<?php 
namespace App\Interfaces;

use Illuminate\Http\Request;

interface CivilInternInterface
{
    public function getAll();

    public function getOne($id);

    public function create();

    public function store(Request $request);

    public function update(Request $request, $id);

    public function delete($id);

}
