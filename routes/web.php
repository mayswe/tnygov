<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

/*
|--------------------------------------------------------------------------
| BACK END Routes
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::get('/admin', 'Auth\LoginController@showLoginForm');

//Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});
Route::group(['middleware'=>'auth'], function () {

    /* Admin Panel Pages */

    Route::get('/admin/dashboard', 'BackendController@DashboardPage')->name('dashboardpage');

    Route::get('/admin/settings', 'SettingsController@index')->name('settingspage');
    Route::get('/admin/lookups', 'SettingsController@lookups')->name('lookuppage');
    Route::post('/admin/lookups/{type}/{id}', 'SettingsController@updateLookup')->name('lookup.update');
    Route::delete('/admin/lookups/{type}/{id}', 'SettingsController@deleteLookup')->name('lookup.delete');

    Route::get('/admin/about', 'AboutController@index')->name('aboutpage');

    Route::get('/admin/slider', 'SliderController@index')->name('sliderpage');

    Route::get('/admin/features', 'FeaturesController@index')->name('featurespage');

    Route::get('/admin/services', 'ServicesController@index')->name('servicespage');

    Route::get('/admin/counter', 'CountersController@index')->name('counterspage');

    Route::get('/admin/faqs', 'FaqsController@index')->name('faqspage');

    Route::get('/admin/partners', 'PartnersController@index')->name('partnerspage');

    Route::get('/admin/pricing', 'PricingController@index')->name('pricingpage');

    Route::get('/admin/testimonials', 'TestimonialsController@index')->name('testimonialspage');

    Route::get('/admin/team', 'TeamsController@index')->name('teampage');

    Route::get('/admin/projects', 'ProjectsController@index')->name('projectspage');

    Route::get('/admin/posts', 'PostsController@index')->name('postspage');

    Route::get('/admin/subscribers', 'SubscribersController@index')->name('subscriberspage');

    Route::get('/admin/messages', 'ContactsController@index')->name('messagespage');

    Route::get('/admin/pages', 'PagesController@index')->name('pagespage');

    Route::get('/admin/announcements', 'AnnouncementsController@index')->name('announcementspage');

    Route::get('/admin/ruling', 'RulingController@index')->name('rulingpage');

    Route::get('/admin/annualreports', 'AnnualReportsController@index')->name('annualreportspage');

    Route::get('/admin/strategicplanning', 'StrategicPlanningController@index')->name('strategicplanningpage');

    Route::get('/admin/judicialjournal', 'JudicialJournalController@index')->name('judicialjournalpage');

    Route::get('/admin/otherspdf', 'OthersPDFController@index')->name('otherspdfpage');

    Route::get('/admin/dailyactivities', 'DailyActivitiesController@index')->name('dailyactivitiespage');

    Route::get('/admin/judges', 'JudgesController@index')->name('judgespage');

    Route::get('/admin/courtrooms', 'CourtRoomsController@index')->name('courtroomspage');

    Route::get('/admin/causelist', 'CauseListsController@index')->name('causelistspage');

    Route::get('/admin/judgementlist', 'JudgementController@index')->name('judgementlistspage');

    Route::get('/admin/postponelist', 'PostponeController@index')->name('postponelistspage');

    Route::get('/admin/media', 'MediasController@index')->name('mediaspage');

    Route::get('/admin/news', 'NewsController@index')->name('newspage');
    Route::post('/admin/news/lookup/{type}', 'NewsController@storeLookup')->name('news.lookup.store');
    
    Route::get('/admin/department', 'DepartmentController@index')->name('departmentpage');
    
    Route::get('/admin/covid', 'CovidController@index')->name('covidpage');

    Route::get('/admin/locations', 'LocationsController@index')->name('locationspage');
    
    
    Route::get('/admin/photo', 'PhotoController@index')->name('photopage');

    Route::get('/admin/tenders', 'TendersController@index')->name('tenderspage');

    Route::get('/admin/articles', 'ArticlesController@index')->name('articlespage');

    Route::get('/admin/footersliderblocks', 'FooterSliderBlocksController@index')->name('footersliderblockspage');
    
    Route::get('/admin/covidtopbox', 'CovidTopBoxController@index')->name('covidtopboxpage');

    /*
    |--------------------------------------------------------------------------
    | Settings
    |--------------------------------------------------------------------------
    */

    /* Settings - Update Company */

    Route::post('/admin/settings/company', 'SettingsController@updateCompany')->name('update.company');

    /* Settings - Update Social Media */

    Route::post('/admin/settings/socials', 'SettingsController@updateSocials')->name('update.socials');

    /* Settings - Update Meta Tags */

    Route::post('/admin/settings/metas', 'SettingsController@updateMetas')->name('update.metas');

    /* Settings - Update Theme Color */

    Route::post('/admin/settings/color', 'SettingsController@updateColor')->name('update.color');

    /* Settings - Customize Home Page */

    Route::post('/admin/settings/homepage', 'SettingsController@updateHomePage')->name('update.homepage');

    /* Settings - Update Headings */

    Route::post('/admin/settings/headings', 'SettingsController@updateHeadings')->name('update.headings');

    /* Settings - Customize Navbar Menu */

    Route::post('/admin/settings/navbar/title/update/{id}', 'SettingsController@storeNavbar')->name('store.navbar');

    Route::post('/admin/settings/navbar/appearance/update/{id}', 'SettingsController@storeNavbarShow')->name('store.navbar.show');

    /* Settings - Update Admin Password */

    Route::post('/admin/settings/admin/password', 'SettingsController@updateAdminPassword')->name('update.admin.password');

    /* Settings - Add a New Admin */

    Route::post('/admin/settings/admin/add', 'SettingsController@addAdmin')->name('add.admin');

    /* Settings - Delete Admin */

    Route::get('/admin/settings/admin/{id}/delete', 'SettingsController@deleteAdmin')->name('delete.admin');

    /*
    |--------------------------------------------------------------------------
    | About us
    |--------------------------------------------------------------------------
    */

    /* About us - Update History */

    Route::post('/admin/about/history', 'AboutController@updateHistory')->name('update.history');

    /* About us - Update Mission */

    Route::post('/admin/about/mission', 'AboutController@updateMission')->name('update.mission');

    /* About us - Update Vision */

    Route::post('/admin/about/vision', 'AboutController@updateVision')->name('update.vision');

    /* About us - Get Edit Form Skill */

    Route::get('/admin/about/skills/{id}/edit', 'AboutController@editSkill')->name('edit.skill');

    /* About us - Update Skill */

    Route::post('/admin/about/skills/{id}/update', 'AboutController@updateSkill')->name('update.skill');

    /* About us - Add Skill */

    Route::get('/admin/about/skills/addskill', 'AboutController@addSkill')->name('add.skill');

    Route::post('/admin/about/skills/addskill/store', 'AboutController@storeSkill')->name('store.skill');

    /* About us - delete Skill */

    Route::get('/admin/about/skills/{id}/delete', 'AboutController@deleteSkill')->name('delete.skill');


    /* About us - Update Logo */

    Route::post('/admin/about/logo', 'AboutController@updateLogo')->name('update.logo');

    /*
    |--------------------------------------------------------------------------
    | Slider
    |--------------------------------------------------------------------------
    */

    /* Sliders - Create Slider Form */

    Route::get('/admin/slider/add', 'SliderController@createSlider')->name('create.slider');

    /* Sliders - Store Slider*/

    Route::post('/admin/slider/store', 'SliderController@storeSlider')->name('store.slider');

    /* Sliders - Get Edit Form Slider */

    Route::get('/admin/slider/edit/{id}', 'SliderController@editSlider')->name('edit.slider');

    /* Sliders - Update Slider */

    Route::post('/admin/slider/update/{id}', 'SliderController@updateSlider')->name('update.slider');

    /* Sliders - Delete Slider */

    Route::get('/admin/slider/delete/{id}', 'SliderController@deleteSlider')->name('delete.slider');

    /*
    |--------------------------------------------------------------------------
    | Features
    |--------------------------------------------------------------------------
    */

    /* Features - Get Edit Feature Form */

    Route::get('/admin/features/edit/{id}', 'FeaturesController@editFeature')->name('edit.feature');

    /* Features - Update Feature */

    Route::post('/admin/features/update/{id}', 'FeaturesController@updateFeature')->name('update.feature');

    /* Features - Update Feature Icon */

    Route::get('/admin/features/delete/{id}', 'FeaturesController@deleteFeature')->name('delete.feature');

    /* Features - Get Form To Add Feature */

    Route::get('/admin/features/add', 'FeaturesController@addFeature')->name('add.feature');

    /* Features - Store Feature */

    Route::post('/admin/features/store', 'FeaturesController@storeFeature')->name('store.feature');

    /*
    |--------------------------------------------------------------------------
    | Services
    |--------------------------------------------------------------------------
    */

    /* Services - Get Form To Edit Service */

    Route::get('/admin/services/edit/{id}', 'ServicesController@editServiceForm')->name('edit.service');

    /* Services - Update Service */

    Route::post('/admin/services/update/{id}', 'ServicesController@updateService')->name('update.service');

    /* Services - Delete Service */

    Route::get('/admin/services/delete/{id}', 'ServicesController@deleteService')->name('delete.service');

    /* Sliders - Add a New Service*/

    Route::post('/admin/service/add', 'ServicesController@addService')->name('add.service');

    /*
    |--------------------------------------------------------------------------
    | Counter
    |--------------------------------------------------------------------------
    */

    /* Counter - Get Edit Counter Form */

    Route::get('/admin/counter/edit/{id}', 'CountersController@editCounter')->name('edit.counter');

    /* Counter - Update Counter */

    Route::post('/admin/counter/update/{id}', 'CountersController@updateCounter')->name('update.counter');

    /* Counter - Update Counter */

    Route::get('/admin/counter/delete/{id}', 'CountersController@deleteCounter')->name('delete.counter');

    /* Counter - Get Form To Add Counter */

    Route::get('/admin/counter/add', 'CountersController@addCounter')->name('add.counter');

    /* Counter - Store Counter */

    Route::post('/admin/counter/store', 'CountersController@storeCounter')->name('store.counter');

    /*
    |--------------------------------------------------------------------------
    | FAQ's
    |--------------------------------------------------------------------------
    */

    /* FAQ's - Get Form To Edit Question */

    Route::get('/admin/faqs/edit/{id}', 'FaqsController@editFaqsForm')->name('edit.faq');

    /* FAQ's - Update Faq */

    Route::post('/admin/faqs/update/{id}', 'FaqsController@updateFaqs')->name('update.faq');

    /* FAQ's - Delete Faq */

    Route::get('/admin/faqs/delete/{id}', 'FaqsController@deleteFaqs')->name('delete.faq');

    /* FAQ's - Add a New Faq*/

    Route::post('/admin/faqs/add', 'FaqsController@addFaqs')->name('add.faq');

    /*
    |--------------------------------------------------------------------------
    | Partners
    |--------------------------------------------------------------------------
    */

    /* Partners - Get Form To Edit Partner */

    Route::get('/admin/partner/edit/{id}', 'PartnersController@editPartnerForm')->name('edit.partner');

    /* Partners - Update Partner */

    Route::post('/admin/partner/update/{id}', 'PartnersController@updatePartner')->name('update.partner');

    /* Partners - Delete Partner */

    Route::get('/admin/partner/delete/{id}', 'PartnersController@deletePartner')->name('delete.partner');

    /* Partners - Add a New Partner*/

    Route::post('/admin/partner/add', 'PartnersController@addPartner')->name('add.partner');

    /*
    |--------------------------------------------------------------------------
    | Packages
    |--------------------------------------------------------------------------
    */

    /* Packages - Get Form To Edit Package */

    Route::get('/admin/package/edit/{id}', 'PricingController@editPackageForm')->name('edit.package');

    /* Packages - Get Form To Edit Package */

    Route::get('/admin/package/features/edit/{id}', 'PricingController@editPackageFeature')->name('edit.packagefeatures');

    /* Packages - Update Package */

    Route::post('/admin/package/update/{id}', 'PricingController@updatePackage')->name('update.package');

    /* Packages - Update Package Feature */

    Route::post('/admin/package/features/update/{id}', 'PricingController@updatePackageFeature')->name('update.packagefeature');

    /* Packages - Delete Package Feature */

    Route::get('/admin/package/features/delete/{id}', 'PricingController@deletePackageFeature')->name('delete.packagefeature');

    /* Packages - Add a New Package Feature*/

    Route::post('/admin/package/{package_id}/feature/add', 'PricingController@addPackageFeature')->name('add.packagefeature');

    /* Packages - Delete Package */

    Route::get('/admin/package/delete/{id}', 'PricingController@deletePackage')->name('delete.package');

    /* Packages - Add a New Package*/

    Route::post('/admin/package/add', 'PricingController@addPackage')->name('add.package');

    /*
    |--------------------------------------------------------------------------
    | Testimonials
    |--------------------------------------------------------------------------
    */

    /* Testimonials - Get Form To Edit Package */

    Route::get('/admin/testimonials/edit/{id}', 'TestimonialsController@editTestimonialForm')->name('edit.testimonial');

    /* Testimonials - Update Testimonial */

    Route::post('/admin/testimonial/update/{id}', 'TestimonialsController@updateTestimonial')->name('update.testimonial');

    /* Testimonials - Delete Testimonial */

    Route::get('/admin/testimonial/delete/{id}', 'TestimonialsController@deleteTestimonial')->name('delete.testimonial');

    /* Testimonials - Add a New Testimonial*/

    Route::post('/admin/testimonial/add', 'TestimonialsController@addTestimonial')->name('add.testimonial');

    /*
    |--------------------------------------------------------------------------
    | Team Members
    |--------------------------------------------------------------------------
    */

    /* Team Members - Get Form To Edit Member */

    Route::get('/admin/team/edit/{id}', 'TeamsController@editTeamForm')->name('edit.team');

    /* Team Members - Update Team Member */

    Route::post('/admin/team/update/{id}', 'TeamsController@updateTeam')->name('update.team');

    /* Team Members - Delete Team Member */

    Route::get('/admin/team/delete/{id}', 'TeamsController@deleteTeam')->name('delete.team');

    /* Testimonials - Add a New Team Member */

    Route::post('/admin/team/add', 'TeamsController@addTeam')->name('add.team');


     /*
    |--------------------------------------------------------------------------
    | Projects & Project Categories
    |--------------------------------------------------------------------------
    */

    /* Projects - Get Form To Edit PRoject */

    Route::get('/admin/projects/edit/{id}', 'ProjectsController@editProject')->name('edit.project');


    /* Projects - Update Project */

    Route::post('/admin/projects/update/{id}', 'ProjectsController@updateProject')->name('update.project');

    /* Projects - Delete Project */

    Route::get('/admin/projects/delete/{id}', 'ProjectsController@deleteProject')->name('delete.project');

    /* Projects - Get Form To Edit Project Cat */

    Route::get('/admin/projects/category/edit/{id}', 'ProjectsController@editCategory')->name('edit.project-category');

    /* Projects - Update Project Category */

    Route::post('/admin/projects/category/update/{id}', 'ProjectsController@updateCategory')->name('update.project-category');

    /* Projects - Delete Project Category */

    Route::get('/admin/projects/category/delete/{id}', 'ProjectsController@deleteCategory')->name('delete.project-category');

    /* Projects - Add a New Category */

    Route::post('/admin/projects/category/add', 'ProjectsController@addCategory')->name('add.project-category');

    /* Projects - Add a New Project */

    Route::post('/admin/projects/add', 'ProjectsController@addProject')->name('add.project');

     /*
    |--------------------------------------------------------------------------
    | Posts
    |--------------------------------------------------------------------------
    */

    /* Posts - Add New Post */

    Route::post('/admin/posts/add', 'PostsController@addPost')->name('add.post');

    /* Posts - Get Form To Edit Post */

    Route::get('/admin/posts/edit/{id}', 'PostsController@editPost')->name('edit.post');

    /* Posts - Update Post */

    Route::post('/admin/posts/update/{id}', 'PostsController@updatePost')->name('update.post');

    /* Posts - DElete Post */

    Route::get('/admin/posts/delete/{id}', 'PostsController@deletePost')->name('delete.post');

     /*
    |--------------------------------------------------------------------------
    | Subscribers
    |--------------------------------------------------------------------------
    */

    /* Subscribers - Delete Subscriber  */

    Route::get('/subscriber/delete/{id}', 'SubscribersController@deleteSubscriber')->name('delete.subscriber');

     /*
    |--------------------------------------------------------------------------
    | Messages
    |--------------------------------------------------------------------------
    */

    /* Messages - Read Full Message  */

    Route::get('/messages/read/{id}', 'ContactsController@readMessage')->name('read.message');

    /* Messages - Delete Message  */

    Route::get('/messages/delete/{id}', 'ContactsController@deleteMessage')->name('delete.message');

     /*
    |--------------------------------------------------------------------------
    | Pages
    |--------------------------------------------------------------------------
    */

    /* Pages - Get Form To Add New Page */

    Route::get('/admin/pages/add', 'PagesController@addNewPage')->name('add.newpage');

    /* Pages - Add New Page */

    Route::post('/admin/pages/add/store', 'PagesController@addPage')->name('add.page');

    /* Pages - Get Form To Edit Page */

    Route::get('/admin/pages/edit/{id}', 'PagesController@editPage')->name('edit.page');

    /* Pages - Update Page */

    Route::post('/admin/pages/update/{id}', 'PagesController@updatePage')->name('update.page');

    /* Pages - DElete Page */

    Route::get('/admin/pages/delete/{id}', 'PagesController@deletePage')->name('delete.page');

       /*
 /*
    |--------------------------------------------------------------------------
    | Locations
    |--------------------------------------------------------------------------
    */

    /* Pages - Get Form To Add New Page */

    Route::get('/admin/locations/add', 'LocationsController@addNewLocation')->name('add.newlocation');

    /* Pages - Add New Page */

    Route::post('/admin/locations/add/store', 'LocationsController@addLocation')->name('add.location');

    /* Pages - Get Form To Edit Page */

    Route::get('/admin/locations/edit/{id}', 'LocationsController@editLocation')->name('edit.location');

    /* Pages - Update Page */

    Route::post('/admin/locations/update/{id}', 'LocationsController@updateLocation')->name('update.location');

    /* Pages - DElete Page */

    Route::get('/admin/locations/delete/{id}', 'LocationsController@deleteLocation')->name('delete.location');

       /*
    |--------------------------------------------------------------------------
    | Announcements & Announcement Categories
    |--------------------------------------------------------------------------
    */

    /* Announcements - Get Form To Edit Announcement */

    Route::get('/admin/announcements/edit/{id}', 'AnnouncementsController@editAnnouncement')->name('edit.announcement');


    /* Announcements - Update Announcement */

    Route::post('/admin/announcements/update/{id}', 'AnnouncementsController@updateAnnouncement')->name('update.announcement');

    /* Announcements - Delete Announcement */

    Route::get('/admin/announcements/delete/{id}', 'AnnouncementsController@deleteAnnouncement')->name('delete.announcement');

    /* Announcements - Get Form To Edit Announcement Cat */

    Route::get('/admin/announcements/category/edit/{id}', 'AnnouncementsController@editCategory')->name('edit.announcement-category');

    /* Announcements - Update Announcement Category */

    Route::post('/admin/announcements/category/update/{id}', 'AnnouncementsController@updateCategory')->name('update.announcement-category');

    /* Announcements - Delete Announcement Category */

    Route::get('/admin/announcements/category/delete/{id}', 'AnnouncementsController@deleteCategory')->name('delete.announcement-category');

    /* Announcements - Add a New Category */

    Route::post('/admin/announcements/category/add', 'AnnouncementsController@addCategory')->name('add.announcement-category');

    /* Announcements - Add a New Announcement */

    Route::post('/admin/announcements/add', 'AnnouncementsController@addAnnouncement')->name('add.announcement');

       /*
    |--------------------------------------------------------------------------
    | AnnualReport
    |--------------------------------------------------------------------------
    */

    /* AnnualReports - Get Form To Edit AnnualReports */

    Route::get('/admin/annualreports/edit/{id}', 'AnnualReportsController@editAnnualReport')->name('edit.annualreport');


    /* AnnualReports - Update AnnualReports */

    Route::post('/admin/annualreports/update/{id}', 'AnnualReportsController@updateAnnualReport')->name('update.annualreport');

    /* AnnualReports - Delete AnnualReports */

    Route::get('/admin/annualreports/delete/{id}', 'AnnualReportsController@deleteAnnualReport')->name('delete.annualreport');

    /* AnnualReports - Add a New AnnualReports */

    Route::post('/admin/annualreports/add', 'AnnualReportsController@addAnnualReport')->name('add.annualreport');

     /*
    |--------------------------------------------------------------------------
    | Daily Acitivity & Daily Activity Categories
    |--------------------------------------------------------------------------
    */

    /* Daily Activity - Get Form To Edit Daily Activity */

    Route::get('/admin/dailyactivities/edit/{id}', 'DailyActivitiesController@editActivity')->name('edit.activity');


    /* Daily Activity - Update Daily Activity */

    Route::post('/admin/dailyactivities/update/{id}', 'DailyActivitiesController@updateActivity')->name('update.activity');

    /* Daily Activity - Delete Daily Activity */

    Route::get('/admin/dailyactivites/delete/{id}', 'DailyActivitiesController@deleteActivity')->name('delete.activity');

    /* Daily Activity - Get Form To Edit Daily Activity Cat */

    Route::get('/admin/dailyactivities/category/edit/{id}', 'DailyActivitiesController@editCategory')->name('edit.activity-category');

    /* Daily Activity - Update Daily Activity Category */

    Route::post('/admin/dailyactivities/category/update/{id}', 'DailyActivitiesController@updateCategory')->name('update.activity-category');

    /* Daily Activity - Delete Daily Activity Category */

    Route::get('/admin/dailyactivities/category/delete/{id}', 'DailyActivitiesController@deleteCategory')->name('delete.activity-category');

    /* Daily Activity - Add a New Category */

    Route::post('/admin/dailyactivities/category/add', 'DailyActivitiesController@addCategory')->name('add.activity-category');

    /* Daily Activity - Add a New Daily Activity */

    Route::post('/admin/dailyactivities/add', 'DailyActivitiesController@addActivity')->name('add.activity');

           /*
    |--------------------------------------------------------------------------
    | Judge
    |--------------------------------------------------------------------------
    */

    /* Judges - Get Form To Edit Judges */

    Route::get('/admin/judges/edit/{id}', 'JudgesController@editJudge')->name('edit.judge');


    /* Judges - Update Judges */

    Route::post('/admin/judges/update/{id}', 'JudgesController@updateJudge')->name('update.judge');

    /* Judges - Delete Judges */

    Route::get('/admin/judges/delete/{id}', 'JudgesController@deleteJudge')->name('delete.judge');

    /* Judges - Add a New Judges */

    Route::post('/admin/judges/add', 'JudgesController@addJudge')->name('add.judge');

            /*
    |--------------------------------------------------------------------------
    | News
    |--------------------------------------------------------------------------
    */

    /* News - Get Form To Edit News */

    Route::get('/admin/news/edit/{id}', 'NewsController@editNews')->name('edit.news');


    /* news - Update news */

    Route::post('/admin/news/update/{id}', 'NewsController@updateNews')->name('update.news');

    /* news - Delete news */
    
    
    
    Route::get('/admin/news/deleteimage/{id}', 'NewsController@deleteNewsImage')->name('deletenewsimage');
    
    Route::get('/admin/news/delete/{id}', 'NewsController@deleteNews')->name('delete.news');

    /* news - Add a New news */

    Route::post('/admin/news/add', 'NewsController@addNews')->name('add.news');

              /*
    |--------------------------------------------------------------------------
    | Department
    |--------------------------------------------------------------------------
    */

    /* News - Get Form To Edit News */

    Route::get('/admin/department/edit/{id}', 'DepartmentController@editDepartment')->name('edit.department');


    /* news - Update news */

    Route::post('/admin/department/update/{id}', 'DepartmentController@updateDepartment')->name('update.department');

    /* news - Delete news */
    
    
    
    Route::get('/admin/department/deleteimage/{id}', 'DepartmentController@deleteDDImage')->name('deleteddimage');
    
    Route::get('/admin/department/delete/{id}', 'DepartmentController@deleteDepartment')->name('delete.department');

    /* news - Add a New news */

    Route::post('/admin/department/add', 'DepartmentController@addDepartment')->name('add.department');

              /*
    |--------------------------------------------------------------------------
    | News
    |--------------------------------------------------------------------------
    */
    /* News - Get Form To Edit News */

    Route::get('/admin/covid/edit/{id}', 'CovidController@editCovid')->name('edit.covid');


    /* news - Update news */

    Route::post('/admin/covid/update/{id}', 'CovidController@updateCovid')->name('update.covid');

    /* news - Delete news */
    
    
    
    Route::get('/admin/covid/deleteimage/{id}', 'CovidController@deleteCovidImage')->name('deletecovidimage');
    
    Route::get('/admin/covid/delete/{id}', 'CovidController@deleteCovid')->name('delete.covid');

    /* news - Add a New news */

    Route::post('/admin/covid/add', 'CovidController@addCovid')->name('add.covid');

              /*
              
    |--------------------------------------------------------------------------
    | Photo
    |--------------------------------------------------------------------------
    */

    /* Photo - Get Form To Edit News */

    Route::get('/admin/photo/edit/{id}', 'PhotoController@editPhoto')->name('edit.photo');


    /* Photo - Update news */

    Route::post('/admin/photo/update/{id}', 'PhotoController@updatePhoto')->name('update.photo');

    /* Photo - Delete news */

    Route::get('/admin/photo/delete/{id}', 'PhotoController@deletePhoto')->name('delete.photo');

    /* Photo - Add a New news */

    Route::post('/admin/photo/add', 'PhotoController@addPhoto')->name('add.photo');

              /*
    |--------------------------------------------------------------------------
    | Tenders
    |--------------------------------------------------------------------------
    */

    /* tenders - Get Form To Edit tenders */

    Route::get('/admin/tenders/edit/{id}', 'TendersController@editTender')->name('edit.tender');


    /* tenders - Update tenders */

    Route::post('/admin/tenders/update/{id}', 'TendersController@updateTender')->name('update.tender');

    /* tenders - Delete tenders */

    Route::get('/admin/tenders/delete/{id}', 'TendersController@deleteTender')->name('delete.tender');

    /* tenders - Add a New tenders */

    Route::post('/admin/tenders/add', 'TendersController@addTender')->name('add.tender');

   /*
    |--------------------------------------------------------------------------
    | Court Room & Court Room Categories
    |--------------------------------------------------------------------------
    */

    /* Court Room - Get Form To Edit Court Room */

    Route::get('/admin/courtrooms/edit/{id}', 'CourtRoomsController@editCourtRoom')->name('edit.courtroom');


    /* Court Room - Update Court Room */

    Route::post('/admin/courtrooms/update/{id}', 'CourtRoomsController@updateCourtRoom')->name('update.courtroom');

    /* Court Room - Delete Court Room */

    Route::get('/admin/courtrooms/delete/{id}', 'CourtRoomsController@deleteCourtRoom')->name('delete.courtroom');

    /* Court Room - Get Form To Edit Court Room Cat */

    Route::get('/admin/courtrooms/category/edit/{id}', 'CourtRoomsController@editCategory')->name('edit.courtroom-category');

    /* Court Room - Update Court Room Category */

    Route::post('/admin/courtrooms/category/update/{id}', 'CourtRoomsController@updateCategory')->name('update.courtroom-category');

    /* Court Room - Delete Court Room Category */

    Route::get('/admin/courtrooms/category/delete/{id}', 'CourtRoomsController@deleteCategory')->name('delete.courtroom-category');

    /* Court Room - Add a New Category */

    Route::post('/admin/courtrooms/category/add', 'CourtRoomsController@addCategory')->name('add.courtroom-category');

    /* Court Room - Add a New Court Room */

    Route::post('/admin/courtrooms/add', 'CourtRoomsController@addCourtRoom')->name('add.courtroom');
