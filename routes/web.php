<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

//Clear Cache
Route::get('clear', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('storage:link');
    return 'Cache Cleared Successfully';
    //Return anything
});


//Auth route
Auth::routes(['verify' => true]);

/////////////////////////Frontend routes////////////////////////////////
Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', 'FrontendController@index')->name('frontend.home');
    Route::get('/blog', 'FrontendController@blog')->name('blog');
    Route::get('/blog-details/{slug}', 'FrontendController@blogdetails')->name('blog.details');
    Route::get('/aboutUs', 'FrontendController@aboutUs')->name('aboutUs');
    Route::get('/contact', 'FrontendController@contact')->name('contact');
    Route::get('/faq', 'FrontendController@faq')->name('faq');
    Route::get('/privacy-policy', 'FrontendController@privacy')->name('privacy.policy');
    Route::get('/terms-of-service', 'FrontendController@terms')->name('terms.service');
    Route::post('/contact/store', 'ContactController@store')->name('contact.store');
    Route::get('/user/login', 'FrontendController@userLogin')->name('user.login');
    Route::get('/user/register', 'FrontendController@userRegister')->name('user.register');
    Route::post('/register/store', 'RegisterController@registerStore')->name('register.store');
    Route::post('/vendor-register/store', 'RegisterController@vandorregisterStore')->name('vandorregister.store');
    Route::get('/vendor', 'FrontendController@allvandor')->name('allvandor');

    Route::get('/vendor-register', 'FrontendController@vandorregister')->name('vandorregister');

    Route::get('/independent-contractor-register', 'FrontendController@icregister')->name('icregister');
    Route::post('/independent-contractor-register-store', 'FrontendController@icregisterStore')->name('icregister.store');

    Route::get('/vendor/{slug}', 'FrontendController@vendorDetails')->name('vendor.details');
    Route::get('/vendor/portfolio/{slug}', 'FrontendController@vendorportfolio')->name('vendor.portfolio');
    Route::get('/ic/{slug}', 'FrontendController@icDetails')->name('ic.details');

    Route::post('/reviews/store', 'FrontendController@reviewsStore')->name('reviews.store');

    Route::get('/category/{slug}', 'FrontendController@categoryVendor')->name('category.vendor');
    Route::get('/checkout', 'FrontendController@checkout')->name('checkout');

    Route::get('/checkout/ajax', 'CartController@checkoutAjax');

    //Appointment Payment
    Route::post('/payment/method', 'PaymentController@paymentMethod')->name('user.payment.method');
    Route::post('/payment/method/stripe', 'PaymentController@paymentMethodStripe')->name('user.payment.stripe');
    Route::post('/payment/method/heartland', 'PaymentController@paymentMethodHeartland')->name('user.payment.heartland');
    Route::post('/payment/method/handcash', 'PaymentController@paymentMethodHandcash')->name('user.payment.handcash');
    Route::get('/refund/money/{id}', 'PaymentController@refundMoney')->name('user.refund.money');

    Route::get('/user_checkout/{id}/{vendorId}', 'FrontendController@userCheckOut')->name('user.checkout.vendor');
    Route::post('all_service_user', 'FrontendController@couponSet');
    Route::get('serviceid_coupon/{id}', 'FrontendController@servicePrice');
    Route::get('generate_code', 'FrontendController@generateCode');
    Route::post('vendor_date_show', 'FrontendController@vendorDateShow');





    //Customer coupon purchase
    Route::get('/coupon', 'CouponController@index')->name('coupon');
    Route::get('/coupon/payment/method/{id}', 'CouponPaymentController@paymentMethod')->name('coupon.payment.method');
    Route::post('/coupon/payment', 'CouponPaymentController@payment')->name('coupon.payment');


    //Coupon
    Route::post('/apply/coupon', 'CouponController@applyCoupon')->name('apply.coupon');
    Route::get('/coupon/remove', 'CouponController@couponRemove')->name('coupon.remove');

    //Advance search
    Route::get('/advance/search/result', 'FrontendController@advance_search')->name('advance.search');
});

//Cart
Route::post('/cart/store/{id}', 'Frontend\CartController@store');
Route::get('cart/delete/{id}', 'Frontend\CartController@cartdelete');

//Get distance
Route::get('/get/distance', 'Frontend\CartController@distance');
Route::get('/get/current/location', 'Frontend\CartController@currentLocation');

//Load page
Route::get('/load/fix/cart', 'Frontend\CartController@fixCart');
Route::get('/load/checkout/cart', 'Frontend\CartController@checkoutCart');
Route::get('/load/checkout/cart', 'Frontend\CartController@checkoutCart');
Route::get('/load/check/rev', 'Frontend\CartController@checkRev');

// Favourite provider store
Route::get('/favourite/store/{id}', 'UserDashboard\Customer\FavouriteBusinessController@favourite_store')->name('favourite.store');

//Plans
Route::get('/plan', 'Frontend\FrontendController@plan')->name('plan');
Route::get('/plan/checkout/{id}', 'Frontend\SubscribeController@checkout')->name('plan.checkout');
Route::post('/plan/checkout/process', 'Frontend\SubscribeController@checkoutProcess')->name('plan.checkout.process');
Route::get('/plan/cancel', 'Frontend\SubscribeController@cancel')->name('plan.cancel');
Route::get('/plan/resume', 'Frontend\SubscribeController@resume')->name('plan.resume');

//Add Card
Route::post('/card/store', 'Frontend\AddcardController@store')->name('card.store');

