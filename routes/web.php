<?php

use App\Http\Livewire\Event\Create as EventCreate;
use App\Http\Livewire\Event\Index as EventIndex;
use App\Http\Livewire\Room\Create as RoomCreate;
use App\Http\Livewire\Room\Index as RoomIndex;
use App\Http\Livewire\User\Index;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\User\Create;
use App\Http\Livewire\User\Edit;
use App\Http\Livewire\User\Event;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::prefix('user')->name('user.')->group(function(){
    Route::get('/', Index::class)->name('index');
    Route::get('/create', Create::class)->name('create');
    Route::get('edit/{user}', Edit::class)->name('edit');
});
Route::prefix('event')->name('event.')->group(function(){
    Route::get('index', EventIndex::class)->name('index');
    Route::get('/create', EventCreate::class)->name('create');
});

Route::prefix('room')->name('room.')->group(function(){
    Route::get('index', RoomIndex::class)->name('index');
    Route::get('create', RoomCreate::class)->name('create');
});
