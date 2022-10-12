<!DOCTYPE html>
<html>
<head>
   <title>How to Display existing files in Dropzone - Laravel 8</title>

   <!-- Meta -->
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta charset="utf-8">
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <!-- CSS -->
   <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

   <!-- Script -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

   <style type="text/css">
   .dz-preview .dz-image img{
       width: 100% !important;
       height: 100% !important;
       object-fit: cover;
    }
    </style>
</head>
<body>

   <div class='content'>
      <!-- Dropzone -->
      <form action="{{route('uploadFile')}}" class='dropzone' ></form>
   </div>

   <!-- Script -->
   <script>
   var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

   Dropzone.autoDiscover = false;
   var myDropzone = new Dropzone(".dropzone",{
      maxFilesize: 2, // 2 mb
      acceptedFiles: ".jpeg,.jpg,.png,.pdf",
      addRemoveLinks: true,
      init: function() {
         myDropzone = this;

         $.ajax({
            url: '{{ route("readFiles") }}',
            type: 'get',
            dataType: 'json',
            success: function(response){

               $.each(response, function(key,value) {
                  var mockFile = { name: value.name, size: value.size };

                  myDropzone.emit("addedfile", mockFile);
                  myDropzone.emit("thumbnail", mockFile, value.path);
                  myDropzone.emit("complete", mockFile);

               });

            }
         });
      },
      removedfile: function(file) {
         var fileName = file.name;

         $.ajax({
           type: 'POST',
           url: 'upload.php',
           data: {name: fileName,request: 'delete'},
           sucess: function(data){
              console.log('success: ' + data);
           }
         });

         var _ref;
          return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
       }
   });

   myDropzone.on("sending", function(file, xhr, formData) {
      formData.append("_token", CSRF_TOKEN);
   });

   myDropzone.on("success", function(file, response) {

      if(response.success == 0){ // Error
         alert(response.error);
      }

   });
   </script>
   <script type="text/javascript">

    Dropzone.autoDiscover = false;

    var myDropzone = new Dropzone(".dropzone", {
       maxFilesize: 10,
       acceptedFiles: ".jpeg,.jpg,.png,.gif",
       addRemoveLinks: true,
       removedfile: function(file) {
         var fileName = file.name;

         $.ajax({
           type: 'POST',
           url: 'upload.php',
           data: {name: fileName,request: 'delete'},
           sucess: function(data){
              console.log('success: ' + data);
           }
         });

         var _ref;
          return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
       }
    });

</script>

<script>
    // myDropzone is the configuration for the element that has an id attribute
    // with the value my-dropzone (or myDropzone)
    Dropzone.options.myDropzone = {
        init: function() {
            this.on("addedfile", function(file) {

                // Create the remove button
                var removeButton = Dropzone.createElement("<button>Remove file</button>");


                // Capture the Dropzone instance as closure.
                var _this = this;

                // Listen to the click event
                removeButton.addEventListener("click", function(e) {
                    // Make sure the button click doesn't submit the form:
                    e.preventDefault();
                    e.stopPropagation();

                    // Remove the file preview.
                    _this.removeFile(file);
                    // If you want to the delete the file on the server as well,
                    // you can do the AJAX request here.
                });

                // Add the button to the file preview element.
                file.previewElement.appendChild(removeButton);
            });
        }
    };
</script>
</body>
</html>
