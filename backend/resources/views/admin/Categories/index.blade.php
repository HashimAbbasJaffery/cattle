<x-app-layout>
    <div id="app">
    <div class="page-header">
        <h3 class="page-title"> Breeds </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <div style="display: flex; justify-content: space-between;">
                    <h4 class="card-title">Breed List</h4>
                    <button class="btn-info btn-sm" @click="createBreed">Create New Breed</button>
                </div>
              <table class="table">
                <thead>
                  <tr>
                    <th>Breed</th>
                    <th>Total Animals</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    <tr v-for="breed in breeds">
                        <td v-text="breed.breed"></td>
                        <td v-text="breed.animals_count"></td>
                        <td>
                            <button class="btn btn-primary btn-sm" style="margin-right: 10px;">Update</button>
                            <button class="btn btn-danger btn-sm" @click="deleteBreed(breed.id)">Delete</button>
                        </td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <div style="display: flex; justify-content: space-between;">
                    <h4 class="card-title">Ages List</h4>
                    <button class="btn-info btn-sm" @click="createAge">Create New Age</button>
                </div>
              <table class="table">
                <thead>
                  <tr>
                    <th>Breed</th>
                    <th>Total Animals</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                        
                    <tr v-for="age in ages">
                        <td v-text="age.age"></td>
                        <td v-text="age.animals_count"></td>
                        <td>
                            <button class="btn btn-primary btn-sm" @click="updateAge(age.age, age.id)" style="margin-right: 10px;">Update</button>
                            <button class="btn btn-danger btn-sm" @click="deleteAge(age.id)">Delete</button>
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
                ages: JSON.parse('{!! $ages !!}'),
                breeds: JSON.parse('{!! $breeds !!}')
              }
            },
            mounted() {
              
            },
            methods: {
                createAge() {
                  Swal.fire({
                    title: "Submit Age",
                    input: "text",
                    inputAttributes: {
                      autocapitalize: "off"
                    },
                    showCancelButton: true,
                    confirmButtonText: "Create",
                    showLoaderOnConfirm: true,
                    preConfirm: async (age) => {
                      return age;
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                  }).then(async (result) => {
                    if (result.isConfirmed) {
                      const age = result.value;
                      const response = await axios.post('/admin/age/create', { age });
                      this.ages.push(response.data);
                    }
                  });
                },
                createBreed() {
                  Swal.fire({
                    title: "Submit Breed",
                    input: "text",
                    inputAttributes: {
                      autocapitalize: "off"
                    },
                    showCancelButton: true,
                    confirmButtonText: "Create",
                    showLoaderOnConfirm: true,
                    preConfirm: async (breed) => {
                      return breed;
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                  }).then(async (result) => {
                    if (result.isConfirmed) {
                      const breed = result.value;
                      const response = await axios.post('/admin/breeds/create', { breed });
                      this.breeds.push(response.data);
                    }
                  });
                },
                deleteBreed(id) {
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
                        const response = await axios.post(`/admin/breed/${id}/delete`, { _method: "DELETE" });
                        this.breeds = this.breeds.filter(breed => breed.id != id);
                      }
                    });
                },
                deleteAge(id) {
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
                        const response = await axios.post(`/admin/age/${id}/delete`, { _method: "DELETE" });
                        this.ages = this.ages.filter(age => age.id != response.data.id);
                      }
                    });
                },
                updateAge(age, id) {
                  Swal.fire({
                    title: "Update Age",
                    input: "text",
                    inputValue: age,
                    inputAttributes: {
                      autocapitalize: "off"
                    },
                    showCancelButton: true,
                    confirmButtonText: "Create",
                    showLoaderOnConfirm: true,
                    allowOutsideClick: () => !Swal.isLoading()
                  }).then(async (result) => {
                    if (result.isConfirmed) {
                      const age = result.value;
                      const response = await axios.post(`/admin/age/${id}/update`, { age, _method: "PUT" });
                      const age_filter = this.ages.filter(age => age.id == id);
                      age_filter[0].age = age;
                    }
                  });
                }
            }
        }).mount("#app");
    </script>
</x-app-layout>