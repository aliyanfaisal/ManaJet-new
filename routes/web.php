<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Task\TaskController;
use App\Http\Controllers\Team\TeamController;
use App\Http\Controllers\User\UsersController;
use App\Http\Controllers\Ticket\TicketController;
use App\Http\Controllers\UserRole\RoleController;
use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\Permission\PermissionController;
use App\Http\Controllers\Project\ProjectCategoriesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/home', function(){
    return redirect("/");
})->name('home');


Route::get('/', function () {
    return view("pm-dashboard.home");
})->middleware("auth");


include("project_manager_web.php");
/// PROjeCT manAger routes
Route::get('/dashboard', function (Request $request) {
    
    if(Auth::check()){
        $user= Auth::user();
        
        if($user->role['id']==1){
            return redirect()->route("pm-dashboard");
        }
        else{
            return redirect()->route("member-dashboard");
        }
    }
    else{

        return redirect()->route("login");
    }

})->name("dashboard");



Route::prefix("/pm/dashboard")->middleware("auth")->group(function(){

    Route::get("/", [DashboardController::class,"superDashboard"])->name("pm-dashboard");

    Route::resource('project', ProjectController::class);

    Route::resource('project-categories', ProjectCategoriesController::class);

    Route::resource('tasks', TaskController::class);

    Route::resource('tickets', TicketController::class);

    Route::resource("teams", TeamController::class);
    
    Route::post("teams/{team}/update-members", [TeamController::class,"updateMembers"])->name("teams.updateMembers");

    Route::resource("users", UsersController::class);

    Route::resource("user-roles", RoleController::class);


    Route::resource("permissions", PermissionController::class);
});


Route::prefix("/member/dashboard")->group(function(){

    
    Route::get("/", [DashboardController::class,"superDashboard"])->name("member-dashboard");
    
});



