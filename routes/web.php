<?php

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
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/', 'PagesController@home')->name('index');
Route::get('/empresa', 'PagesController@empresa')->name('empresa');
Route::get('/productos', 'PagesController@productos')->name('productos');
Route::get('/categoria-productos', 'PagesController@categoriaProductos')->name('categoria-productos');
Route::get('/sub-categoria/productos/{id}', 'PagesController@subcategoriaProductos')->name('subcategoria-productos');
Route::get('/ituhielo', 'PagesController@ituhielo')->name('ituhielo');
Route::get('/sub-categoria/ituhielo/{id}', 'PagesController@subcategoriaItuhielo')->name('subcategoria-ituhielo');
Route::get('/sub-categoria/ituhielo/producto/{product}', 'PagesController@subcategoriaItuhieloProducto')->name('subcategoria-ituhielo-producto');
Route::get('/ituagua', 'PagesController@ituagua')->name('ituagua');
Route::get('/sub-categoria/ituagua/{id}', 'PagesController@subcategoriaItuagua')->name('subcategoria-ituagua');
Route::get('/sub-categoria/ituagua/producto/{product}', 'PagesController@subcategoriaItuaguaProducto')->name('subcategoria-ituagua-producto');
Route::get('/producto/{product}', 'PagesController@producto')->name('producto');
Route::get('/ofertas', 'PagesController@ofertas')->name('ofertas');
Route::get('/logistica', 'PagesController@logistica')->name('logistica');
Route::get('/contacto', 'PagesController@contacto')->name('contacto');
Route::post('enviar-contacto', 'MailController@contact')->name('send-contact');
Route::get('/ficha-tecnica/{id}', 'ProductController@fichaTecnica')->name('ficha-tecnica');
Route::delete('/ficha-tecnica/{id}', 'ProductController@borrarFichaTecnica')->name('borrar-ficha-tecnica');
Route::get('content/ficha-tecnica/{id}', 'ContentController@fichaTecnica')->name('content.ficha-tecnica');
Route::post('content/ficha-tecnica/{id}', 'ContentController@borrarFichaTecnica')->name('content.borrar-ficha-tecnica');
Route::post('content/image/{id}', 'ContentController@borrarImagenContenido')->name('content.borrar-imagen-contenido');
Route::post('/imagen-descrptiva/{id}', 'ProductController@borrarImagenDescriptiva')->name('borrar-imagen-descriptiva');

