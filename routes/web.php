<?php


use Illuminate\Support\Facades\Route;

// Aponta para a pasta views/api/portfolio.blade.php
Route::get('/portfolio', function () {
    return view('api.portfolio');
});
