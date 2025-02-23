<x-app-layout>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Event</h4>
                <form action="{{ route('event.update', [ 'event' => $event->id ]) }}" method="POST">
                    @csrf
                    {{   method_field('PUT') }}
                    <div class="form-group">
                        <label for="event-year">Event Year</label>
                        <input type="text" class="form-control" name="event_year" value="{{ $event->event_year }}" id="event-year" placeholder="Event Year">
                    </div>
                    <div class="form-group">
                        <label for="months">Months</label>
                        <input type="text" class="form-control" name="months" value="{{ $event->months }}" id="months" placeholder="Months">
                    </div>
                    <div class="form-group">
                        <label for="percentage">Percentage</label>
                        <input type="text" class="form-control" id="percentage" value="{{ $event->percentage }}" name="percentage" placeholder="Percentage">
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
