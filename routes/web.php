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

Route::get('/', function () {
    Storage::put('file', 'Content!');

    // Doesn't work
    // return response()->download('file');

    // Works, but cannot change the storage method in the config anymore.
    // return response()->download(storage_path('app/file'));

    // Works (if I specify the URL in config), but cannot test my method
    // return response()->download(Storage::url('file'));

    // Always work but seems a little bit far…
    return response()->download(Storage::getDriver()->getAdapter()->applyPathPrefix('file'));

    // Should work
    // return response()->download(Storage::fullPath('file'));
});
