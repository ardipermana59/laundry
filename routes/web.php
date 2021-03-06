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

Route::view('/', 'main.dashboard')->middleware('auth');

// OUTLET
Route::resource('outlet', 'OutletController')->except(['show']);
Route::get('outlet/sampah','OutletController@trash')->name('outlet.trash');
Route::get('outlet/restore/{outlet}','OutletController@restore')->name('outlet.restore');
Route::delete('outlet/permanent/delete/{outlet}','OutletController@forceDelete')->name('outlet.forceDelete');
Route::delete('outlet/permanent/delete','OutletController@forceDeleteAll')->name('outlet.forceDelete.all');

// MEMBER
Route::resource('member', 'MemberController')->except(['show']);
Route::get('member/sampah','MemberController@trash')->name('member.trash');
Route::get('member/restore/{member}','MemberController@restore')->name('member.restore');
Route::delete('member/permanent/delete/{member}','MemberController@forceDelete')->name('member.forceDelete');
Route::delete('member/permanent/delete','MemberController@forceDeleteAll')->name('member.forceDelete.all');

// TRANSAKSI
Route::resource('transaksi', 'TransaksiController')->except(['show']);
Route::get('transaksi/sampah','TransaksiController@trash')->name('transaksi.trash');
Route::get('transaksi/restore/{transaksi}','TransaksiController@restore')->name('transaksi.restore');
Route::delete('transaksi/permanent/delete/{transaksi}','TransaksiController@forceDelete')->name('transaksi.forceDelete');
Route::delete('transaksi/permanent/delete','TransaksiController@forceDeleteAll')->name('transaksi.forceDelete.all');

// PAKET
Route::resource('paket', 'PaketController')->except(['show']);
Route::get('paket/sampah','PaketController@trash')->name('paket.trash');
Route::get('paket/restore/{paket}','PaketController@restore')->name('paket.restore');
Route::delete('paket/permanent/delete/{paket}','PaketController@forceDelete')->name('paket.forceDelete');
Route::delete('paket/permanent/delete','PaketController@forceDeleteAll')->name('paket.forceDelete.all');

// PENGATURAN
Route::get('settings', 'SettingController@index')->name('setting');
Route::post('settings', 'SettingController@save')->name('setting.save');
Route::post('settings/change-password', 'SettingController@changePassword')->name('setting.change.password');

// LAPORAN
Route::get('laporan', 'LaporanController@index')->name('laporan.index');
Route::get('laporan/export/pdf', 'LaporanController@pdf')->name('laporan.pdf');


Route::get('dashboard', 'HomeController@index')->name('home');
Auth::routes();