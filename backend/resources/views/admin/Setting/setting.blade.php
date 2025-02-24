<x-app-layout>
    <h1>Settings</h1>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Settings</h4>
                    <form action="{{ route('setting.update') }}" method="POST">
                        <input type="hidden" name="_token" value="UmIppHB4z6ogiM9itfIecbrXyRkuYK99zhbG9d7N" autocomplete="off">                    <div class="form-group">
                            <label for="if_less_than_100k">Addition if price is less than 100k</label>
                            <input type="text" value="{{ $setting->add_if_less_than_criteria }}" class="form-control" name="add_if_less_than_criteria" id="if_less_than_100k">
                        </div>
                        <div class="form-group">
                            <label for="if_above_100k">Addition if above 100k</label>
                            <input type="text" class="form-control" value="{{ $setting->add_if_above_criteria }}" name="add_if_above_criteria" id="if_above_100k">
                        </div>
                        <div class="form-group">
                            <label for="price_per_km">Price Per Kilometer</label>
                            <input type="text" class="form-control" value="{{ $setting->price_per_km }}" name="price_per_km" id="price_per_km">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>