<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// user
Route::post('/registration','Api\UserController@store')->name('store');
Route::post('/login','Api\UserController@login')->name('login');
Route::post('/logout', 'Api\UserController@logout')->name('logout')->middleware('auth:api');
Route::get('/user','Api\UserController@index')->name('user')->middleware('auth:api');
Route::put('/update','Api\UserController@update')->middleware('auth:api');
Route::post('/update/password','Api\UserController@updatePassword')->middleware('auth:api');
Route::post('/update/profile/photo','Api\UserController@changeProfilePhoto')->middleware('auth:api');

// Vendors
Route::get('/','Api\FrontendApiController@index');
Route::get('/vendorsByCategory/{slug}','Api\FrontendApiController@vendorsByCategory');
Route::get('/vendors', 'Api\FrontendApiController@allVendors');
Route::get('/vendors/{slug}', 'Api\FrontendApiController@vendorDetails');

// booking
Route::prefix('booking')->middleware('auth:api')->group(function ()
{
    Route::post('/apply-promocode', 'Api\BookingApiController@applyPromocode');
    Route::post('/checkout', 'Api\BookingApiController@checkout');
    Route::post('/payment', 'Api\BookingApiController@payment');
    Route::post('/service/{id}/delete', 'Api\BookingApiController@serviceDelete');
    Route::post('/appoinment/{id}/delete', 'Api\BookingApiController@appoinmentDelete');
});

// blog
Route::apiResource('/blog', Api\BlogApiController::class);

// User Dashboard
Route::prefix('user')->middleware(['auth:api', 'user.api'])->group(function ()
{
    Route::get('/dashboard', 'Api\UserDashboardApiController@dashboard');    
    Route::get('/appointment-details/{id}', 'Api\UserDashboardApiController@appointmentDetails');    
    Route::post('/appointment-update/{id}', 'Api\UserDashboardApiController@cancelAppointment');    
    Route::get('/appointment-history', 'Api\UserDashboardApiController@appointmentHistory');    
    Route::get('/appointment-cancel-history', 'Api\UserDashboardApiController@appointmentCencelHistory');    
});
// Provider Dashboard
Route::prefix('provider')->middleware(['auth:api', 'provider.api'])->group(function ()
{
    Route::get('/dashboard', 'Api\ProviderDashboardApiController@dashboard');    
    Route::get('/appointment-details/{id}', 'Api\ProviderDashboardApiController@appointmentDetails');    
    Route::post('/appointment-update/{id}', 'Api\ProviderDashboardApiController@changeAppointmentStatus');    
    Route::get('/appointment-history', 'Api\ProviderDashboardApiController@appointmentHistory');

    // Services
    Route::delete('/services/move-recycle-bin/{id}', 'Api\ServiceApiController@trash');
    Route::put('/services/restore/{id}', 'Api\ServiceApiController@restore');
    Route::get('/services/trash-list', 'Api\ServiceApiController@trashList');
    Route::put('/services/status/{id}', 'Api\ServiceApiController@status');
    Route::apiResource('services', Api\ServiceApiController::class);

    //payment-methods
    Route::put('/payment-methods/status/{id}', 'Api\ProviderPaymentMethodApiController@status');
    Route::apiResource('payment-methods', Api\ProviderPaymentMethodApiController::class);
    
    //Cupons
    Route::put('/cupons/status/{id}', 'Api\CuponApiController@status');
    Route::apiResource('cupons', Api\CuponApiController::class);

    //Wallet
    Route::get('/wallet', 'Api\WalletApiController@index');
    Route::post('/withdraw', 'Api\WalletApiController@withdraw');

    //Profile
    Route::prefix('profile')->group(function ()
    {
        Route::get('/personal-information', 'Api\ProviderProfileApiController@personalInformation');
        Route::put('/personal-information/{id}', 'Api\ProviderProfileApiController@personalInformationUpdate');
        Route::put('/change-password/{id}', 'Api\ProviderProfileApiController@changePassword');
        Route::get('/business-imformation', 'Api\ProviderProfileApiController@businessInformation');
        Route::match(['get', 'put'], '/travel-policy', 'Api\ProviderProfileApiController@travelPolicy');
        Route::any('/faq-client/{id?}', 'Api\ProviderProfileApiController@FAQtoClient');
        Route::match(['get', 'put', 'post'], '/business-hours/{id?}', 'Api\ProviderProfileApiController@businessHours');
        Route::match(['get', 'put', 'post'], '/social-media/{id?}', 'Api\ProviderProfileApiController@socialMedia');
        Route::match(['get', 'post', 'delete'], '/portfolio/{id?}', 'Api\ProviderProfileApiController@portfolio');
    });

    Route::apiResource('independent-contractors', Api\ProviderICApiController::class);
    Route::apiResource('customers', Api\ProviderCustomerApiController::class);
});


