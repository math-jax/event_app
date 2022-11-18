@extends('layouts.app')

@section('head')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
@endsection

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 px-4">
                <p class="h1 font-weight-bolder text-success pb-3 mb-2 border-bottom">All Events</p>
            </div>
            <div class="col-12 table-responsive">
                <table class="table table-hover" id="eventTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Event</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <th scope="row"></th>
                                <td><img src="{{ isset($event->image) ? '/storage/' . $event->image : '/images/01.jpg' }}"
                                        class="img-fluid img-thumbnail rounded"
                                        style="width: 50px;height:50px;border-radius:50px;" alt="{{ $event->title }}"></td>
                                <td><a href="{{ route('event.show', $event->id) }}" target="_blank" rel="noopener noreferrer">{{ $event->title }}</a></td>
                                <td>{{ $event->start_date->toDateString() }}</td>
                                <td>{{ $event->end_date->toDateString() }}</td>
                                <td>{{ $event->setEventStatus() }}</td>
                                <td>
                                    <div class="d-flex justify-content-around">
                                        <a class="btn btn-info btn-sm" href="{{ route('event.edit', $event->id) }}"
                                            role="button">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="javascript:;"
                                            role="button"
                                            onclick="deleteEvent({{ $event->id }});">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            var t = $('#eventTable').DataTable({
                columnDefs: [{
                    searchable: false,
                    orderable: false,
                    targets: 0,
                }, ],
                order: [
                    [1, 'asc']
                ],
            });

            t.on('order.dt search.dt', function() {
                let i = 1;

                t.cells(null, 0, {
                    search: 'applied',
                    order: 'applied'
                }).every(function(cell) {
                    this.data(i++);
                });
            }).draw();
        });

        //function to delete event
        function deleteEvent(id) {
            $.ajax({
                url: '/event/delete/'+ id,
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                },
                success: function (response) {
                    new Noty({
                        type: response.status,
                        layout: 'topRight',
                        text: response.message
                    }).show();
                    window.location.reload();
                },
            });
        }
    </script>
@endsection
