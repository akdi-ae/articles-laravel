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
use App\Http\Controllers\EditorController;


// ------------------- Главная
Route::get('/', fn() => view('home'))->name('home');


// ------------------- Регистрация / Логин
Route::get('/register2', [BaseController::class, 'create'])->name('register2');
Route::post('/register2', [BaseController::class, 'store']);

Route::middleware('web')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    Route::get('/login2', [CaseController::class, 'showLoginForm'])->name('login2');
    Route::post('/login2', [AuthController::class, 'login'])->name('login2.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ------------------- Пользовательский кабинет
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard2', fn() => view('dashboard2'))->name('dashboard2');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// ------------------- Админка
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::get('/stats', [AdminController::class, 'stats'])->name('stats');
        Route::get('/staff', [AdminController::class, 'staff'])->name('staff');
        Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    });

    use App\Http\Controllers\Admin\EditorialController as AdminEditorialController;

Route::prefix('admin')
    ->middleware(['auth', 'role:admin'])
    ->name('admin.')
    ->group(function () {
        // Список статей
        Route::get('/index', [EditorialController::class, 'index'])
            ->name('admin.index');

        // Одобрение
        Route::patch('/editorials/{id}/approve', [EditorialController::class, 'approve'])
            ->name('editorials.approve')
            ->middleware('role:editor');

        // Отклонение
        Route::patch('/editorials/{id}/reject', [EditorialController::class, 'reject'])
            ->name('editorials.reject');

        // Отправка на рецензию


        // Публикация
        Route::patch('/editorials/{id}/publish', [EditorialController::class, 'publish'])
            ->name('editorials.publish');
    });


// Редактор
Route::middleware(['auth', 'role:editor'])
    ->prefix('editor')
    ->name('editor.')
    ->group(function () {
        Route::get('/dashboard', [EditorialController::class, 'editorDashboard'])->name('dashboard');
    });

        // Route::get('/articles', [EditorialController::class, 'myArticles'])->name('articles');
        // Route::get('/articles/{id}', [EditorialController::class, 'show'])->name('articles.show');
        // Route::post('/articles/{id}/review', [EditorialController::class, 'review'])->name('articles.review');



     Route::patch('/editorials/{editorial}/status', [EditorialController::class, 'updateStatus'])
    ->name('editorials.updateStatus')
    ->middleware('auth');
    Route::patch('/editor/editorials/{id}/approve', [EditorialController::class, 'approveByEditor'])
    ->name('editorials.approve');

Route::patch('/editor/editorials/{id}/reject', [EditorialController::class, 'rejectByEditor'])
    ->name('editor.editorials.reject');
    Route::patch('/admin/editorials/{id}/approve', [EditorialController::class, 'approveByAdmin'])
    ->name('admin.editorials.adminApprove');

Route::patch('/admin/editorials/{id}/reject', [EditorialController::class, 'rejectByAdmin'])
    ->name('admin.editorials.adminReject');

Route::post('/reviewer/editorials/{id}/review', [EditorialController::class, 'review'])
    ->name('reviewer.editorials.review');



// Профиль для редактора и рецензента
    Route::get('/profiles', [EditorController::class, 'profile'])->name('profiles');
// Рецензент
Route::get('/reviewer/dashboard', [EditorialController::class, 'reviewerDashboard'])
    ->middleware(['auth', 'role:reviewer'])
    ->name('reviewer.dashboard');
// Опубликовать статьи
Route::get('/published', [EditorialController::class, 'published'])
    ->name('published');

        // Управление статьями
Route::get('/editorials', [AdminController::class, 'editorials'])->name('editorials.admin');
// Авторы
Route::get('/authors', [UserController::class, 'authorsIndex'])->name('authors.index');





// ------------------- Публикация статьи
Route::middleware(['auth'])->group(function () {
    Route::get('/redac', [EditorialController::class, 'redac'])->name('redac');
});
Route::get('/editorials/admin', [EditorialController::class, 'index'])->name('editorials.admin');
Route::get('/editorials', [EditorialController::class, 'index'])->name('editorials.index');
Route::get('/editorials/create', [EditorialController::class, 'create'])->name('editorials.create');
Route::post('/editorials/store', [EditorialController::class, 'store'])->name('editorials.store');
Route::get('/editorials/thankyou', [EditorialController::class, 'thankyou'])->name('editorials.thankyou');
Route::get('/editorials/{id}/end', [EditorialController::class, 'end'])->name('editorials.end');
Route::get('/editorials/{id}', [EditorialController::class, 'show'])->name('editorials.show');

// Для разных ролей
Route::middleware(['auth', 'role:admin|editor|reviewer'])->group(function () {
    Route::get('/editorials/editor', [EditorialController::class, 'editorList'])
        ->name('editorials.editorList');
});
Route::get('/editorials/reviewer', [EditorialController::class, 'reviewerList'])->name('editorials.reviewerList');

// redactor
Route::middleware(['auth', 'role:editor'])
    ->prefix('editor')
    ->name('editor.')
    ->group(function () {
        Route::get('/articles', [EditorialController::class, 'myArticles'])->name('articles');
    });

// ------------------- Добавление ролей
Route::post('/roles/assign/{user}', [RoleController::class, 'assign'])
    ->middleware('role:admin')
    ->name('roles.assign');

Route::post('/authors', [UserController::class, 'store'])->name('authors.store');
Route::get('/person', [UserController::class, 'person'])->name('person');
Route::get('/roles', [UserController::class, 'index'])->name('roles.index');
Route::post('/roles/{id}/assign-role', [UserController::class, 'assignRole'])->name('users.assignRole');


// гостевой страницы
Route::get('/metod', fn() => view('metod'))->name('metod');
Route::get('/vipusk', fn() => view('vipusk'))->name('vipusk');
Route::get('/search', fn() => view('search'))->name('search');
Route::get('/zhournal', fn() => view('zhournal'))->name('zhournal');
Route::get('/settings', fn() => view('settings'))->name('settings');


// ------------------- Язык -------------------
Route::get('/language/{lang}', [LanguageController::class, 'switch'])->name('language.switch');
