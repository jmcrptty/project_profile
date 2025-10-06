<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

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
    


require __DIR__.'/auth.php';
