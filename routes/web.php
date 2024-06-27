<?php

use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\Admin\KecamatanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\ShowParamedikController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\PanduanController;
use App\Http\Controllers\Dokter\PanduanController as DokterPanduanController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\ShowPanduanController;
use App\Http\Controllers\User\ShowBlogController;
use App\Http\Controllers\Admin\ParamedikController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Dokter\BlogController as DokterBlogController;
use App\Http\Controllers\Dokter\ParamedikController as DokterParamedikController;
use App\Http\Controllers\Dokter\KecamatanController as DokterKecamatanController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Middleware\Dokter;

/*------------------------ Route User ------------------------ */

Route::get('/', function () {
    return view('frontend.home');
});
Route::get('/home', function () {
    return view('frontend.home');
});
Route::get('/client-panduan', [ShowPanduanController::class, 'showUserPanduans'])->name('user.panduan');

Route::get('/client-blog', [ShowBlogController::class, 'index'])->name('frontend.blog');
// Route::get('/client-blog{id}', [ShowBlogController::class, 'show'])->name('user.blog.show');

Route::get('/chat-konsultasi', function () {
    return view('frontend.chat-konsultasi');
});
Route::get('/blog', function () {
    return view('frontend.blog');
});
/*------------------------ End Route User ------------------------ */

/*------------------------ Route Login & Register ------------------------ */
Route::get('/loginfoms', function () {
    return view('login.login');
});
Route::get('/registerfoms', function () {
    return view('login.register');
});
/*------------------------ End Route Login & Register ------------------------ */


/*------------------------ Route Dokter ------------------------ */
Route::prefix('/dokter')->name('dokter.')->middleware(['dokter', 'verified'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('dokter.panduan.list');
    })->name('dashboard');


    Route::prefix('/panduan')->name('panduan.')->group(function () {
        Route::get('/', [DokterPanduanController::class, 'index'])->name('list');
        Route::get('/create', [DokterPanduanController::class, 'create'])->name('create');
        Route::post('/store', [DokterPanduanController::class, 'store'])->name('store');
        Route::get('/{panduan}/edit', [DokterPanduanController::class, 'edit'])->name('edit');
        Route::post('/{panduan}/update', [DokterPanduanController::class, 'update'])->name('update');
        Route::delete('/{panduan}/delete', [DokterPanduanController::class, 'destroy'])->name('delete');
    });
    Route::prefix('/blog')->name('blog.')->group(function () {
        Route::get('/', [DokterBlogController::class, 'index'])->name('list');
        Route::get('/create', [DokterBlogController::class, 'create'])->name('create');
        Route::post('/store', [DokterBlogController::class, 'store'])->name('store');
        Route::get('/{blog}/edit', [DokterBlogController::class, 'edit'])->name('edit');
        Route::put('/{blog}/update', [DokterBlogController::class, 'update'])->name('update');
        Route::delete('/{blog}/delete', [DokterBlogController::class, 'destroy'])->name('delete');
    });
    Route::prefix('/paramedik')->name('paramedik.')->group(function () {
        Route::prefix('/kecamatan')->name('kecamatan.')->group(function () {
            Route::get('/create', [DokterKecamatanController::class, 'create'])->name('create');
            Route::post('/create', [DokterKecamatanController::class, 'store'])->name('create.post');
            Route::get('/edit/{id}', [DokterKecamatanController::class, 'edit'])->name('edit');
            Route::put('/edit/{id}', [DokterKecamatanController::class, 'update'])->name('edit.post');
            Route::delete('/edit/{id}', [DokterKecamatanController::class, 'destroy'])->name('delete');
        });

        Route::get('/list', [DokterParamedikController::class, 'index'])->name('list');
        Route::get('/list/create', [DokterParamedikController::class, 'create'])->name('create');
        Route::post('/list/create', [DokterParamedikController::class, 'store'])->name('create.post');
        Route::get('/list/edit/{id}', [DokterParamedikController::class, 'edit'])->name('edit');
        Route::put('/list/edit/{id}', [DokterParamedikController::class, 'update'])->name('edit.post');
        Route::delete('/list/edit/{id}', [DokterParamedikController::class, 'destroy'])->name('delete');

    });



    Route::prefix('/konsultasi')->name('konsultasi.')->group(function () {
        Route::get('/', function () {
            return view('dokter.konsultasi.index');
        })->name('list');
    });
});
/*------------------------ End Route Dokter ------------------------ */

