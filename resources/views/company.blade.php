<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>JSON and AJAX - if Not See Bookmarks</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <h4>AJAX CRUD</h4>
    <div class="alert displaynone" id="responseMsg"></div>
    <div class='alert alert-danger mt-2 d-none text-danger' id="err_file"></div>

    {{-- Modal --}}
    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <label for="cars">Choose a revew:</label>

                <select name="review" id="review">
                  <option value="volvo">Volvo</option>
                  <option value="saab">Saab</option>
                  <option value="mercedes">Mercedes</option>
                  <option value="audi">Audi</option>
                </select>
              <input type="text" id="renew" placeholder="renew"/>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="saveBtn">SAVE</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    <input type="button" id="addBtn" value="Press"/>


    <script>
        $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }

});
        // var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
        $(document).ready(function(){
            $('#addBtn').click(function () {
                $('.modal').show();
            });
            // var myselctor = $('#review').find(":selected").text();
            // // console.log(myselctor);
            // var renew = $('#renew').val();
            // var review = $('#review').val();
            var mydata = {
                myselctor : $('#review').find(":selected").text(),
                renew : $('#renew').val(),
            }
            $.ajax({
                data: mydata,
                url: "/ajaxcrud",
                method: 'POST',
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('#err_file').removeClass('d-block');
             $('#err_file').addClass('d-none');
                    if(response.status == 200) {
                        console.log(response);
               $('#responseMsg').removeClass("alert-danger");
               $('#responseMsg').addClass("alert-success");
               $('#responseMsg').html(response.message);
               $('#responseMsg').show();
                    }
                    else{
                $('#responseMsg').removeClass("alert-success");
               $('#responseMsg').addClass("alert-danger");
               $('#responseMsg').html(response.errors);
               $('#responseMsg').show();
                    }
                },
            });
        });

    </script>

</body>
</html>
