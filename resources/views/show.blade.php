@extends('layouts.employeepanel.default')
@section('content')
    <div class="container mt-5">


        <div class="alert_messages">
            @if (Session::has('insert'))
                <div id="flash-message" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('insert') }}
                </div>
            @endif
            @if (Session::has('update'))
                <div id="flash-message" class="alert alert-primary alert-dismissible fade show" role="alert">
                    {{ Session::get('update') }}
                </div>
            @endif
            @if (Session::has('delete'))
                <div id="flash-message" class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('delete') }}
                </div>
            @endif
        </div>
        <script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/jquery/dataTables.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('assets/css/dataTables.min.css') }}">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table id="usersTable" class="table table-row-dashed table-hover">
                            <thead>
                                <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                                    {{-- <th>First Name</th>
                                    <th>Last Name</th> --}}
                                    <th>full name</th>
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>hobby</th>
                                    <th>Phone</th>
                                    <th>UPDATE</th>
                                    <th>DELETE</th>
                                </tr>
                            </thead>

                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- Include jQuery -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">


@section('js')
    <script>
        $(document).ready(function() {
            $('#usersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('users.get_users_list') }}',
                columns: [{
                        data: 'full_name',
                        name: 'full_name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'country',
                        name: 'country'
                    },
                    {
                        data: 'hobby',
                        name: 'hobby'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'update',
                        name: 'update',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'delete',
                        name: 'delete',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });


        function openConfirmDeleteModal(id) {
            $('#confirmDeleteModal').modal('show');
            $('#confirmDeleteBtn').data('id', id);
        }

        // Make the DIV element draggable:
        var element = document.querySelector('#confirmDeleteModal');
        dragElement(element);

        function dragElement(elmnt) {
            var pos1 = 0,
                pos2 = 0,
                pos3 = 0,
                pos4 = 0;
            if (elmnt.querySelector('.modal-content')) {
                // if present, the header is where you move the DIV from:
                elmnt.querySelector('.modal-content').onmousedown = dragMouseDown;
            } else {
                // otherwise, move the DIV from anywhere inside the DIV:
                elmnt.onmousedown = dragMouseDown;
            }

            function dragMouseDown(e) {
                e = e || window.event;
                // get the mouse cursor position at startup:
                pos3 = e.clientX;
                pos4 = e.clientY;
                document.onmouseup = closeDragElement;
                // call a function whenever the cursor moves:
                document.onmousemove = elementDrag;
            }

            function elementDrag(e) {
                e = e || window.event;
                // calculate the new cursor position:
                pos1 = pos3 - e.clientX;
                pos2 = pos4 - e.clientY;
                pos3 = e.clientX;
                pos4 = e.clientY;
                // set the element's new position:
                elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
                elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
            }

            function closeDragElement() {
                // stop moving when mouse button is released:
                document.onmouseup = null;
                document.onmousemove = null;
            }
        }

        $(document).ready(function() {
            $('#flash-message').delay(1000).fadeOut(2000);
        });


        $('#confirmDeleteBtn').click(function() {
            var id = $(this).data('id');
            $.ajax({
                url: '{{ route("users.delete_user") }}',
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "user_id": id,
                },
                success: function(response) {
                    console.log("done");
                    $('.alert_messages').html(`
                        <div id="flash-message" class="alert alert-success alert-dismissible fade show" role="alert">
                            ${response.message}
                        </div>
                    `);
                    $('#confirmDeleteModal').modal('hide');
                    $('#usersTable').DataTable().ajax.reload(null, false);
                },
                error: function(xhr) {
                    console.log("not done");
                }
            });
        });
    </script>
@endsection

<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this user?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                <a id="confirmDeleteBtn" data-token="{{ csrf_token() }}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>

</body>

</html>