/*------------------------ Route Admin ------------------------ */
Route::prefix('/admin')->name('admin.')->middleware(['admin', 'verified'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dokter.list');
    })->name('dashboard');

    Route::prefix('/dokter')->name('dokter.')->group(function () {
        Route::get('/', [DokterController::class, 'index'])->name('list');
        Route::post('/create', [DokterController::class, 'store'])->name('store');
        Route::post('/verify', [DokterController::class, 'verify'])->name('verify');
        Route::post('/resend-email-verification', [DokterController::class, 'resendVerify'])->name('resend');
        Route::delete('/delete', [DokterController::class, 'destroy'])->name('delete');
    });
    Route::prefix('/blog')->name('blog.')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('list');
        Route::get('/create', [BlogController::class, 'create'])->name('create');
        Route::post('/store', [BlogController::class, 'store'])->name('store');
        Route::get('/{blog}/edit', [BlogController::class, 'edit'])->name('edit');
        Route::put('/{blog}/update', [BlogController::class, 'update'])->name('update');
        Route::delete('/{blog}/delete', [BlogController::class, 'destroy'])->name('delete');
    });


    Route::prefix('/user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('list');
        Route::delete('/delete', [UserController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/panduan')->name('panduan.')->group(function () {
        Route::get('/', [PanduanController::class, 'index'])->name('list');
        Route::get('/create', [PanduanController::class, 'create'])->name('create');
        Route::post('/store', [PanduanController::class, 'store'])->name('store');
        Route::get('/{panduan}/edit', [PanduanController::class, 'edit'])->name('edit');
        Route::post('/{panduan}/update', [PanduanController::class, 'update'])->name('update');
        Route::delete('/{panduan}/delete', [PanduanController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/paramedik')->name('paramedik.')->group(function () {
        Route::prefix('/kecamatan')->name('kecamatan.')->group(function () {
            Route::get('/create', [KecamatanController::class, 'create'])->name('create');
            Route::post('/create', [KecamatanController::class, 'store'])->name('create.post');
            Route::get('/edit/{id}', [KecamatanController::class, 'edit'])->name('edit');
            Route::put('/edit/{id}', [KecamatanController::class, 'update'])->name('edit.post');
            Route::delete('/edit/{id}', [KecamatanController::class, 'destroy'])->name('delete');
        });
        Route::get('/list', [ParamedikController::class, 'index'])->name('list');
        Route::get('/list/create', [ParamedikController::class, 'create'])->name('create');
        Route::post('/list/create', [ParamedikController::class, 'store'])->name('create.post');
        Route::get('/list/edit/{id}', [ParamedikController::class, 'edit'])->name('edit');
        Route::put('/list/edit/{id}', [ParamedikController::class, 'update'])->name('edit.post');
        Route::delete('/list/edit/{id}', [ParamedikController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/konsultasi')->name('konsultasi.')->group(function () {
        Route::get('/', function () {
            return view('admin.konsultasi.index');
        })->name('list');
    });
});
/*------------------------ End Route Admin ------------------------ */

/*------------------------ Route Profile ------------------------ */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/konsultasi', [KonsultasiController::class, 'index'])->name('konsultasi');
    Route::post('/konsultasi/create', [KonsultasiController::class, 'create'])->name('konsultasi.create');
    Route::get('/konsultasi/{chat}', [KonsultasiController::class, 'view'])->name('konsultasi.view');
    Route::post('/konsultasi/{chat}/post-message', [KonsultasiController::class, 'post_message'])->name('konsultasi.message.post');
    Route::get('/client-paramedik', [ShowParamedikController::class, 'index'])->name('frontend.paramdeik');

});
// Add a route that can load an image from storage based on a parameter
Route::get('/images/{imageName}', [ImageController::class, 'show'])->name('image.show');
/*------------------------ End Route Profile ------------------------ */

require __DIR__ . '/auth.php';

/*------------------------ Route Authenticated Dashboard ------------------------ */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*------------------------ End Route Authenticated Dashboard ------------------------ */
