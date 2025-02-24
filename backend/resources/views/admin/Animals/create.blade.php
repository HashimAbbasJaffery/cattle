<x-app-layout>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create User</h4>
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                        </div>
                        
                        <div class="form-group col-6">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug">
                        </div>
                        <div class="form-group col-6">
                            <label for="email">Age</label>
                            <select class="form-control" style="height: 47px;">
                                @foreach($ages as $age)
                                    <option value="{{ $age->id }}">{{ $age->age }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="password">Breed</label>
                            <select class="form-control" style="height: 47px;">
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
                            <select class="form-control" style="height: 47px;" name="role" id="role">
                                <option value="1">Male</option>
                                <option value="0" selected>Female</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="role">Availability</label>
                            <select class="form-control" style="height: 47px;" name="role" id="role">
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
                            <input type="text" class="form-control" name="price" id="price" placeholder="Price">
                        </div>
                        <div class="form-group col-6">
                            <label for="price">Price to Be Displayed</label>
                            <input type="text" class="form-control" name="price" id="price" placeholder="Price to be displayed to User" readonly>
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
</x-app-layout>
