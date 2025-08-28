<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::Route::get('/dash', function () { return view('home'); })->name('home')
Route::get('/', function () { return view('home'); })->name('home');


Route::get('/register2', [BaseController::class, 'create'])->name('register2');
Route::post('/register2', [BaseController::class, 'store']);
Route::middleware('web')->group(function () {
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/login2', [CaseController::class, 'showLoginForm'])->name('login2');
Route::post('/login2', [AuthController::class, 'login'])->name('login2.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard2', function () { return view('dashboard2'); })->name('dashboard2');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::get('/stats', [AdminController::class, 'stats'])->name('stats');
        Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
        Route::get('/staff', [AdminController::class, 'staff'])->name('admin.staff');

});


Route::middleware(['auth'])->group(function () {
Route::get('/redac', [EditorialController::class, 'redac'])->name('redac');
});
Route::get('/metod', fn() => view('metod'))->name('metod');
Route::get('/vipusk', fn() => view('vipusk'))->name('vipusk');
Route::get('/search', fn() => view('search'))->name('search');
Route::get('/zhournal', fn() => view('zhournal'))->name('zhournal');
Route::get('/language/{lang}', [LanguageController::class, 'switch'])->name('language.switch');
Route::get('/settings', fn() => view('settings'))->name('settings');


Route::get('/editorials', [EditorialController::class, 'index'])->name('editorials.index');
Route::get('/editorials/create', [EditorialController::class, 'create'])->name('editorials.create');
Route::post('/editorials/store', [EditorialController::class, 'store'])->name('editorials.store');
Route::get('/editorials/thankyou', [EditorialController::class, 'thankyou'])->name('editorials.thankyou');
Route::get('/editorials/{id}/end', [EditorialController::class, 'end'])->name('editorials.end');
Route::get('/editorials/{id}', [EditorialController::class, 'show'])->name('editorials.show');
Route::get('/editorials/admin', [EditorialController::class,'adminList'])->name('admin.adminList');
Route::get('/editor/editorials', [EditorialController::class,'editorList'])->name('editorials.editorList');
Route::get('/reviewer/editorials', [EditorialController::class,'reviewerList'])->name('editorials.reviewerList');

Route::get('/admin/editorials', [AdminController::class,'editorials'])
     ->name('admin.editorials.index');

Route::post('/roles/assign/{user}', [RoleController::class, 'assign'])
    ->middleware('role:admin')
    ->name('roles.assign');

Route::post('/authors', [UserController::class, 'store'])->name('authors.store');
Route::get('/person', [UserController::class, 'person'])->name('person');
Route::get('/roles', [UserController::class, 'index'])->name('roles.index');
Route::post('/roles/{id}/assign-role', [UserController::class, 'assignRole'])->name('users.assignRole');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
Route::get('/users', [UserController::class, 'index'])->name('admin.staff');
Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
});

