<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\DistrictController;
use App\Http\Controllers\backend\SubDistrictController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\SettingController;
use App\Http\Controllers\backend\SeoController;
use App\Http\Controllers\backend\PrayerController;
use App\Http\Controllers\backend\LiveTvController;
use App\Http\Controllers\backend\NoticeController;
use App\Http\Controllers\backend\WebController;
use App\Http\Controllers\backend\PhotoGalleryController;
use App\Http\Controllers\backend\VideoController;
use App\Models\Category;
use App\Models\SubCategory;
use App\Http\Controllers\frontend\ExtraController;
use App\Http\Controllers\frontend\ViewPostController;
use App\Http\Controllers\backend\AdsController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\WebSettingController;






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
    
    return view('main.home');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//Admin Logout
Route::get('/admin/logout', [AdminController::class,'Logout'])->name('admin.logout');

//Admin Category All Routes
Route::get('/categories', [CategoryController::class,'Index'])->name('categories');
Route::get('add/category', [CategoryController::class,'AddCategory'])->name('add.category');
Route::post('store/category', [CategoryController::class,'StoreCategory'])->name('store.category');
Route::get('category/{id}/edit', [CategoryController::class,'EditCategory'])->name('edit.category');
Route::post('category/{id}/update', [CategoryController::class,'UpdateCategory'])->name('update.category');
Route::get('category/{id}/delete', [CategoryController::class,'DeleteCategory'])->name('delete.category');

//Admin SubCategory All Routes
Route::get('/subcategories', [SubCategoryController::class,'Index'])->name('subcategories');
Route::get('add/subcategory', [SubCategoryController::class,'AddSubCategory'])->name('add.subcategory');
Route::post('store/subcategory', [SubCategoryController::class,'StoreSubCategory'])->name('store.subcategory');
Route::get('subcategory/{id}/edit', [SubCategoryController::class,'EditSubCategory'])->name('edit.subcategory');
Route::post('subcategory/{id}/update', [SubCategoryController::class,'UpdateSubCategory'])->name('update.subcategory');
Route::get('subcategory/{id}/delete', [SubCategoryController::class,'DeleteSubCategory'])->name('delete.subcategory');

//Admin District All Routes
Route::get('/districts', [DistrictController::class,'Index'])->name('districts');
Route::get('add/district', [DistrictController::class,'AddDistrict'])->name('add.district');
Route::post('store/district', [DistrictController::class,'StoreDistrict'])->name('store.district');
Route::get('district/{id}/edit', [DistrictController::class,'EditDistrict'])->name('edit.district');
Route::post('district/{id}/update', [DistrictController::class,'UpdateDistrict'])->name('update.district');
Route::get('district/{id}/delete', [DistrictController::class,'DeleteDistrict'])->name('delete.district');

//Admin SubDistrict All Routes
Route::get('/subdistricts', [SubDistrictController::class,'Index'])->name('subdistricts');
Route::get('add/subdistrict', [SubDistrictController::class,'AddSubDistrict'])->name('add.subdistrict');
Route::post('store/subdistrict', [SubDistrictController::class,'StoreSubDistrict'])->name('store.subdistrict');
Route::get('subdistrict/{id}/edit', [SubDistrictController::class,'EditSubDistrict'])->name('edit.subdistrict');
Route::post('subdistrict/{id}/update', [SubDistrictController::class,'UpdateSubDistrict'])->name('update.subdistrict');
Route::get('subdistrict/{id}/delete', [SubDistrictController::class,'DeleteSubDistrict'])->name('delete.subdistrict');

//Admin Posts All Routes
Route::get('/createpost', [PostController::class,'create'])->name('create.post');
Route::post('store/post', [PostController::class,'StorePost'])->name('store.post');
Route::get('/allpost', [PostController::class,'allPost'])->name('all.post');
Route::get('/post/{id}/edit', [PostController::class,'EditPost'])->name('edit.post');
Route::post('post/{id}/update', [PostController::class,'UpdatePost'])->name('update.post');
Route::get('/post/{id}/delete', [PostController::class,'DeletePost'])->name('delete.post');






//json Data for Category and District
Route::get('/get/subcategory/{category_id}', [PostController::class,'GetSubCategory']);
Route::get('/get/subdistrict/{district_id}', [PostController::class,'GetSubDistrict']);




//Social Settings
Route::get('/social/setting', [SettingController::class,'SocialSetting'])->name('social.setting');
Route::post('social/{id}/update', [SettingController::class,'SocialUpdate'])->name('update.social');

//SEO Settings
Route::get('/seo/setting', [SeoController::class,'SeoSetting'])->name('seo.setting');
Route::post('seo/{id}/update', [SeoController::class,'SeoUpdate'])->name('update.seo');

//Prayers Settings
Route::get('/prayer/setting', [PrayerController::class,'PrayerSetting'])->name('prayer.setting');
Route::post('prayer/{id}/update', [PrayerController::class,'PrayerUpdate'])->name('update.prayer');

//LiveTv Settings
Route::get('/livetv/setting', [LiveTvController::class,'LiveTvSetting'])->name('livetv.setting');
Route::post('livetv/{id}/update', [LiveTvController::class,'LiveTvUpdate'])->name('update.livetv');
Route::get('/livetv/{id}/active', [LiveTvController::class,'ActiveSetting'])->name('active.livetv');
Route::get('/livetv/{id}/deactive', [LiveTvController::class,'DeactiveSetting'])->name('deactive.livetv');

