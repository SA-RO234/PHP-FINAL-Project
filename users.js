$(document).ready(function () {
  var currentPage = 1;
  FetchData(currentPage);

  //  Fetch Data form database
  function FetchData(page) {
    $.ajax({
      type: "GET",
      url: "ServerProfile.php?action=FetchData",
      data: { page: page },
      dataType: "json",
      success: function (response) {
        var data = response.data;
        if (data.length > 0) {
          var HTML = "";
          $.each(data, function (index, item) {
            HTML += "<tr>";
            HTML += ' <td class="py-3 border-primary">' + item.id + "</td>";
            HTML +=
              '<td class="py-3 border-primary" >' + item.firstname + "</td>";
            HTML +=
              '<td class="py-3 border-primary" >' + item.lastname + "</td>";
            HTML +=
              '<td class="py-3 border-primary"  >' + item.gender + "</td>";
            HTML +=
              '<td class="py-3 border-primary"><img style="width: 90px; height: 50px;" src="upload_admin/' +
              item.image +
              '" alt="" class="object-fit-cover border rounded"></td>';
            HTML += '<td class="py-3 border-primary" >' + item.email + "</td>";
            HTML +=
              '<td class="py-3 border-primary" >' + item.phone_number + "</td>";
            HTML +=
              '<td class="py-3 border-primary" >' + item.position + "</td>";
            HTML +=
              '<td class="py-3 border-primary" >' + item.password + "</td>";
            HTML +=
              '<td class="py-3 border-primary" >' + item.description + "</td>";
            HTML += '<td class="py-3 border-primary">';
            HTML += '<div class="position-relative">';
            HTML +=
              '<button type="button" class="btn EditBtn" id="EditBtn" value="' +
              item.id +
              '"><i class="gd-pencil icon-text"></i></button>';
            HTML +=
              '<button type="button" class="btn DeleteBtn" value="' +
              item.id +
              '"><i class="gd-trash icon-text"></i></button>';
            HTML +=
              '<button type="hidden" class="Deleteimage d-none" value="' +
              item.image +
              '"><i class="gd-trash icon-text"></i></button>';
            HTML += "</div></td> </tr>";
          });
          $("#myTableBody").html(HTML);
        } else {
          $("#myTableBody").html('<tr rowspan="1"><td colspan="5">No data found</td></tr>');
        }
      },
    });
  }

  //  Edit User individual
  $(document).on("click", ".EditBtn", function () {
    $("#MymodalUpdateUser").modal("show");
    var id = $(this).val();
    $.ajax({
      type: "POST",
      url: "ServerProfile.php?action=FetchSigle",
      data: { id: id },
      dataType: "json",
      success: function (response) {
        var data = response.data;
        $("#formUpdateAdmin input[name = 'id']").val(data.id);
        $("#formUpdateAdmin input[name = 'first_name']").val(data.firstname);
        $("#formUpdateAdmin input[name = 'last_name']").val(data.lastname);
        $("#formUpdateAdmin input[name = 'email']").val(data.email);
        $("#formUpdateAdmin input[name = 'position']").val(data.position);
        $("#formUpdateAdmin input[name = 'phone_number']").val(
          data.phone_number
        );
        if (data.gender === "Male") {
          $("#formUpdateAdmin option[value='Male']").prop("selected", true);
        } else if (data.gender === "Female") {
          $("#formUpdateAdmin option[value='Female']").attr("selected", true);
        }

        $("#formUpdateAdmin input[name = 'password']").val(data.password);
        $("#formUpdateAdmin input[name = 'password_confirmation']").val(
          data.confirm_pass
        );
        $("#formUpdateAdmin #old_image").val(data.image);
        $("#formUpdateAdmin #floatingTextarea2").val(data.description);
      },
    });
  });

  //  Update data when click
  $("#BtnUpdateAdmin").click(function (e) {
    e.preventDefault();

    const DataUpdate = new FormData($("#formUpdateAdmin")[0]); // Use FormData to handle file uploads
    DataUpdate.append("image", $("#myoldimage")[0].files[0]); // Append the image file to the FormData object
    DataUpdate.append("old_image", $("#old_image").val());
    $("#MymodalUpdateUser").modal("hide");
  
    $.ajax({
      type: "post",
      url: "ServerProfile.php?action=UpdateAdmin",
      data: DataUpdate,
      // contentType: "json",
      processData: false,
      contentType: false,
      success: function (response) {
        FetchData();
        if (response.status == 200) {
          $("#formUpdateAdmin")[0].reset();

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

  //   Delete Users
  $(document).on("click", ".DeleteBtn", function () {
    var id = $(this).val();
    var DeleteImage = $(this).closest("td").find(".Deleteimage").val();
    $("#deleteusermodal").modal("show");
    //   Confirm delete button click for delete
    $(document).on("click", "#ModalDeleteBtn", function () {
      $("#deleteusermodal").modal("hide");
      $.ajax({
        type: "POST",
        url: "ServerProfile.php?action=DeleteUSers",
        data: { userid: id, userimage: DeleteImage },
        dataType: "json",
        success: function (response) {
          FetchData();
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
          } else if (response.status == 500) {
            const Toast = Swal.mixin({
              toast: true,
              position: "top-end",
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: true,
              didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
              }
            });
            Toast.fire({
              icon: "error",
              title: response.message
            });
          }
        },
      });
    });
  });

  //  pagination and active
  $(".pagination li").click(function (e) {
    e.preventDefault();
    var numpage = $(this).attr("data-page");
    var id = $(this).attr("id");
    $(".page-item").removeClass("active");
    $("#" + id).addClass("active");
    FetchData(numpage);
  });

  //   Previous button
  $("#PreviousButton").click(function (e) {
    e.preventDefault();
    if (currentPage > 1) {
      currentPage--;
      FetchData(currentPage);
    }
  });

  //  Next button
  $("#NextButton").click(function (e) {
    e.preventDefault();
    currentPage++;
    FetchData(currentPage);
  });

  //  Insert into database
  $("#InsertBtn").click(function (e) {
    e.preventDefault();
    const form_Data = new FormData($("#formRegisterAdmin")[0]); // Use FormData to handle file uploads
    form_Data.append("image", $("#image")[0].files[0]); // Append the image file to the FormData object
    $.ajax({
      type: "post",
      url: "ServerProfile.php?action=InsertDataUser",
      data: form_Data,
      contentType: "json",
      processData: false, // Prevent jQuery from automatically processing the data
      contentType: false, // Prevent jQuery from automatically setting the content type
      success: function (response) {
        if (response.status == 200) {
          $("#formRegisterAdmin")[0].reset();
          const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            }
          });
          Toast.fire({
            icon: "success",
            title: response.message
          });
  
        }else if(response.status == 500){
          const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            }
          });
          Toast.fire({
            icon: "error",
            title: response.message
          });
        }
      },
    });
  });

  //  Live Search User
  $("#live_search").keyup(function (e) { 
    e.preventDefault();
    var searchTerm = $(this).val(); 
    if(searchTerm != ''){
      $.ajax({
        type: "post",
        url: "ServerProfile.php?action=SearchLiveUser",
        data: {searchTerm : searchTerm},
        success: function (response) {
          $("#myTableBody").html(response.data);
        }
      });
    }else{
      FetchData();
    }
  });
});

