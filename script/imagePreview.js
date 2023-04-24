var loadFile = function(event) {
    var output = document.getElementById('image_preview');
    image_preview.src = URL.createObjectURL(event.target.files[0]);
    image_preview.onload = function() {
      URL.revokeObjectURL(image_preview.src) // free memory
    }
  };

  var input = document.getElementById("upload_file");
  remove=()=>{
    image_preview.src='img/insert.png';
    input.value="";
  }