Route::middleware('auth')->prefix('admin')->group(function () {

    /** Page Home */
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('home/content', 'HomeController@content')->name('home.content');
    Route::post('home/content/generic-section/store', 'HomeController@store')->name('home.content.generic-section.store');
    Route::post('home/content/generic-section/update', 'HomeController@update')->name('home.content.generic-section.update');
    Route::post('home/updateInfo', 'HomeController@updateInfo')->name('home.update-info');
    Route::post('home/eliminar-imagen/{id}', 'HomeController@eliminarImagen')->name('home.eliminar-imagen');
    Route::delete('home/content/{id}', 'HomeController@destroy')->name('home.content.destroy');
    Route::get('home/content/slider/get-list', 'HomeController@sliderGetList')->name('home.slider.get-list');
    /** Fin home*/

    /** Page Company */
    Route::get('company/content', 'CompanyController@content')->name('company.content');
    Route::post('company/content/store-slider', 'CompanyController@storeSlider')->name('company.content.storeSlider');
    Route::post('company/content/update-slider', 'CompanyController@updateSlider')->name('company.content.updateSlider');
    Route::post('company/content/update-info', 'CompanyController@updateInfo')->name('company.content.updateInfo');
    Route::post('company/content/update-info-images', 'CompanyController@updateInfoImages')->name('company.content.updateInfoImages');
    Route::delete('company/content/{id}', 'CompanyController@destroy')->name('company.content.destroy');
    Route::get('company/content/slider/get-list', 'CompanyController@sliderGetList')->name('company.slider.get-list');
    Route::get('company/content/features', 'CompanyController@featuresGetList')->name('company.feautes');
    /** Fin company*/

    /** Page Category */
    Route::get('/category', 'CategoryController@index')->name('category');
    Route::get('category/content', 'CategoryController@content')->name('category.content');
    Route::get('category/content/{id}', 'CategoryController@findContent');
    Route::post('category/content/store', 'CategoryController@store')->name('category.content.store');
    Route::post('category/content/update', 'CategoryController@update')->name('category.content.update');
    Route::delete('category/content/{id}', 'CategoryController@destroy')->name('category.content.destroy');
    Route::get('category/content/slider/get-list', 'CategoryController@sliderGetList')->name('category.slider.get-list');
    /** Fin Category*/

    /** Page Category */
    Route::get('/sub-category', 'SubCategoryController@index')->name('sub-category');
    Route::get('sub-category/content', 'SubCategoryController@content')->name('sub-category.content');
    Route::get('sub-category/content/{id}', 'SubCategoryController@findContent');
    Route::get('sub-category/get-category/{id}', 'SubCategoryController@getCategory');
    Route::post('sub-category/content/store', 'SubCategoryController@store')->name('sub-category.content.store');
    Route::post('sub-category/content/update', 'SubCategoryController@update')->name('sub-category.content.update');
    Route::delete('sub-category/content/{id}', 'SubCategoryController@destroy')->name('sub-category.content.destroy');
    Route::get('sub-category/content/slider/get-list', 'SubCategoryController@sliderGetList')->name('sub-category.slider.get-list');
    /** Fin Category*/

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

    /** Page Ituhielo-Product */
    Route::get('ituhielo-product/content', 'ItuhieloProductController@content')->name('ituhielo-product.content');
    Route::get('ituhielo-product/content/create', 'ItuhieloProductController@create')->name('ituhielo-product.content.create');
    Route::post('ituhielo-product/content/store', 'ItuhieloProductController@store')->name('ituhielo-product.content.store');
    Route::get('ituhielo-product/content/{id}/edit', 'ItuhieloProductController@edit')->name('ituhielo-product.content.edit');
    Route::put('ituhielo-product/content', 'ItuhieloProductController@update')->name('ituhielo-product.content.update');
    Route::get('ituhielo-product/content/get-list', 'ItuhieloProductController@getList')->name('ituhielo-product.content.get-list');
    Route::post('ituhielo-product/update-info', 'ItuhieloProductController@updateInfo')->name('ituhielo-product.update-info');
    Route::delete('ituhielo-product/content/{id}', 'ItuhieloProductController@destroy')->name('ituhielo-product.content.destroy');
    /** Fin Ituhielo-Product*/

    /** Page Ituagua-Product */
    Route::get('ituagua-product/content', 'ItuaguaProductController@content')->name('ituagua-product.content');
    Route::get('ituagua-product/content/create', 'ItuaguaProductController@create')->name('ituagua-product.content.create');
    Route::post('ituagua-product/content/store', 'ItuaguaProductController@store')->name('ituagua-product.content.store');
    Route::get('ituagua-product/content/{id}/edit', 'ItuaguaProductController@edit')->name('ituagua-product.content.edit');
    Route::put('ituagua-product/content', 'ItuaguaProductController@update')->name('ituagua-product.content.update');
    Route::get('ituagua-product/content/get-list', 'ItuaguaProductController@getList')->name('ituagua-product.content.get-list');
    Route::post('ituagua-product/update-info', 'ItuaguaProductController@updateInfo')->name('ituagua-product.update-info');
    Route::delete('ituagua-product/content/{id}', 'ItuaguaProductController@destroy')->name('ituagua-product.content.destroy');
    /** Fin Ituagua-Product*/

    /** Page Product Picture */
    Route::delete('product-picture/content/destroy/{id}', 'ProductPictureController@destroy')->name('product-picture.content.destroy');
    /** Fin product picture*/

    /** Page Logistics */
    Route::get('logistics/content', 'LogisticsController@content')->name('logistics.content');
    Route::post('logistics/content/update-info', 'LogisticsController@updateInfo')->name('logistics.content.updateInfo');
    Route::delete('logistics/content/{id}', 'LogisticsController@destroy')->name('logistics.content.destroy');
    /** Fin Logistics*/

    Route::get('data/content', 'DataController@content')->name('data.content');
    Route::put('data/content', 'DataController@update')->name('data.content.update');
    
    Route::get('content/', 'ContentController@content')->name('content');
    Route::get('content/{id}', 'ContentController@findContent');

    Route::get('user/get-list', 'UserController@getList')->name('user.get-list');
    Route::resource('user', 'UserController');
});
