namespace App\Interfaces;

interface EmployeeInterface
{
    public function getEmployee(); 

    public function getEmployee($id); 

    public function createEmployee($data); 

    public function updateEmployee($id, $data); 

    public function deleteEmployee($id);  
}