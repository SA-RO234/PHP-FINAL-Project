$("input.imgInput").change(function () {
  let file = this.files[0];
  var url = URL.createObjectURL(file);
  $(this).closest(".imgholder").find("img").attr("src", url);
});

//  To change Profile 
$("#form_profile").on("change", function (e) {
  e.preventDefault();
  var myFormData = new FormData(this);
  $.ajax({
    type: "post",
    url: "ServerProfile.php?action=UpdateofProfile",
    data: myFormData,
    contentType: false,
    processData: false,
    success: function (response) {
      if (response.status == 200) {
        const Toast = Swal.mixin({
          toast: true,
          position: "top-end",
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
          },
        });
        Toast.fire({
          icon: "success",
          title: response.message,
        });
      }
    },
  });
});
