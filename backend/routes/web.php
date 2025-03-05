<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ProfileController;
use App\Models\Age;
use App\Models\Animal;
use App\Models\Breed;
use App\Models\Event;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get("/", function() {

    if(request()->expectsJson()) {
        $filters = [
            "keyword" => request()->keyword,
            "from" => request()->from,
            "to" => request()->to,
            "price" => [request()->from, request()->to],
            "breed" => is_array(json_decode(request()->breed)) ? json_decode(request()->breed) : request()->breed,
            "age" => is_array(json_decode(request()->age)) ? json_decode(request()->age) : request()->age,
            "gender" => is_array(json_decode(request()->gender)) ? json_decode(request()->gender) : request()->gender
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


Route::middleware('auth')->group(function () {
    Route::get("/admin/setting", function() {
        $setting = App\Models\Setting::first();
        return view("admin.Setting.setting", compact("setting"));
    })->name("admin.settings");
    
    Route::post("/admin/setting/update", function() {
        $data = request()->validate([
            "add_if_less_than_criteria" => [ "required" ],
            "add_if_above_criteria" => [ "required" ],
        ]);
        $setting = (Setting::first())->update($data);
        return back();
    })->name("setting.update");
    
    Route::get("/admin/categories", function() {
        $breeds = Breed::withCount("animals")->get();
        $ages = Age::withCount("animals")->get();
        return view("admin.Categories.index", compact("breeds", "ages"));
    })->name('admin.categories');
    
    
    Route::get("/admin/animals/get", function() {
        $keyword = request()->keyword;
        $animals = Animal::when(isset($keyword) ?? false,function($query) use ($keyword){
                                $query->whereLike("name", "%$keyword%")
                                        ->orWhere("cow_id", $keyword);
                            })
                            ->paginate(8)
                            ->withQueryString();
        return $animals;
    });
    
    Route::get("/admin/animals", function() {
        $animals = Animal::with(["age", "breed"])->paginate(8);
        return view("admin.Animals.index", compact("animals"));
    })->name("admin.animals");
    
    Route::get("/admin/animals/create", function() {
        $settings = Setting::first();
        $ages = Age::get();
        $breeds = Breed::get();
        return view("admin.Animals.create", compact("ages", "breeds", "settings"));
    })->name("animal.create");
    
    Route::post("/admin/animals/create", function(Request $request) {
        $data = request()->validate([
            "cow_id" => [ "required" ],
            "name" => [ "required" ],
            "slug" => [ "required" ],
            "age_id" => [ "required" ],
            "breed_id" => [ "required" ],
            "live_weight" => [ "required" ],
            "gender" => [ "required" ],
            "availability" => [ "required" ],
            "maintenance_fee" => [ "required" ],
            "price" => [ "required" ],
            "displayed_price" => [ "required" ],
            "front_image" => [ "required" ],
            "back_image" => [ "required" ]
        ]);
    
        $image = request()->file('front_image');
        $filename = time() . '_' . $image->getClientOriginalName();
        $front_image = $image->storeAs('uploads', $filename, 'public');
      
        $image = request()->file('back_image');
        $filename = time() . '_' . $image->getClientOriginalName();
        $back_image = $image->storeAs('uploads', $filename, 'public');
    
        Animal::create([ ...$data, "front_image" => $front_image, "back_image" => $back_image ]);
        return to_route("admin.animals");
    })->name("admin.animals.create");
    
    Route::delete("/admin/animal/{animal}/delete", function(Animal $animal) {
        $animal->delete();
    });
    
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
    
    Route::get("/admin/animal/{animal}/update", function(Animal $animal) {
        $settings = Setting::first();
        $ages = Age::get();
        $breeds = Breed::get();
        $animal->load(["age", "breed"]);
        return view("admin.Animals.edit", compact("ages", "breeds", "animal", "settings"));
    });
    
    Route::put("/admin/animal/{animal}/update", function(Animal $animal) {
        if(auth()->user()->role === "admin") {
            $rules = [
                "cow_id" => [ "required" ],
                "name" => [ "required" ],
                "slug" => [ "required" ],
                "age_id" => [ "required" ],
                "breed_id" => [ "required" ],
                "live_weight" => [ "required" ],
                "gender" => [ "required" ],
                "availability" => [ "required" ],
                "maintenance_fee" => [ "required" ],
                "price" => [ "required" ],
                "front_image" => [ "required" ],
                "back_image" => [ "required" ]
            ];
        } else {
            $rules = [
                "age_id" => [ "required" ],
                "price" => [ "required" ],
                "live_weight" => [ "required" ]
            ];
        }
        $data = request()->validate($rules);
        if(auth()->user()->role === "admin") {
            $image = request()->file('front_image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $front_image = $image->storeAs('uploads', $filename, 'public');
          
            $image = request()->file('back_image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $back_image = $image->storeAs('uploads', $filename, 'public');
            $animal->update([ ...$data, "front_image" => $front_image, "back_image" => $back_image ]);
        } else {
            $animal->update($data);
        }
    
        return to_route("admin.animals");
    })->name("admin.animals.update");
    
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
});


Route::get("/test", function() {
    dd(auth()->id());
});

Route::get("/admin/login", function() {
    return view("admin.Auth.login");
})->name("admin.login");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
