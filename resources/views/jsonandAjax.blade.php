<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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
    {{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script> --}}

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .hide-me{
            display: none;
        }
    </style>
</head>

<body>

    <button id="animal_btn" class="btn btn-primary m-5">Display Animals</button>

    <p id="getPara"></p>


    <script type="text/javascript">
        // Making request, and now we need to load everything after click - Vanilla will come
        var animals = document.getElementById('animal_btn');

        // make our URL dynamic
         var pageCounter = 1;

        animals.addEventListener('click', function() {
            // XML Request
            var xhrRequest = new XMLHttpRequest();

            // XML request open
            xhrRequest.open('GET', 'https://learnwebcode.github.io/json-example/animals-'+pageCounter+'.json', true);

            // XML request onload
            xhrRequest.onload = function() {
                if (this.status === 200) {
                    console.log('Success');
                    var ourData = JSON.parse(xhrRequest.responseText);
                    // console.log(ourData);

                    // Now at that stage need to display the data in HTML paragraph
                    animalData(ourData);
                }
            }
            xhrRequest.send();
            pageCounter++;
            if(pageCounter > 3){
                animal_btn.classList.add('hide-me');
            }
        });

        // Above function , all functionality at here, even use the same above parameters here like ourData instead of data
        function animalData(data){
            // console.log(data[0]);
            var getparaId = document.getElementById('getPara');
            // var htmlString = "this is a name/dog/etc!";
            htmlString = "";
            // get record from data and insert json data with normal above string
            for (let i = 0; i < data.length; i++) {
                htmlString += "<p>" + data[i].name + " is a " + data[i].species +  " and he likes to eat ";
                    // For likes and array iside of an array
            for (let ii = 0; ii < data[i].foods.likes.length; ii++) {
                if(ii == 0){
                    htmlString += data[i].foods.likes[ii];
                }else{
                    htmlString += " and " +data[i].foods.likes[ii];
                }
            }
            // for dislikes items
            htmlString += " and dislikes ";
            for (let ii = 0; ii < data[i].foods.dislikes.length; ii++) {
                if(ii == 0){
                    htmlString += data[i].foods.dislikes[ii];
                }else{
                    htmlString += " and " + data[i].foods.dislikes[ii];
                }
            }
            htmlString += "</p>"
            }
            getparaId.insertAdjacentHTML('beforeend', htmlString);

         }
    </script>

</body>

</html>
