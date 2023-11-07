<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PageController,
    StaffController,
    TechnicianController,
    ProfileController,
    ServiceController,
    SellController,
    ServiceRequestController,
    WorkOrderController,
    AssetController,
    AssignedRequestController,
    RegisterController,
    CustomerController,
    TestController,
    SearchAccountController,


};

Route::redirect('/', 'login');


Route::post('/signup',[RegisterController::class, 'signup'])->name('register_signup');
// Route::get('/search-account',[SearchAccountController::class,'search_account'])->name('search_account');
Route::get('/account', [SearchAccountController::class, 'search'])->name('account.search');

// Route::get('/test',[TestController::class, 'test']);
// Route::get('/customer/assets/{id}',[TestController::class, 'Customer_AssetList'])->name('Customer_AssetList');







Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/home',[PageController::class,'index'])->name('home');


    Route::controller(CustomerController::class)
    ->as('customers.')
    ->prefix('customers')
    ->group(function(){
        Route::get('/','index')->name('index');
        Route::post('/store','store')->name('store');
        Route::put('/update','update')->name('update');


        //This is for adding customer in STAFF ACCOUNT
        Route::get('/add','add_customer')->name('add_customer');
        Route::post('/customer-store','customer_store')->name('customer_store');
        Route::put('/customer_update','customer_update')->name('customer_update');


    });

    Route::controller(StaffController::class)
    ->as('staff.')
    ->prefix('staff')
    ->group(function(){
        Route::get('/','index')->name('index');
        Route::post('/store','store')->name('store');
        Route::put('/update','update')->name('update');
        Route::delete('/delete','destroy')->name('delete');



    });


    Route::controller(TechnicianController::class)
    ->as('technician.')
    ->prefix('technician')
    ->group(function(){
        Route::get('/','index')->name('index');
        Route::post('/store','store')->name('store');
        Route::put('/update','update')->name('update');
        Route::delete('/delete','destroy')->name('delete');
    });
    Route::controller(ProfileController::class)
    ->as('profile.')
    ->prefix('profile')
    ->group(function(){
        Route::put('/update-profile','updateProfile')->name('updateProfile');
        Route::get('/chanage-password','showChangePassword')->name('show_changepw');
        Route::put('/chanage-password','updatePassword')->name('updatePassword');
    });
    Route::controller(ServiceController::class)
    ->as('service.')
    ->prefix('service')
    ->group(function(){
        Route::get('/','index')->name('index');
        Route::post('/store','store')->name('store');
        Route::put('/update/{id}','update')->name('update');
        Route::get('/show/{id}','show')->name('show');
    });
    Route::controller(AssignedRequestController::class)
    ->as('assigned.')
    ->prefix('assigned')
    ->group(function(){
        Route::get('/','index')->name('index');
    });
    Route::controller(ServiceRequestController::class)
    ->as('request.')
    ->prefix('request')
    ->group(function(){


        Route::get('/request_form','requestForm')->name('request_form');
        Route::get('/status','serviceStatus')->name('service_status');
        Route::get('/customer/assets/{id}','CustomerAssetList')->name('Customer_AssetList');


        Route::post('/store','store')->name('store');
        Route::get('/request-log','requestLog')->name('request_log');
        Route::put('/request-cancel','requestCancel')->name('request_cancel');
        Route::get('/request-cancel/list','requestCancelList')->name('request_list_cancel');
        Route::get('/request-process','requestProcess')->name('request_process');
        Route::get('/request-completed','requestCompleted')->name('request_completed');
        Route::get('/print','printRequestStatus')->name('request_print');



    });
    Route::controller(WorkOrderController::class)
    ->as('workorder.')
    ->prefix('workorder')
    ->group(function(){
        Route::get('/','index')->name('index');
        Route::get('/request/pending','pendingRequest')->name('request.pending');
        Route::put('/request/assign-technician/{id}','assignTechnician')->name('assign.technician');
        Route::put('/request/completed/{id}','updateServiceCompleted')->name('request.complete');
        Route::put('/request/priority/{id}','updatePriority')->name('update.priority');

        Route::get('/assets/{id}','assetList')->name('assetList');
        Route::post('/assets/store/{id}','createAssetList')->name('assetList.store');
        Route::delete('/assets/delete/{id}','deleteAssetList')->name('assetList.delete');
        Route::get('customer/assets/{id}','assetListTech')->name('assetListTech');
    });
    Route::controller(AssetController::class)
    ->as('asset.')
    ->prefix('asset')
    ->group(function(){
        Route::get('/','index')->name('index');
        Route::post('/store','store')->name('store');
        Route::delete('/delete/{id}','destroy')->name('delete');
        Route::put('/update/{id}','update')->name('update');

    });
    Route::controller(SellController::class)
    ->as('sell.')
    ->prefix('sell')
    ->group(function(){
        Route::get('/','index')->name('index');
        Route::get('/customer/assets/{id}','assetListAd')->name('assetListAd');
        Route::get('/summary','summary')->name('summary');

    });

});
