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

Route::get('/', 'WelcomePageController@welcome')->name('welcome');
Route::get('/terms-and-conditions', 'WelcomePageController@termsAndCondition')->name('termsAndCondition');
Route::get('/search', function () {
    return view('vdopedia.upload.video-search');
});

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});
//Clear Config cache:
Route::get('/view-cache', function() {
    $exitCode = Artisan::call('view:cache');
    return '<h1>Clear Config cleared</h1>';
});

Route::get('/storage', function() {
    $exitCode = Artisan::call('storage:link');
    return '<h1>Storage link successfully</h1>';
});

Route::get('/keygenerate', function() {
    $exitCode = Artisan::call('key:generate');
    return '<h1>Clear Config cleared</h1>';
});

Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login')->middleware('Admin');


	Route::post('/user/email/check', 'Auth\RegisterController@userEmailCheck')->name('userEmailCheck');
	Route::post('/user/name/check', 'Auth\RegisterController@usernameCheck')->name('usernameCheck');
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/user-list',function(){
		if(Auth::user()->role_id =='2') {
			return redirect()->route('home');
		}elseif(Auth::user()->role_id == '1') {
			return view('admin.list-of-all-users');
		}
	})->name('userList');
	Route::get('/datatable/getdata', 'HomeController@userlistgetdata')->name('userlistgetdata');
	Route::post('/user/status', 'HomeController@userStatusUpdate')->name('userStatusUpdate');
	
	
/* social login routes */
	Route::get('auth/facebook', 'SocialController@redirectToFacebook')->name('facebook');
	Route::get('auth/facebook/callback', 'SocialController@handleFacebookCallback');
	Route::get('auth/google', 'SocialController@redirectToGoogle')->name('googleLogin');
	Route::get('auth/google/callback', 'SocialController@handleGoogleCallback');

/* video upload routes */
	Route::get('/video/search','Upload\VideoUploadController@videoSearch')->name('videoSearch');
	Route::get('/video/search/autocomplete','Upload\VideoUploadController@videoSearchAutocomplete')->name('videoSearchAutocomplete');
	Route::get('/video/load/categoywise/search','Upload\VideoUploadController@videoCategoryWiseLoadOnHomePage')->name('load.video.categorywise');
	Route::get('/video/watch/{id?}','Upload\VideoUploadController@watchVideo')->name('watchVideo');
	// Route::get('/video/watch/render/{id?}','Upload\VideoUploadController@singlePageRender')->name('singlePageRender');
	Route::post('/video/category/{id?}','Upload\VideoUploadController@videoCategoryWiseFilter')->name('video.categoryWise.filter');
	Route::get('/video/watch/render/{id?}','Upload\VideoUploadController@singlePageRender');
	Route::post('/video/trending/{id?}','Upload\VideoUploadController@videoTrendingWiseFilter')->name('video.trendingWise.filter');
	Route::post('/video/sidebar/search','Upload\VideoUploadController@sidebarVideoSearchResult')->name('video.search.sidebar');
	Route::post('/video/ajaxRequest', 'Upload\VideoUploadController@LikeDislikeAjaxRequest')->name('ajaxRequest');

	Route::group(['middleware'=>'auth'],function () {
		Route::group(['prefix'=>'upload','namespace'=>'Upload'],function() {
			Route::post('/video/subscribed', 'VideoUploadController@subscribed')->name('subscribed');
			Route::post('/video/favorate', 'VideoUploadController@favorate')->name('favorate');
			Route::get('/video','VideoUploadController@index')->name('videoUpload.index');
			Route::post('/video/store','VideoUploadController@store')->name('videoUpload.store');
			Route::get('/video/edit/{id?}','VideoUploadController@edit')->name('videoUpload.edit');
			Route::post('/video/update/{id?}','VideoUploadController@update')->name('videoUpload.update');
			Route::post('/lyrics/download','VideoUploadController@downloadLyricsFile')->name('downloadLyricsFile');
		});

/* user profile routes */		
		Route::group(['prefix'=>'profile','namespace'=>'Profile'],function() {
			Route::get('/about-me/{id?}','ProfileController@aboutMe')->name('about-me');
			Route::get('/password/change/{id?}','ProfileController@passwordChange')->name('passwordChange');
			Route::get('/video/{id?}','ProfileController@userVideos')->name('userVideos');
			Route::get('favorate/videos/{id?}','ProfileController@userFavorateVideos')->name('userFavorateVideos');
			Route::get('/follower/{id?}','ProfileController@profileFollwer')->name('profile.follower');
			Route::get('/comments/{id?}','ProfileController@profileComments')->name('profile.comment');
			Route::post('/user/comments/all','ProfileController@getUserAllComment')->name('getUserAllComments');
			Route::get('/setting/{id?}','ProfileController@profileSetting')->name('profile.setting');
			Route::post('/store','ProfileController@update')->name('profile.update');
			Route::post('/password/update','ProfileController@PasswordUpdate')->name('password.update');
			Route::post('video/unfavorate','ProfileController@unfavorate')->name('profile.unfavorate');
			Route::post('video/delete','ProfileController@videoDelete')->name('profile.videoDelete');
			Route::post('profile/show/authorization','ProfileController@profileInfoShowAuthentication')->name('profileInfoShowAuthentication');
			Route::post('profile/show/authorization/check','ProfileController@VerificationCheck')->name('VerificationCheck');
			
/*comment controller*/
			Route::post('/comment/store','CommentController@commentStore')->name('comment');
			Route::post('/comment/reply/store','CommentController@replyCommentSection')->name('replyCommentSection');
			Route::post('/reply/view','CommentController@replyView')->name('replyview');
			Route::post('/comment/ajaxRequest', 'CommentController@commentLikeDislikeAjaxRequest')->name('comment.ajaxRequest');

		});
	});
	Route::get('profile/{id?}','Profile\ProfileController@index')->name('profile.index');
	Route::post('/comment/all','Profile\CommentController@getComment')->name('getComment');
	