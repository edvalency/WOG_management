<?php

use App\Models\Offertory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WohController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TitheController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\WelfareController;

use App\Http\Controllers\OffertoryController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\GameChangerDueController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'main'])->name('home');
Route::get('/users', [HomeController::class, 'users'])->name('users');
Route::get('/user-add', [HomeController::class, 'userAdd'])->name('user.add');
Route::post('/user-save', [HomeController::class, 'userSave'])->name('user.save');
Route::get('/user-edit/{user}', [HomeController::class, 'userEdit'])->name('user.edit');
Route::post('/user-edit/{user}', [HomeController::class, 'userUpdate'])->name('user.edit');
Route::get('/user-delete/{user}', [HomeController::class, 'userDelete'])->name('user.delete');
// Route::get('/dashboard',[HomeController::class,'main'])->name('dashboard');
Route::get('/add_member', [MemberController::class, 'create'])->name('members.add');
Route::post('/add_member', [MemberController::class, 'store'])->name('members.save');

Route::get('/all_members', [MemberController::class, 'index'])->name('members.show');
Route::post('/import_members', [MemberController::class, 'upload'])->name('members.import');
Route::get('/members', [MemberController::class, 'show'])->name('members.back');
Route::post('/members/search', [MemberController::class, 'search'])->name('search_member');
Route::post('/member/update', [MemberController::class, 'update'])->name('member.update');
Route::post('/look_up', [MemberController::class, 'look_up'])->name('member_lookup');


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


Route::middleware('welfare')->group(function () {
    Route::get('/welfare/details/{name}', [WelfareController::class, 'single'])->name('welfare.single');
    Route::post('/Welfare/details/', [WelfareController::class, 'search'])->name('welfare.search');
    Route::post('/welfaresupport/details/', [WelfareController::class, 'supportsearch'])->name('welfaresupport.search');
    Route::get('/Welfares', [WelfareController::class, 'index'])->name('welfare.show');
    Route::post('/welfare/store', [WelfareController::class, 'store'])->name('welfare.store');
    Route::get('/welfare/delete/{record}', [WelfareController::class, 'destroy'])->name('welfare.delete');
    Route::post('/welfaresupport/Store', [WelfareController::class, 'welstore'])->name('welfaresupport.store');

    Route::get('/welfare_payments', [WelfareController::class, 'expenses'])->name('welfare.expense');
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

Route::get('/single_member/{name}', [MemberController::class, 'single'])->name('mem.single');
Route::get('/single_gcmember/{name}', [MemberController::class, 'gcsingle'])->name('gc.single');

Route::get('attendance',[AttendanceController::class,'index'])->name('attendance');
Route::get('attendance/mark/{attendee}',[AttendanceController::class,'mark_attendance'])->name('attendance.mark');
Route::get('attendance/unmark/{attendee}',[AttendanceController::class,'unmark_attendance'])->name('attendance.unmark');



Route::get('gc_projects/show', [ContributionController::class, 'gcindex'])->name('gccontrib.show');
Route::post('gc_newproject', [ContributionController::class, 'gccontribproject'])->name('gccontrib.store');
Route::get('gc_project/{proj}', [ContributionController::class, 'gcsingleproject'])->name('gcproject.show');
Route::post('gc_single_project/', [ContributionController::class, 'gc_contribution'])->name('gc_contribution');
