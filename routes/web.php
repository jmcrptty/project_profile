<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FotoGaleriController;

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
        return view('dashboard.main');
    })->name('dashboard');

    // About Section Management (View Only - No Controller)
    Route::prefix('dashboard/about')->name('about.')->group(function () {
        
        // Index - Overview/Preview About Section
        Route::get('/', function () {
            return view('dashboard.about');
        })->name('index');
        
        // // Edit - Form untuk edit About Section
        // Route::get('/edit', function () {
        //     return view('dashboard.about.edit');
        // })->name('edit');
        
        // // Update - Proses update (nanti bisa ditambahkan logic)
        // Route::put('/update', function () {
        //     // Nanti tambahkan logic untuk save ke database
        //     return redirect()->route('about.index')
        //         ->with('success', 'About section updated successfully!');
        // })->name('update');
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
    Route::get('/', function () {
        return view('dashboard.code');
    })->name('index');

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

require __DIR__.'/auth.php';
