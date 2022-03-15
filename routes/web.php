<?php

use App\Http\Controllers\DynamicToken;
use App\Models\Work;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Statamic\Facades\Site;

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

// Dynamic Token route for posting a form with Ajax.
Route::get('/!/DynamicToken/refresh', [DynamicToken::class, 'getRefresh']);

// The Sitemap route to the sitemap.xml
Route::statamic('/sitemap.xml', 'sitemap/sitemap', [
    'layout' => null,
    'content_type' => 'application/xml'
]);

// The Manifest route to the manifest.json
Route::statamic('/site.webmanifest', 'manifest/manifest', [
    'layout' => null,
    'content_type' => 'application/json'
]);

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/works', function () {
    return (new \Statamic\View\View)
        ->template('works')
        ->layout('layout')
        ->with(['title' => 'Works']);
});

Route::get('/works/create', function() {
    Work::create([
        'slug' => str::orderedUuid(),
        'user_id' => 1,
        'type' => 'photo',
        'data' => 'new model'
    ]);
});

Route::middleware(['auth:sanctum','verified'])->get('/dashboard',function (){
    return view('dashboard');
})->name('dashboard');



// The Social Image route to generate social images.
// Site::all()->each(function ($site) {
//     Route::statamic("{$site->url()}/social-images/{id}", 'social_images', [
//         'layout' => null,
//     ]);
// });

// The Search route to display search results with `views/search.antlers.html`.
// Route::statamic('/search', 'search', [
//     'title' => 'Search results'
// ]);
