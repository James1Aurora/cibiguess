# Cara CRUD CibiGuess

Ini cara bikin CRUD di CibiGuess dengan framework Laravel 11

## 1. Siapkan Controller

```bash
php artisan make:controller {namaController}
```

Nah isinya bakal kayak berikut, cuman ada fungsi index

```php
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Illuminate\View\view;

class MainController extends Controller
{
    public function index()
    {
        //
    }
}
```

Kalo mau lebih gampang bikin file controller di folder:

```
/app/Http/Controllers/NamaController.php
```

Terus copy kode berikut:

```php
<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
```

## 2. Model (baca dulu)

Nah untuk model itu berperan untuk berinteraksi ke data base, jadi lu ga perlu ubah-ubah model, cukup main di CONTROLLER sama VIEWS aja cukup.

## 3. Bikin read data

-   Bikin file view di folder

```
/resources/views/namaFile.php
```

Atau mau bikin folder dulu jadi gini:

```
/resources/views/namaFolder/namaFile.php
```

-   Tambahin routenya di file web.php

```php
<?php

use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;
// CONTROLLER
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;

// TAMBAHIN DISINI, URLNYA, NAMA CONTROLLERNYA dan NAMA FUNGSINYA
Route::get('/badge', [BadgeController::class, 'index']);
```

-   Nah di file controller tambahin kode untuk kirim data ke view

```php
public function index()
{
    // Nah ini contoh dapetin data ke database
    // nah all() itu berarti ngambil semua data di table Badge
    // nah BADGE itu model yang ada di file:
    // /app/Models/NamaModel.php, contohnya Badge.php
    // ada banyak contoh buat dapetin data, misalnya
    // Badge::all(), Badge::findOrFail(1 atau id), Badge::all()->limit(5)
    // Dan lainnya, baca aja didokumentasi atau chatGPT
    $badges = Badge::all();

    // ini dibaca dari dalam folder views, nah kalo misalnya:
    // File lu ada di /resources/views/form/index
    // maka nanti jadi "form.index"
    return view('folder.file', compact('badges'));
}
```

-   Terus setelah itu di viewnya ditangkap datanya, dan ditampilin, gini contohnya:

```html
<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($badges as $badge)
        <tr>
            <th>{{ $loop->iteration }}</th>
            <td>{{ $badge->title }}</td>
            <td>{{ $badge->description }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
```

## 4. Tambah atau Insert data

-   Tambahin fungsi buat dapetin data untuk tambah data

```php
public function tambah()
{
    return view('badge.tambah');
}

public function tambahSimpan(Request $request)
{
    // BUAT VALIDASI
    $request->validate([
        'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    // INI BUAT NYIMPEN GAMBAR, KALAU DATANYA ADA GAMBAR
    $image = $request->file('image');
    $image->storeAs('public/badges', $image->hashName());

    // NAH INI BARU DISIMPEN DATANYA
    // KALAU SQLNYA ITU KAYAK INSERT INTO VALUES() GITU
    Badge::create([
        'image' => $image->hashName(),
        'title' => $request->title,
        'description' => $request->description,
    ]);

    // NAH KETIKA UDAH SELESAI LANGSUNG DIARAHIN KE ROUTE ATAU URL SELANJUTNYA
    return redirect()->route('badge')->with('success', 'Badge created successfully');
    // ATAU
    return redirect()->url('/badge')->with('success', 'Badge created successfully');
}
```

-   Bikin file view di folder

```
/resources/views/tambahBadge.php
```

Atau mau bikin folder dulu jadi gini:

```
/resources/views/badge/tambah.php
```

-   Tambahin routenya di file web.php

```php
<?php

use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;
// CONTROLLER
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;

Route::get('/badge', [BadgeController::class, 'index']);
// TAMBAHIN DISINI, URLNYA, NAMA CONTROLLERNYA dan NAMA FUNGSINYA
// KENAPA ADA GET DAN POST, KARENA GET ITU UNTUK VIEW FORMNYA
// POST ITU UNTUK NANGKEP DATANYA DAN DISIMPEN DI DATABASE
Route::get('/badge/tambah', [BadgeController::class, 'tambah']);
Route::post('/badge/tambah', [BadgeController::class, 'tambah']);
```

-   Bikin contoh filenya gini untuk tambah data
-   Coba lu belajar error handling, cetak session

```
@extends('layouts.clear')

@section('title', 'Home')

@section('content')
<div class="container mt-5">
    <h1>Tambah Badge</h1>

    <!-- Menampilkan pesan sukses jika ada -->
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Menampilkan error validasi -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form
        action="{{ route('badge.tambahSimpan') }}"
        method="POST"
        <!-- TAMBAHIN ENCTPY KALO ADA INPUTAN TIPE "FILE" -->
        enctype="multipart/form-data"
    >
        <!-- JANGAN LUPA NARO "CSRF" -->
        @csrf
        <div class="form-group">
            <label for="image">Image</label>
            <input
                type="file"
                class="form-control"
                id="image"
                name="image"
                required
            />
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input
                type="text"
                class="form-control"
                id="title"
                name="title"
                value="{{ old('title') }}"
                required
            />
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea
                class="form-control"
                id="description"
                name="description"
                rows="3"
                required
            >
{{ old('description') }}</textarea
            >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
```

