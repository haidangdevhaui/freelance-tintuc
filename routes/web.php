<?php

// start front end
Route::group([/* 'middleware' => 'maintenance' */], function () {
	Route::get('/', 'FrontEnd\HomeController@index')->name('d_getIndex');
	Route::paginate('danh-muc/{slug}', ['as' => 'd_getPageCategory', 'uses' => 'FrontEnd\LivingSubstanceController@getIndexLivingSubtance']);
	Route::get('{slug}.html', 'FrontEnd\PostsDetailController@getNewsDetail')->name('d_getNewsDetail');
	Route::get('tag/{tag}', 'FrontEnd\PostTagController@getPostTag')->name('d_getPageTag');
	// Route::paginate('tim-kiem/{keyword}', ['as' => 'search', 'uses' => 'FrontEnd\HomeController@getSearch']);
	Route::get('tim-kiem', ['as' => 'search', 'uses' => 'FrontEnd\HomeController@getSearch']);
	Route::post('tim-kiem', ['as' => 'search', 'uses' => 'FrontEnd\HomeController@postSearch']);

	Route::group(['prefix' => 'mobile'], function () {
		Route::get('/', 'Mobile\HomeController@getIndexHomeMb')->name('m_getIndex');
		Route::get('danh-muc/{slug}.html', 'Mobile\PagesController@getIndexPageMb')->name('m_getPageCategory');
		Route::get('{slug}.html', 'Mobile\PostDetailController@getNewsDetailMb')->name('m_getNewsDetail');
		Route::get('tag/{tag}', 'Mobile\PostTagController@getNewsTagMb')->name('m_getPageTag');

		Route::get('tim-kiem', 'Mobile\HomeController@getSearch');
		Route::post('tim-kiem', 'Mobile\HomeController@postSearch');
		
		Route::get('search/load', 'Mobile\PagesController@loadMoreSearch');
		Route::post('page/newmore', 'Mobile\PagesController@postNewMore')->name('postNewMore');

		Route::get('search-form', 'Mobile\SearchFormController@getSearchFormMb')->name('getSearchFormMb');
		Route::get('paginate-load', 'Mobile\PaginateLoadController@getPaginateLoadMb')->name('getPaginateLoadMb');
	});

	Route::get('adv/{advId}', 'FrontEnd\ADController@click');
});
// start admin
Route::get('admin/auth/login', 'Admin\DashboardController@getLogin')->name('getLoginAdmin');
Route::post('admin/auth/login', 'Admin\DashboardController@postLogin')->name('postLoginAdmin');
Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
	Route::auth();
	Route::get('/', 'Admin\DashboardController@getDashboard')->name('getDashboard');
	Route::get('logout', 'Auth\LoginController@logout')->name('logout');


	Route::get('list-admin', 'Admin\Auth\AuthController@getListAdminAccount')->name('getListAdminAccount');
	Route::get('add-admin', 'Admin\Auth\AuthController@getAddAdminAccount')->name('getAddAdminAccount');
	Route::post('add-admin', 'Admin\Auth\AuthController@postAddAdminAccount')->name('postAddAdminAccount');
	Route::delete('delete-admin/{id}', 'Admin\Auth\AuthController@deleteAdminAccount')->name('deleteAdminAccount');
	Route::get('edit-admin/{id}', 'Admin\Auth\AuthController@getEditAdminAccount')->name('getEditAdminAccount');
	Route::PUT('edit-admin/{id}', 'Admin\Auth\AuthController@putEditAdminAccount')->name('putEditAdminAccount');
	Route::get('view-admin/{id}', 'Admin\Auth\AuthController@getViewAdminAccount')->name('getViewAdminAccount');

	Route::get('list-categories', 'Admin\CategoryController@getListCategory')->name('getListCategory');
	Route::get('add-categories', 'Admin\CategoryController@getAddCategory')->name('getAddCategory');
	Route::post('add-categories', 'Admin\CategoryController@postAddCategory')->name('postAddCategory');
	Route::delete('delete-categories/{id}', 'Admin\CategoryController@deleteCategory')->name('deleteCategory');
	Route::get('edit-categories/{id}', 'Admin\CategoryController@getEditCategory')->name('getEditCategory');
	Route::PUT('edit-categories/{id}', 'Admin\CategoryController@postEditCategory')->name('postEditCategory');
	Route::get('view-categories/{id}', 'Admin\CategoryController@getViewCategory')->name('getViewCategory');

	Route::get('list-slider', 'Admin\SliderController@getListSlider')->name('getListSlider');
	Route::get('add-slider', 'Admin\SliderController@getAddSlider')->name('getAddSlider');
	Route::post('add-slider', 'Admin\SliderController@postAddSlider')->name('postAddSlider');
	Route::delete('delete-slider/{id}', 'Admin\SliderController@deleteSlider')->name('deleteSlider');
	Route::get('edit-slider/{id}', 'Admin\SliderController@getEditSlider')->name('getEditSlider');
	Route::PUT('edit-slider/{id}', 'Admin\SliderController@postEditSlider')->name('postEditSlider');
	Route::get('view-slider/{id}', 'Admin\SliderController@getViewSlider')->name('getViewSlider');

	Route::get('post', 'Admin\NewsController@getListNews')->name('getListNews');

	Route::any('post/create', 'Admin\NewsController@create')->name('post_create');
	Route::any('post/edit/{id}', 'Admin\NewsController@create')->name('post_edit');

	Route::get('add-timer-post', 'Admin\NewsController@getAddTimerNews')->name('getAddTimerNews');
	Route::get('view-post/{id}', 'Admin\NewsController@getViewNews')->name('getViewNews');
	Route::post('add-post', 'Admin\NewsController@postAddNews')->name('postAddNews');
	Route::get('edit-post/{id}', 'Admin\NewsController@getEditNews')->name('getEditNews');
	Route::PUT('edit-post/{id}', 'Admin\NewsController@PutEditNews')->name('PutEditNews');
	Route::delete('delete-post/{id}', 'Admin\NewsController@deleteNews')->name('deleteNews');

	Route::get('list-video', 'Admin\VideoController@getListVideo')->name('getListVideo');
	Route::get('add-video', 'Admin\VideoController@getAddVideo')->name('getAddVideo');
	Route::post('add-video', 'Admin\VideoController@postAddVideo')->name('postAddVideo');
	Route::delete('delete-video/{id}', 'Admin\VideoController@deleteVideo')->name('deleteVideo');
	Route::get('edit-video/{id}', 'Admin\VideoController@getEditVideo')->name('getEditVideo');
	Route::PUT('edit-video/{id}', 'Admin\VideoController@PutEditVideo')->name('PutEditVideo');
	Route::get('view-video/{id}', 'Admin\VideoController@getViewVideo')->name('getViewVideo');

	Route::get('list-images', 'Admin\ImagesController@getList')->name('getListImagesAdmin');
	Route::get('list-gallery', 'Admin\ImagesController@getListGallery')->name('getListGalleryAdmin');
	Route::get('add-images', 'Admin\ImagesController@getAdd')->name('getAddImagesAdmin');
	Route::post('add-images', 'Admin\ImagesController@postAdd')->name('postAddImagesAdmin');

	Route::get('setting-desktop', 'Admin\SettingController@getSettingDesktop')->name('getSettingDesktop');
	Route::PUT('setting-desktop', 'Admin\SettingController@postSettingDesktop')->name('postSettingDesktop');
	Route::get('setting-mobile', 'Admin\SettingController@getSettingMobile')->name('getSettingMobile');
	Route::PUT('setting-mobile', 'Admin\SettingController@postSettingMobile')->name('postSettingMobile');
	Route::get('setting-general', 'Admin\SettingController@getSettingGeneral')->name('getSettingGeneral');
	Route::PUT('setting-general', 'Admin\SettingController@putSettingGeneral')->name('putSettingGeneral');

	Route::get('view-profile', 'Admin\ProfileController@getViewProfile')->name('getViewProfile');
	Route::get('edit-profile', 'Admin\ProfileController@getEditProfile')->name('getEditProfile');
	Route::PUT('edit-profile', 'Admin\ProfileController@putEditProfile')->name('putEditProfile');
	Route::PUT('change-password', 'Admin\ProfileController@putChangePassword')->name('putChangePassword');

	Route::get('edit-social', 'Admin\SocialController@getEditSocial')->name('getEditSocial');
	Route::PUT('edit-social', 'Admin\SocialController@putEditSocial')->name('putEditSocial');

	Route::get('tag', 'Admin\TagController@getIndex');
	Route::get('tag/create', 'Admin\TagController@getCreate');
	Route::post('tag/create', 'Admin\TagController@postCreate');
	Route::get('tag/edit/{tagId}', 'Admin\TagController@getEdit');
	Route::post('tag/edit/{tagId}', 'Admin\TagController@postEdit');
	Route::get('tag/delete/{tagId}', 'Admin\TagController@getDelete');
	Route::post('tag/search', 'Admin\TagController@getSearch');
	Route::post('tag/connect', 'Admin\NewsController@getNewsByTag');

	Route::post('news', 'Admin\NewsController@getNewsByDT');
});	