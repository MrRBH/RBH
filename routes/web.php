<?php

use App\Http\Controllers\CustomAuthController;
use App\Livewire\Adminview;
use App\Livewire\ViewPostComponent;

use App\Livewire\BlogPostComponent;
use App\Livewire\CreatePost;
use App\Livewire\Dashboard;
use App\Livewire\Navbar;
use App\Livewire\ShowPosts;
use App\Livewire\Login;
use App\Livewire\Register;
use App\Livewire\Table;
use Illuminate\Support\Facades\Route;


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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/show', ShowPosts::class)->name('showpost');
// Route::get('/post', function () {
//     return view('livewire.show-posts');
// });
// Route::get('/navbar',Navbar::class);
// Route::get('/table',[Table::class,'index']);

// Route::get('/form',function(){
//     return view('livewire.form');
// });

// Route::get('/action', function () {
//     return view('livewire.action');
// });

Route::get('/blog',BlogPostComponent::class)->name('blog.posts');


// Route::get('/blog-posts', BlogPostComponent::class);
Route::get('/viewpost/{postId}', ViewPostComponent::class)->name('view.post');
// Route::view('')









Route::get('/login', Login::class)->name('livewire.login');
Route::get('livewire.dashboard', [Login::class,'checking']);
Route::post('custom-login', [Login::class, 'customLogin'])->name('livevwire.customlogin');
Route::get('signout', [Login::class, 'signOut'])->name('livewire.signout');
Route::get('registerr', Register::class)->name('livewire.registerr');
Route::post('custom-registration', [Register::class, 'customRegistration'])->name('livewire.customregister');
Route::get('livewire.dashboard', Dashboard::class)->name('livewire.dashboard');
Route::get('/',ShowPosts::class)->name('showposts');


// Route::get('/dashboard', [CustomAuthController::class, 'dashboard']);
// Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
// Route::get('login', [CustomAuthController::class, 'index'])->name('login');
// Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
// Route::get('register', [CustomAuthController::class, 'registration'])->name('register');
// Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
// Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
// Route::get('welcome', [CustomAuthController::class, 'welcome'])->name('welcome');
