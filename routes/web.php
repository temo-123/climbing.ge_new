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

Route::get('/', 'IndexController@index')->name('index');

Route::group(['namespace'=>'Guest'], function() {
    Route::get('/news/{title}', ['uses'=>'NewsController@news_page', 'as'=>'news_page']);
    Route::get('/security/{title}', ['uses'=>'SecurityController@security_page', 'as'=>'security_page']);
    Route::group(['prefix'=>'events'], function() {
        Route::get('/{title}', ['uses'=>'EventsController@events_page', 'as'=>'events_page']);
    });

    Route::get('/outdoor', 'OutdoorController@outdoor_list')->name('outdoor_list');
    Route::get('/outdoor/{title}', ['uses'=>'OutdoorController@outdoor_page', 'as'=>'outdoor_page']);

    Route::get('/indoor', 'IndoorController@indoor_list')->name('indoor_list');
    Route::get('/indoor/{title}', ['uses'=>'IndoorController@indoor_page', 'as'=>'indoor_page']);

    Route::get('/mountaineering', 'MountaineeringController@mount_list')->name('mount_list');
    Route::get('/mountaineering/{title}', ['uses'=>'MountaineeringController@mount_page', 'as'=>'mount_page']);

    Route::get('/ice_and_mix', 'IceController@ice_list')->name('ice_list');
    Route::get('/ice/{title}', ['uses'=>'IceController@ice_page', 'as'=>'ice_page']);

    Route::get('/other', 'OtherController@other_list')->name('other_list');
    Route::get('/other/{title}', ['uses'=>'OtherController@other_page', 'as'=>'other_page']);

    Route::group(['prefix'=>'shop'], function() {
        Route::get('/', 'ShopController@shop_list')->name('shop_list');
        Route::get('/shop_page/{title}', ['uses'=>'ShopController@shop_page', 'as'=>'shop_page']);
        Route::get('/seller_page/{id}', ['uses'=>'ShopController@seller_page', 'as'=>'seller_page']);
    });

    Route::get('/about_as', 'AboutController@about')->name('about_page');
    Route::get('/partniors/{title}', ['uses'=>'PartnersController@partners_page', 'as'=>'partners_page']);
});

Route::group(['namespace'=>'App'], function() {
    Route::group(['prefix'=>'add'], function() {
        Route::match(['post'], '/comment/{article_id}/{actions}', ['uses'=>'CommentController@comments','as'=>'comments']);
        Route::match(['get','post'], '/star_review/{article_id}/{action}/{category}', ['uses'=>'ReviewController@review','as'=>'starReviewAdd']);
    });

    Route::get('/events_interes/{events_id}/{actions}', ['uses'=>'PrioritiesController@events_interes', 'as'=>'events_interes']);
    Route::get('/favorite_product/{product_id}/{actions}', ['uses'=>'PrioritiesController@favorite_product', 'as'=>'favorite_product']);

    Route::get('/sitemap.xml', 'SitemapController@sitemap_xml');
    Route::get('/sitemap', 'SitemapController@sitemap');

    Route::post('/search', 'SearchController@index')->name('/search');
});

Route::group(['namespace'=>'Auth'], function() {
    Route::get('/redirect_fb', 'SocialAuth\SocialAuthFacebookController@redirect');
    Route::get('/callback_fb', 'SocialAuth\SocialAuthFacebookController@callback');

    Route::get('/redirect_google', 'SocialAuth\SocialAuthGoogleController@redirect');
    Route::get('/callback_google', 'SocialAuth\SocialAuthGoogleController@callback');
});

Route::match(['post'], '/message', 'Email\EmailController@email');







// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', ['uses'=>'HomeController@index', 'as'=>'home']);


