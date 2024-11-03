<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\MotoController;
use App\Http\Controllers\Admin\NbaController;
use App\Http\Controllers\Admin\NFLController;
use App\Http\Controllers\Admin\NRLController;
use App\Http\Controllers\Admin\TableTennisController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TennisController;
use App\Http\Controllers\Admin\TradeController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UfcController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MyProfile;

use App\Http\Controllers\User\FundsController;
use App\Http\Controllers\User\HelpController;
use App\Http\Controllers\User\SecurityController;
use App\Http\Controllers\User\StatisticsController;
use App\Http\Controllers\User\TradeStatementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

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

// Route::get('/link-storage', function () {
//    Artisan::call('storage:link');
// });

Route::middleware(['auth'])->group(function () {
   Route::get('/', function () {
      return redirect()->route('login');
   });



   Route::resource('clients', ClientController::class)->middleware('admin');

   Route::resource('events', EventController::class)->middleware('admin');

   Route::resource('teams', TeamController::class)->middleware('admin');
   Route::post('teams/filter', [TeamController::class, 'filter'])->middleware('admin')->name('teams.filter');

   Route::resource('trades', TradeController::class)->middleware('admin');
   Route::resource('nrl-trades', NRLController::class)->middleware('admin');
   Route::resource('nfl-trades', NFLController::class)->middleware('admin');
   Route::resource('nba-trades', NbaController::class)->middleware('admin');
   // Route::resource('ufc-trades', UfcController::class)->middleware('admin');
   Route::resource('moto-trades', MotoController::class)->middleware('admin');
   Route::resource('table-tennis-trades', TableTennisController::class)->middleware('admin');
   Route::resource('tennis-trades', TennisController::class)->middleware('admin');



   // Route::get('trades/create/moto-trade', [TradeController::class, 'create_moto_trade'])->name('moto-trade')->middleware('admin');
   // Route::post('trades/create/moto-trade', [TradeController::class, 'store_moto_trade'])->name('store-moto-trade')->middleware('admin');
   // Route::get('trades/moto-trade/{id}/edit', [TradeController::class, 'edit_moto_trade'])->name('moto-trade.edit')->middleware('admin');
   // Route::patch('trades/moto-trade/{id}/edit', [TradeController::class, 'update_moto_trade'])->name('moto-trade.update')->middleware('admin');

   Route::resource('transactions', TransactionController::class)->middleware('admin');

   Route::get('/account', [MyProfile::class, 'index'])->name('account');
   Route::post('/account/{id}', [MyProfile::class, 'update'])->name('account.update');

   Route::get('get-team', function (Request $request) {
      $teams = DB::table('teams')->where('event_id', $request->event_id)->pluck('id', 'team_name');
      return response()->json($teams);
   })->middleware('admin');


   Route::middleware('password.confirm')->group(function () {
      Route::get('/motorsport-markets', [StatisticsController::class, 'index'])->middleware('user')->name('motorsport-markets');
      Route::get('/football-markets', [StatisticsController::class, 'football'])->middleware('user')->name('football-markets');
      Route::get('/football-markets/bundesliga', [StatisticsController::class, 'bundesliga'])->middleware('user')->name('bundesliga');
      Route::get('/football-markets/french-league', [StatisticsController::class, 'french_league'])->middleware('user')->name('french-league');
      Route::get('/football-markets/laliga', [StatisticsController::class, 'laliga'])->middleware('user')->name('laliga');
      Route::get('/football-markets/uefa', [StatisticsController::class, 'uefa'])->middleware('user')->name('uefa');
      Route::get('/trade-statement', [TradeStatementController::class, 'index'])->middleware('user')->name('trade-statement');

      Route::get('/add-funds', [FundsController::class, 'add_funds'])->middleware('user')->name('add-funds');
      Route::post('/add-funds', [FundsController::class, 'add_funds'])->middleware('user')->name('add-funds.request');

      Route::get('/withdraw-funds', [FundsController::class, 'withdraw_funds'])->middleware('user')->name('withdraw-funds');
      Route::post('/withdraw-funds', [FundsController::class, 'withdraw_funds'])->middleware('user')->name('withdraw-funds.request');

      Route::get('/help', [HelpController::class, 'help'])->middleware('user')->name('help');
      Route::post('/help', [HelpController::class, 'help'])->middleware('user')->name('help.request');

      Route::get('/security', [SecurityController::class, 'index'])->middleware('user')->name('security');

      Route::post('/security', [SecurityController::class, 'secure'])->middleware('user')->name('security.update');
   });
});

Auth::routes(['verify' => true]);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::get('/home', 'HomeController@index')->name('home');
