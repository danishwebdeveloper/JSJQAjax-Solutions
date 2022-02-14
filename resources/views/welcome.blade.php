<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TODO in AJAX</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    {{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script> --}}

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body>
    <div class="container">
        <h3>My Todo List</h3>
        <div class="alert displaynone" id="responseMsg"></div>
        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary" id="add_todo"> Add Todo </button>
        <table class="table table-bordered">
            <thead>
                <th>Sr.no</th>
                <th>Name</th>
                <th>Action</th>
            </thead>
            <tbody id="list_todo">
                @foreach ($records as $record)
                    <tr id="row_todo_{{ $record->id }}">
                        <td>{{ $record->id }}</td>
                        <td>{{ $record->name }}</td>
                        <td>
                            <button type="button" id="edit_todo" data-id="{{ $record->id }}"
                                class="btn btn-sm btn-info ml-1">Edit</button>
                            <button type="button" id="delete_todo" data-id="{{ $record->id }}"
                                class="btn btn-sm btn-danger ml-1">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- The Modal -->

        <div class="modal" id="modal_todo">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form id="todo_form">

                        {{-- Modal Header --}}
                        <div class="modal-header">
                            <h4 class="modal-title" id="todo_title"></h4>
                        </div>

                        {{-- Modal Body --}}
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id" />
                            <input type="text" id="name_todo" name="name" />
                        </div>

                        {{-- Modal Footer --}}
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info" data-dismiss="modal">Submit</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        // For Add any thing, or inisde of add
        $('#add_todo').on('click', function() {
            $('#todo_form').trigger('reset'); // for every click on form, it should be reset
            $('#todo_title').html('Add Todo') // take title id and set it's id to his title
            $('#modal_todo').modal('show'); // show the modal
        });


        $('body').on('click', '#edit_todo', function() {
            var id = $(this).data('id');
            // console.log(id);

            // going to that url , just after hit it qill return some json, and what we will recieve that is from edit function inside of the controller
            $.get('record/' + id + '/edit', function(resfromcontroller) {
                // console.log(resfromcontroller);
                $('#todo_title').html('Edit Todo');
                // $('#id').val(resfromcontroller.id);
                $('#name_todo').val(resfromcontroller.name);
                $('#modal_todo').modal('show');
            });
        });

        // Now update/save data in database
        $('form').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                // contentType: "application/json; charset=utf-8",
                url: "{{ route('record.store') }}",
                data: $('#todo_form').serialize(), //Take all data from fields
                type: "POST",
            }).done(function(res) {
                var row = '<tr id="row_todo_' + res.id + '">';
                row += '<td>' + res.id + '</td>';
                row += '<td>' + res.name + '</td>';
                row += '<td>' + '<button type="button" id="edit_todo" data-id="' + res.id +
                    '" class="btn btn-info btn-sm mr-1">Edit</button>' +
                    '<button type="button" id="delete_todo" data-id="' + res.id +
                    '" class="btn btn-danger btn-sm mr-1">Delete</button>' + '</td>';
                if ($("#id").val()) {
                    $("#row_todo_" + res.id).replaceWith(row);
                } else {
                    $("#list_todo").prepend(row);
                }

                // $('#todo_form').trigger('reset');
                // $('#modal_todo').modal('hide');
            });
        });


        // Delete record
        $('body').on('click', '#delete_todo', function() {
            var id = $(this).data('id');
            // console.log(id);
            confirm('Are you sure to delete it?');
            $.ajax({
                type: "DELETE",
                url: "record/" + id,
                success: function() {
                    $('#responseMsg').removeClass('alert-danger');
                    $('#responseMsg').addClass('alert-success');
                    $('#responseMsg').html("Deleted Successfully!!");
                    $('#responseMsg').show();
                }
            }).done(function(res) {
                $('#row_todo_' + id).remove();
            });
        });
    </script>
</body>

</html>