//Add Card
Route::get('/plan', 'Frontend\FrontendController@plan')->name('plan');
Route::get('/plan/checkout/{id}', 'Frontend\SubscribeController@checkout')->name('plan.checkout');
Route::post('/plan/checkout/process', 'Frontend\SubscribeController@checkoutProcess')->name('plan.checkout.process');
Route::get('/plan/cancel', 'Frontend\SubscribeController@cancel')->name('plan.cancel');
Route::get('/plan/resume', 'Frontend\SubscribeController@resume')->name('plan.resume');
Route::get('/check', 'Frontend\FrontendController@check')->name('check');


//All User show Book
Route::get('/all_service_user/{id}', 'Frontend\FrontendController@allUser');

//////////*User dashboard*///////////
Route::group(['prefix' => '/user', 'namespace' => 'UserDashboard', 'middleware' => ['auth', 'user', 'verified']], function () {
    //User profile
    Route::get('/dashboard', 'DashboardController@user_dashboard')->name('user.dashboard');
    Route::get('/profile', 'DashboardController@user_profile')->name('user.profile');
    Route::post('/update/profile', 'DashboardController@updateProfile')->name('user.update.profile');
    Route::get('/change/password', 'DashboardController@changePassword')->name('user.change.password');
    Route::post('/update/password', 'DashboardController@updatePassword')->name('user.update.password');
});

Route::group(['prefix' => '/user/favourite', 'namespace' => 'UserDashboard\Customer', 'middleware' => ['auth', 'user', 'customer', 'verified']], function () {
    //Customer favorite
    Route::get('/index', 'FavouriteBusinessController@index')->name('user.favourite.index');
});

//Provider Service
Route::group(['as' => 'user.service.', 'prefix' => '/user/service', 'namespace' => 'UserDashboard\Provider', 'middleware' => ['auth', 'user', 'provider', 'verified']], function () {
    Route::get('/index', 'ServiceController@index')->name('index');
    Route::get('/create', 'ServiceController@create')->name('create');
    Route::post('/store', 'ServiceController@store')->name('store');
    Route::get('/show/{id}', 'ServiceController@show')->name('show');
    Route::get('/edit/{id}', 'ServiceController@edit')->name('edit');
    Route::post('/update/{id}', 'ServiceController@update')->name('update');

    Route::get('/trash/{id}', 'ServiceController@trash')->name('trash');
    Route::get('/trashed/list', 'ServiceController@trash_list')->name('trash.list');
    Route::get('/restore/{id}', 'ServiceController@restore')->name('restore');
    Route::post('/status/{id}', 'ServiceController@status')->name('status');
    Route::get('/destroy/{id}', 'ServiceController@destroy')->name('destroy');
    Route::get('/remove/product/image/{id}', 'ServiceController@removeImage')->name('remove.image');
});

//Provider appointments
Route::group(['as' => 'provider.appointment.', 'prefix' => '/user/provider/appointment', 'namespace' => 'UserDashboard\Provider', 'middleware' => ['auth', 'user', 'provider', 'verified']], function () {

    Route::get('/index', 'AppointmentsController@index')->name('index');
    Route::get('/create', 'AppointmentsController@create')->name('create');
    Route::post('/store', 'AppointmentsController@store')->name('store');
    Route::get('/show/{id}', 'AppointmentsController@show')->name('show');
    Route::get('/edit/{id}', 'AppointmentsController@edit')->name('edit');
    Route::post('/update/{id}', 'AppointmentsController@update')->name('update');
    Route::post('/status/{id}', 'AppointmentsController@status')->name('status');
    Route::get('/close/{id}', 'AppointmentsController@appiontClose')->name('close');
});

//Provider appointments Canceled
Route::group(['as' => 'provider.appointment.cancel.', 'prefix' => '/user/provider/appointment/cancel', 'namespace' => 'UserDashboard\Provider', 'middleware' => ['auth', 'user', 'provider', 'verified']], function () {

    Route::get('/index', 'AppointmentsController@cancelindex')->name('index');
    Route::get('/show/{id}', 'AppointmentsController@cancelshow')->name('show');
    Route::get('/rebok/{id}', 'AppointmentsController@appiontRebok')->name('rebook');
});
//Provider refund money list
Route::group(['as' => 'provider.refund.money.', 'prefix' => '/user/provider/refund/money', 'namespace' => 'UserDashboard\Provider', 'middleware' => ['auth', 'user', 'provider', 'verified']], function () {

    Route::get('/index', 'AppointmentsController@refundlindex')->name('index');
    Route::get('/show/{id}', 'AppointmentsController@refundshow')->name('show');

});

//Provider Blogs Category
Route::group(['as' => 'provider.blog.category.', 'prefix' => '/user/provider/cateogry', 'namespace' => 'UserDashboard\Provider', 'middleware' => ['auth', 'user', 'provider', 'verified']], function () {

    Route::post('/store', 'BlogCategoryController@store')->name('store');
    Route::get('/show/{id}', 'BlogCategoryController@show')->name('show');

    Route::post('/update/{id}', 'BlogCategoryController@update')->name('update');
    Route::get('/destroy/{id}', 'BlogCategoryController@destroy')->name('destroy');


});

//Provider Blogs
Route::group(['as' => 'provider.blog.', 'prefix' => '/user/provider/blogs', 'namespace' => 'UserDashboard\Provider', 'middleware' => ['auth', 'user', 'provider', 'verified']], function () {

    Route::get('/index', 'ProviderBlogController@index')->name('index');
    Route::get('/create?search={value}', 'ProviderBlogController@create')->name('create');
    Route::post('/store', 'ProviderBlogController@store')->name('store');
    Route::get('/show/{id}', 'ProviderBlogController@show')->name('show');
    Route::get('/edit/{id}', 'ProviderBlogController@edit')->name('edit');
    Route::post('/update/{id}', 'ProviderBlogController@update')->name('update');
    Route::get('/destroy/{id}', 'ProviderBlogController@destroy')->name('destroy');
    Route::post('/status/{id}', 'ProviderBlogController@blog_status')->name('status');

});

