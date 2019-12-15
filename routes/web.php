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
    return view('awal');
});
Route::get('/home', function () {
    return view('home');
});

Route::post('daftar', 'HomeController@daftar');
Route::get('/province/{id}/cities', 'LanggananController@getCities');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UserController');
});

// PETERNAK
Route::group(['middleware' => ['auth', 'peternak']], function () {
    Route::resource('langganan', 'LanggananController');
    Route::resource('question', 'QuestionController');
    Route::post('tambahSaldoPeternak', 'LanggananController@tambahSaldoPeternak');
    Route::get('peternak/konsultasi', 'QuestionController@index');
    Route::get('peternak/login', function () {
        return view('peternak/login');
    });
    Route::post('pilihPaket', 'LanggananController@pilihPaket');
    Route::get('peternak/daftar', function () {
        return view('peternak/daftar');
    });

    Route::get('peternak/lupapassword', function () {
        return view('peternak/lupapassword');
    });

    Route::get('/peternak/artikel', 'ArtikelController@indexPeternak');

    Route::get('peternak/dokter', function () {
        return view('peternak/dokter');
    });

    Route::get('peternak/profildokter/{id}', 'UserController@profildokter');

    Route::get('peternak/profil', function () {
        return view('peternak/profil');
    });

    Route::get('peternak/langganan', function () {
        return view('peternak/langganan');
    });
});


// DOKTER

Route::group(['middleware' => ['auth', 'dokter']], function () {

    Route::get('dokter/login', function () {
        return view('dokter/login');
    });

    Route::get('dokter/lupapassword', function () {
        return view('dokter/lupapassword');
    });

    Route::get('dokter/home', function () {
        return view('dokter/home');
    });


    Route::resource('artikel', 'ArtikelController');

    Route::post('tarikSaldoDokter', 'LanggananController@tarikSaldoDokter');

    Route::get('dokter/konsultasi', 'QuestionController@getPertanyaan');

    Route::get('dokter/semuaKonsultasi', 'QuestionController@allPertanyaan');

    Route::get('dokter/jawab', 'QuestionController@jawab');

    Route::get('dokter/riwayat', 'QuestionController@riwayat');

    // Route::get('dokter/artikel', function () {
    //     return view('dokter/artikel');
    // });

    Route::get('dokter/profil', function () {
        return view('dokter/profil');
    });
});



// ADMIN

Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::post('editRekAdmin', 'HomeController@editRek');
    Route::post('editBankAdmin', 'HomeController@editBank');
    Route::post('editEmailAdmin', 'HomeController@editEmail');
    Route::post('admin.tambahSaldo', 'LanggananController@tambahSaldo');
    Route::post('tarikSaldo', 'LanggananController@tarikSaldo');
    Route::resource('paket', 'PaketController');
    Route::get('admin/transaksidokter/{id}', 'LanggananController@transaksidokter');
    Route::get('transaksi/peternak/{id}', 'LanggananController@transaksi');
    Route::get('admin/login', function () {
        return view('admin/login');
    });

    Route::get('admin/dashboard', function () {
        return view('admin/dashboard');
    });

    Route::get('admin/lupapassword', function () {
        return view('admin/lupapassword');
    });

    Route::get('admin/verifikasi', 'QuestionController@verifikasi');

    Route::get('admin/getVerifikasi', 'QuestionController@getVerifikasi');
    Route::post('admin/getBatal', 'QuestionController@getBatal');

    Route::get('admin/dokter', function () {
        return view('admin/dokter');
    });
    Route::get('admin/transaksi', function () {
        return view('admin/transaksi');
    });
    Route::get('admin/langganan', function () {
        return view('admin/langganan');
    });
    Route::get('admin/peternak', function () {
        return view('admin/peternak');
    });
    Route::get('transaksi/peternak', function () {
        return view('admin/transaksipeternak');
    });
});
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
