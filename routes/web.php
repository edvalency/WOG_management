<?php

use App\Models\Offertory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WohController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\TitheController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\RevenueController;

use App\Http\Controllers\WelfareController;
use App\Http\Controllers\OffertoryController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\GameChangerDueController;
use App\Http\Controllers\VisitorsController;
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

Route::get('/birthdays', [HomeController::class,'getTodaysBirthday']);

Auth::routes();



Route::middleware('auth')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('logout', 'destroy')->name('logout');
        Route::get('/home', 'main')->name('home');
        Route::get('/home/bdays', 'getWeekBirthdays');
        Route::get('/users', 'users')->name('users');
        Route::get('/user-add', 'userAdd')->name('user.add');
        Route::post('/user-save', 'userSave')->name('user.save');
        Route::get('/user-edit/{user}', 'userEdit')->name('user.edit');
        Route::post('/user-edit/{user}', 'userUpdate')->name('user.edit');
        Route::post('/user-permissions-update/{user}', 'updateRoles')->name('user.permissions.update');
        Route::get('/user-delete/{user}', 'userDelete')->name('user.delete');
    });
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

    Route::prefix('visitors')->group(function () {
        Route::controller(VisitorsController::class)->group(function () {
            Route::get('add', 'create')->name('visitors.add');
            Route::post('quick-add', 'quick_store')->name('visitor.quick_save');
            Route::get('all', 'index')->name('visitors.show');
            Route::get('/', 'show')->name('visitors.back');
            Route::post('search', 'search')->name('search_member');
            Route::post('{mask}/update', 'update')->name('visitor.update');
            Route::get('{name}/view', 'single')->name('visitor.single');
            Route::get('{member}/delete', 'delete')->name('visitor.delete');
            Route::post('look_up', 'look_up')->name('visitor_lookup');
        });
    });


    Route::get('/gc_members', [MemberController::class, 'gcMembers'])->name('gcmembers.show');

    // Route::get('/Offertory', [OffertoryController::class, 'index'])->name('offertory.show');
    // Route::post('/offertory/add', [OffertoryController::class, 'store'])->name('offertory.save');
    // Route::get('/offertory/delete/{record}', [OffertoryController::class, 'destroy'])->name('offertory.delete');

    Route::get('/tithes', [TitheController::class, 'index'])->name('tithe.show');
    Route::get('/tithes/Details/{name} ', [TitheController::class, 'single'])->name('tithes.single');
    Route::post('/tithes/Details/', [TitheController::class, 'search'])->name('tithes.search');

    Route::post('/tithes/Store', [TitheController::class, 'store'])->name('tithe.save');
    Route::post('/tithes/store', [TitheController::class, 'update'])->name('tithe.edit');
    Route::get('/tithes/delete/{record}', [TitheController::class, 'destroy'])->name('tithe.delete');
    // Route::get('search',[TitheController::class, 'search']);

    Route::get('/Reports', [ReportController::class, 'index'])->name('reports');
    Route::post('/reports', [ReportController::class, 'search'])->name('report.search');

    Route::controller(RevenueController::class)->group(function () {
        Route::prefix('revenue')->group(function () {
            Route::get('/get-revenue-year', 'revenuePy');
            Route::get('/', 'index')->name("revenue.show");
            Route::post('save', 'store')->name("revenue.save");
            Route::get('{id}/edit', 'store')->name("revenue.edit");
            Route::get('{id}/delete', 'delete')->name("revenue.delete");
        });
    });


    Route::middleware('welfare')->group(function () {
        Route::get('/get-welfare-year', [WelfareController::class, 'welfarePyChart']);

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

    Route::controller(ExpenseController::class)->group(function () {
        Route::get('/get-expenses-year', 'expensePy');
        Route::get('/month expenses', 'index')->name('expenses.show');
        Route::get('/previous expenses', 'prev')->name('expense.prev');
        Route::get('/all_expenses', 'all')->name('expense.all');
        Route::get('/expense/{expense}/delete', 'destroy')->name('expense.destroy');
        Route::post('/expense/Store', 'store')->name('expense.store');
        Route::get('/gcexpenses', 'gcexpenses')->name('gcexpense');
        Route::post('/gcexpenses/store', 'gcexpensestore')->name('gcexpense.store');
    });


    Route::middleware('woh')->group(function () {
        Route::get('/woh', [WohController::class, 'index'])->name('woh.all');
        Route::get('/woh/dues', [WohController::class, 'woh_dues'])->name('woh.dues');
        Route::get('/woh/expenses', [WohController::class, 'woh_expenses'])->name('woh.expenses');
        Route::post('/woh/dues/save', [WohController::class, 'store'])->name('wohdues.save');
        Route::get('/woh_member/details/{name} ', [WohController::class, 'show'])->name('woh_dues.single');
        Route::get('/woh_member/{name}', [MemberController::class, 'wohsingle'])->name('woh.single');
    });

    Route::get('/single_gcmember/{name}', [MemberController::class, 'gcsingle'])->name('gc.single');

    Route::middleware('attendance')->group(function () {
        Route::controller(AttendanceController::class)->group(function () {
            Route::prefix('attendance')->group(function () {
                Route::get('/', 'index')->name('attendance');
                Route::get('record', 'add')->name('attendance.record');
                Route::post('save', 'record')->name('attendance.save');
                Route::get('{log_id}/delete', 'destroy')->name('attendance.delete');
                Route::get('{date}/members', 'members_present')->name('attendance.members');
                Route::get('{date}/visitors', 'visitors_present')->name('attendance.visitors');
            });
        });
    });

    Route::middleware('sermons')->group(function () {
        Route::controller(MediaController::class)->group(function () {
            Route::prefix('sermons')->group(function () {
                Route::get('all', 'all_sermons')->name('sermons.all');
                // Route::get('{sermon}/view', 'vi')->name('sermon.view');
                Route::post('save', 'save_sermon')->name('sermon.save');
            });
        });
    });

    Route::middleware('articles')->group(function () {
        Route::controller(MediaController::class)->group(function () {
            Route::prefix('articles')->group(function () {
                Route::get('all', 'index')->name('articles.all');
                Route::get('{article}/edit', 'addArticle')->name('article.edit');
                Route::post('{article}/update', 'updateArticle')->name('article.update');
                Route::post('{article}/delete', 'deleteArticle')->name('article.delete');
                Route::post('save', 'saveArticle')->name('article.save');
            });
        });
    });


    Route::get('gc_projects/show', [ContributionController::class, 'gcindex'])->name('gccontrib.show');
    Route::post('gc_newproject', [ContributionController::class, 'gccontribproject'])->name('gccontrib.store');
    Route::get('gc_project/{proj}', [ContributionController::class, 'gcsingleproject'])->name('gcproject.show');
    Route::post('gc_single_project/', [ContributionController::class, 'gc_contribution'])->name('gc_contribution');
});

Route::get('view', function () {
    (new WelfareController)->welfarePyChart();
    //     $rev = DB::table('revenue')->sum('amount') - DB::table('expenses')->sum('amount');
    //     DB::table('accounts')->where('type','church')->increment('amount', $rev);

    //     $welf = DB::table('welfares')->sum('amount') - DB::table('welfare_expenses')->sum('amount');
    //     DB::table('accounts')->where('type','welfare')->increment('amount', $welf);
    // return 'done';
    // return view('organization.overview');
});
