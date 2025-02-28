<x-app-layout>
    <div id="app">
    <h1>Animals</h1>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div style="display: flex; justify-content: space-between;">
                        <h4 class="card-title">Animals List</h4>
                        @if(auth()->user()->role === "admin")
                            <a href="{{ route('animal.create') }}" style="text-decoration: none;" class="btn-info btn-sm" >Create New Animal</a>
                        @endif
                    </div>
                    <input type="text" v-model="keyword" class="form-control" style="width: 30%;" placeholder="Search Animal" />
                    <table class="table" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Breed</th>
                            <th>Age</th>
                            <th>Price</th>
                            <th>Availability</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="animal in animals" :key="animal.id">
                            <td v-text="animal.cow_id"></td>
                            <td v-text="animal.name"></td>
                            <td v-text="animal.breed.breed"></td>
                            <td v-text="animal.age.age"></td>
                            <td v-text="(animal.price <= 100000 ? animal.price * 2 : animal.price).toLocaleString('en-US') + ' RS'"></td>
                            <td v-text="animal.availability == '1' ? 'Available' : 'Sold'"></td>
                            <td>
                                <a :href="`/admin/animal/${animal.id}/update`" class="btn btn-primary btn-sm" style="margin-right: 10px;">Update</a>
                                @if(auth()->user()->role === "admin")
                                    <button class="btn btn-danger btn-sm" @click="killAnimal(animal.id)" style="margin-right: 10px;">Delete</button>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
                <nav aria-label="Page navigation example" style="padding-left: 30px;">
                    <ul class="pagination">
                        <li class="page-item" :class="{ 'active': link.active }" v-for="link in links" @click="changePage(link.url)"><a class="page-link" href="#" v-html="link.label"></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        const app = Vue.createApp({
            data() {
                return {
                    animals: [],
                    links: [],
                    keyword: ""
                }
            },
            async mounted() {
                const response = await axios.get("/admin/animals/get");
                this.animals = response.data.data;
                this.links = response.data.links;
            },
            watch: {
                async keyword(newValue) {
                    const response = await axios.get(`/admin/animals/get?keyword=${newValue}`);
                    const data = response.data.data;
                    this.animals = data;
                }
            },
            methods: {
                async changePage(url) {
                    const response = await axios.get(url);
                    this.animals = response.data.data;
                    this.links = response.data.links;
                    console.log(this.links);
                },
                killAnimal(id) {
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
                            const response = await axios.post(`/admin/animal/${id}/delete`, { _method: "DELETE" });
                            this.animals = this.animals.filter(animal => animal.id != id);
                        }
                    });
                }
            }
        }).mount("#app")
    </script>
</x-app-layout>