/*
    |--------------------------------------------------------------------------
    | Cause List & Cause List Categories
    |--------------------------------------------------------------------------
    */

    /* Cause List - Get Form To Edit Cause List */

    Route::get('/admin/causelists/edit/{id}', 'CauseListsController@editCauseList')->name('edit.causelist');


    /* Cause List - Update Cause List */

    Route::post('/admin/causelists/update/{id}', 'CauseListsController@updateCauseList')->name('update.causelist');

    /* Cause List - Delete Cause List */

    Route::get('/admin/causelists/delete/{id}', 'CauseListsController@deleteCauseList')->name('delete.causelist');

    /* Cause List - Get Form To Edit Cause List Cat */

    Route::get('/admin/causelists/category/edit/{id}', 'CauseListsController@editCategory')->name('edit.causelist-category');

    /* Cause List - Update Cause List Category */

    Route::post('/admin/causelists/category/update/{id}', 'CauseListsController@updateCategory')->name('update.causelist-category');

    /* Cause List - Delete Cause List Category */

    Route::get('/admin/causelists/category/delete/{id}', 'CauseListsController@deleteCategory')->name('delete.causelist-category');

    /* Cause List - Add a New Category */

    Route::post('/admin/causelists/category/add', 'CauseListsController@addCategory')->name('add.causelist-category');

    /* Cause List - Add a New Court Room */

    Route::post('/admin/causelists/add', 'CauseListsController@addCauseList')->name('add.causelist');

    /*
    |--------------------------------------------------------------------------
    | Media & Media Categories
    |--------------------------------------------------------------------------
    */

    /*Media - Get Form To Edit Media */

    Route::get('/admin/medias/edit/{id}', 'MediasController@editMedia')->name('edit.media');


    /*Media - Update Media */

    Route::post('/admin/medias/update/{id}', 'MediasController@updateMedia')->name('update.media');

    /* Media- Delete Media */

    Route::get('/admin/medias/delete/{id}', 'MediasController@deleteMedia')->name('delete.media');

    /*Media - Get Form To Edit Media Cat */

    Route::get('/admin/medias/category/edit/{id}', 'MediasController@editCategory')->name('edit.media-category');

    /*Media - Update Media Category */

    Route::post('/admin/medias/category/update/{id}', 'MediasController@updateCategory')->name('update.media-category');

    /*Media - Delete Media Category */

    Route::get('/admin/medias/category/delete/{id}', 'MediasController@deleteCategory')->name('delete.media-category');

    /*Media - Add a New Category */

    Route::post('/admin/medias/category/add', 'MediasController@addCategory')->name('add.media-category');

    /*Media - Add a New Media */

    Route::post('/admin/medias/add', 'MediasController@addMedia')->name('add.media');

     /*
    |--------------------------------------------------------------------------
    | articles
    |--------------------------------------------------------------------------
    */

    /* articles - Get Form To Edit articles */

    Route::get('/admin/articles/edit/{id}', 'ArticlesController@editArticle')->name('edit.article');


    /* articles - Update articles */

    Route::post('/admin/articles/update/{id}', 'ArticlesController@updateArticle')->name('update.article');

    /* articles - Delete articles */

    Route::get('/admin/articles/delete/{id}', 'ArticlesController@deleteArticle')->name('delete.article');

    /* articles - Add a New articles */

    Route::post('/admin/articles/add', 'ArticlesController@addArticle')->name('add.article');

      /*
    |--------------------------------------------------------------------------
    | footersliderblocks
    |--------------------------------------------------------------------------
    */

    /* footersliderblocks - Get Form To Edit footersliderblocks */

    Route::get('/admin/footersliderblocks/edit/{id}', 'FooterSliderBlocksController@editFooterSliderBlock')->name('edit.footersliderblock');


    /* footersliderblocks - Update footersliderblocks */

    Route::post('/admin/footersliderblocks/update/{id}', 'FooterSliderBlocksController@updateFooterSliderBlock')->name('update.footersliderblock');

    /* footersliderblocks - Delete footersliderblocks */

    Route::get('/admin/footersliderblocks/delete/{id}', 'FooterSliderBlocksController@deleteFooterSliderBlock')->name('delete.footersliderblock');

    /* footersliderblocks - Add a New footersliderblocks */

    Route::post('/admin/footersliderblocks/add', 'FooterSliderBlocksController@addFooterSliderBlock')->name('add.footersliderblock');



 /*
 |--------------------------------------------------------------------------
    | footersliderblocks
    |--------------------------------------------------------------------------
    */

    /* covidtopbox - Get Form To Edit covidtopbox */

    Route::get('/admin/covidtopbox/edit/{id}', 'CovidTopBoxController@editCovidTopBox')->name('edit.covidtopbox');


    /* footersliderblocks - Update footersliderblocks */

    Route::post('/admin/covidtopbox/update/{id}', 'CovidTopBoxController@updateCovidTopBox')->name('update.covidtopbox');

    /* footersliderblocks - Delete footersliderblocks */

    Route::get('/admin/covidtopbox/delete/{id}', 'CovidTopBoxController@deleteCovidTopBox')->name('delete.covidtopbox');

    /* footersliderblocks - Add a New footersliderblocks */

    Route::post('/admin/covidtopbox/add', 'CovidTopBoxController@addCovidTopBox')->name('add.covidtopbox');


});

