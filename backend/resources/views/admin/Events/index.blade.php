<x-app-layout>
    <div id="app">
    <h1>Events</h1>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div style="display: flex; justify-content: space-between;">
                        <h4 class="card-title">Events List</h4>
                        <a href="{{ route('event.create') }}" style="text-decoration: none;" class="btn-info btn-sm" >Create New Event</a>
                    </div>
                    <table class="table" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Eid Year</th>
                            <th>Months</th>
                            <th>Percentage</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="event in events" :key="event.id">
                            <td v-text="event.event_year"></td>
                            <td v-text="event.months"></td>
                            <td v-text="event.percentage"></td>
                            <td>
                                <a :href="`/admin/eid-events/${event.id}/edit`" class="btn btn-primary btn-sm" style="margin-right: 10px;">Update</a>
                                <button @click="deleteEvent(event.id)" class="btn btn-danger btn-sm" style="margin-right: 10px;">Delete</button>
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
                    events: JSON.parse('{!! $events !!}')
                }
            },
            mounted() {
                console.log(this.events);
            },
            methods: {
                deleteEvent(id) {
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

                            const response = await axios.post(`/admin/eid-events/${id}/delete`, { _method: "DELETE" });
                            this.events = this.events.filter(event => event.id != id);
                        }
                    });
                }
            }
        }).mount("#app")
    </script>
</x-app-layout>