Route::group(['middleware'=>'auth'], function() {
    // Route::post('/message_to_all_user', 'Message\MessageToAllUserController@send_form');

    Route::group(['prefix'=>'user', 'namespace'=>'User'], function() {

    	
    	// Route::group(['prefix'=>'comments'], function() {
    		// Route::get('/', ['uses'=>'Comment\CommentController@index', 'as'=>'comments']);
    	// 	Route::match(['get', 'post', 'delete'], '/edit/{comments}', ['uses' => 'Comment\CommentController@edit', 'as'=>'commentsEdit']);
    	// });
    	




        Route::group(['prefix'=>'mountaineering', 'namespace'=>'Mountaineering'], function() {
            Route::get('/', ['uses'=>'MountaineeringController@execute', 'as'=>'Mountaineering']);
            
            Route::group(['namespace'=>'Mount'], function() {
                Route::match(['get','post'], '/mount_add', ['uses'=>'MountController@store','as'=>'mountAdd']);
                Route::match(['get', 'post', 'delete'], '/mount_edit/{mount}', ['uses' => 'MountController@edit', 'as'=>'mountEdit']);
            });
            
            Route::group(['namespace'=>'Route'], function() {
                Route::match(['get','post'], '/mount_route_add', ['uses'=>'RouteController@store','as'=>'mountRouteAdd']);
                Route::match(['get', 'post', 'delete'], '/mount_route_edit/{mount_route}', ['uses' => 'RouteController@edit', 'as'=>'mountRouteEdit']);
            });
        });
        
        Route::group(['prefix'=>'routes_and_sectors', 'namespace'=>'Routes_And_Sectors'], function() {
            Route::get('/', ['uses'=>'RoutesAndSectorsListController@index', 'as'=>'routes_and_sectors']);
            Route::match(['post'],'/routesNumEdit', ['uses'=>'RoutesAndSectorsListController@store', 'as'=>'routesNumEdit']);
            
            Route::group(['namespace'=>'Sector'], function() {
                Route::match(['get','post'], '/sector_add', ['uses'=>'SectorController@add','as'=>'sectorAdd']);
                Route::match(['get', 'post', 'delete'], '/sector_edit/{sector}', ['uses' => 'SectorController@execute', 'as'=>'sectorEdit']);
            });
            
            Route::group(['namespace'=>'Route'], function() {
                Route::match(['get','post'], '/route_add', ['uses'=>'RouteController@add','as'=>'routeAdd']);
                Route::match(['get', 'post', 'delete'], '/route_edit/{route}', ['uses' => 'RouteController@execute', 'as'=>'routeEdit']);
            });
            
            Route::group(['namespace'=>'Mtp'], function() {
                Route::match(['get','post'], '/mtp_add', ['uses'=>'MtpController@add','as'=>'mtpAdd']);
                Route::match(['get', 'post', 'delete'], '/mtp_edit/{mtp}', ['uses' => 'MtpController@edit', 'as'=>'mtpEdit']);
            });
            
            Route::group(['namespace'=>'Mtp_Pitch'], function() {
                Route::match(['get','post'], '/mtp_pitch_add', ['uses'=>'MtpPitchController@add','as'=>'mtpPitchAdd']);
                Route::match(['get', 'post', 'delete'], '/mtp_pitch_edit/{mtp}', ['uses' => 'MtpPitchController@edit', 'as'=>'mtpPitchEdit']);
            });
        }); 









        Route::group(['prefix'=>'articles'], function() {
            Route::get('/{article_category}', ['uses'=>'ArticlesController@index', 'as'=>'article_table']);
            Route::match(['get','post'], '/add/{category}', ['uses'=>'ArticlesController@add','as'=>'article_add']);
            Route::match(['get', 'post', 'delete'], '/edit/{id}', ['uses' => 'ArticlesController@edit', 'as'=>'article_edit']);
        });        
        Route::group(['prefix'=>'gallery'], function() {
            Route::get('/{gallery_caregory}', ['uses'=>'GalleriesController@index', 'as'=>'gallery_table']);
            Route::match(['get','post'], '/add/{category}', ['uses'=>'GalleriesController@store','as'=>'galleryAdd']);
            Route::match(['get', 'post', 'delete'], '/edit/{id}', ['uses' => 'GalleriesController@edit', 'as'=>'galleryEdit']);
        });


        Route::group(['prefix'=>'products'], function() {
            Route::get('/', ['uses'=>'ProductsController@index', 'as'=>'products']);
            Route::match(['get','post'], '/add', ['uses'=>'ProductsController@store','as'=>'productsAdd']);
            Route::match(['get', 'post', 'delete'], '/edit/{product}', ['uses' => 'ProductsController@edit', 'as'=>'productsEdit']); 
            Route::group(['prefix'=>'favorite'], function() {
                Route::get('/', ['uses'=>'ProductsController@favorite', 'as'=>'favorite']);
            });
        });       


        Route::group(['prefix'=>'options'], function() {
            Route::get('/', ['uses'=>'UserController@options_index', 'as'=>'options']);
            Route::patch('/user-update/{user}', 'UserController@edit');
        });
    	Route::group(['prefix'=>'users'], function() {
    		Route::get('/', ['uses'=>'UserController@index', 'as'=>'users']);
    		Route::match(['delete'], '/edit/{user}', ['uses' => 'UserController@destroy', 'as'=>'userDel']);
    	});
        Route::group(['prefix'=>'reviews_and_comments'], function() {
            Route::get('/', ['uses'=>'MyRewievAndCommentController@myReviewsAndComments', 'as'=>'myReviewsAndComments']);
        });
        Route::group(['prefix'=>'about'], function() {
            Route::get('/', ['uses'=>'About\AboutController@index', 'as'=>'about']);
            Route::match(['get', 'post'], '/edit/{about}', ['uses' => 'About\AboutController@edit', 'as'=>'aboutEdit']);
        });
    });
});

// Route::get('/home', 'Admin\HomeController@home')->name('home');

// Auth::routes();
 
Auth::routes();