/*
|--------------------------------------------------------------------------
| FRONT END Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'FrontendController@HomePage')->name('/');

Route::get('/about', 'FrontendController@AboutPage')->name('about');

Route::get('/features', 'FrontendController@FeaturesPage')->name('features');

Route::get('/council', 'FrontendController@JudgesPage')->name('council');

Route::get('/councildetail/{id}', 'FrontendController@SingleJudgePage')->name('councildetail');

Route::get('/announcements', 'FrontendController@AnnouncemenetsPage')->name('announcements');

Route::get('/announcements/{id}', 'FrontendController@SingleAnnouncementPage')->name('singleannouncement');

Route::get('/slider/{id}', 'FrontendController@SingleSliderPage')->name('singleslider');

Route::get('/projects', 'FrontendController@ProjectsPage')->name('projects');

Route::get('/projects/{id}', 'FrontendController@SingleProjectPage')->name('singleproject');

Route::get('/team', 'FrontendController@TeamPage')->name('team');

Route::get('/prices', 'FrontendController@PricesPage')->name('prices');

Route::get('/testimonials', 'FrontendController@TestimonialsPage')->name('testimonials');

Route::get('/blog', 'FrontendController@BlogPage')->name('blog');

Route::get('/csrs', 'FrontendController@CSRPage')->name('csrs');

Route::get('/csrs/post/{id}', 'FrontendController@SingleCSRPage')->name('singlecsr');

Route::get('/news', 'FrontendController@NewsPage')->name('news');

Route::get('/departments', 'FrontendController@DepartmentsPage')->name('departments');

Route::get('/news/{id}', 'FrontendController@NewsPositionPage')->name('newsposition');

Route::get('/covid', 'FrontendController@CovidPage')->name('covid');

Route::get('/covid/{id}', 'FrontendController@SingleCovidPage')->name('singlecovid');

Route::get('findCityWithStateID/{id}','FrontendController@findCityWithStateID')->name('findcity');

Route::get('/news/location/{id}', 'FrontendController@NewsLocationPage')->name('newslocation');

Route::get('/news/archive/{id}', 'FrontendController@NewsArchivePage')->name('newsarchive');

Route::get('/locations', 'FrontendController@LocationsPage')->name('locations');


Route::get('/news/post/{id}', 'FrontendController@SinglePostPage')->name('singlepost');

Route::get('/department/post/{id}', 'FrontendController@SingleDepartmentPage')->name('singledd');

Route::get('/videos', 'FrontendController@VideosPage')->name('videos');

Route::get('/photo', 'FrontendController@PhotoPage')->name('photo');

Route::get('/dailys', 'FrontendController@DailysPage')->name('dailys');

Route::get('/causelists', 'FrontendController@CausesPage')->name('causelists');

Route::get('/causelists_criminal', 'FrontendController@CriminalPage')->name('causelistscriminal');

Route::get('/causelists_civil', 'FrontendController@CivilPage')->name('causelistscivil');

Route::get('/causelists_writ', 'FrontendController@WritPage')->name('causelistswrit');

Route::get('/judgementlists', 'FrontendController@JudgementPage')->name('judgementlists');

Route::get('/judgement_criminal', 'FrontendController@JCriminalPage')->name('judgementlistscriminal');

Route::get('/judgement_civil', 'FrontendController@JCivilPage')->name('judgementlistscivil');

Route::get('/judgement_writ', 'FrontendController@JWritPage')->name('judgementlistswrit');

Route::get('/postponelists', 'FrontendController@PostponePage')->name('postponelists');

Route::get('/postpone_criminal', 'FrontendController@PCriminalPage')->name('postponelistscriminal');

Route::get('/postpone_civil', 'FrontendController@PCivilPage')->name('postponelistscivil');

Route::get('/postpone_writ', 'FrontendController@PWritPage')->name('postponelistswrit');

Route::get('/causelists/{id}', 'FrontendController@SingleCausePage')->name('singlecause');

Route::get('/faq', 'FrontendController@FaqPage')->name('faq');

Route::get('/contact', 'FrontendController@ContactPage')->name('contact');

Route::get('/scode41', 'FrontendController@Scode41Page')->name('scode41');

Route::get('/{id}/{title}', 'FrontendController@PagesPage')->name('page');


/* Subscribers - Add New Subscriber To List */