## 5. Ubah atau Update data

-   Tambahin fungsi buat dapetin id data dan data yang bakal diubah

```php
public function ubah()
{
    return view('badge.ubah');
}

public function ubahSimpan(Request $request, string $id)
{
    // NAH HARUS NYERTAIN ID BIAR BISA DICEK APAKAH DATANYA ADA
    $badge = Badge::findOrFail($id);

    $request->validate([
        'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        // Add validation rules for other fields if needed
    ]);

    // INI BUAT NGECEK KALO ADA DATA GAMBAR ATO NGGAK
    if ($request->hasFile('image')) {
        //upload new image
        $image = $request->file('image');
        $image->storeAs('public/badges', $image->hashName());

        //delete old image
        Storage::delete('public/badges/'.$badge->image);

        // INI BUAT NYIMPEN DATANYA
        $badge->update([
            'image' => $image->hashName(),
            'title' => $request->title,
            'description' => $request->description,
        ]);
    } else {
        // INI BUAT NYIMPEN DATANYA
        $badge->update([
            'title' => $request->title,
            'description' => $request->description,

        ]);
    }

    // NAH KETIKA UDAH SELESAI LANGSUNG DIARAHIN KE ROUTE ATAU URL SELANJUTNYA
    return redirect()->route('badge')->with('success', 'Badge created successfully');
    // ATAU
    return redirect()->url('/badge')->with('success', 'Badge created successfully');
}
```

-   Bikin file view di folder

```
/resources/views/ubahBadge.php
```

Atau mau bikin folder dulu jadi gini:

```
/resources/views/badge/ubah.php
```

-   Tambahin routenya di file web.php

```php
<?php

use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;
// CONTROLLER
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;

Route::get('/badge', [BadgeController::class, 'index']);
// TAMBAHIN DISINI, URLNYA, NAMA CONTROLLERNYA dan NAMA FUNGSINYA
// KENAPA ADA GET DAN POST, KARENA GET ITU UNTUK VIEW FORMNYA
// POST ITU UNTUK NANGKEP DATANYA DAN DISIMPEN DI DATABASE
Route::get('/badge/tambah', [BadgeController::class, 'tambah']);
Route::post('/badge/tambah', [BadgeController::class, 'tambahSimpan']);
Route::get('/badge/ubah/{id}', [BadgeController::class, 'ubah']);
Route::post('/badge/ubah', [BadgeController::class, 'ubahSimpan']);
```

-   Bikin contoh filenya gini untuk tambah data

```
@extends('layouts.clear')

@section('title', 'Home')

@section('content')
<div class="container mt-5">
    <h1>Ubah Badge</h1>

    <!-- Menampilkan pesan sukses jika ada -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Menampilkan error validasi -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('badge.ubahSimpan', $badge->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $badge->title) }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $badge->description) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
```

## 6. Hapus atau Delete data

-   Tambahin fungsi buat dapetin data id datanya, misalnya id badge

```php
public function hapus(string $id)
{
    // NAH HARUS NYERTAIN ID BIAR BISA DICEK APAKAH DATANYA ADA
    $badge = Badge::findOrFail($id);

    // INI BUAT NGEHAPUS GAMBAR KALO DATA DI DATABSE PUNYA GAMBAR, TAPI BISA LU HAPUS AJAA BARI STORAGE DELETE INI KALO DATANYA GAK ADA GAMBAR
    Storage::delete('public/badges/'.$badge->image);
    // NAH INI BARU DELETE DATANYA PAKE KODE KEK GITU
    $badge->delete();

    // NAH KETIKA UDAH SELESAI LANGSUNG DIARAHIN KE ROUTE ATAU URL SELANJUTNYA
    return redirect()->route('badge')->with('success', 'Badge created successfully');
    // ATAU
    return redirect()->url('/badge')->with('success', 'Badge created successfully');
}
```

-   Tambahin routenya di file web.php

```php
<?php

use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;
// CONTROLLER
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;

Route::get('/badge', [BadgeController::class, 'index']);
// TAMBAHIN DISINI, URLNYA, NAMA CONTROLLERNYA dan NAMA FUNGSINYA
// KENAPA ADA GET DAN POST, KARENA GET ITU UNTUK VIEW FORMNYA
// POST ITU UNTUK NANGKEP DATANYA DAN DISIMPEN DI DATABASE
Route::get('/badge/tambah', [BadgeController::class, 'tambah']);
Route::post('/badge/tambah', [BadgeController::class, 'tambahSimpan']);
Route::get('/badge/ubah/{id}', [BadgeController::class, 'ubah']);
Route::post('/badge/ubah', [BadgeController::class, 'ubahSimpan']);
Route::delete('/badge/delete/{id}', [BadgeController::class, 'hapus']);
```

## 7. Hal yang perlu dipelajar atau searching di chatGPT

-   Belajar collections

https://laravel.com/docs/11.x/eloquent-collections

https://laravel.com/docs/11.x/collections