//Provider wallet
Route::group(['as' => 'provider.wallet.', 'prefix' => '/user/provider/wallet', 'namespace' => 'UserDashboard\Provider', 'middleware' => ['auth', 'user', 'provider', 'verified']], function () {

    Route::get('/view', 'WalletController@index')->name('view');
    Route::post('/withdraw/store', 'WalletController@store')->name('withdraw.store');
});

//IC= Independent Controctor Provider
Route::group(['as' => 'ic.provider.', 'prefix' => '/user/provider/IC', 'namespace' => 'UserDashboard\Provider', 'middleware' => ['auth', 'user', 'provider', 'verified']], function () {

    Route::get('/index', 'ICProviderController@index')->name('index');
    Route::get('/create', 'ICProviderController@create')->name('create');
    Route::post('/store/{id}', 'ICProviderController@store')->name('store');
    Route::get('/show/{id}', 'ICProviderController@show')->name('show');
    Route::get('/edit/{id}', 'ICProviderController@edit')->name('edit');
    Route::post('/update/{id}', 'ICProviderController@update')->name('update');
    Route::post('/destroy/{id}', 'ICProviderController@destroy')->name('destroy');
});

//Provider can Added Customer
Route::group(['as' => 'provider.add.customer.', 'prefix' => '/user/provider/add/customer', 'namespace' => 'UserDashboard\Provider', 'middleware' => ['auth', 'user', 'provider', 'verified']], function () {

    Route::get('/index', 'AddCustomerController@index')->name('index');
    Route::get('/create', 'AddCustomerController@create')->name('create');
    Route::post('/store', 'AddCustomerController@store')->name('store');
    Route::get('/show/{id}', 'AddCustomerController@show')->name('show');
    Route::get('/edit/{id}', 'AddCustomerController@edit')->name('edit');
    Route::post('/update/{id}', 'AddCustomerController@update')->name('update');
    Route::get('/destroy/{id}', 'AddCustomerController@destroy')->name('destroy');
});

    //employee
    Route::group(['as' => 'add.employee.', 'prefix' => '/user/provider/add/employee', 'namespace' => 'UserDashboard\Employee', 'middleware' => ['auth', 'user', 'provider', 'verified']], function () {
        Route::get('/index', 'EmployeeController@index')->name('index');
        Route::get('/create', 'EmployeeController@create')->name('create');
        Route::post('/store', 'EmployeeController@store')->name('store');
        Route::get('/edit/{id}', 'EmployeeController@edit')->name('edit');
        Route::get('/show/{id}', 'EmployeeController@show')->name('show');
        Route::post('/update/{id}', 'EmployeeController@update')->name('update');
        Route::get('/destroy/{id}', 'EmployeeController@destroy')->name('destroy');
        Route::post('/status/{id}', 'EmployeeController@status')->name('status');
    });


//Provider amenity
Route::group(['as' => 'provider.amenity.', 'prefix' => '/user/provider/amenity', 'namespace' => 'UserDashboard\Provider', 'middleware' => ['auth', 'user', 'provider', 'verified']], function () {
    Route::post('/store', 'BusinessInfoController@amenitystore')->name('store');
});

//Provider Safety Rule
Route::group(['as' => 'provider.safetyrule.', 'prefix' => '/user/provider/safetyrule', 'namespace' => 'UserDashboard\Provider', 'middleware' => ['auth', 'user', 'provider', 'verified']], function () {
    Route::post('/store', 'BusinessInfoController@safetyRuleStore')->name('store');
    Route::post('/update/{id}', 'BusinessInfoController@safetyRuleUpdate')->name('update');
    Route::get('/destroy/{id}', 'BusinessInfoController@safetyRuleDelete')->name('destroy');
});

//Provider subscribtion
Route::group(['as' => 'provider.subscribtion.', 'prefix' => '/user/provider/subscribtion', 'namespace' => 'UserDashboard\Provider', 'middleware' => ['auth', 'user', 'provider', 'verified']], function () {

    Route::get('/index', 'SubscribtionController@index')->name('index');
    Route::get('/show/{id}', 'SubscribtionController@show')->name('show');
});


//Provider Cupon Code
Route::group(['as' => 'provider.cupon.', 'prefix' => '/user/provider/cupon', 'namespace' => 'UserDashboard\Provider', 'middleware' => ['auth', 'user', 'provider', 'verified']], function () {

    Route::get('/index', 'PromocodeController@index')->name('index');
    Route::get('/create', 'PromocodeController@create')->name('create');
    Route::post('/store', 'PromocodeController@store')->name('store');
    Route::get('/show/{id}', 'PromocodeController@show')->name('show');
    Route::get('/edit/{id}', 'PromocodeController@edit')->name('edit');
    Route::post('/update/{id}', 'PromocodeController@update')->name('update');
    Route::get('/destroy/{id}', 'PromocodeController@destroy')->name('destroy');
    Route::post('/status/{id}', 'PromocodeController@status')->name('status');


    Route::post('/payment', 'PromocodeController@payment')->name('payment');
    Route::post('/payment/confirm', 'PromocodeController@paymentConfirm')->name('payment.confirm');
    Route::post('/multiple/store' , 'UserDashboard\Provider\PromocodeController@multipleStore')->name('multiple.store');

});
Route::group(['middleware' => ['auth', 'user', 'provider', 'verified']], function () {
    Route::get('/multiple/index' , 'UserDashboard\Provider\PromocodeController@multipleIndex')->name('cuppon.multiple.index');
    Route::post('/multiple/store' , 'UserDashboard\Provider\PromocodeController@multipleStore')->name('cuppon.multiple.store');
    Route::get('/multiple/edit/{id}' , 'UserDashboard\Provider\PromocodeController@multipleEdit')->name('cuppon.multiple.edit');
    Route::post('/multiple/update/{id}' , 'UserDashboard\Provider\PromocodeController@multipleUpdate')->name('cuppon.multiple.update');
    Route::get('/multiple/delete/{id}' , 'UserDashboard\Provider\PromocodeController@multipleDelete')->name('cuppon.multiple.delete');
});


