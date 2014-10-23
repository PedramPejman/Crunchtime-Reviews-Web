$(document).ready(function(){
  $('#uploaded_file').change(function () {
    $('form p').text(this.files[0].name + " selected");
  });
});