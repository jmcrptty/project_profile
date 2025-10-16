<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FotoGaleriController;


use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('main');
});

Route::get('/', [PageController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () {

    // Main Dashboard
    Route::get('/dashboard', function () {
        // Get gallery photos (latest 4)
        $galleryPhotos = \App\Models\FotoGaleri::latest()->take(4)->get();

        // Get dosen (latest 4)
        $dosens = \App\Models\About::dosen()->take(4)->get();

        // Get mahasiswa (latest 4)
        $mahasiswas = \App\Models\About::mahasiswa()->take(4)->get();

        // Get mitra (latest 4)
        $mitras = \App\Models\About::mitra()->take(4)->get();

        // Total counts
        $totalGalleryPhotos = \App\Models\FotoGaleri::count();
        $totalDosens = \App\Models\About::dosen()->count();
        $totalMahasiswas = \App\Models\About::mahasiswa()->count();
        $totalMitras = \App\Models\About::mitra()->count();

        return view('dashboard.main', compact(
            'galleryPhotos',
            'dosens',
            'mahasiswas',
            'mitras',
            'totalGalleryPhotos',
            'totalDosens',
            'totalMahasiswas',
            'totalMitras'
        ));
    })->name('dashboard');

    // About Section Management
    Route::prefix('dashboard/about')->name('about.')->group(function () {
        Route::get('/', [\App\Http\Controllers\AboutController::class, 'edit'])->name('index');
    });

    // Admin About Routes
    Route::prefix('admin/about')->name('admin.about.')->middleware('auth')->group(function () {
        // Background
        Route::put('/background', [\App\Http\Controllers\AboutController::class, 'updateBackground'])->name('background.update');

        // Goals
        Route::put('/goals', [\App\Http\Controllers\AboutController::class, 'updateGoals'])->name('goals.update');

        // Dosen
        Route::post('/dosen', [\App\Http\Controllers\AboutController::class, 'storeDosen'])->name('dosen.store');
        Route::put('/dosen/{id}', [\App\Http\Controllers\AboutController::class, 'updateDosen'])->name('dosen.update');
        Route::delete('/dosen/{id}', [\App\Http\Controllers\AboutController::class, 'destroyDosen'])->name('dosen.destroy');

        // Mahasiswa
        Route::post('/mahasiswa', [\App\Http\Controllers\AboutController::class, 'storeMahasiswa'])->name('mahasiswa.store');
        Route::put('/mahasiswa/{id}', [\App\Http\Controllers\AboutController::class, 'updateMahasiswa'])->name('mahasiswa.update');
        Route::delete('/mahasiswa/{id}', [\App\Http\Controllers\AboutController::class, 'destroyMahasiswa'])->name('mahasiswa.destroy');

        // Mitra
        Route::put('/mitra', [\App\Http\Controllers\AboutController::class, 'updateMitra'])->name('mitra.update');
    });

    // Hero Section Management
Route::prefix('dashboard/home')->middleware('auth')->name('home.')->group(function () {
    Route::get('/', function () {
        return view('dashboard.home');
    })->name('index');
    
    Route::put('/update', function () {
        // Nanti tambahkan logic save ke database
        return redirect()->route('home.index')
            ->with('success', 'Home section updated successfully!');
    })->name('update');
});

// Home Section Routes
    Route::prefix('home')->name('home.')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('index');
        Route::post('/media', [HomeController::class, 'updateMedia'])->name('media');
        Route::post('/subtitle', [HomeController::class, 'updateSubtitle'])->name('subtitle');
        Route::post('/title', [HomeController::class, 'updateTitle'])->name('title');
        Route::post('/description', [HomeController::class, 'updateDescription'])->name('description');
        Route::post('/button', [HomeController::class, 'updateButton'])->name('button');
        Route::delete('/delete-image', [HomeController::class, 'deleteImage'])->name('deleteImage');
    });


     Route::prefix('dashboard/gallery')->middleware('auth')->name('gallery.')->group(function () {
    Route::get('/', function () {
        return view('dashboard.gallery');
    })->name('index');
    
    Route::post('/store', function () {
        return redirect()->route('gallery.index')
            ->with('success', 'Photo added successfully!');
    })->name('store');
    
    Route::put('/video', function () {
        return redirect()->route('gallery.index')
            ->with('success', 'Video updated successfully!');
    })->name('updateVideo');
    
    Route::delete('/{id}', function ($id) {
        return redirect()->route('gallery.index')
            ->with('success', 'Photo deleted successfully!');
    })->name('destroy');
});

    Route::prefix('dashboard/gallery')->middleware('auth')->name('gallery.')->group(function () {

        Route::get('/', [GaleriController::class, 'index'])->name('index');

        // resource controller galeri foto
        Route::resource('foto-galeri', FotoGaleriController::class)->except([
            'create', 'store', 'show', 'edit', 'destroy'
        ]);
    });


 Route::prefix('dashboard/contact')->middleware('auth')->name('contact.')->group(function () {
    Route::get('/', function () {
        return view('dashboard.contact');
    })->name('index');

    });

     Route::prefix('dashboard/code')->middleware('auth')->name('code.')->group(function () {
    Route::get('/', [\App\Http\Controllers\CodeController::class, 'index'])->name('index');
    Route::put('/arduino', [\App\Http\Controllers\CodeController::class, 'updateArduino'])->name('arduino.update');
    Route::put('/python', [\App\Http\Controllers\CodeController::class, 'updatePython'])->name('python.update');
    Route::put('/github', [\App\Http\Controllers\CodeController::class, 'updateGithub'])->name('github.update');
    Route::put('/hardware', [\App\Http\Controllers\CodeController::class, 'updateHardware'])->name('hardware.update');
    Route::put('/software', [\App\Http\Controllers\CodeController::class, 'updateSoftware'])->name('software.update');
    });
Route::prefix('dashboard/contact')->middleware('auth')->name('contact.')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::post('/heading', [ContactController::class, 'updateHeading'])->name('heading');
    Route::post('/phone', [ContactController::class, 'updatePhone'])->name('phone');
    Route::post('/address', [ContactController::class, 'updateAddress'])->name('address');
    Route::post('/map', [ContactController::class, 'updateMap'])->name('map');
    Route::post('/institution', [ContactController::class, 'updateInstitution'])->name('institution');
});
    
    // Contact Section Management
    Route::prefix('contact')->name('contact.')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::post('/heading', [ContactController::class, 'updateHeading'])->name('heading');
        Route::post('/phone', [ContactController::class, 'updatePhone'])->name('phone');
        Route::post('/address', [ContactController::class, 'updateAddress'])->name('address');
        Route::post('/map', [ContactController::class, 'updateMap'])->name('map');
        Route::post('/institution', [ContactController::class, 'updateInstitution'])->name('institution');
});



    Route::prefix('home')->name('home.')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('index');
        Route::get('/edit', [HomeController::class, 'edit'])->name('edit');
        Route::put('/', [HomeController::class, 'update'])->name('update');
        Route::delete('/delete-image', [HomeController::class, 'deleteImage'])->name('deleteImage');
    });

    });

require __DIR__.'/auth.php';
