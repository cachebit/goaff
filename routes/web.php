<?php
# ------------------ Test Route ------------------------
Route::get('/test', 'PagesController@test')->name('test');

# ------------------ Memberships Route ------------------------
Route::get('/memberships', 'MembershipsController@index')->name('memberships.index');
Route::patch('/memberships/{user}/membership', 'MembershipsController@update')->name('memberships.update');
Route::get('/memberships/{user}/logs', 'MembershipLogsController@index')->name('memberships.logs');

# ------------------ Page Route ------------------------
Route::get('/', 'PagesController@home')->name('home');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/search', 'PagesController@search')->name('search');
Route::get('/feed', 'PagesController@feed')->name('feed');
Route::get('/wiki', 'PagesController@wiki')->name('wiki');
Route::get('/sitemap', 'PagesController@sitemap');
Route::get('/sitemap.xml', 'PagesController@sitemap');
Route::get('/hall_of_fames', 'PagesController@hallOfFames')->name('hall_of_fames');
// Route::get('/composer', 'PagesController@composer')->name('composer');

Route::get('/roles/{id}', 'RolesController@show')->name('roles.show');

# ------------------ User stuff ------------------------

Route::get('/users/drafts', 'UsersController@drafts')->name('users.drafts');
Route::get('/users/{id}/replies', 'UsersController@replies')->name('users.replies');
Route::get('/users/{id}/topics', 'UsersController@topics')->name('users.topics');
Route::get('/users/{id}/articles', 'UsersController@articles')->name('users.articles');
Route::get('/users/{id}/votes', 'UsersController@votes')->name('users.votes');
Route::get('/users/{id}/following', 'UsersController@following')->name('users.following');
Route::get('/users/{id}/followers', 'UsersController@followers')->name('users.followers');

Route::get('/users/{id}/refresh_cache', 'UsersController@refreshCache')->name('users.refresh_cache');
Route::get('/users/{id}/access_tokens', 'UsersController@accessTokens')->name('users.access_tokens');
Route::get('/access_token/{token}/revoke', 'UsersController@revokeAccessToken')->name('users.access_tokens.revoke');
Route::post('/users/regenerate_login_token', 'UsersController@regenerateLoginToken')->name('users.regenerate_login_token');

Route::post('/users/follow/{id}', 'UsersController@doFollow')->name('users.doFollow');
Route::get('/users/{id}/edit_email_notify', 'UsersController@editEmailNotify')->name('users.edit_email_notify');
Route::post('/users/{id}/update_email_notify', 'UsersController@updateEmailNotify')->name('users.update_email_notify');
Route::get('/users/{id}/edit_password', 'UsersController@editPassword')->name('users.edit_password');
Route::patch('/users/{id}/update_password', 'UsersController@updatePassword')->name('users.update_password');
Route::get('/users/{id}/edit_social_binding', 'UsersController@editSocialBinding')->name('users.edit_social_binding');

Route::get('/users', 'UsersController@index')->name('users.index');
// Route::get('/users/create', 'UsersController@create')->name('users.create');
// Route::post('/users', 'UsersController@store')->name('users.store');
Route::get('/users/{id}', 'UsersController@show')->name('users.show');
Route::get('/users/{id}/edit', 'UsersController@edit')->name('users.edit');
Route::patch('/users/{id}', 'UsersController@update')->name('users.update');
Route::get('/users/{id}/edit_avatar', 'UsersController@editAvatar')->name('users.edit_avatar');
Route::patch('/users/{id}/update_avatar', 'UsersController@updateAvatar')->name('users.update_avatar');

Route::get('/notifications/unread', 'NotificationsController@unread')->name('notifications.unread');
Route::get('/notifications', 'NotificationsController@index')->name('notifications.index');
Route::get('/notifications/count', 'NotificationsController@count')->name('notifications.count');

Route::get('/messages', 'MessagesController@index')->name('messages.index');
Route::get('/messages/to/{id}', 'MessagesController@create')->name('messages.create');
Route::post('/messages', 'MessagesController@store')->name('messages.store');
Route::get('/messages/{id}', 'MessagesController@show')->name('messages.show');
Route::put('/messages/{id}', 'MessagesController@update')->name('messages.update');

Route::get('/email-verification-required', 'UsersController@emailVerificationRequired')->name('email-verification-required');
Route::post('/users/send-verification-mail', 'UsersController@sendVerificationMail')->name('users.send-verification-mail');

