function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}


$('#myTab a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
})

var readURL = function(input) {
  if (input.files) {
      var reader = new FileReader();

      reader.onload = function(e) {
          $('.profile-pic').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
  }
}

$(".file-upload").on('change', function() {
  readURL(this);
});

$(".upload-button").on('click', function() {
  $(".file-upload").click();
});