//Provider History
Route::group(['as' => 'provider.history.', 'prefix' => '/user/provider/history', 'namespace' => 'UserDashboard\Provider', 'middleware' => ['auth', 'user', 'provider', 'verified']], function () {

    Route::get('/index', 'AppointmentsController@historyindex')->name('index');
    Route::get('/show/{id}', 'AppointmentsController@history_show')->name('show');
});

//Provider Reviews
Route::group(['as' => 'provider.review.', 'prefix' => '/user/provider/review', 'namespace' => 'UserDashboard\Provider', 'middleware' => ['auth', 'user', 'provider', 'verified']], function () {

    Route::get('/index', 'ProviderreviewsController@index')->name('index');
    Route::get('/create/{id}', 'ProviderreviewsController@create')->name('create');
    Route::post('/store', 'ProviderreviewsController@store')->name('store');
    Route::get('/show/{id}', 'ProviderreviewsController@show')->name('show');
    Route::get('/edit/{id}', 'ProviderreviewsController@edit')->name('edit');
    Route::post('/update/{id}', 'ProviderreviewsController@update')->name('update');
    Route::get('/destroy/{id}', 'ProviderreviewsController@destroy')->name('destroy');
});

//Provider Payment Method
Route::group(['as' => 'provider.payment.method.', 'prefix' => '/user/provider/payment-method', 'namespace' => 'UserDashboard\Provider', 'middleware' => ['auth', 'user', 'provider', 'verified']], function () {

    Route::get('/index', 'PaymentMethodController@index')->name('index');
    Route::get('/create', 'PaymentMethodController@create')->name('create');
    Route::post('/store', 'PaymentMethodController@store')->name('store');
    Route::get('/show/{id}', 'PaymentMethodController@show')->name('show');
    Route::get('/edit/{id}', 'PaymentMethodController@edit')->name('edit');
    Route::post('/update/{id}', 'PaymentMethodController@update')->name('update');
    Route::get('/destroy/{id}', 'PaymentMethodController@destroy')->name('destroy');
    Route::post('/status/{id}', 'PaymentMethodController@status')->name('status');
});





//IC Provider Payment Method
Route::group(['as' => 'ic.payment.method.', 'prefix' => '/user/ic/payment-method', 'namespace' => 'UserDashboard\Ic', 'middleware' => ['auth', 'user', 'IcProvider', 'verified']], function () {

    Route::get('/index', 'IcPaymentMethodController@index')->name('index');
    Route::get('/create', 'IcPaymentMethodController@create')->name('create');
    Route::post('/store', 'IcPaymentMethodController@store')->name('store');
    Route::get('/show/{id}', 'IcPaymentMethodController@show')->name('show');
    Route::get('/edit/{id}', 'IcPaymentMethodController@edit')->name('edit');
    Route::post('/update/{id}', 'IcPaymentMethodController@update')->name('update');
    Route::get('/destroy/{id}', 'IcPaymentMethodController@destroy')->name('destroy');
    Route::post('/status/{id}', 'IcPaymentMethodController@status')->name('status');
});

//IC Provider wallet
Route::group(['as' => 'ic.wallet.', 'prefix' => '/user/ic/wallet', 'namespace' => 'UserDashboard\Ic', 'middleware' => ['auth', 'user', 'IcProvider', 'verified']], function () {

    Route::get('/view', 'IcWalletController@index')->name('view');
    Route::post('/withdraw/store', 'IcWalletController@store')->name('withdraw.store');
});

//Independent Controctor
//Independent Contractor appointments
Route::group(['as' => 'ic.provider.appointment.', 'prefix' => '/user/ic/provider/appointment', 'namespace' => 'UserDashboard\Ic', 'middleware' => ['auth', 'user', 'IcProvider', 'verified']], function () {

    Route::get('/index', 'AppointmentController@index')->name('index');

    Route::get('/show/{id}', 'AppointmentController@show')->name('show');

    Route::post('/status/{id}', 'AppointmentController@status')->name('status');
    Route::get('/close/{id}', 'AppointmentController@appiontClose')->name('close');
});

//Independent Contractor appointments Canceled
Route::group(['as' => 'ic.provider.appointment.cancel.', 'prefix' => '/user/ic/provider/appointment/cancel', 'namespace' => 'UserDashboard\Ic', 'middleware' => ['auth', 'user', 'IcProvider', 'verified']], function () {

    Route::get('/index', 'AppointmentController@cancelindex')->name('index');
    Route::get('/show/{id}', 'AppointmentController@cancelshow')->name('show');
    Route::get('/rebok/{id}', 'AppointmentController@appiontRebok')->name('rebook');
});
//Independent Contractor refund money list
Route::group(['as' => 'ic.provider.refund.money.', 'prefix' => '/user/ic/provider/refund/money', 'namespace' => 'UserDashboard\Ic', 'middleware' => ['auth', 'user', 'IcProvider', 'verified']], function () {

    Route::get('/index', 'AppointmentController@refundlindex')->name('index');
    Route::get('/show/{id}', 'AppointmentController@refundshow')->name('show');

});