Route::get('/users/create', 'MembershipsController@create')->name('users.create');
Route::post('/users', 'MembershipsController@store')->name('users.store');

# ------------------ Authentication ------------------------

Route::get('/login', 'Auth\AuthController@oauth')->name('login');
Route::get('/auth/login', 'Auth\AuthController@signin')->name('auth.login');
Route::post('/auth/login', 'Auth\AuthController@postLogin')->name('auth.login');
Route::get('/login-required', 'Auth\AuthController@loginRequired')->name('login-required');
Route::get('/admin-required', 'Auth\AuthController@adminRequired')->name('admin-required');
Route::get('/user-banned', 'Auth\AuthController@userBanned')->name('user-banned');
Route::get('/signup', 'Auth\AuthController@create')->name('signup');
Route::post('/signup', 'Auth\AuthController@createNewUser')->name('signup');
Route::get('/logout', 'Auth\AuthController@logout')->name('logout');
Route::get('/oauth', 'Auth\AuthController@getOauth');

Route::get('/auth/oauth', 'Auth\AuthController@oauth')->name('auth.oauth');
Route::get('/auth/callback', 'Auth\AuthController@callback')->name('auth.callback');
Route::get('/verification/{token}', 'Auth\AuthController@getVerification')->name('verification');

# ------------------ Categories ------------------------

Route::get('categories/{id}', 'CategoriesController@show')->name('categories.show');

# ------------------ Site ------------------------

Route::get('/sites', 'SitesController@index')->name('sites.index');

# ------------------ Replies ------------------------

Route::post('/replies', 'RepliesController@store')->name('replies.store')->middleware('verified_email');
Route::delete('replies/delete/{id}', 'RepliesController@destroy')->name('replies.destroy')->middleware('auth');

# ------------------ Topic ------------------------
Route::get('/topics', 'TopicsController@index')->name('topics.index');
Route::get('/topics/create', 'TopicsController@create')->name('topics.create')->middleware('verified_email');
Route::post('/topics', 'TopicsController@store')->name('topics.store')->middleware('verified_email');
Route::get('/topics/{id}/edit', 'TopicsController@edit')->name('topics.edit');
Route::patch('/topics/{id}', 'TopicsController@update')->name('topics.update');
Route::delete('/topics/{id}', 'TopicsController@destroy')->name('topics.destroy');
Route::post('/topics/{id}/append', 'TopicsController@append')->name('topics.append');

# ------------------ User Topic Actions ------------------------

Route::group(['before' => 'auth'], function () {
    Route::post('/topics/{id}/upvote', 'TopicsController@upvote')->name('topics.upvote');
    Route::post('/topics/{id}/downvote', 'TopicsController@downvote')->name('topics.downvote');
    Route::post('/replies/{id}/vote', 'RepliesController@vote')->name('replies.vote');
    Route::post('/attentions/{id}', 'AttentionsController@createOrDelete')->name('attentions.createOrDelete');
});

# ------------------ Admin Route ------------------------

Route::group(['before' => 'manage_topics'], function () {
    Route::post('topics/recommend/{id}', 'TopicsController@recommend')->name('topics.recommend');
    Route::post('topics/pin/{id}', 'TopicsController@pin')->name('topics.pin');
    Route::delete('topics/delete/{id}', 'TopicsController@destroy')->name('topics.destroy');
    Route::post('topics/sink/{id}', 'TopicsController@sink')->name('topics.sink');
});

Route::group(['before' => 'manage_users'], function () {
    Route::post('users/blocking/{id}', 'UsersController@blocking')->name('users.blocking');
});

Route::post('/upload_image', 'TopicsController@uploadImage')->name('upload_image')->middleware('auth');

// Health Checking
Route::get('heartbeat', function () {
    return Category::first();
});

Route::get('/github-api-proxy/users/{username}', 'UsersController@githubApiProxy')->name('users.github-api-proxy');
Route::group(['middleware' => ['auth', 'admin_auth']], function () {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
});

# ------------------ Blogs ------------------------

Route::get('/blogs', 'BlogsController@index')->name('blogs.index');
Route::get('/blogs/create', 'BlogsController@create')->name('blogs.create')->middleware('verified_email');
Route::post('/blogs', 'BlogsController@store')->name('blogs.store')->middleware('verified_email');
Route::get('/blogs/{id}/edit', 'BlogsController@edit')->name('blogs.edit');
Route::patch('/blogs/{id}', 'BlogsController@update')->name('blogs.update');