//Notice Settings
Route::get('/notice/setting', [NoticeController::class,'NoticeSetting'])->name('notice.setting');
Route::post('notice/{id}/update', [NoticeController::class,'NoticeUpdate'])->name('update.notice');
Route::get('/notice/{id}/active', [NoticeController::class,'ActiveSetting'])->name('active.notice');
Route::get('/notice/{id}/deactive', [NoticeController::class,'DeactiveSetting'])->name('deactive.notice');

//Website Link Route
Route::get('/addweb', [WebController::class,'AddWeb'])->name('add.website');
Route::post('store/web', [WebController::class,'StoreWeb'])->name('store.website');
Route::get('/allweb', [WebController::class,'allWeb'])->name('all.website');
Route::get('/web/{id}/edit', [WebController::class,'EditWeb'])->name('edit.web');
Route::post('web/{id}/update', [WebController::class,'UpdateWeb'])->name('update.web');
Route::get('/web/{id}/delete', [WebController::class,'DeleteWeb'])->name('delete.web');

//Photogallery Link Route
Route::get('/photo/gallery', [PhotoGalleryController::class,'PhotoGallery'])->name('photo.gallery');
Route::get('/add/photo', [PhotoGalleryController::class,'AddPhoto'])->name('add.photo');
Route::post('/store/photo', [PhotoGalleryController::class,'StorePhoto'])->name('store.photo');
Route::get('photo/{id}/edit', [PhotoGalleryController::class,'EditPhoto'])->name('edit.photo');
Route::post('photo/{id}/update', [PhotoGalleryController::class,'UpdatePhoto'])->name('update.photo');
Route::get('photo/{id}/delete', [PhotoGalleryController::class,'DeletePhoto'])->name('delete.photo');

//Videogallery Link Route
Route::get('/video/gallery', [VideoController::class,'VideoGallery'])->name('video.gallery');
Route::get('/add/video', [VideoController::class,'AddVideo'])->name('add.video');
Route::post('/store/video', [VideoController::class,'StoreVideo'])->name('store.video');
Route::get('/video/{id}/edit', [VideoController::class,'EditVideo'])->name('edit.video');
Route::post('/video/{id}/update', [VideoController::class,'UpdateVideo'])->name('update.video');
Route::get('/video/{id}/delete', [VideoController::class,'DeleteVideo'])->name('delete.video');



//FrontEnd

//MultiLanguage Route
Route::get('/lang/nep', [ExtraController::class,'Nepali'])->name('lan.nep');
Route::get('/lang/eng', [ExtraController::class,'English'])->name('lan.eng');

//Single Post page 
Route::get('/view/post/{id}', [ViewPostController::class,'SinglePost'])->name('view.post');

//Post Category and Sub Category Pages
Route::get('/catpost/post/{id}/', [ViewPostController::class,'CategoryPost'])->name('catpost');
Route::get('/subcatpost/post/{id}/', [ViewPostController::class,'SubCategoryPost'])->name('subcatpost');

//search district in Home page
//above in ajax of subdistreict
Route::get('/search/district/', [ExtraController::class,'SearchDistrict'])->name('search.district');


//Ads Backend Route
Route::get('/list/ads/', [AdsController::class,'ListAds'])->name('list.ads');
Route::get('/add/ads/', [AdsController::class,'AddAds'])->name('add.ads');
Route::post('/store/ads/', [AdsController::class,'StoreAds'])->name('store.ads');
Route::get('/edit/ads/{id}', [AdsController::class,'EditAds'])->name('edit.ads');
Route::post('/update/ads/{id}', [AdsController::class,'UpdateAds'])->name('update.ads');
Route::get('/delete/ads/{id}', [AdsController::class,'DeleteAds'])->name('delete.ads');

//Writer Role Routes
Route::get('/add/writer/', [RoleController::class,'AddWriter'])->name('add.writer');
Route::post('/store/writer/', [RoleController::class,'StoreWriter'])->name('store.writer');
Route::get('/all/writer/', [RoleController::class,'AllWriter'])->name('all.writer');
Route::get('/Edit/writer/{id}/', [RoleController::class,'EditWriter'])->name('edit.writer');
Route::post('/update/writer/{id}/', [RoleController::class,'UpdateWriter'])->name('update.writer');
Route::get('/delete/writer/{id}/', [RoleController::class,'DeleteWriter'])->name('delete.writer');

//Website Setting Route
Route::get('/website/setting/', [WebSettingController::class,'Websetting'])->name('website.setting');
Route::post('/update/websetting/{id}/', [WebSettingController::class,'UpdateWebSetting'])->name('update.websetting');


//Account Setting Routes
Route::get('/account/setting/', [AdminController::class,'Accountsetting'])->name('account.setting');
Route::get('/account/edit/{id}/', [AdminController::class,'AccountEdit'])->name('edit.profile');
Route::post('/account/update/{id}/', [AdminController::class,'AccountUpdate'])->name('update.profile');
Route::get('/password/change/{id}/', [AdminController::class,'PasswordChange'])->name('change.password');
Route::post('/password/update/{id}/', [AdminController::class,'PasswordUpdate'])->name('password.update');
