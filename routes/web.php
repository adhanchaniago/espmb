<?php

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

Route::get('dropzone', 'DropzoneController@index');
Route::post('dropzone/uploadFiles', 'DropzoneController@uploadFiles');
Route::post('dropzone/removeFile', 'DropzoneController@removeFile');
Route::get('dropzone/getPreviousUploaded', 'DropzoneController@getPreviousUploaded');

Route::get('/', 'HomeController@index')->middleware(['auth','menu']);
Route::get('/home', 'HomeController@index')->middleware(['auth','menu']);
Route::get('/api/loadPlan', 'HomeController@apiPlan')->middleware(['auth','menu']);
Route::get('/api/loadUpcomingPlan/{mode}/{day}', 'HomeController@apiUpcomingPlan')->middleware(['auth','menu']);

Route::get('/test', 'Test@index');
Route::get('/import_data/{table}', 'Test@import_data');

Route::get('/download/file/{id}', 'DownloadController@downloadFile');
Route::get('/api/loadNotification', 'NotificationController@loadNotification');
Route::post('/api/sendNotification', 'NotificationController@sendNotification');
Route::post('/api/readNotification', 'NotificationController@readNotification');

//Tracker
Route::get('/public/tracker', 'TrackerController@index');
Route::post('/public/tracker', 'TrackerController@spmb');

//User
Route::group(['middleware' => ['auth', 'menu']], function(){
    Route::post('user/apiList', 'UserController@apiList');
    Route::post('user/apiDelete', 'UserController@apiDelete');
    Route::post('user/apiSearch', 'UserController@apiSearch');
    Route::get('change-password', 'UserController@changePassword');
    Route::post('change-password', 'UserController@postChangePassword');
    Route::get('profile', 'UserController@viewProfile');
    Route::resource('user', 'UserController');
    Route::post('editProfile', 'UserController@postEditProfile');
    Route::post('uploadAvatar', 'UserController@postUploadAvatar');
});