Route::post('/blogs/{blog}/subscribe', 'BlogsController@subscribe')->name('blogs.subscribe');
Route::post('/blogs/{blog}/unsubscribe', 'BlogsController@unsubscribe')->name('blogs.unsubscribe');

// Article
Route::get("/articles/create", "ArticlesController@create")->name('articles.create')->middleware('verified_email');
Route::patch("/topics/{id}/transform", "ArticlesController@transform")->name('articles.transform');
Route::post("/articles", "ArticlesController@store")->name('articles.store')->middleware('verified_email');
Route::get("/articles/{id}/edit", "ArticlesController@edit")->name('articles.edit');

Route::get('/topics/{id}/{slug?}', 'TopicsController@show')->name('topics.show');
Route::get('/articles/{id}/{slug?}', "TopicsController@show")->name('articles.show');


# ------------------ Wild Card ------------------------


Route::get('{name}', 'PagesController@wildcard')->name('wildcard');



Route::get('/tutorial',function(){
    return redirect('/categories/16', 301);
});
Route::get('/category/guide',function(){
    return redirect('/categories/17', 301);
});
Route::get('/state-abbr',function(){
    return redirect('/topics/1/guo-jia-he-di-qu-suo-xie-dai-ma-he-shi-cha', 301);
});
Route::get('/category/nuts',function(){
    return redirect('/topics', 301);
});
Route::get('/category/basic',function(){
    return redirect('/categories/5', 301);
});
Route::get('/category/wiki',function(){
    return redirect('/categories/4', 301);
});
Route::get('/category/stuff',function(){
    return redirect('/categories/7', 301);
});
Route::get('/category/site',function(){
    return redirect('/categories/6', 301);
});
Route::get('/how-to-started-in-media-buy-1',function(){
    return redirect('/topics/2/kai-shi-media-buy-yi-gei-media-buy-xin-shou-de-4-ge-ti-shi', 301);
});
Route::get('/affiliate-marketing-key-points-1',function(){
    return redirect('/topics/3/affiliate-marketing-de-ji-ge-guan-jian-wen-ti-1-ru-he-gao-xiao-xuan-ze-offer', 301);
});
Route::get('/popads-create-new-campaign-tutorial-2017',function(){
    return redirect('/topics/4/popads-ru-he-xin-jian-campaign-tu-wen-jiao-cheng-2017-nian-geng-xin', 301);
});
Route::get('/what-is-cta',function(){
    return redirect('/topics/5/shen-me-shi-cta', 301);
});
Route::get('/how-tp-started-media-buy-2-adult-ad-network-analysis-part-one',function(){
    return redirect('/topics/6/kai-shi-media-buy-er-da-ren-ad-network-liu-liang-ping-tai-fen-xi', 301);
});
Route::get('/affiliate-marketing-key-points-2',function(){
    return redirect('/topics/7/affiliate-marketing-de-ji-ge-guan-jian-wen-ti-2-ru-he-xuan-ze-liu-liang-ping-tai', 301);
});
Route::get('/what-is-affiliate-marketing',function(){
    return redirect('/topics/8/shen-me-shi-affiliate-marketing', 301);
Route::get('/what-is-ad-network',function(){
    return redirect('/topics/9/shen-me-shi-ad-network', 301);
});
Route::get('/amazon-associates-policy-1',function(){
    return redirect('/topics/10/amazon-associates-zheng-ce-1-jian-jie', 301);
});
Route::get('/3x-ad-optimize-system',function(){
    return redirect('/topics/11/affiliate-marketing-de-ji-ge-guan-jian-wen-ti-3-3-bu-zou-wen-bu-ce-shi-campaign-huo-li', 301);
});
Route::get('/how-tp-started-media-buy-2-mistakes-1',function(){
    return redirect('/topics/12/kai-shi-media-buy-san-xin-shou-chang-jian-cuo-wu-1', 301);
});
Route::get('/affiliate-marketing-copy-landing-pages',function(){
    return redirect('/topics/13/affiliate-marketing-de-ji-ge-guan-jian-wen-ti-4-ru-he-copy-landing-pages', 301);
});
Route::get('/landing-pages',function(){
    return redirect('/topics/14/shen-me-shi-landing-pages', 301);
});
Route::get('/a-complete-guide-to-affiliate-marketing-finch-1-introduction',function(){
    return redirect('/topics/15/stm-lun-tan-da-shen-finch-li-zuo-affiliate-marketing-wan-quan-zhi-nan-lian-zai-geng-xin', 301);
});
Route::get('/a-complete-guide-to-affiliate-marketing-finch-2-what-do-affiliates-do',function(){
    return redirect('/topics/16/affiliate-shi-zuo-shi-mo-de-affiliate-marketing-wan-quan-zhi-nan-1', 301);
});
Route::get('/what-is-pops-traffic-source',function(){
    return redirect('/topics/17/xin-shou-fu-yin-ni-zhi-bu-zhi-dao-de-pop-liu-liang-da-qi-di', 301);
});
Route::get('/what-is-mobile-popunder-traffic',function(){
    return redirect('/topics/18/pop-liu-liang-da-qi-di-1-yi-dong-duan-pops-guang-gao-shi-shen-me-yang-de-ta-men-ru-he-gong-zuo', 301);
});
Route::get('/pop-traffic-source-is-good-for-affiliate-newbie',function(){
    return redirect('/topics/19/pop-liu-liang-da-qi-di-2-yi-dong-duan-di-pop-guang-gao-shi-he-xin-shou-ma', 301);
});
Route::get('/the-commission-models',function(){
    return redirect('/topics/20/wo-men-ru-he-huo-de-bao-chou-yong-jin-mo-shi-affiliate-marketing-wan-quan-zhi-nan-2', 301);
});
Route::get('/stm-open-course-6wamc-4-step-affiliate-marketing-tutorial',function(){
    return redirect('/topics/21/stm-lun-tan-gong-kai-ke-1-xin-ren-ru-xing-de-4-bu-ji-hua', 301);
});
Route::get('/affiliates-personalities',function(){
    return redirect('/topics/22/shen-me-yang-de-ren-shi-he-dang-affiliate-affiliate-marketing-wan-quan-zhi-nan-3', 301);
});
Route::get('/affiliate-prepare',function(){
    return redirect('/topics/23/affiliate-marketing-zhun-bei-gong-zuo-affiliate-marketing-wan-quan-zhi-nan-4', 301);
});
Route::get('/prepare-for-mobile-affiliate-marketing',function(){
    return redirect('/topics/24/pop-liu-liang-da-qi-di-3-mobile-affiliate-kai-shi-qian-de-zhun-bei', 301);
});
Route::get('/which-offers-to-run-on-mobile-popup-and-popunder',function(){
    return redirect('/topics/25/pop-liu-liang-da-qi-di-4-nei-xie-offers-verticals-zai-mobile-pops-shang-pao-de-bi-jiao-hao', 301);
});
Route::get('/pros-and-consof-mobile-popup-and-popunder',function(){
    return redirect('/topics/26/pop-liu-liang-da-qi-di-5-yi-dong-duan-popup-he-popunder-de-you-he-lie', 301);
});
Route::get('/cash-flow-and-budget-in-affiliate-marketing',function(){
    return redirect('/topics/27/xian-jin-liu-affiliate-marketing-zhong-ru-he-fen-pei-yu-suan-affiliate-marketing-wan-quan-zhi-nan-5', 301);
});
Route::get('/the-relations-between-affiliates',function(){
    return redirect('/topics/28/ni-he-qi-ta-affiliates-de-guan-xi-affiliate-marketing-wan-quan-zhi-nan-6', 301);
});
Route::get('/the-relations-between-affiliate-and-affiliate-networks',function(){
    return redirect('/topics/29/ni-he-affiliate-network-de-guan-xi-affiliate-marketing-wan-quan-zhi-nan-7', 301);
});
Route::get('/how-to-register-popads',function(){
    return redirect('/topics/30/popads-zhu-ce-liu-cheng-jiao-ni-popads-zen-me-zhu-ce', 301);
});
Route::get('/popads-inroduction-and-faq',function(){
    return redirect('/topics/31/popads-jian-jie-he-chang-jian-wen-ti', 301);
});
Route::get('/relations-between-affiliate-and-merchants',function(){
    return redirect('/topics/32/ni-he-guang-gao-zhu-de-guan-xi-affiliate-marketing-wan-quan-zhi-nan-8', 301);
});
Route::get('/afflow-introduction-and-faq',function(){
    return redirect('/topics/33/afflow-monetizer-jian-jie-he-chang-jian-wen-ti', 301);
});
Route::get('/how-to-register-afflow',function(){
    return redirect('/topics/34/afflow-zhu-ce-liu-cheng-jiao-ni-afflow-zen-me-zhu-ce', 301);
});
Route::get('/relations-between-affiliate-and-traffic-source',function(){
    return redirect('/topics/35/ni-he-liu-liang-ping-tai-de-guan-xi-affiliate-marketing-wan-quan-zhi-nan-9', 301);
});
Route::get('/relations-between-affiliates-and-end-users',function(){
    return redirect('/topics/36/ni-he-zhong-duan-yong-hu-de-guan-xi-affiliate-marketing-wan-quan-zhi-nan-10', 301);
});
Route::get('/what-offers-verticals-should-i-promote',function(){
    return redirect('/topics/37/xin-shou-gai-pao-shen-me-offer-shen-me-offer-hao-pao-affiliate-marketing-wan-quan-zhi-nan-11', 301);
});
Route::get('/verticals-affiliate-marketing-health',function(){
    return redirect('/topics/38/affiliate-marketing-zhong-de-jian-kang-chan-pin-affiliate-marketing-wan-quan-zhi-nan-12', 301);
});
Route::get('/self-actualization-products-in-affiliate-marketing',function(){
    return redirect('/topics/39/zi-wo-ti-sheng-lei-de-chan-pin-affiliate-marketing-wan-quan-zhi-nan-13', 301);
});
Route::get('/wealth-vertical-in-affiliate-marketing',function(){
    return redirect('/topics/40/jin-rong-li-cai-lei-chan-pin-affiliate-marketing-wan-quan-zhi-nan-14', 301);
});
Route::get('/dating-vertical-in-affiliate-marketing',function(){
    return redirect('/topics/41/yue-hui-she-jiao-lei-chan-pin-affiliate-marketing-wan-quan-zhi-nan-15', 301);
});
Route::get('/finch-sells-premium-posts-2016',function(){
    return redirect('/topics/42/2016-nian-gan-huo-he-ji-finch-sells-premium-posts', 301);
});
Route::get('/affiliate-marketing-adults-verticals',function(){
    return redirect('/topics/43/da-ren-lei-chan-pin-affiliate-marketing-wan-quan-zhi-nan-16', 301);
});
Route::get('/what-is-cloaking-what-is-cloak',function(){
    return redirect('/topics/44/shen-me-shi-cloaking-shen-me-shi-cloak-2016-premium-posts-finch-1', 301);
});
Route::get('/insurance-vertical-in-affiliate-marketing',function(){
    return redirect('/topics/45/bao-xian-lei-chan-pin-affiliate-marketing-wan-quan-zhi-nan-17', 301);
});
Route::get('/finance-vertical-in-affiliate-marketing',function(){
    return redirect('/topics/46/jin-rong-ling-yu-chan-pin-affiliate-marketing-wan-quan-zhi-nan-18', 301);
});
Route::get('/gambling-vertical-in-affiliate-marketing',function(){
    return redirect('/topics/47/bo-cai-lei-chan-pin-affiliate-marketing-wan-quan-zhi-nan-19', 301);
});
Route::get('/sweepstakes-in-affiliate-marketing',function(){
    return redirect('/topics/48/chou-jiang-lei-affiliate-marketing-wan-quan-zhi-nan-20', 301);
});
Route::get('/penny-auction-affiliate-marketing',function(){
    return redirect('/topics/49/yi-fen-qian-jing-pai-affiliate-marketing-wan-quan-zhi-nan-21', 301);
});
Route::get('/gamin-vertical-in-affiliate-marketing',function(){
    return redirect('/topics/50/you-xi-lei-affiliate-marketing-wan-quan-zhi-nan-22', 301);
});
Route::get('/affiliate-marketing-by-lead-generation',function(){
    return redirect('/topics/51/yin-dao-tui-jie-ying-li-affiliate-marketing-wan-quan-zhi-nan-23', 301);
});
Route::get('/sticking-to-a-single-vertical-as-affiliate',function(){
    return redirect('/topics/52/zhuan-zhu-yu-yi-ge-ling-yu-affiliate-marketing-wan-quan-zhi-nan-24', 301);
});
Route::get('/mobile-affiliate-marketing',function(){
    return redirect('/topics/53/ben-xiang-yi-dong-hu-lian-wang-zui-da-de-zhuan-qian-ji-hui-fu-xian-affiliate-marketing-wan-quan-zhi-nan-25', 301);
});
Route::get('/the-other-half-of-making-money',function(){
    return redirect('/topics/54/zhuan-qian-de-ling-yi-ban-mi-jue', 301);
});
Route::get('/affiliate-marketing-%E7%9A%84%E5%87%A0%E4%B8%AA%E5%85%B3%E9%94%AE%E9%97%AE%E9%A2%98%EF%BC%885%EF%BC%89%EF%BC%9A%E8%8E%B7%E5%BE%97%E5%85%8D%E8%B4%B9angles%E5%9B%BE%E5%83%8Flanding-page',function(){
    return redirect('/topics/55/affiliate-marketing-de-ji-ge-guan-jian-wen-ti-5-huo-de-mian-fei-angles-tu-xiang-landing-page', 301);
});
Route::get('/arbitrage-affiliate-marketing',function(){
    return redirect('/topics/56/affiliate-marketing-de-ji-ge-guan-jian-wen-ti-6-tao-li-arbitrage', 301);
});
Route::get('/reset-your-goal-in-affiliate-marketing',function(){
    return redirect('/topics/57/affiliate-marketing-de-ji-ge-guan-jian-wen-ti-7-kui-sun-he-bu-qie-shi-ji-de-qi-wang', 301);
});
Route::get('/meeage-match-of-google-adwords-ppc',function(){
    return redirect('/topics/58/google-adwords-ppc-guang-gao-de-message-match-xin-xi-pi-pei', 301);
});
Route::get('/win-in-popup',function(){
    return redirect('/topics/59/zheng-fu-pop-guang-gao-2016-premium-posts-finch', 301);
});
Route::get('/mobile-vs-web-in-affiliate-marketing',function(){
    return redirect('/topics/60/yi-dong-hu-lian-wang-he-chuan-tong-hu-lian-wang-de-cha-yi-affiliate-marketing-wan-quan-zhi-nan-26', 301);
});
Route::get('/app-installs-in-affiliate-markeying',function(){
    return redirect('/topics/61/app-installs-affiliate-marketing-wan-quan-zhi-nan-27', 301);
});
Route::get('/pin-submits-in-affiliate-marketing',function(){
    return redirect('/topics/62/pin-submits-affiliate-marketing-wan-quan-zhi-nan-28', 301);
});
Route::get('/pay-per-call-in-affiliate-marketing',function(){
    return redirect('/topics/63/pay-per-call-affiliate-marketing-wan-quan-zhi-nan-29', 301);
});
Route::get('/traditional-leadgen-in-affiliate-marketing',function(){
    return redirect('/topics/64/chuan-tong-leadgen-shi-shen-me-affiliate-marketing-wan-quan-zhi-nan-30', 301);
});
Route::get('/propellerads-mobile-pop-case-study',function(){
    return redirect('/topics/65/propellerads-yi-dong-pop-guang-gao-de-an-li', 301);
});
Route::get('/propellerads-register',function(){
    return redirect('/topics/66/propellerads-zhu-ce-liu-cheng-jiao-ni-propellerads-zen-me-zhu-ce', 301);
});
Route::get('/traditional-sales-in-affiliate-marketing',function(){
    return redirect('/topics/67/chuan-tong-xiao-shou-pay-per-sale-shi-shen-me-affiliate-marketing-wan-quan-zhi-nan-31', 301);
});
Route::get('/where-to-start-mobile-affiliate',function(){
    return redirect('/topics/68/gei-mobile-affiliate-xin-ren-de-an-li-affiliate-marketing-wan-quan-zhi-nan-32', 301);
});
Route::get('/learn-the-chains-of-communication-with-affiliate-manager-and-merchants',function(){
    return redirect('/topics/69/xue-hui-he-am-he-guang-gao-zhu-gou-tong-affiliate-marketing-wan-quan-zhi-nan-33', 301);
});
Route::get('/popads-setting-experience',function(){
    return redirect('/topics/70/popads-zen-me-pao-geng-zhuan-qian', 301);
});
Route::get('/type-of-traffic',function(){
    return redirect('/topics/71/liu-liang-de-zhong-yao-lei-xing-ru-he-fa-hui-ta-men-xiao-yong-affiliate-marketing-wan-quan-zhi-nan-34', 301);
});
