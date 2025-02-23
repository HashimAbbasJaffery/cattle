<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ProfileController;
use App\Models\Age;
use App\Models\Animal;
use App\Models\Breed;
use App\Models\Event;
use Illuminate\Support\Facades\Route;

Route::get("/", function() {

    if(request()->expectsJson()) {
        $filters = [
            "keyword" => request()->keyword,
            "from" => request()->from,
            "to" => request()->to,
            "price" => [request()->from, request()->to],
            "breed" => request()->breed,
            "age" => request()->age,
            "gender" => request()->gender
        ];

        $animals = Animal::filter($filters)->paginate(8)->withQueryString();

        return $animals;
    }

    $animals = Animal::paginate(8);
    $breeds = Breed::get();
    $ages = Age::get();
    return view("index", compact("animals", "breeds", "ages"));
})->name("animals.listing");

Route::get("/breeds", function() {
    return Breed::get();
});

Route::get("/ages", function() {
    return Age::get();
});

Route::get("/admin/setting", function() {
    return view("admin.Setting.setting");
});

Route::get("/admin/categories", function() {
    $breeds = Breed::withCount("animals")->get();
    $ages = Age::withCount("animals")->get();
    return view("admin.Categories.index", compact("breeds", "ages"));
})->name('admin.categories');

Route::post("/admin/age/create", function() {
    $age = Age::create([
        "age" => request()->age
    ]);
    return $age;
})->name("age.create");
Route::post('/admin/breeds/create', function() {
    $breed = Breed::create([
        "breed" => request()->breed
    ]);
    return $breed;
});
Route::delete("/admin/breed/{breed}/delete", function(Breed $breed) {
    $breed->delete();
});
Route::delete("/admin/age/{age}/delete", function(Age $age) {
    $deleted_age = $age;
    $age->delete();
    return $deleted_age;
});
Route::put("/admin/age/{age}/update", function(Age $age) {
    $age = $age->update([
        "age" => request()->age
    ]);
    return $age;
});

Route::put("/admin/breed/{breed}/update", function(Breed $breed) {
    $bree = $breed->update([
        "breed" => request()->breed
    ]);
    return $breed;
});

Route::get("/admin/eid-events", function() {
    $events = Event::get();
    return view("admin.Events.index", compact("events"));
})->name("events");

Route::get('/admin/eid-events/create', function() {
    return view("admin.Events.create");
})->name("event.create");

Route::get("/admin/eid-events/{event}/edit", function(Event $event) {
    return view("admin.Events.edit", compact("event"));
})->name("event.edit");

Route::put("/admin/eid-events/{event}/update", function(Event $event) {
    $data = request()->validate([
        "event_year" => [ "required" ],
        "months" => [ "required" ],
        "percentage" => [ "required" ]
    ]);
    $event->update($data);
    return redirect()->route("events");
})->name("event.update");

Route::get("/admin/users", function() {
    $users = App\Models\User::get();
    return view("admin.Users.index", compact("users"));
})->name('admin.users');

Route::get("/admin/users/create", function() {
    return view("admin.Users.create");
})->name("user.create");

Route::post("/admin/user/create", function() {
    $data = request()->validate([
        "name" => [ "required" ],
        "email" => [ "required" ],
        "password" => [ "required" ],
        "role" => [ "required" ]
    ]);
    $user = App\Models\User::create($data);
    return to_route("admin.users");
})->name("user.store");

Route::delete("/admin/user/{user}/delete", function(App\Models\User $user) {
    $user->delete();
    return redirect()->route("admin.users");
})->name("user.delete");

Route::get("/admin/user/{user}/edit", function(App\Models\User $user) {
    return view("admin.Users.edit", compact("user"));
})->name("user.edit");

Route::put("/admin/user/{user}/update", function(App\Models\User $user) {
    $rules = [
        "name" => [ "required" ],
        "email" => [ "required" ],
        'role' => [ "required" ],
    ];
    if(request()->password) {
        $rules["password"] = [ "required" ];
    }
    $data = request()->validate($rules);
    $user->update($data);
    return to_route("admin.users");
})->name("user.update");

Route::post("admin/eid-events/store", function(Request $request) {
    $data = request()->validate([
        "event_year" => [ "required" ],
        "months" => [ "required" ],
        "percentage" => [ "required" ]
    ]);
    $event = Event::create($data);

    return to_route("events");
})->name("event.store");
Route::delete("/admin/eid-events/{event}/delete", function(Event $event) {
    $event->delete();
    return redirect()->route("events");
})->name("event.delete");


Route::get("/animal/{animal:slug}", [AnimalController::class, "index"])->name("animal.single");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