//Independent Contractor History
Route::group(['as' => 'ic.provider.history.', 'prefix' => '/user/ic/provider/history', 'namespace' => 'UserDashboard\Ic', 'middleware' => ['auth', 'user', 'IcProvider', 'verified']], function () {

    Route::get('/index', 'AppointmentController@historyindex')->name('index');

    Route::get('/show/{id}', 'AppointmentController@show')->name('show');

    Route::post('/status/{id}', 'AppointmentController@status')->name('status');
    Route::get('/close/{id}', 'AppointmentController@appiontClose')->name('close');
});

//Independent Contractor Reviews
Route::group(['as' => 'ic.provider.review.', 'prefix' => '/user/ic/provider/review', 'namespace' => 'UserDashboard\Ic', 'middleware' => ['auth', 'user', 'IcProvider', 'verified']], function () {

    Route::get('/index', 'ReviewController@index')->name('index');
    Route::get('/create/{id}', 'ReviewController@create')->name('create');
    Route::post('/store', 'ReviewController@store')->name('store');
    Route::get('/show/{id}', 'ReviewController@show')->name('show');
    Route::get('/edit/{id}', 'ReviewController@edit')->name('edit');
    Route::post('/update/{id}', 'ReviewController@update')->name('update');
    Route::post('/status/{id}', 'ReviewController@status')->name('status');
    Route::get('/destroy/{id}', 'ReviewController@destroy')->name('destroy');
});

//Independent Contractor Business Info
Route::group(['as' => 'user.ic.businessinfo.', 'prefix' => '/user/ic/businessinfo', 'namespace' => 'UserDashboard\Ic', 'middleware' => ['auth', 'user', 'provider', 'verified']], function () {

    Route::get('/index', 'IcBusinessInfoController@index')->name('index');
    Route::post('/update/about', 'IcBusinessInfoController@updateAbout')->name('update.about');

    Route::post('/add/social', 'IcBusinessInfoController@addsocial')->name('add.social');
    Route::post('/update/social/{id}', 'IcBusinessInfoController@updatesocial')->name('update.social');

    Route::post('/add/portfolio', 'IcBusinessInfoController@addportfolio')->name('add.portfolio');
    Route::get('/remove/portfolio/{id}', 'IcBusinessInfoController@removPortfolio')->name('remove.portfolio');
});

//Customer appointments
Route::group(['as' => 'customer.appointment.', 'prefix' => '/user/customer/appointment', 'namespace' => 'UserDashboard\Customer', 'middleware' => ['auth', 'user', 'customer', 'verified']], function () {

    Route::get('/index', 'AppointmentController@index')->name('index');
    Route::post('/search', 'AppointmentController@search')->name('search');

    Route::get('/show/{id}', 'AppointmentController@show')->name('show');
    Route::get('/close/{id}', 'AppointmentController@appiontClose')->name('close');
    Route::post('/address/update/{id}', 'AppointmentController@addressUpdate')->name('address.update');
});

//Customer appointments Canceled
Route::group(['as' => 'customer.appointment.cancel.', 'prefix' => '/user/customer/appointment/cancel', 'namespace' => 'UserDashboard\Customer', 'middleware' => ['auth', 'user', 'customer', 'verified']], function () {

    Route::get('/index', 'AppointmentController@cancelindex')->name('index');
    Route::get('/show/{id}', 'AppointmentController@cancelshow')->name('show');
    Route::get('/rebok/{id}', 'AppointmentController@appiontRebok')->name('rebook');
});

//Employee appointments Canceled
Route::group(['as' => 'employee.appointment.', 'prefix' => '/user/employee/appointment', 'namespace' => 'UserDashboard\Employee', 'middleware' => ['auth', 'user', 'employee', 'verified']], function () {

    Route::get('/index', 'EmployeeController@employeeindex')->name('index');
    Route::get('/show/{id}', 'EmployeeController@employeeshow')->name('show');
    Route::get('/close/{id}', 'EmployeeController@employeeappiontClose')->name('close');
});

//Employee appointments Canceled
Route::group(['as' => 'employee.appointment.cancel.', 'prefix' => '/user/employee/appointment/cancel', 'namespace' => 'UserDashboard\Employee', 'middleware' => ['auth', 'user', 'employee', 'verified']], function () {

    Route::get('/index', 'EmployeeController@employeecancelindex')->name('index');
    Route::get('/show/{id}', 'EmployeeController@employeecancelshow')->name('show');
    Route::get('/rebok/{id}', 'EmployeeController@employeeappiontRebok')->name('rebook');
});
//Customer refund money
Route::group(['as' => 'customer.refund.money.', 'prefix' => '/user/customer/refund/money', 'namespace' => 'UserDashboard\Customer', 'middleware' => ['auth', 'user', 'customer', 'verified']], function () {

    Route::get('/index', 'AppointmentController@refundlindex')->name('index');
    Route::get('/show/{id}', 'AppointmentController@refundshow')->name('show');

});
//my Cupon
Route::group(['as' => 'my.cupon.', 'prefix' => '/user/customer/cupon', 'namespace' => 'UserDashboard\Customer', 'middleware' => ['auth', 'user', 'customer', 'verified']], function () {

    Route::get('/index', 'AppointmentController@cuponIndex')->name('index');
    Route::get('/show/{id}', 'AppointmentController@cuponlshow')->name('show');

});

//Customer History
Route::group(['as' => 'customer.history.', 'prefix' => '/user/customer/history', 'namespace' => 'UserDashboard\Customer', 'middleware' => ['auth', 'user', 'customer', 'verified']], function () {

    Route::get('/index', 'AppointmentController@customer_historyindex')->name('index');
});