Route::group(['middleware' => ['auth', 'menu']], function() {
    //
    Route::group(['prefix' => 'master'], function() {

        //Action Control
        Route::post('action/apiList', 'ActionController@apiList');
        Route::post('action/apiDelete', 'ActionController@apiDelete');
        Route::resource('action', 'ActionController');

        //Brand
        Route::post('brand/apiList', 'BrandController@apiList');
        Route::post('brand/apiDelete', 'BrandController@apiDelete');
        Route::resource('brand', 'BrandController');
        Route::post('brand/apiSearch', 'BrandController@apiSearch');

        //Company
        Route::post('company/apiList', 'CompanyController@apiList');
        Route::post('company/apiDelete', 'CompanyController@apiDelete');
        Route::resource('company', 'CompanyController');

        //Division
        Route::post('division/apiList', 'DivisionController@apiList');
        Route::post('division/apiDelete', 'DivisionController@apiDelete');
        Route::resource('division', 'DivisionController');
        Route::post('division/apiGetPerCompany', 'DivisionController@apiGetPerCompany');

        //Flow
        Route::post('flow/apiList', 'FlowController@apiList');
        Route::post('flow/apiDelete', 'FlowController@apiDelete');
        Route::post('flow/apiCountFlow', 'FlowController@apiCountFlow');
        Route::resource('flow', 'FlowController');

        //Flow Group
        Route::post('flowgroup/apiList', 'FlowGroupController@apiList');
        Route::post('flowgroup/apiDelete', 'FlowGroupController@apiDelete');
        Route::resource('flowgroup', 'FlowGroupController');

        //Group
        Route::post('group/apiList', 'GroupController@apiList');
        Route::post('group/apiDelete', 'GroupController@apiDelete');
        Route::resource('group', 'GroupController');

        //Holiday
        Route::post('holiday/apiList', 'HolidayController@apiList');
        Route::post('holiday/apiDelete', 'HolidayController@apiDelete');
        Route::resource('holiday', 'HolidayController');

        //Item Category
        Route::post('itemcategory/apiList', 'ItemCategoryController@apiList');
        Route::post('itemcategory/apiDelete', 'ItemCategoryController@apiDelete');
        Route::resource('itemcategory', 'ItemCategoryController');

        //Industry
        Route::post('industry/apiList', 'IndustryController@apiList');
        Route::post('industry/apiDelete', 'IndustryController@apiDelete');
        Route::resource('industry', 'IndustryController');

        //Media
        Route::post('media/apiList', 'MediaController@apiList');
        Route::post('media/apiDelete', 'MediaController@apiDelete');
        Route::resource('media', 'MediaController');

        //Media Category
        Route::post('mediacategory/apiList', 'MediaCategoryController@apiList');
        Route::post('mediacategory/apiDelete', 'MediaCategoryController@apiDelete');
        Route::resource('mediacategory', 'MediaCategoryController');

        //Media Edition
        Route::post('mediaedition/apiSave', 'MediaEditionController@apiSave');
        Route::post('mediaedition/apiDelete', 'MediaEditionController@apiDelete');
        Route::post('mediaedition/apiList', 'MediaEditionController@apiList');
        Route::post('mediaedition/apiEdit', 'MediaEditionController@apiEdit');

        //Media Group
        Route::post('mediagroup/apiList', 'MediaGroupController@apiList');
        Route::post('mediagroup/apiDelete', 'MediaGroupController@apiDelete');
        Route::post('mediagroup/apiGetOption', 'MediaGroupController@apiGetOption');
        Route::resource('mediagroup', 'MediaGroupController');

        //Menu
        Route::post('menu/apiList', 'MenuController@apiList');
        Route::post('menu/apiDelete', 'MenuController@apiDelete');
        Route::post('menu/apiCountChild', 'MenuController@apiCountChild');
        Route::get('menu/generateMenu', 'MenuController@generateMenu');
        Route::resource('menu', 'MenuController');

        //Module
        Route::post('module/apiList', 'ModuleController@apiList');
        Route::post('module/apiDelete', 'ModuleController@apiDelete');
        Route::resource('module', 'ModuleController');

        //Notification Type
        Route::post('notificationtype/apiList', 'NotificationTypeController@apiList');
        Route::post('notificationtype/apiDelete', 'NotificationTypeController@apiDelete');
        Route::resource('notificationtype', 'NotificationTypeController');

        //Paper Type
        Route::post('paper/apiList', 'PaperController@apiList');
        Route::post('paper/apiDelete', 'PaperController@apiDelete');
        Route::resource('paper', 'PaperController');

        //Payment Type
        Route::post('paymenttype/apiList', 'PaymentTypeController@apiList');
        Route::post('paymenttype/apiDelete', 'PaymentTypeController@apiDelete');
        Route::resource('paymenttype', 'PaymentTypeController');

        //Publisher
        Route::post('publisher/apiList', 'PublisherController@apiList');
        Route::post('publisher/apiDelete', 'PublisherController@apiDelete');
        Route::resource('publisher', 'PublisherController');

        //Rating
        Route::post('rating/apiList', 'RatingController@apiList');
        Route::post('rating/apiDelete', 'RatingController@apiDelete');
        Route::resource('rating', 'RatingController');

        //Religion
        Route::post('religion/apiList', 'ReligionController@apiList');
        Route::post('religion/apiEdit', 'ReligionController@apiEdit');
        Route::resource('religion', 'ReligionController');

        //Role
        Route::post('role/apiList', 'RoleController@apiList');
        Route::post('role/apiEdit', 'RoleController@apiEdit');
        Route::resource('role', 'RoleController');

        //Rule
        Route::post('rule/apiList', 'RuleController@apiList');
        Route::post('rule/apiDelete', 'RuleController@apiDelete');
        Route::resource('rule', 'RuleController');

        //SPMB Category
        Route::post('spmbcategory/apiList', 'SPMBCategoryController@apiList');
        Route::post('spmbcategory/apiDelete', 'SPMBCategoryController@apiDelete');
        Route::resource('spmbcategory', 'SPMBCategoryController');

        //SPMB Type
        Route::post('spmbtype/apiList', 'SPMBTypeController@apiList');
        Route::post('spmbtype/apiDelete', 'SPMBTypeController@apiDelete');
        Route::resource('spmbtype', 'SPMBTypeController');
        Route::post('spmbtype/api/getRules', 'SPMBTypeController@apiGetRules');

        //Sub Industry
        Route::post('subindustry/apiList', 'SubIndustryController@apiList');
        Route::post('subindustry/apiDelete', 'SubIndustryController@apiDelete');
        Route::post('subindustry/apiGetOption', 'SubIndustryController@apiGetOption');
        Route::resource('subindustry', 'SubIndustryController');

        //Unit
        Route::post('unit/apiList', 'UnitController@apiList');
        Route::post('unit/apiDelete', 'UnitController@apiDelete');
        Route::resource('unit', 'UnitController');

        //Vendor Type
        Route::post('vendortype/apiList', 'VendorTypeController@apiList');
        Route::post('vendortype/apiDelete', 'VendorTypeController@apiDelete');
        Route::resource('vendortype', 'VendorTypeController');
    });

    //Vendor Management
    Route::post('vendor/apiList', 'VendorController@apiList');
    Route::post('vendor/apiDelete', 'VendorController@apiDelete');
    Route::resource('vendor', 'VendorController');
    Route::post('vendor/api/search-recommended', 'VendorController@apiSearchRecommended');
    Route::post('vendor/api/search-others', 'VendorController@apiSearchOthers');
    Route::post('vendor/api/rating', 'VendorController@apiRating');
    Route::post('vendor/api/averageRating', 'VendorController@apiAverageRating');

    //SPMB
    Route::post('spmb/apiList/{listtype}', 'SPMBController@apiList');
    Route::post('spmb/apiDelete', 'SPMBController@apiDelete');
    Route::resource('spmb', 'SPMBController');
    Route::post('spmb/tracking', 'SPMBController@tracking');
    Route::get('spmb/approve/{flow_no}/{id}', 'SPMBController@approve');
    Route::post('spmb/approve/{flow_no}/{id}', 'SPMBController@postApprove');
    Route::get('spmb/api/loadDetails', 'SPMBController@apiLoadDetails');
    Route::post('spmb/api/loadDetail', 'SPMBController@apiLoadDetail');
    Route::post('spmb/api/storeDetail', 'SPMBController@apiStoreDetails');
    Route::post('spmb/api/updateAssetDetails', 'SPMBController@apiUpdateAssetDetails');
    Route::post('spmb/api/deleteDetail', 'SPMBController@apiDeleteDetails');
    Route::post('spmb/api/storeDetailVendor', 'SPMBController@apiStoreDetailVendor');
    Route::post('spmb/api/updateDetailVendor', 'SPMBController@apiUpdateDetailVendor');
    Route::post('spmb/api/loadDetailPayment', 'SPMBController@apiLoadDetailPayment');
    Route::post('spmb/api/loadDetailReceipt', 'SPMBController@apiLoadDetailReceipt');
    Route::post('spmb/api/loadOrderPayment', 'SPMBController@apiLoadOrderPayment');
    Route::post('spmb/api/storeOrderPayment', 'SPMBController@apiStoreOrderPayment');
    Route::post('spmb/api/storeAcceptance', 'SPMBController@apiStoreAcceptance');
    Route::post('spmb/api/updatePayment', 'SPMBController@apiUpdatePayment');
    Route::post('spmb/api/loadModalRating', 'SPMBController@apiLoadModalRating');
    Route::post('spmb/api/loadDetailRating', 'SPMBController@apiLoadDetailRating');
    Route::post('spmb/api/saveRating', 'SPMBController@apiSaveRating');

    Route::group(['prefix' => 'config'], function() {
        //Announcement Management
        Route::post('announcement/apiList', 'AnnouncementController@apiList');
        Route::post('announcement/apiDelete', 'AnnouncementController@apiDelete');
        Route::resource('announcement', 'AnnouncementController');

        //Application Setting
        Route::post('setting/apiList', 'SettingController@apiList');
        Route::post('setting/apiDelete', 'SettingController@apiDelete');
        Route::resource('setting', 'SettingController');
        Route::post('setting/clearCache', 'SettingController@apiClearCache');

        //User Log
        Route::post('log/apiList', 'LogController@apiList');
        Route::resource('log', 'LogController');
    });
});

Auth::routes();
Route::get('/alogout', 'TestController@logout');