Route::post('/addsubscriber', 'SubscribersController@addSubscriber')->name('add.subscriber');

/* Messages - Send Message From Contact Form */

Route::post('/sendmessage', 'ContactsController@sendMessage')->name('send.message');
Route::post('/sendscode41', 'Scode41Controller@sendScode41')->name('send.scode41');

Route::get('/tender', 'FrontendController@TenderPage')->name('tender');

Route::get('/ruling', 'FrontendController@RulingPage')->name('ruling');
Route::get('/annualreport', 'FrontendController@AnnualreportPage')->name('annualreport');
Route::get('/strategicplanning', 'FrontendController@StrategicPlanPage')->name('strategicplanning');
Route::get('/judicialjournal', 'FrontendController@JudicialJPage')->name('judicialjournal');
Route::get('/otherspdf', 'FrontendController@OtherpdfPage')->name('otherspdf');

// this route can return the state with the state id

Route::get('/search', 'FrontendController@NewsSearchPage')->name('search');
/*
    |--------------------------------------------------------------------------
    | Judgement List & Cause List Categories
    |--------------------------------------------------------------------------
    */

    

    Route::get('/admin/judgementlists/edit/{id}', 'JudgementController@editJudgementList')->name('edit.judgementlists');

    Route::post('/admin/judgementlists/update/{id}', 'JudgementController@updateJudgementList')->name('update.judgementlists');

    Route::get('/admin/judgementlists/delete/{id}', 'JudgementController@deleteJudgementList')->name('delete.judgementlists');

    Route::post('/admin/judgementlists/add', 'JudgementController@addJudgementList')->name('add.judgementlists');

    
    Route::get('/admin/postponelist/edit/{id}', 'PostponeController@editPostponeList')->name('edit.postponelist');

    Route::post('/admin/postponelist/update/{id}', 'PostponeController@updatePostponeList')->name('update.postponelist');

    Route::get('/admin/postponelist/delete/{id}', 'PostponeController@deletePostponeList')->name('delete.postponelist');

    Route::post('/admin/postponelist/add', 'PostponeController@addPostponeList')->name('add.postponelist');


    Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');


    