//customer form Provider Reviews
Route::group(['as' => 'customer.review.', 'prefix' => '/user/customer/review', 'namespace' => 'UserDashboard\Customer', 'middleware' => ['auth', 'user', 'customer', 'verified']], function () {

    Route::get('/index', 'ReviewsController@index')->name('index');
    Route::get('/create/{id}', 'ReviewsController@create')->name('create');
    Route::post('/store', 'ReviewsController@store')->name('store');
    Route::get('/show/{id}', 'ReviewsController@show')->name('show');
    Route::get('/service/show/{id}', 'ReviewsController@serviceshow')->name('serviceshow');
    Route::get('/edit/provider/{id}', 'ReviewsController@pvedit')->name('pvedit');
    Route::get('/edit/ic/{id}', 'ReviewsController@icedit')->name('icedit');
    Route::get('/edit/service/{id}', 'ReviewsController@serviceedit')->name('serviceedit');
    Route::post('/update/pv/{id}', 'ReviewsController@pvupdate')->name('pvupdate');
    Route::post('/update/ic/{id}', 'ReviewsController@icupdate')->name('icupdate');
    Route::post('/update/serivce/{id}', 'ReviewsController@serviceupdate')->name('serviceupdate');
    Route::get('/destroy/pv/{id}', 'ReviewsController@pvdestroy')->name('pvdestroy');
    Route::get('/destroy/ic/{id}', 'ReviewsController@icdestroy')->name('icdestroy');
    Route::get('/destroy/service/{id}', 'ReviewsController@servicedestroy')->name('servicedestroy');
});
//customer form Provider Reviews
Route::group(['as' => 'vendor.review.', 'prefix' => '/user/vendor/review', 'namespace' => 'UserDashboard\Customer', 'middleware' => ['auth', 'user', 'customer', 'verified']], function () {

    Route::get('/index', 'ReviewsController@vendorindex')->name('index');
    Route::get('/show/{id}', 'ReviewsController@vendorshow')->name('show');

});

//Provider Business Info
Route::group(['as' => 'user.businessinfo.', 'prefix' => '/user/businessinfo', 'namespace' => 'UserDashboard\Provider', 'middleware' => ['auth', 'user', 'provider', 'verified']], function () {

    Route::get('/index', 'BusinessInfoController@index')->name('index');
    Route::post('/update/about', 'BusinessInfoController@updateAbout')->name('update.about');
    Route::post('/update/travel', 'BusinessInfoController@updateTravel')->name('update.travel');
    Route::post('/add/faq', 'BusinessInfoController@addFaq')->name('add.faq');
    Route::post('/update/faq/{id}', 'BusinessInfoController@updateFaq')->name('update.faq');
    Route::get('/remove/faq/{id}', 'BusinessInfoController@removeFaq')->name('remove.faq');

    Route::post('/add/wh', 'BusinessInfoController@addWh')->name('add.wh');
    Route::post('/update/wh/{id}', 'BusinessInfoController@updateWh')->name('update.wh');

    Route::post('/add/social', 'BusinessInfoController@addsocial')->name('add.social');
    Route::post('/update/social/{id}', 'BusinessInfoController@updatesocial')->name('update.social');

    Route::post('/add/portfolio', 'BusinessInfoController@addportfolio')->name('add.portfolio');
    Route::get('/remove/portfolio/{id}', 'BusinessInfoController@removPortfolio')->name('remove.portfolio');
});

//Social Login
Route::get('/login/{social}', 'Auth\LoginController@socialLogin')->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');
Route::get('/login/{social}/callback', 'Auth\LoginController@handleProviderCallback')->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');

/////////////////////////Default routes////////////////////////////////
//Get Data ajax
Route::group(['namespace' => 'DefaultController'], function () {
    Route::get('/get/subcategory/{id}', 'DefaultController@get_subcategory')->name('get.subcategory');
    Route::get('/get/childcategory/{id}', 'DefaultController@get_childcategory')->name('get.childcategory');
    Route::get('/get/district/{id}', 'DefaultController@get_district')->name('get.district');
    Route::get('/get/division/{id}', 'DefaultController@get_division')->name('get.division');
});


