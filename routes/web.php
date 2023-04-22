<?php

use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventsOrderController;
use App\Http\Controllers\EventsTicketController;
use App\Http\Controllers\EventsTicketItemController;
use App\Http\Controllers\FeastappRecordController;
use App\Http\Controllers\FeastbooksOrderController;
use App\Http\Controllers\FeastbooksProductController;
use App\Http\Controllers\FeastbookTransactionController;
use App\Http\Controllers\FeastmediaRecordController;
use App\Http\Controllers\FeastmercyministryRecordController;
use App\Http\Controllers\FeastphRecordController;
use App\Http\Controllers\HolyweekretreatRecordController;
use App\Http\Controllers\UserController;
use App\Models\EventsTicket;
use App\Models\EventsTicketItem;
use App\Models\FeastappRecord;
use Illuminate\Http\Request;
use App\Http\Livewire\Attendees;
use App\Models\FeastbooksOrder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    // Route::get('/', function () {
    //     return view('welcome');
    // });
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::resource('/attendees', AttendeeController::class);
    Route::resource('/events',EventController::class);
    Route::resource('/event-orders',EventsOrderController::class);
    Route::resource('/event-tickets',EventsTicketController::class);
    Route::resource('/event-ticket-items',EventsTicketItemController::class);
    Route::resource('/feastbook-orders', FeastbooksOrderController::class);
    Route::resource('/feastbook-products', FeastbooksProductController::class);
    Route::resource('/feastbook-transactions', FeastbookTransactionController::class);
    Route::resource('/feastmedia', FeastmediaRecordController::class);
    Route::resource('/feastph', FeastphRecordController::class);
    Route::resource('/feast-mercyministry', FeastmercyministryRecordController::class);
    Route::resource('/feast-app', FeastappRecordController::class);
    Route::resource('/holyweek-retreat', HolyweekretreatRecordController::class);

    // Route::get('file-import-export', [AttendeeController::class, 'fileImportExport']);
    // Route::post('file-import', [AttendeeController::class, 'fileImport'])->name('file-import');
    // Route::get('file-export', [AttendeeController::class, 'fileExport'])->name('file-export');
    
    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        // Route::get('/register', 'RegisterController@show')->name('register.show');
        // Route::post('/register', 'RegisterController@register')->name('register.perform');
        
        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});