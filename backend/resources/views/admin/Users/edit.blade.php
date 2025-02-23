<x-app-layout>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update User</h4>
                <form action="{{ route('user.update', [ 'user' => $user->id ]) }}" method="POST">
                    @csrf
                    {{  method_field('PUT') }}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="{{ $user->name }}" class="form-control" name="name" id="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" value="{{ $user->email }}" class="form-control" name="email" id="email" placeholder="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" name="role" id="role">
                            <option value="admin" @selected($user->role === 'admin')>Admin</option>
                            <option value="editor" @selected($user->role === 'editor')>Editor</option>
                        </select>
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
