<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeRegistration;
use App\Http\Controllers\EmployeeLogin;
use App\Http\Controllers\CivilEmployeeController;
use App\Http\Controllers\MechanicalEmployeeController;
use App\Http\Controllers\CivilInternsController;
use App\Models\CivilIntern;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\MailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/employee-register', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
})->middleware(['auth'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::post("employee/register",[EmployeeRegistration::class, 'register']);

Route::get('/employee/login', [EmployeeLogin::class, 'showLoginForm']);

Route::post('employee/login', [EmployeeLogin::class, 'login']);

Route::middleware(['auth', 'role:civil,admin'])->group(function () {

    Route::get('/civil/home', [CivilEmployeeController::class, 'show'])->name('civil.home');

    Route::get("/civil/create",[CivilEmployeeController::class, 'create']);

    Route::post("/civil/store",[CivilEmployeeController::class, 'store']);

    Route::get("/civil/{id}/show",[CivilEmployeeController::class, 'shows']);

    Route::get("/civil/{id}/delete",[CivilEmployeeController::class, 'destroy']);
});

Route::middleware(['auth', 'role:mechanical,admin'])->group(function () {
    Route::get('/mechanical/home', [MechanicalEmployeeController::class, 'show'])->name('mechanical.home');

    Route::get("/mechanical/create",[MechanicalEmployeeController::class, 'create']);

    Route::post("/mechanical/store",[MechanicalEmployeeController::class, 'store']);

    Route::get("/mechanical/{id}/show",[MechanicalEmployeeController::class, 'shows']);

    Route::get("/mechanical/{id}/delete",[MechanicalEmployeeController::class, 'destroy']);
});

Route::prefix('civilIntern')->name('civilIntern.')->group(function () {
    
    Route::get('/home', [CivilInternsController::class, 'getAll'])->name('home');

    Route::get('/create', [CivilInternsController::class, 'create'])->name('create');

    Route::post('/add', [CivilInternsController::class, 'store'])->name('store');

    Route::get('/{id}/show', [CivilInternsController::class, 'getOne'])->name('show');

    Route::get('/{id}/edit', [CivilInternsController::class, 'edit'])->name('edit');

    Route::put('/{id}/update', [CivilInternsController::class, 'update'])->name('update');

    Route::get('/{id}/delete', [CivilInternsController::class, 'delete'])->name('delete');
});

Route::get('/civilintern-records', function () {
    //inner join
    $interns = CivilIntern::join('civil_employees', 'civil_interns.id', '=', 'civil_employees.id')
                 ->select('civil_interns.name as civil_intern_name', 'civil_employees.name  as civil_employee_name', 'civil_interns.email  as civil_intern_email', 'civil_employees.email  as civil_employee_email')
                 ->get();
    
                 return view('performjoins', ['interns' => $interns]);
});

Route::get('/interns-only', function () {
    // Removing the join
    $civil_interns = CivilIntern::select('civil_interns.name')
                 ->get();

    return response()->json($civil_interns);
});

Route::get('/users', [UserController::class, 'index']);

Route::resource('locations', LocationController::class);

//Route::get('civilEmployee/{id}', [RelationshipController::class, 'show'])->name('civilEmployee.show');
Route::get('/civilEmployees', [RelationshipController::class, 'index'])->name('civilEmployee.index');

Route::get('/user/{id}/posts', [UserController::class, 'allPosts'])->name('user.posts');  //one has many 

Route::get('/posts', [PostController::class, 'index'])->name('posts.index'); //One to Many (Inverse) / Belongs To:

Route::get('/user/{id}/latest-post', [UserController::class, 'latestPost'])->name('user.latestPost'); //Has One of Many:

Route::get('/country/{id}/post', [CountryController::class, 'singlePost'])->name('country.singlePost');  //Has One Through : 

Route::get('/countries/{id}/posts', [CountryController::class, 'allPosts'])->name('countries.posts');  //Has Many Through:

Route::post('/report/send/{employeeId}', [ReportController::class, 'sendReport']);

Route::get('/email-form', function() {
    return view('contact_form');
});

Route::post('/send', [MailController::class, "sendContactMail"])->name('send.contact_mail');