/////////////////////////Backend routes////////////////////////////////
Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/dashboard', 'Backend\DashboardController@admin_dashboard')->name('home');

    //Admin
    Route::group(['as' => 'admin.', 'prefix' => '/admin', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'AdminController@index')->name('index');
        Route::get('/create', 'AdminController@create')->name('create');
        Route::post('/store', 'AdminController@store')->name('store');
        Route::get('/edit/{id}', 'AdminController@edit')->name('edit');
        Route::post('/update/{id}', 'AdminController@update')->name('update');
        Route::get('/destroy/{id}', 'AdminController@destroy')->name('destroy');
    });


    //Contact
    Route::group(['as' => 'contact.', 'prefix' => '/contact', 'namespace' => 'Backend'], function () {
        Route::get('/index', 'ContactController@index')->name('index');
        Route::get('/destroy/{id}', 'ContactController@destroy')->name('destroy');
    });


    //Provider
    Route::group(['as' => 'provider.', 'prefix' => '/provider', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'ProviderController@index')->name('index');
        Route::get('/create', 'ProviderController@create')->name('create');
        Route::post('/store', 'ProviderController@store')->name('store');
        Route::get('/edit/{id}', 'ProviderController@edit')->name('edit');
        Route::get('/show/{id}', 'ProviderController@show')->name('show');
        Route::post('/update/{id}', 'ProviderController@update')->name('update');
        Route::get('/destroy/{id}', 'ProviderController@destroy')->name('destroy');

        Route::post('/status/{id}', 'ProviderController@status')->name('status');
    });

    //Customer
    Route::group(['as' => 'customer.', 'prefix' => '/customer', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'CustomerController@index')->name('index');
        Route::get('/create', 'CustomerController@create')->name('create');
        Route::post('/store', 'CustomerController@store')->name('store');
        Route::get('/edit/{id}', 'CustomerController@edit')->name('edit');
        Route::post('/update/{id}', 'CustomerController@update')->name('update');
        Route::get('/destroy/{id}', 'CustomerController@destroy')->name('destroy');

        Route::post('/status/{id}', 'CustomerController@status')->name('status');
    });




    //Admin Profile
    Route::group(['as' => 'admin.profile.', 'prefix' => '/admin/profile', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'ProfileController@index')->name('index');
        Route::post('/update', 'ProfileController@update')->name('update');
        Route::get('/edit/password', 'ProfileController@editPassword')->name('ep');
        Route::post('/update/password', 'ProfileController@updatePassword')->name('up');
    });


    //Users
    Route::group(['as' => 'users.', 'prefix' => '/users', 'namespace' => 'Backend'], function () {
        Route::get('/index', 'UsersController@index')->name('index');
        Route::get('/destroy/{id}', 'UsersController@destroy')->name('destroy');
    });

    //User status
    Route::get('/asdf', 'UserController@userOnlineStatus');

    //Category
    Route::group(['as' => 'category.', 'prefix' => '/category', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'CategoryController@index')->name('index');
        Route::get('/create', 'CategoryController@create')->name('create');
        Route::post('/store', 'CategoryController@store')->name('store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('edit');
        Route::post('/update/{id}', 'CategoryController@update')->name('update');
        Route::get('/destroy/{id}', 'CategoryController@destroy')->name('destroy');
        Route::post('/status/{id}', 'CategoryController@status')->name('status');
    });

    //Blog Category
    Route::group(['as' => 'blogcategory.', 'prefix' => '/blog/category', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'BlogCategoryController@index')->name('index');
        Route::get('/create', 'BlogCategoryController@create')->name('create');
        Route::post('/store', 'BlogCategoryController@store')->name('store');
        Route::get('/edit/{id}', 'BlogCategoryController@edit')->name('edit');
        Route::post('/update/{id}', 'BlogCategoryController@update')->name('update');
        Route::get('/destroy/{id}', 'BlogCategoryController@destroy')->name('destroy');
    });

    //Blog
    Route::group(['as' => 'blog.', 'prefix' => '/blog', 'namespace' => 'Backend'], function () {
        Route::get('/index', 'BlogController@index')->name('index');
        Route::get('/create', 'BlogController@create')->name('create');
        Route::post('/store', 'BlogController@store')->name('store');
        Route::get('/show/{id}', 'BlogController@show')->name('show');
        Route::get('/edit/{id}', 'BlogController@edit')->name('edit');
        Route::post('/update/{id}', 'BlogController@update')->name('update');
        Route::get('/destroy/{id}', 'BlogController@destroy')->name('destroy');
        Route::post('/status/{id}', 'BlogController@blog_status')->name('status');
    });

    //Service
    Route::group(['as' => 'service.', 'prefix' => '/service', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'ServiceController@index')->name('index');
        Route::get('/create', 'ServiceController@create')->name('create');
        Route::post('/store', 'ServiceController@store')->name('store');
        Route::get('/show/{id}', 'ServiceController@show')->name('show');
        Route::get('/edit/{id}', 'ServiceController@edit')->name('edit');
        Route::post('/update/{id}', 'ServiceController@update')->name('update');

        Route::get('/trash/{id}', 'ServiceController@trash')->name('trash');
        Route::get('/trashed/list', 'ServiceController@trash_list')->name('trash.list');
        Route::get('/restore/{id}', 'ServiceController@restore')->name('restore');
        Route::post('/status/{id}', 'ServiceController@status')->name('status');
        Route::get('/destroy/{id}', 'ServiceController@destroy')->name('destroy');

        Route::get('/remove/product/image/{id}', 'ServiceController@removeImage')->name('remove.image');
    });


    //Appointments
    Route::group(['as' => 'appointment.', 'prefix' => '/appointment', 'namespace' => 'Backend'], function () {

        Route::get('/new/index', 'AppointmentController@newIndex')->name('new');
        Route::get('/history/index', 'AppointmentController@historyIndex')->name('history');
        Route::get('/show/{id}', 'AppointmentController@show')->name('show');
    });
    //Appointments Canceled
    Route::group(['as' => 'appointment.cancel.', 'prefix' => '/appointment/cancel', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'AppointmentController@cancelindex')->name('index');

        Route::get('/show/{id}', 'AppointmentController@cancelshow')->name('show');
    });
    //Provider Service List
    Route::group(['as' => 'provider.service.', 'prefix' => '/provider-service', 'namespace' => 'Backend'], function () {

        Route::get('/new/index', 'ProviderServiceController@newIndex')->name('new');
        Route::get('/history/index', 'ProviderServiceController@historyIndex')->name('history');
        Route::get('/show/{id}', 'ProviderServiceController@show')->name('show');
    });

    //User reviews
    Route::group(['as' => 'userreview.', 'prefix' => '/user/review', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'ReviewController@userIndex')->name('index');
        Route::get('/show/{id}', 'ReviewController@userShow')->name('show');
    });

    //Provider reviews
    Route::group(['as' => 'providerreview.', 'prefix' => '/provider/review', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'ReviewController@providerIndex')->name('index');
        Route::get('/show/{id}', 'ReviewController@providerShow')->name('show');
    });
    //IC reviews
    Route::group(['as' => 'icreview.', 'prefix' => '/ic/review', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'ReviewController@IcIndex')->name('index');
        Route::get('/show/{id}', 'ReviewController@IcShow')->name('show');
    });
    //Provider Withdraw
    Route::group(['as' => 'withdraw.', 'prefix' => '/provider/withdral', 'namespace' => 'Backend'], function () {

        Route::get('/request', 'WithdrawController@withdrawrequest')->name('unpaid');
        Route::get('/request/accepted', 'WithdrawController@withdrawsent')->name('paid');
        Route::get('/request/send/{id}', 'WithdrawController@withdrawStatus')->name('status');
    });

   //admin coupon list
   Route::group(['as' => 'cupon.', 'prefix' => '/coupon', 'namespace' => 'Backend'], function () {

    Route::get('/index', 'PromocodesController@index')->name('index');
    Route::get('/create', 'PromocodesController@create')->name('create');
    Route::post('/store', 'PromocodesController@store')->name('store');
    Route::get('/show/{id}', 'PromocodesController@show')->name('show');
    Route::get('/edit/{id}', 'PromocodesController@edit')->name('edit');
    Route::post('/update/{id}', 'PromocodesController@update')->name('update');
    Route::get('/destroy/{id}', 'PromocodesController@destroy')->name('destroy');
    Route::post('/status/{id}', 'PromocodesController@status')->name('status');
});
   //admin  Sold Coupn list
   Route::group(['as' => 'sold.cupon.', 'prefix' => '/sold/coupon', 'namespace' => 'Backend'], function () {

    Route::get('/index', 'PromocodesController@soldindex')->name('index');
    Route::get('/show/{id}', 'PromocodesController@soldshow')->name('show');


});


    //Setting
    Route::group(['as' => 'setting.', 'prefix' => '/setting', 'namespace' => 'Backend'], function () {
        Route::get('/index', 'SettingController@index')->name('index');
        Route::post('/update/{id}', 'SettingController@update')->name('update');
    });

    //About Us
    Route::group(['as' => 'aboutus.', 'prefix' => '/aboutUs', 'namespace' => 'Backend'], function () {
        Route::get('/index', 'SettingController@aboutindex')->name('index');
        Route::post('/store', 'SettingController@aboutstore')->name('store');
        Route::post('/update/{id}', 'SettingController@aboutupdate')->name('update');
        Route::get('/detroy/{id}', 'SettingController@aboutdestroy')->name('destroy');
    });
    //Privacy and policy
    Route::group(['as' => 'privacy.', 'prefix' => '/privacy-policy', 'namespace' => 'Backend'], function () {
        Route::get('/index', 'SettingController@privaryindex')->name('index');
        Route::post('/store', 'SettingController@privacystore')->name('store');
        Route::post('/update/{id}', 'SettingController@privacyupdate')->name('update');
    });
    //Terms of service
    Route::group(['as' => 'terms.', 'prefix' => '/terms-service', 'namespace' => 'Backend'], function () {
        Route::get('/index', 'SettingController@termsindex')->name('index');
        Route::post('/store', 'SettingController@termsstore')->name('store');
        Route::post('/update/{id}', 'SettingController@termsupdate')->name('update');
    });
    //Faq
    Route::group(['as' => 'faq.', 'prefix' => '/faq', 'namespace' => 'Backend'], function () {
        Route::get('/index', 'SettingController@faqindex')->name('index');
        Route::post('/store', 'SettingController@faqstore')->name('store');
        Route::post('/update/{id}', 'SettingController@faqupdate')->name('update');
        Route::get('/detroy/{id}', 'SettingController@faqdestroy')->name('destroy');
    });

    //Features
    Route::group(['as' => 'features.', 'prefix' => '/features', 'namespace' => 'Backend'], function () {
        Route::get('/index', 'featureController@index')->name('index');
        Route::get('/create', 'featureController@create')->name('create');
        Route::post('/store', 'featureController@store')->name('store');
        Route::get('/edit/{id}', 'featureController@edit')->name('edit');
        Route::post('/update/{id}', 'featureController@update')->name('update');
        Route::get('/destroy/{id}', 'featureController@destroy')->name('destroy');
    });
    //Plan
    Route::group(['as' => 'plan.', 'prefix' => '/plan', 'namespace' => 'Backend'], function () {
        Route::get('/index', 'PlanController@index')->name('index');
        Route::get('/create', 'PlanController@create')->name('create');
        Route::post('/store', 'PlanController@store')->name('store');
        Route::get('/edit/{id}', 'PlanController@edit')->name('edit');
        Route::post('/update/{id}', 'PlanController@update')->name('update');
        Route::get('/destroy/{id}', 'PlanController@destroy')->name('destroy');
    });

    //Reviews
    Route::group(['as' => 'review.', 'prefix' => '/reviews', 'namespace' => 'Backend'], function () {
        Route::get('/index', 'ReviewController@reviewindex')->name('index');
        Route::post('/store', 'ReviewController@reviewstore')->name('store');
        Route::get('/show/{id}', 'ReviewController@reviewshow')->name('show');
        Route::get('/edit/{id}', 'ReviewController@reviewedit')->name('edit');
        Route::post('/update/{id}', 'ReviewController@reviewupdate')->name('update');
        Route::get('/destroy/{id}', 'ReviewController@reviewdestroy')->name('destroy');
        Route::post('/status/{id}', 'ReviewController@review_status')->name('status');
    });

    //Subscribtion
    Route::group(['as' => 'subscription.', 'prefix' => '/subscription', 'namespace' => 'Backend'], function () {
        Route::get('/index', 'PlanController@subcription')->name('index');
    });



});
