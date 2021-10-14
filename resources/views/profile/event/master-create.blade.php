<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event Online</title>
    <link rel="stylesheet" href="{{asset('ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css')}}"></link>
    <!-- <link rel="stylesheet" href="{{asset('ckeditor/samples/css/samples.js')}}"> -->
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/uikit.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/components/datepicker.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="{{asset('css/create-event.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nova+Square&family=Nunito+Sans:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
    
      <!-- Icons -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons"  rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"  rel="stylesheet">
    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.2/dist/css/uikit.min.css" />

    {{-- <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.2/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.2/dist/js/uikit-icons.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.xx.x/css/uikit.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.xx.x/js/uikit.min.js"></script> --}}
</head>
<body>

    @include('layouts.navbar')

    @yield('content')
    
    
</body>

<!-- LIBRARY SCRIPTS -->
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('ckeditor/config.js')}}"></script>
<script src="{{asset('ckeditor/samples/js/sample.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="{{ asset('js/jquery-ui.min.js')}}"></script>
<script src="{{ asset('js/components/datepicker.js')}}"></script>
<script src="{{ asset('js/uikit.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>

<!-- CUSTOM SCRIPTS -->
<script src="{{ asset('js/scripts/create-event.js') }}" type="module"></script>

<script>
        var $modal = $('.imagecrop');
        var image = document.getElementById('image');
        var cropper;

        $("body").on("change", ".imageUpload", function(e){
            var files = e.target.files;
            var done = function(url) {
                image.src = url;
                $modal.modal('show');
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function(e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                // aspectRatio: 17/10,
                viewMode: 1,
                dragMode: 'move',
                cropBoxResizable: false,
                data:{ //define cropbox size
                  width: 1192,
                  height:  400,
                },
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });
        $("body").on("click", "#crop", function() {
            canvas = cropper.getCroppedCanvas({
                width: 1192,
                height: 400,
            });
            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                     var base64data = reader.result;
                     $('#base64image').val(base64data);
                     document.getElementById('imagePreview').style.backgroundImage = "url("+base64data+")";
                     $modal.modal('hide');
                }
            });
        })

</script>
<script>
  function disabledTb(){
    var bayar = document.getElementById('ticket-priceTypePaid');
    var formHarga = document.getElementById('ticket-price');
    formHarga.disabled = bayar.checked ? false : true;
    formHarga.value="";
    if(!formHarga.disabled){
        formHarga.focus();
    }
  }
  function enabledTB(){
    var gratisan = document.getElementById('ticket-priceTypeFree');
    var formHarga = document.getElementById('ticket-price');
    formHarga.disabled = gratisan.checked ? false : true;
    formHarga.value="";
    if(!formHarga.focus){
        formHarga.disabled;
    }
  }
</script>
<script>
    // $('#event-startDate').datepicker({
    //     minDate:0
    // });
    // $('#event-endDate').datepicker({
    //     minDate: "datepickerstart"
    // });

    $(document).ready(function(){
    $("#event-startDate").datepicker({
        minDate:0,
        numberOfMonths: 1,
        onSelect: function(selected) {
          $("#event-endDate").datepicker("option","minDate", selected)
        }
    });
    $("#event-endDate").datepicker({ 
        minDate:0,
        numberOfMonths: 1,
        onSelect: function(selected) {
           $("#event-startDate").datepicker("option","maxDate", selected)
        }
    });  
});
    
    
</script>
<script>
    $(document).ready(function(){
    $("#ticket-startDate").datepicker({
        minDate:0,
        numberOfMonths: 1,
        onSelect: function(selected) {
          $("#ticket-endDate").datepicker("option","minDate", selected)
        }
    });
    $("#ticket-endDate").datepicker({ 
        minDate:0,
        numberOfMonths: 1,
        dateFormat: 'd MM yy',
        onSelect: function(selected) {
           $("#ticket-startDate").datepicker("option","maxDate", selected)
        }
    });  
});
</script>
<script>
	initSample();
</script>
<script>
    var dateStart = $('#event-startDate').datepicker({ 
        minDate:0,
        numberOfMonths: 1,
        dateFormat: 'd MM yy',
        monthNames: [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ],
        onSelect: function(selected) {
          $("#event-endDate").datepicker("option","minDate", selected)
        }
     }).val();

     var dateEnd = $('#event-endDate').datepicker({ 
        minDate:0,
        numberOfMonths: 1,
        dateFormat: 'd MM yy',
        monthNames: [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ],
        onSelect: function(selected) {
          $("#event-startDate").datepicker("option","maxDate", selected)
        }
     }).val();
     
    // $(document).ready(function(){
    //     $('#event-startDate').datepicker({
    //         dateFormat: "d-"
    //     });
    // });

    
</script>
<script>
    var tiketdateStart = $('#ticket-startDate').datepicker({ 
        minDate:0,
        numberOfMonths: 1,
        dateFormat: 'd MM yy',
        monthNames: [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ],
        onSelect: function(selected) {
          $("#ticket-endDate").datepicker("option","minDate", selected)
        }
     }).val();

     var tiketdateEnd = $('#ticket-endDate').datepicker({ 
        minDate:0,
        numberOfMonths: 1,
        dateFormat: 'd MM yy',
        monthNames: [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ],
        onSelect: function(selected) {
          $("#ticket-startDate").datepicker("option","maxDate", selected)
        }
     }).val();
</script>

<script>
  var tiketdateStart = $('#editTicket-startDate').datepicker({ 
      minDate:0,
      numberOfMonths: 1,
      dateFormat: 'd MM yy',
      monthNames: [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ],
      onSelect: function(selected) {
        $("#editTicket-endDate").datepicker("option","minDate", selected)
      }
   }).val();

   var tiketdateEnd = $('#editTicket-endDate').datepicker({ 
      minDate:0,
      numberOfMonths: 1,
      dateFormat: 'd MM yy',
      monthNames: [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ],
      onSelect: function(selected) {
        $("#editTicket-startDate").datepicker("option","maxDate", selected)
      }
   }).val();
</script>

<script type="text/javascript">

  function yesnoCheck() {
      if (document.getElementById('ticket-priceTypePaid').checked) {
          document.getElementById('ticket-price').style.display = 'block';
          document.getElementById('rp').style.display = 'block';
      } else {
          document.getElementById('ticket-price').style.display = 'none';
          document.getElementById('rp').style.display = 'none';
      }
    }

    function edityesnoCheck() {
      if (document.getElementById('editTicket-priceTypePaid').checked) {
          document.getElementById('editTicket-price').style.display = 'block';
          document.getElementById('editRp').style.display = 'block';
      } else {
          document.getElementById('editTicket-price').style.display = 'none';
          document.getElementById('editRp').style.display = 'none';
      }
    }
  </script>
  <script>
   
    $('input[id="ticket-priceTypeFree"]').on('click', function() {
      if ($(this).val() === '') {
        $('#ticket-price').prop('disabled', true);
        $('#ticket-price').style.display = 'none';
        $('#rp').style.display = 'none';
      } else {
        $('#ticket-price').prop("disabled", false).val('');
      }
    });

    $('input[id="editTicket-priceTypeFree"]').on('click', function() {
      if ($(this).val() === '') {
        $('#editTicket-price').prop('disabled', true);
        // $('#editTicket-price').style.display = 'none';
        // $('#rp').style.display = 'none';
      } else {
        $('#editTicket-price').prop("disabled", false).val('');
        // $('#editTicket-price').style.display = 'block';
        // $('#rp').style.display = 'block';
      }
    });
  </script>

  
</html>



