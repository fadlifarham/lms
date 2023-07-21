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
Auth::routes();
Route::get('/', 'LandingController@landing')->name('landing-page');
Route::get('/under-maintenance', 'LandingController@error')->name('error');
Route::get('/admin', 'AdminController@index')->name('dashboardadmin');
Route::get('/admin/userlist', 'AdminController@userlist')->name('userlist')->middleware('check_admin');
Route::post('/admin/edit-user-list', 'AdminController@postAjaxEditUserList')->name('postAjaxEditUserList')->middleware('check_admin');
Route::delete('/admin/userlist/delete/{id}', 'AdminController@deleteUser')->name('deleteUser');
Route::get('/admin/companylist', 'AdminController@companylist')->name('companylist')->middleware('check_admin');
Route::get('/admin/companylist/daftar-peserta/{id}', 'AdminController@daftarPeserta')->name('daftar-peserta/')->middleware('check_admin');
Route::get('/admin/participantlist', 'AdminController@participantlist')->name('participantlist')->middleware('check_admin');
Route::get('/admin/payment-validation', 'AdminController@payment_validation')->name('payment-validation')->middleware('check_admin');
Route::post('admin/validate', 'AdminController@validate_payment')->name('validate-payment')->middleware('check_admin');
Route::get('admin/sertifikasi', 'AdminSertifikasiController@getAdminSertifikasi')->name('getAdminSertifikasi')->middleware('check_admin');
Route::post('admin/ajax-create-sertifikasi', 'AdminSertifikasiController@postAjaxCreateSertifikasi')->name('postAjaxCreateSertifikasi')->middleware('check_admin');
Route::get('admin/sertifikasi/{kode_sertifikasi_id}', 'AdminSertifikasiController@getAdminCurrentSertifikasi')->name('getAdminCurrentSertifikasi')->middleware('check_admin');
Route::get('admin/grafik-nilai', 'AdminGrafikNilaiController@getAdminGrafikNilai')->name('getAdminGrafikNilai')->middleware('check_admin');
Route::get('admin/grafik-nilai/{id_jenis}/{id_kelas}', 'AdminGrafikNilaiController@getCurrentAdminGrafikNilai')->name('getCurrentAdminGrafikNilai')->middleware('check_admin');
Route::get('admin/show-grafik', 'AdminGrafikNilaiController@showGrafik')->name('showGrafik')->middleware('check_admin');

Route::get('/admin/companylist/daftar-nilai', 'AdminController@daftarNilai')->name('daftar-nilai')->middleware('check_admin');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', 'PagesController@index')->name('dashboard');
    Route::get('/home', 'PagesController@home')->name('home');
    Route::get('/modules', 'PagesController@module')->name('modules');
    Route::get('/ticket', 'PagesController@ticket')->name('ticket');
    Route::get('/training-saya', 'PagesController@trainingSaya')->name('trainingsaya');
    Route::get('/review-invitation', 'PagesController@review_invitation')->name('review-invitation')->middleware('check_user_status');
    Route::post('accept', 'ReviewInvitationController@accept');
    Route::post('send', 'TicketController@send');
    Route::get('/ticket/{id_ticket}/{id_section}', 'PagesController@some_ticket')->name('some_ticket');
    Route::get('activate/{id_ticket}', 'TicketController@activate');
    Route::get('update_ticket/{id_ticket}', 'TicketController@update_ticket');

    Route::get('/create-company', 'PagesController@create_company')->name('create-company');
    Route::get('/list-company', 'PagesController@list_company')->name('list-company');
    Route::get('list-user-company', 'PagesController@list_user_company')->name('list-user-company');
    Route::get('/invite-user-company/{id}', 'PagesController@invite_member')->name('invite-user-company/');
    Route::post('invite-user-company', 'CompanyController@invite_member')->name('invite-user-company');
    Route::post('verify-class', 'CompanyController@postAjaxVerifyClass');

    Route::post('post-create-company', 'CompanyController@create')->name('post-create-company');
    Route::post('post-data-user', 'CompanyController@member')->name('post-data-user');

    Route::get('join-company', 'PagesController@join_company')->name('join-company');
    Route::post('post-join-company', 'CompanyController@join')->name('post-join-company');

    Route::post('purchase', 'PurchaseController@purchase');
    Route::post('ajax-get-module-name', 'PurchaseController@postAjaxGetModuleName');

    Route::post('send-all', 'TicketController@send_all');
    // Route::post('create-company', 'CompanyController@create');

    Route::post('pretest', 'QuestionController@pretest');
    Route::get('pretest/{id_ticket}/{id_section}', 'PagesController@pretest')->name('pretest');

    Route::post('posttest', 'QuestionController@posttest');
    Route::get('posttest/{id_ticket}/{id_section}', 'PagesController@posttest')->name('posttest')->middleware('check_permission');

    Route::get('high-order-thinking/{id_ticket}', 'HighOrderThinkingController@getHighOrderThinking')->name('getHighOrderThinking')->middleware('check_permission');
    Route::post('high-order-thinking', 'HighOrderThinkingController@postHighOrderThinking')->name('postHighOrderThinking');

    Route::get('sertifikasi/{id_ticket}', 'SertifikasiController@getSertifikasiForUser')->name('getSertifikasiForUser')->middleware('check_permission');
    Route::post('sertifikasi-user', 'SertifikasiController@postAjaxSertifikasiUser')->name('postAjaxSertifikasiUser');
    //Route::get('posttest/{id_ticket}', 'PagesController@posttest');

    //Route::post('pretest', 'QuestionController@pretest');
    Route::get('examines/{id_ticket}/{id_section}', 'PagesController@examines');

    Route::post('postPPT', 'TicketController@postAjaxPresentation');
    Route::post('postVideo', 'TicketController@postAjaxVideo');

    Route::post('free_ticket', 'TicketController@free_ticket');

    Route::get('section/{id}', 'PagesController@section')->name('section')->middleware('check_permission');

    Route::get('update_ticket_section/{id_ticket}', 'TicketController@update_ticket_section');

    Route::post('/modul/{modul_id,user_id}', 'TicketController@getJumlahTicketYangDimiliki');

    Route::get('/petunjuk', 'PagesController@petunjuk')->name('petunjuk');

    Route::get('not-found', 'PagesController@errorNotFound')->name('errorNotFound');
});

Route::get('404', 'PagesController@not_found');

Auth::routes();
Route::group(['prefix' => 'sertifikasi'], function() {
    Route::get('/', 'SertifikasiController@getSertifikasi')->name('getSertifikasi')->middleware('sertifikasi');
    Route::get('login', 'SertifikasiController@loginSertifikasi')->name('loginSertifikasi');
    Route::post('login', 'SertifikasiController@postLoginSertifikasi')->name('postLoginSertifikasi');
    Route::post('logout', 'SertifikasiController@postLogOutSertifikasi')->name('postLogOutSertifikasi');
    Route::post('submit-score', 'QuestionController@postSubmitScoreSertifikasi')->name('postSubmitScore');
});
