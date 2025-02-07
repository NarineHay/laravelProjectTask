<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('api/documentation', function () {
//     // $documentation = 'your documentation content or data here';
//     // return view('vendor.l5-swagger.index', compact('documentation'));
//     $documentation = 'documentation';  // Здесь может быть ваш контент документации
//     return view('vendor.l5-swagger.index', compact('documentation'));
// });


Route::get('swagger/{asset}', function ($asset) {

    $assetPath = public_path('vendor/l5-swagger/assets/' . $asset);

    if (file_exists($assetPath)) {
        return response()->file($assetPath);
    }

    abort(404);
})->name('l5-swagger.documentation.asset');
