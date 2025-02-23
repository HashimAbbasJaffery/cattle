<x-app-layout>
    <div id="app">
    <h1>Users</h1>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div style="display: flex; justify-content: space-between;">
                        <h4 class="card-title">Users List</h4>
                        <a href="{{ route('user.create') }}" style="text-decoration: none;" class="btn-info btn-sm" >Create New User</a>
                    </div>
                    <table class="table" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in users" :key="user.id">
                            <td v-text="user.name"></td>
                            <td v-text="user.email"></td>
                            <td v-text="user.role"></td>
                            <td>
                                <a :href="`/admin/user/${user.id}/edit`" class="btn btn-primary btn-sm" style="margin-right: 10px;">Update</a>
                                <button @click="deleteUser(user.id)" class="btn btn-danger btn-sm" style="margin-right: 10px;">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        const app = Vue.createApp({
            data() {
                return {
                    users: JSON.parse('{!! $users !!}')
                }
            },
            methods: {
                deleteUser(id) {
                    const swalWithBootstrapButtons = Swal.mixin({
                      customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger"
                      },
                      buttonsStyling: false
                    });
                    swalWithBootstrapButtons.fire({
                      title: "Are you sure?",
                      text: "You won't be able to revert this!",
                      icon: "warning",
                      showCancelButton: true,
                      confirmButtonText: "Yes, delete it!",
                      cancelButtonText: "No, cancel!",
                      reverseButtons: true
                    }).then(async (result) => {
                      if (result.isConfirmed) {

                            const response = await axios.post(`/admin/user/${id}/delete`, { _method: "DELETE" });
                            this.users = this.users.filter(user => user.id != id);
                        }
                    });
                }
            }
        }).mount("#app")
    </script>
</x-app-layout>
