<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('frontend.homepage');
});
Route::get('/mail-send', function () {
    $details = [
        'title' => 'Mail form surfside media',
        'body'  => "Thanks for email",
    ];
});
Route::get('/mail-page', 'SendEmailController@MailPage')->name('MailPage');
Auth::routes();
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
//Homepage Controller
Route::get('/', 'HomepageController@Homepage')->name('Homepage');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/portfolio-details/{slug}', 'HomepageController@PortfolioDetails')->name('PortfolioDetails');
Route::get('/service-details/{slug}', 'HomepageController@ServiceDetails')->name('ServiceDetails');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    //Admin Section
    Route::get('/profile', 'AdminController@Profile')->name('Profile');
    Route::post('/add-profile', 'AdminController@AddProfile')->name('AddProfile');
    Route::post('/update-profile', 'AdminController@UpdateProfile')->name('UpdateProfile');
    //Home Section
    Route::get('/home-section', 'HomeController@HomeSection')->name('HomeSection');
    Route::post('/home-store', 'HomeController@HomeStore')->name('HomeStore');
    Route::get('/home-edit/{slug}', 'HomeController@HomeEdit')->name('HomeEdit');
    Route::post('/home-update', 'HomeController@HomeUpdate')->name('HomeUpdate');
    Route::get('/home-delete/{slug}', 'HomeController@HomeDelete')->name('HomeDelete');
    //About Section
    Route::get('/about-section', 'HomeController@AboutSection')->name('AboutSection');
    Route::post('/about-store', 'HomeController@AboutStore')->name('AboutStore');
    Route::get('/about-edit/{slug}', 'HomeController@AboutEdit')->name('AboutEdit');
    Route::post('/about-update', 'HomeController@AboutUpdate')->name('AboutUpdate');
    Route::get('/about-delete/{slug}', 'HomeController@AboutDelete')->name('AboutDelete');
    //Fact Section
    Route::get('/fact-section', 'HomeController@factSection')->name('factSection');
    Route::post('/fact-store', 'HomeController@FactStore')->name('FactStore');
    Route::post('/fact-update', 'HomeController@FactUpdate')->name('FactUpdate');
    //Skill Section
    Route::get('skill-rating', 'HomeController@SkillSection')->name('SkillSection');
    Route::post('skill-store', 'HomeController@SkillStore')->name('SkillStore');
    Route::post('skill-update', 'HomeController@SkillUpdate')->name('SkillUpdate');
    Route::get('skill-clear/{id}', 'HomeController@SkillDelete')->name('SkillDelete');
    //Resume Section
    Route::get('resumne-section', 'HomeController@ResumeSection')->name('ResumeSection');
    Route::post('resumne-store', 'HomeController@ResumeStore')->name('ResumeStore');
    Route::get('resumne-edit/{id}', 'HomeController@ResumeEdit')->name('ResumeEdit');
    Route::post('resumne-update', 'HomeController@ResumeUpdate')->name('ResumeUpdate');
    Route::get('resumne-delete/{id}', 'HomeController@ResumeDelete')->name('ResumeDelete');
    Route::post('resumne-updated', 'HomeController@ResumeEditUpdate')->name('ResumeEditUpdate');
    //Summary Section
    Route::get('add-summary/{id}', 'HomeController@AddSummary')->name('AddSummary');
    Route::post('store-summary', 'HomeController@SummaryStore')->name('SummaryStore');
    Route::get('delete-summary/{id}', 'HomeController@SummaryDelete')->name('SummaryDelete');
    Route::get('edit-summary/{id}', 'HomeController@SummaryEdit')->name('SummaryEdit');
    Route::post('update-summary', 'HomeController@SummaryUpdate')->name('SummaryUpdate');
    //Education Section
    Route::get('add-education/{id}', 'HomeController@AddEducation')->name('AddEducation');
    Route::post('add-education', 'HomeController@EducationStore')->name('EducationStore');
    Route::get('edit-education/{id}', 'HomeController@EducationEdit')->name('EducationEdit');
    Route::get('delete-education/{id}', 'HomeController@EducationDelete')->name('EducationDelete');
    Route::post('update-education', 'HomeController@EducationUpdate')->name('EducationUpdate');
    //profession Section
    Route::get('add-profession/{id}', 'HomeController@AddProfession')->name('AddProfession');
    Route::post('store-profession', 'HomeController@ProfessionStore')->name('ProfessionStore');
    Route::get('delete-profession/{id}', 'HomeController@ProfessionDelete')->name('ProfessionDelete');
    Route::get('edit-profession/{id}', 'HomeController@ProfessionEdit')->name('ProfessionEdit');
    Route::post('update-profession/', 'HomeController@ProfessionUpdate')->name('ProfessionUpdate');
    //Portfolio
    Route::get('portfolio', 'HomeController@Portfolio')->name('Portfolio');
    Route::post('store-portfolio', 'HomeController@PortfolioStore')->name('PortfolioStore');
    Route::get('delete-portfolio/{id}', 'HomeController@PortfolioDelete')->name('PortfolioDelete');
    Route::get('edit-portfolio/{id}', 'HomeController@PortfolioEdit')->name('PortfolioEdit');
    Route::post('update-portfolio', 'HomeController@PortfolioUpdate')->name('PortfolioUpdate');
    Route::post('portfolio-category-add', 'HomeController@PcatAdd')->name('PcatAdd');
    Route::get('portfolio-category-delete/{slug}', 'HomeController@PcatDelete')->name('PcatDelete');
    Route::get('portfolio-category-edit/{slug}', 'HomeController@PcatEdit')->name('PcatEdit');
    Route::post('portfolio-category-update', 'HomeController@PcatUpdate')->name('PcatUpdate');
    Route::get('portfolio-project-add', 'HomeController@AddPpost')->name('AddPpost');
    Route::post('portfolio-project-store', 'HomeController@PpostStore')->name('PpostStore');
    Route::get('portfolio-project-edit/{slug}', 'HomeController@PpostEdit')->name('PpostEdit');
    Route::post('portfolio-project-update', 'HomeController@PpostUpdate')->name('PpostUpdate');
    Route::get('portfolio-project-view/{slug}', 'HomeController@PpostView')->name('PpostView');
    Route::get('portfolio-project-delete/{id}', 'HomeController@PpostDelete')->name('PpostDelete');
    Route::get('multiple-image-delete/{id}', 'HomeController@MultipleImageDelete')->name('MultipleImageDelete');
    //Services
    Route::get('services', 'HomeController@Services')->name('Services');
    Route::post('services-store', 'HomeController@ServiceStore')->name('ServiceStore');
    Route::get('service-view/{slug}', 'HomeController@ServiceView')->name('ServiceView');
    Route::get('services-edit/{slug}', 'HomeController@ServiceEdit')->name('ServiceEdit');
    Route::post('services-update', 'HomeController@ServiceUpdate')->name('ServiceUpdate');
    Route::get('services-delete/{slug}', 'HomeController@ServiceDelete')->name('ServiceDelete');
    Route::get('services-add/{id}', 'HomeController@ServiceAdd')->name('ServiceAdd');
    Route::post('services-add', 'HomeController@ServiceAddStore')->name('ServiceAddStore');
    Route::get('service-edit/{slug}', 'HomeController@EditService')->name('EditService');
    Route::post('service-update', 'HomeController@EditServiceUpdate')->name('EditServiceUpdate');
    Route::get('delete-service/{slug}', 'HomeController@DeleteService')->name('DeleteService');
    //Testimonials
    Route::get('testimonials', 'HomeController@Testimonials')->name('Testimonials');
    Route::get('testimonial-add', 'HomeController@TestimonialAdd')->name('TestimonialAdd');
    Route::post('testimonial-store', 'HomeController@TestimonialStore')->name('TestimonialStore');
    Route::get('testimonial-delete/{slug}', 'HomeController@TestimonialDelete')->name('TestimonialDelete');
    Route::get('testimonial-view/{slug}', 'HomeController@TestimonialView')->name('TestimonialView');
    Route::post('testimonial-update', 'HomeController@TestimonialUpdate')->name('TestimonialUpdate');
    //Contact
    Route::post('send', 'HomeController@send')->name('send');
    //Footer
    Route::get('footer', 'HomeController@Footer')->name('Footer');
    Route::post('footer-add', 'HomeController@AddFooter')->name('AddFooter');
    Route::post('social-add', 'HomeController@AddSocial')->name('AddSocial');
    Route::get('footer-delete/{id}', 'HomeController@DeleteFooter')->name('DeleteFooter');
    Route::get('social-delete/{id}', 'HomeController@SocialDelete')->name('SocialDelete');
    Route::get('footer-edit/{id}', 'HomeController@FooterEdit')->name('FooterEdit');
    Route::post('footer-update', 'HomeController@FooterUpdate')->name('FooterUpdate');
    Route::get('social-edit/{id}', 'HomeController@SocialEdit')->name('SocialEdit');
    Route::post('social-update', 'HomeController@SocialUpdate')->name('SocialUpdate');
    //Blog
    Route::resource('Blog', 'BlogController');
    Route::get('/blogs', 'BlogController@Blogs')->name('Blogs');
    Route::get('/blog/{subcat_id}', 'BlogController@CatBlog')->name('CatBlog');
    Route::get('/blog-view/{slug}', 'BlogController@Post')->name('Post');
    Route::get('/blog/edit/{slug}', 'BlogController@BlogEdit')->name('BlogEdit');
    Route::post('/blog/update', 'BlogController@BlogUpdate')->name('BlogUpdate');
    Route::get('/blog/delete/{id}', 'BlogController@BlogDelete')->name('BlogDelete');
    //Blog Category
    Route::get('/blog-categories', 'BlogController@BlogCategory')->name('BlogCategory');
    Route::post('/add-blog-categories', 'BlogController@AddBlogCategory')->name('AddBlogCategory');
    Route::get('/edit-blog-category/{slug}', 'BlogController@EditBlogCategory')->name('EditBlogCategory');
    Route::post('/update-blog-category', 'BlogController@UpdateBlogCategory')->name('UpdateBlogCategory');
    Route::get('/delete-blog-category/{id}', 'BlogController@DeleteBlogCategory')->name('DeleteBlogCategory');
    Route::get('/get/category_id/{category_id}', 'BlogController@GetCategoryID')->name('GetCategoryID');
    //Blog Sub category
    Route::get('/blog-sub-categories', 'BlogController@BlogSubCategory')->name('BlogSubCategory');
    Route::post('/add-sub-categories', 'BlogController@AddSubCategory')->name('AddSubCategory');
    Route::get('/edit-sub-categories/{slug}', 'BlogController@EditSubCategory')->name('EditSubCategory');
    Route::post('/update-sub-categories', 'BlogController@UpdateSubCategory')->name('UpdateSubCategory');
    Route::get('/delete-sub-categories/{id}', 'BlogController@DeleteSubCategory')->name('DeleteSubCategory');


    Route::get('/image', 'BlogController@image')->name('image');
    Route::post('/imageUpload', 'BlogController@imageUpload')->name('imageUpload');


    //User Controller
    Route::get('/users', 'UserController@Users')->name('Users');
    Route::post('/user-add', 'UserController@UserAdd')->name('UserAdd');
    Route::get('/edit-user/{id}', 'UserController@UserEdit')->name('UserEdit');
    Route::post('/user-update', 'UserController@UserUpdate')->name('UserUpdate');
    Route::get('/delete-user/{delete_id}', 'UserController@UserDelete')->name('UserDelete');

    //Role Controller
    Route::get('/role-manager', 'RoleController@Role')->name('Role');
    Route::post('/roles-add', 'RoleController@RolesAdd')->name('RolesAdd');
    Route::get('/role-edit/{id}', 'RoleController@RoleEdit')->name('RoleEdit');
    Route::post('/role-update', 'RoleController@RoleUpdate')->name('RoleUpdate');
    Route::get('/role-delete/{id}', 'RoleController@RoleDelete')->name('RoleDelete');
    Route::get('/role-permissions', 'RoleController@Permissions')->name('Permissions');
    Route::get('/permission-add', 'RoleController@PermissionAdd')->name('PermissionAdd');
    Route::get('/permission-edit/{id}', 'RoleController@PermissionEdit')->name('PermissionEdit');
    Route::post('/permission-update', 'RoleController@PermissionUpdate')->name('PermissionUpdate');
    Route::get('/permission-delete/{id}', 'RoleController@PermissionDelete')->name('PermissionDelete');
    Route::post('/permission-add-post', 'RoleController@PermissionAddPost')->name('PermissionAddPost');
    Route::post('/role-add-to-permissions', 'RoleController@RoleAddToPermission')->name('RoleAddToPermission');
    Route::get('/user-role', 'RoleController@UserRole')->name('UserRole');
    Route::post('/add-role-to-user', 'RoleController@AddRoleToUser')->name('AddRoleToUser');
    Route::get('/user-role-permissions/{user_id}', 'RoleController@UserPermissions')->name('UserPermissions');
    Route::post('/update-user-permissions', 'RoleController@UpdateUserPermissions')->name('UpdateUserPermissions');
});

//Social Login Github Controller
Route::get('/github-login', 'SocialController@GitHubLogin')->name('GitHubLogin');
Route::get('/github-login-call-back', 'SocialController@GitHubLoginCallBack')->name('GitHubLoginCallBack');
//Social Login google Controller
Route::get('/google-login', 'SocialController@GoogleLogin')->name('GoogleLogin');
Route::get('/google-login-call-back', 'SocialController@GoogleLoginCallBack')->name('GoogleLoginCallBack');
//Social Login facebook Controller
Route::get('/facebook-login', 'SocialController@FacebookLogin')->name('FacebookLogin');
Route::get('/facebook-login-call-back', 'SocialController@FacebookLoginCallBack')->name('FacebookLoginCallBack');

//Laravel File Manager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
