<?php

use App\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/', 'PagesController@home')->name('index');
Route::get('empresa', 'PagesController@empresa')->name('empresa');
Route::get('productos', 'PagesController@productos')->name('productos');
Route::get('producto/{product}', 'PagesController@producto')->name('producto');
Route::get('aplicaciones', 'PagesController@aplicaciones')->name('aplicaciones');
Route::get('carta-de-colores', 'PagesController@cartaDeColores')->name('cartaDeColores');
Route::get('obtener/carta-de-colores', 'PagesController@obtenerCartaDeColores')->name('obtener.cartaDeColores');
Route::get('sulicitud-de-presupuesto', 'PagesController@sulicitudPresupuesto')->name('sulicitudPresupuesto');
Route::get('contacto', 'PagesController@contacto')->name('contacto');

Route::post('enviar-cotizacion', 'MailController@quote')->name('send-quote');
Route::post('enviar-contacto', 'MailController@contact')->name('send-contact');
Route::post('newsletter', 'NewsLetterController@storeNewsletter')->name('newsletter.store');


Route::get('/ficha-tecnica/{id}', 'PagesController@fichaTecnica')->name('ficha-tecnica');
Route::delete('/ficha-tecnica/{id}', 'PagesController@borrarFichaTecnica')->name('borrar-ficha-tecnica');

Route::middleware('auth')->prefix('admin')->group(function () {
    /** Page Home */
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('home/content', 'HomeController@content')->name('home.content');
    Route::post('home/content/generic-section/store', 'HomeController@storeHomeGenericSection')->name('home.content.generic-section.store');
    Route::post('home/content/store', 'HomeController@store')->name('home.content.store');
    Route::post('home/content/generic-section/update', 'HomeController@updateHomeGenericSection')->name('home.content.generic-section.update');
    Route::delete('home/content/{id}', 'HomeController@destroyHomeGenericSection')->name('home.content.destroy');
    Route::get('home/content/slider/get-list', 'HomeController@sliderGetList')->name('home.slider.get-list');
    /** Fin home*/
    /** Page Company */
    Route::get('company/content', 'CompanyController@content')->name('company.content');
    Route::post('company/content/store-slider', 'CompanyController@storeSlider')->name('company.content.storeSlider');
    Route::post('company/content/update-slider', 'CompanyController@updateSlider')->name('company.content.updateSlider');
    Route::post('company/content/update-ribbon', 'CompanyController@updateRibbon')->name('company.content.updateRibbon');
    Route::post('company/content/update-info', 'CompanyController@updateInfo')->name('company.content.updateInfo');
    Route::post('company/content/generic-section/update', 'CompanyController@updateHomeGenericSection')->name('company.content.generic-section.update');
    Route::delete('company/content/{id}', 'HomeController@destroyHomeGenericSection')->name('company.content.destroy');
    Route::get('company/content/slider/get-list', 'CompanyController@sliderGetList')->name('company.slider.get-list');
    /** Fin company*/
    /** Page Application */
    Route::get('application/content', 'ApplicationController@content')->name('application.content');
    Route::post('application/content/store', 'ApplicationController@store')->name('application.content.store');
    Route::post('application/content', 'ApplicationController@update')->name('application.content.update');
    Route::delete('application/content/{id}', 'ApplicationController@destroy')->name('application.content.destroy');
    Route::get('application/content/get-list', 'ApplicationController@getList')->name('application.content.get-list');
    Route::get('application/content/find/{id?}', 'ApplicationController@find')->name('application.content.find');
    /** Fin Application*/
    /** Page Product */
    Route::get('product/content', 'ProductController@content')->name('product.content');
    Route::get('product/content/create', 'ProductController@create')->name('product.content.create');
    Route::post('product/content/store', 'ProductController@store')->name('product.content.store');
    Route::get('product/content/{id}/edit', 'ProductController@edit')->name('product.content.edit');
    Route::put('product/content', 'ProductController@update')->name('product.content.update');
    Route::delete('product/content/{id}', 'ProductController@destroy')->name('product.content.destroy');
    Route::get('product/content/get-list', 'ProductController@getList')->name('product.content.get-list');
    Route::get('product/content/find-product/{id?}', 'ProductController@find')->name('product.content.find');
    /** Fin product*/
    /** Page Product Picture */
    Route::delete('product-picture/content/destroy/{id}', 'ProductPictureController@destroy')->name('product-picture.content.destroy');
    /** Fin product picture*/
    /** Page Color */
    Route::get('color/content', 'ColorController@content')->name('color.content');
    Route::post('color/content/store', 'ColorController@store')->name('color.content.store');
    Route::post('color/content', 'ColorController@update')->name('color.content.update');
    Route::delete('color/content/{id}', 'ColorController@destroy')->name('color.content.destroy');
    Route::get('color/content/get-list', 'ColorController@getList')->name('color.content.get-list');
    Route::get('color/content/find/{id?}', 'ColorController@find')->name('color.content.find');
    /** Fin Color*/
    /** Page company */
    Route::get('data/content', 'DataController@content')->name('data.content');
    Route::put('data/content', 'DataController@update')->name('data.content.update');
    /** Fin company*/
    /** Page newsletter */
    Route::get('newsletter/content', 'NewsLetterController@content')->name('newsletter.content');
    Route::get('newsletter/content/get-list', 'NewsLetterController@getList')->name('newsletter.content.get-list');
    Route::delete('newsletter/content/{id}', 'NewsLetterController@destroy')->name('newsletter.content.destroy');
    /** Fin newsletter*/

    Route::get('content/', 'ContentController@content')->name('content');
    Route::get('content/{id}', 'ContentController@findContent');

    Route::get('user/get-list', 'UserController@getList')->name('user.get-list');
    Route::resource('user', 'UserController');
});
