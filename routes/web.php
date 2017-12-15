<?php

// start front end
Route::group([/* 'middleware' => 'maintenance' */], function () {

    Route::get('/', 'FrontEnd\HomeController@index')->name('d_getIndex');

    Route::paginate('danh-muc/{slug}.html', ['as' => 'desktop.category', 'uses' => 'FrontEnd\HomeController@category']);

    Route::get('tim-kiem', ['as' => 'search', 'uses' => 'FrontEnd\HomeController@search']);
    Route::post('tim-kiem', ['as' => 'search', 'uses' => 'FrontEnd\HomeController@fetchSearch']);

    Route::get('video/{slug}.html', 'FrontEnd\HomeController@videoDetail')->name('desktop.video.detail');
    Route::get('video.html', 'FrontEnd\HomeController@videoPage')->name('desktop.video');

    Route::get('{slug}.html', 'FrontEnd\HomeController@post')->name('desktop.post');

    // Route::get('tag/{tag}', 'FrontEnd\PostTagController@getPostTag')->name('d_getPageTag');



    // Route::group(['prefix' => 'mobile'], function () {
    //     Route::get('/', 'Mobile\HomeController@getIndexHomeMb')->name('m_getIndex');
    //     Route::get('danh-muc/{slug}.html', 'Mobile\PagesController@getIndexPageMb')->name('m_getPageCategory');
    //     Route::get('{slug}.html', 'Mobile\PostDetailController@getNewsDetailMb')->name('m_getNewsDetail');
    //     Route::get('tag/{tag}', 'Mobile\PostTagController@getNewsTagMb')->name('m_getPageTag');

    //     Route::get('tim-kiem', 'Mobile\HomeController@getSearch');
    //     Route::post('tim-kiem', 'Mobile\HomeController@postSearch');

    //     Route::get('search/load', 'Mobile\PagesController@loadMoreSearch');
    //     Route::post('page/newmore', 'Mobile\PagesController@postNewMore')->name('postNewMore');

    //     Route::get('search-form', 'Mobile\SearchFormController@getSearchFormMb')->name('getSearchFormMb');
    //     Route::get('paginate-load', 'Mobile\PaginateLoadController@getPaginateLoadMb')->name('getPaginateLoadMb');
    // });
});
// start admin
Route::get('admin/auth/login', 'Admin\DashboardController@getLogin')->name('getLoginAdmin');
Route::post('admin/auth/login', 'Admin\DashboardController@postLogin')->name('postLoginAdmin');
Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
    Route::auth();
    Route::get('/', 'Admin\DashboardController@getDashboard')->name('getDashboard');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');

    // Route::get('list-admin', 'Admin\Auth\AuthController@getListAdminAccount')->name('getListAdminAccount');
    // Route::get('add-admin', 'Admin\Auth\AuthController@getAddAdminAccount')->name('getAddAdminAccount');
    // Route::post('add-admin', 'Admin\Auth\AuthController@postAddAdminAccount')->name('postAddAdminAccount');
    // Route::delete('delete-admin/{id}', 'Admin\Auth\AuthController@deleteAdminAccount')->name('deleteAdminAccount');
    // Route::get('edit-admin/{id}', 'Admin\Auth\AuthController@getEditAdminAccount')->name('getEditAdminAccount');
    // Route::PUT('edit-admin/{id}', 'Admin\Auth\AuthController@putEditAdminAccount')->name('putEditAdminAccount');
    // Route::get('view-admin/{id}', 'Admin\Auth\AuthController@getViewAdminAccount')->name('getViewAdminAccount');

    // Route::get('list-categories', 'Admin\CategoryController@getListCategory')->name('getListCategory');
    // Route::get('add-categories', 'Admin\CategoryController@getAddCategory')->name('getAddCategory');
    // Route::post('add-categories', 'Admin\CategoryController@postAddCategory')->name('postAddCategory');
    // Route::delete('delete-categories/{id}', 'Admin\CategoryController@deleteCategory')->name('deleteCategory');
    // Route::get('edit-categories/{id}', 'Admin\CategoryController@getEditCategory')->name('getEditCategory');
    // Route::PUT('edit-categories/{id}', 'Admin\CategoryController@postEditCategory')->name('postEditCategory');
    // Route::get('view-categories/{id}', 'Admin\CategoryController@getViewCategory')->name('getViewCategory');

    // Route::get('list-slider', 'Admin\SliderController@getListSlider')->name('getListSlider');
    // Route::get('add-slider', 'Admin\SliderController@getAddSlider')->name('getAddSlider');
    // Route::post('add-slider', 'Admin\SliderController@postAddSlider')->name('postAddSlider');
    // Route::delete('delete-slider/{id}', 'Admin\SliderController@deleteSlider')->name('deleteSlider');
    // Route::get('edit-slider/{id}', 'Admin\SliderController@getEditSlider')->name('getEditSlider');
    // Route::PUT('edit-slider/{id}', 'Admin\SliderController@postEditSlider')->name('postEditSlider');
    // Route::get('view-slider/{id}', 'Admin\SliderController@getViewSlider')->name('getViewSlider');

    /**
     * post
     */
    Route::get('post', 'Admin\PostController@index')->name('post_index');
    Route::any('post/create', 'Admin\PostController@create')->name('post_create');
    Route::any('post/edit/{id}', 'Admin\PostController@create')->name('post_edit');
    Route::any('post/delete/{id}', 'Admin\PostController@delete')->name('post_delete');
    Route::post('post/fetch', 'Admin\PostController@fetchNew')->name('post_fetch');

    /**
     * video
     */
    Route::get('video', 'Admin\VideoController@index')->name('video_index');
    Route::any('video/create', 'Admin\VideoController@create')->name('video_create');
    Route::any('video/edit/{id}', 'Admin\VideoController@create')->name('video_edit');
    Route::any('video/delete/{id}', 'Admin\VideoController@delete')->name('video_delete');
});
