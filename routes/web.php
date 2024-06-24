<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\Offertory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WohController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TitheController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\WelfareController;
use App\Http\Controllers\OffertoryController;

use App\Http\Controllers\ContributionController;
use App\Http\Controllers\GameChangerDueController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RevenueController;
use PhpParser\Lexer\TokenEmulator\ReverseEmulator;

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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('logout', [HomeController::class, 'destroy'])->name('logout');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'main'])->name('home');
    Route::get('/users', [HomeController::class, 'users'])->name('users');
    Route::get('/user-add', [HomeController::class, 'userAdd'])->name('user.add');
    Route::post('/user-save', [HomeController::class, 'userSave'])->name('user.save');
    Route::get('/user-edit/{user}', [HomeController::class, 'userEdit'])->name('user.edit');
    Route::post('/user-edit/{user}', [HomeController::class, 'userUpdate'])->name('user.edit');
    Route::get('/user-delete/{user}', [HomeController::class, 'userDelete'])->name('user.delete');
    // Route::get('/dashboard',[HomeController::class,'main'])->name('dashboard');
    Route::prefix('members')->group(function () {
        Route::get('add', [MemberController::class, 'create'])->name('members.add');
        Route::post('add', [MemberController::class, 'store'])->name('member.save');
        Route::post('quick-add', [MemberController::class, 'quick_store'])->name('member.quick_save');

        Route::get('all', [MemberController::class, 'index'])->name('members.show');
        Route::get('members', [MemberController::class, 'show'])->name('members.back');
        Route::post('search', [MemberController::class, 'search'])->name('search_member');
        Route::post('{mask}/update', [MemberController::class, 'update'])->name('member.update');
        Route::get('{name}/view', [MemberController::class, 'single'])->name('mem.single');
        Route::get('{member}/delete', [MemberController::class, 'delete'])->name('member.delete');
        Route::post('look_up', [MemberController::class, 'look_up'])->name('member_lookup');
    });


    Route::get('/gc_members', [MemberController::class, 'gcMembers'])->name('gcmembers.show');

    Route::get('/Offertory', [OffertoryController::class, 'index'])->name('offertory.show');
    Route::post('/offertory/add', [OffertoryController::class, 'store'])->name('offertory.save');
    Route::get('/offertory/delete/{record}', [OffertoryController::class, 'destroy'])->name('offertory.delete');

    Route::get('/Tithes', [TitheController::class, 'index'])->name('tithe.show');
    Route::get('/Tithes/Details/{name} ', [TitheController::class, 'single'])->name('tithes.single');
    Route::post('/Tithes/Details/', [TitheController::class, 'search'])->name('tithes.search');

    Route::post('/tithes/Store', [TitheController::class, 'store'])->name('tithes.store');
    Route::get('/tithes/delete/{record}', [TitheController::class, 'destroy'])->name('tithe.delete');
    // Route::get('search',[TitheController::class, 'search']);

    Route::get('/Reports', [ReportController::class, 'index'])->name('reports');
    Route::post('/reports', [ReportController::class, 'search'])->name('report.search');

    Route::controller(RevenueController::class)->group(function () {
        Route::prefix('revenue')->group(function () {
            Route::get('/', 'index')->name("revenue.show");
            Route::post('save', 'store')->name("revenue.save");
            Route::get('{id}/edit', 'store')->name("revenue.edit");
            Route::get('{id}/delete', 'delete')->name("revenue.delete");
        });
    });


    Route::middleware('welfare')->group(function () {
        Route::get('/welfare/details/{name}', [WelfareController::class, 'single'])->name('welfare.single');
        Route::post('/welfare/details/', [WelfareController::class, 'search'])->name('welfare.search');
        Route::post('/welfaresupport/details/', [WelfareController::class, 'supportsearch'])->name('welfaresupport.search');
        Route::get('/welfares', [WelfareController::class, 'index'])->name('welfare.show');
        Route::post('/welfare/store', [WelfareController::class, 'store'])->name('welfare.store');
        Route::get('/welfare/delete/{record}', [WelfareController::class, 'destroy'])->name('welfare.delete');
        Route::post('/welfare-support/store', [WelfareController::class, 'welstore'])->name('welfaresupport.store');
        Route::get('/welfare-support/{record}/delete', [WelfareController::class, 'support_delete'])->name('welfare.support.delete');

        Route::get('/welfare_payments', [WelfareController::class, 'expenses'])->name('welfare.expenses');
        Route::get('/welfare_payments/details/{name}', [WelfareController::class, 'welfare_support'])->name('welfare.support');
    });

    Route::middleware('gcg')->group(function () {
        Route::get('/game_Changers_dues', [GameChangerDueController::class, 'index'])->name('gcDues.show');
        Route::get('/game_Changer_dues/Details/{name} ', [GameChangerDueController::class, 'show'])->name('gc_dues.single');
        Route::post('/game_changers/search/', [GameChangerDueController::class, 'search'])->name('gc_dues.search');
        Route::post('/game Changers/Store', [GameChangerDueController::class, 'store'])->name('dues.store');
        Route::post('/game Changers/offeringsstore', [GameChangerDueController::class, 'offeringsstore'])->name('gcoffering.store');
        Route::get('/game changers/offerings', [GameChangerDueController::class, 'offerings'])->name('gcoffering');
    });

    Route::get('/month expenses', [ExpenseController::class, 'index'])->name('expenses.show');
    Route::get('/previous expenses', [ExpenseController::class, 'prev'])->name('expense.prev');
    Route::get('/all_expenses', [ExpenseController::class, 'all'])->name('expense.all');
    Route::post('/expense/Store', [ExpenseController::class, 'store'])->name('expense.store');
    Route::get('/gcexpenses', [ExpenseController::class, 'gcexpenses'])->name('gcexpense');
    Route::post('/gcexpenses/store', [ExpenseController::class, 'gcexpensestore'])->name('gcexpense.store');


    Route::middleware('woh')->group(function () {
        Route::get('/woh', [WohController::class, 'index'])->name('woh.all');
        Route::get('/woh/dues', [WohController::class, 'woh_dues'])->name('woh.dues');
        Route::get('/woh/expenses', [WohController::class, 'woh_expenses'])->name('woh.expenses');
        Route::post('/woh/dues/save', [WohController::class, 'store'])->name('wohdues.save');
        Route::get('/woh_member/details/{name} ', [WohController::class, 'show'])->name('woh_dues.single');
        Route::get('/woh_member/{name}', [MemberController::class, 'wohsingle'])->name('woh.single');
    });

    Route::get('/single_gcmember/{name}', [MemberController::class, 'gcsingle'])->name('gc.single');




    Route::get('gc_projects/show', [ContributionController::class, 'gcindex'])->name('gccontrib.show');
    Route::post('gc_newproject', [ContributionController::class, 'gccontribproject'])->name('gccontrib.store');
    Route::get('gc_project/{proj}', [ContributionController::class, 'gcsingleproject'])->name('gcproject.show');
    Route::post('gc_single_project/', [ContributionController::class, 'gc_contribution'])->name('gc_contribution');
});

Route::get('view',function(){
return view('organization.overview');
});