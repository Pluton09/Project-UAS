<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login');
});

use App\Http\Controllers\Auth\LoginController; // Pastikan namespace ini benar

// 1. ROUTE UNTUK MENAMPILKAN FORM (Dipanggil saat user akses /masuk)
Route::get('/masuk', function () {
    return view('login'); // Memanggil resources/views/login.blade.php
})->name('login_form');


// 2. ROUTE UNTUK MEMPROSES SUBMIT FORM (Ini yang dipanggil oleh action="{{ route('login') }}")
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');


// Contoh Route lain yang ada di view Anda (Jika diperlukan)
Route::get('/daftar', function () { /* ... */ })->name('register');
Route::get('/lupa-sandi', function () { /* ... */ })->name('password.request');