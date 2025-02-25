<x-app-layout>
<div class="row" id="app">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Animal</h4>
                <form action="{{ route('admin.animals.create') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="name">Name</label>
                            <input type="text" v-model="name" class="form-control" name="name" id="name" placeholder="Name">
                        </div>
                        
                        <div class="form-group col-6">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" v-model="slug" name="slug" id="slug" placeholder="Slug">
                        </div>
                        <div class="form-group col-6">
                            <label for="email">Age</label>
                            <select class="form-control" name="age_id" style="height: 47px;">
                                @foreach($ages as $age)
                                    <option value="{{ $age->id }}">{{ $age->age }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="password">Breed</label>
                            <select class="form-control" name="breed_id" style="height: 47px;">
                                @foreach($breeds as $breed)
                                    <option value="{{ $breed->id }}">{{ $breed->breed }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="live_weight">Live Weight</label>
                            <input type="text" class="form-control" name="live_weight" id="live_weight" placeholder="Live Weight">
                        </div>
                        <div class="form-group col-6">
                            <label for="role">Gender</label>
                            <select class="form-control" style="height: 47px;" name="gender" id="role">
                                <option value="1">Male</option>
                                <option value="0" selected>Female</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="role">Availability</label>
                            <select class="form-control" style="height: 47px;" name="availability" id="availability">
                                <option value="1" selected>Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="maintenance_fee">Maintenance Fee</label>
                            <input type="text" class="form-control" name="maintenance_fee" id="maintenance_fee" placeholder="Maintenance Fee">
                        </div>
                        <div class="form-group col-6">
                            <label for="price">Price</label>
                            <input type="text" v-model="price" class="form-control" name="price" id="price" placeholder="Price">
                        </div>
                        <div class="form-group col-6">
                            <label for="price">Price to Be Displayed</label>
                            <input type="text" class="form-control" v-model="displayed_price" name="price_to_be_displayed" id="price" placeholder="Price to be displayed to User" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const app = Vue.createApp({
        data() {
            return {
                name: "",
                slug: "",
                price: 0,
                displayed_price: 0
            }
        },
        watch: {
            name() {
                this.slug = this.name.toLowerCase().trim().replace(/[^a-z0-9 -]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-');
            },
            price() {
                if(parseInt(this.price) <= 100000) {
                    this.displayed_price = this.price * 2;
                } else {
                    this.displayed_price = this.price * 1.4;
                }
            }
        }
    }).mount("#app")
</script>
</x-app-layout>
