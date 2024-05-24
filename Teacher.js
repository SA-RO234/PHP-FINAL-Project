//   Fetch Data from database
var currentPage = 1;
FetchData(currentPage);
function FetchData(page) {
  $.ajax({
    type: "get",
    url: "ServerTeacher.php?action=FetchTeacher",
    data: { page: page },
    dataType: "json",
    success: function (response) {
      var data = response.data;
      if (data.length > 0) {
        var HTML = "";
        $.each(data, function (index, value) {
          var name = value.Teacher_Name;
          if(name.length > 0){
            var onechar = name.charAt(0).toUpperCase();
          }
          HTML += "<tr>";
          HTML += '<td class="py-3 border-primary">' + value.Teacher_id + "</td>";
          HTML += '<td class="align-middle py-3 border-primary">';
          HTML += ' <div class="d-flex align-items-center">';
          HTML += '<div class="position-relative mr-2">';
          HTML +=
            '<span class="indicator indicator-lg indicator-bordered-reverse indicator-top-left indicator-success rounded-circle"></span>';
          HTML += '<span class="avatar-placeholder mr-md-2">'+onechar+'</span>';
          HTML += "</div>" + value.Teacher_Name + "</div>";
          HTML += "</td>";
          HTML +=
            '<td class="py-3 border-primary">' + value.Teacher_gender + "</td>";
          HTML +=
            '<td class="py-3 border-primary"><img  class="rounded " src="upload_Teacher/' +
            value.Teacher_image +
            '" style="width: 90px; height: 50px;object-fit:cover" alt=""></td>';
          HTML +=
            '<td class="py-3 border-primary">' + value.Teacher_email + "</td>";
          HTML +=
            '<td class="py-3 border-primary">' + value.Department + "</td>";
          HTML +=
            '<td class="py-3 border-primary">' + value.dateOfbirth + "</td>";
          HTML += '<td class="py-3 border-primary">' + value.position + "</td>";
          HTML +=
            '<td class="py-3 border-primary"><p>' +
            value.teacher_address +
            "</p></td>";
          HTML +=
            '<td class="py-3 border-primary">' + value.phone_number + "</td>";
          HTML += '<td class="py-3 border-primary">' + value.Hiredate + "</td>";
          HTML +=
            '<td class="py-3 border-primary">' + value.Qualification + "</td>";
          HTML += '<td class="py-3 border-primary">';
          HTML += '<div class="position-relative">';
          HTML +=
            '<button type="button" value="' +
            value.Teacher_id +
            '" class="btn btnupdateTeacher" ><i class="gd-pencil icon-text"></i></button>';
          HTML +=
            '<button type="button" value="' +
            value.Teacher_id +
            '" class="btn btndeleteteacher" ><i class="gd-trash icon-text"></i></button>';
          HTML +=
            '<button type="hidden" value="' +
            value.Teacher_image +
            '" class="btn imagedelete" > </button>';
          HTML += "</div>";
          HTML += "</td>";
          HTML += "</tr>";
        });
        $("#bodyTeacher").html(HTML);
      } else {
        $("#bodyTeacher").html('<tr rowspan="1"><td colspan="5">No data found</td></tr>');
      }
    },
  });
}

//  Insert data
$("#btnInsertTeacher").click(function (e) {
  e.preventDefault();
  var Formdata = new FormData($("#formInsertTeacher")[0]);
  Formdata.append("image", $("#image")[0].files[0]);
  $.ajax({
    type: "post",
    url: "ServerTeacher.php?action=InsertTeacher",
    data: Formdata,
    contentType: false,
    processData: false,
    success: function (response) {
      if (response.status == 200) {
        $("#formInsertTeacher")[0].reset();
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
      } else if (response.status == 400) {
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
          icon: "warning",
          title: response.message,
        });
      }
    },
  });
});

//  Fetch ondividual for Update
$(document).on("click", ".btnupdateTeacher", function (e) {
  e.preventDefault();
  var id = $(this).val();
  $("#modalUpdateTeacher").modal("show");
  $.ajax({
    type: "post",
    url: "ServerTeacher.php?action=FetchSingle",
    data: { id: id },
    dataType: "json",
    success: function (response) {
      var data = response.data;
      $("#Teacherid").val(data.Teacher_id);
      $("#oldteachername").val(data.Teacher_Name);
      $("input[name='gender'][value = '" + data.Teacher_gender + "']").prop(
        "checked",
        true
      );
      $("#oldteacheremail").val(data.Teacher_email);
      $("#oldteacherAddress").val(data.teacher_address);
      $("#oldqulification").val(data.Qualification);
      $("#oldposition").val(data.position);
      $("#oldteacherhiredatedate").val(data.Hiredate);
      $("#olddateofbirth").val(data.dateOfbirth);
      $("#olddepartment").val(data.Department);
      $("#oldteacherphonenumber").val(data.phone_number);
      $("#old_image").val(data.Teacher_image);
    },
  });
});

//  Update data in database
$("#btnsaveupdate").click(function (e) {
  e.preventDefault();
  var oldFormData = new FormData($("#formUpdateTeacher")[0]);
  oldFormData.append("image", $("#image")[0].files[0]);
  oldFormData.append("old_image", $("#old_image").val());
  $.ajax({
    type: "post",
    url: "ServerTeacher.php?action=UpdateTeacher",
    data: oldFormData,
    contentType: false,
    processData: false,
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
      } else if (response.status == 400) {
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
          icon: "warning",
          title: response.message,
        });
      }
    },
  });
});

//  Delete Teacher
$(document).on("click", ".btndeleteteacher", function (e) {
  e.preventDefault();
  var id = $(this).val();
  var imagefordelete = $(this).closest("td").find(".imagedelete").val();
  $("#deleteteachermodal").modal("show");
  $(document).on("click","#ModalDeleteBtn",function (e) {
    e.preventDefault();
    $.ajax({
      type: "post",
      url: "ServerTeacher.php?action=DeleteTeacher",
      data: {
        id: id,
        image: imagefordelete,
      },
      dataType: "json",
      success: function (response){
        FetchData();
        if(response.status == 200){
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
});

//  Live Search
$("#Search").keyup(function (e) { 
   var value = $(this).val();
     if(value != ''){
       $.ajax({
        type: "post",
        url: "ServerTeacher.php?action=SearchLive",
        data: {value: value},
        dataType: "json",
        success: function (response) {
           $("#bodyTeacher").html(response.data)
        }
       });
     }else{
      FetchData();
     }
});

// pagination 
$(".pagination li").click(function (e) { 
  e.preventDefault();
  var numpage = $(this).attr("data-page");
  var id      = $(this).attr("id");
  $(".page-item").removeClass("active");
  $("#"+id).addClass("active");
  FetchData(numpage);
});

//  Previous button
$("#Previouse").click(function (e) { 
  e.preventDefault();
   if(currentPage > 1){
     currentPage--;
     FetchData(currentPage);
   }
});

//  Next button 
$("#Next").click(function (e) { 
  e.preventDefault();
  currentPage++;
  FetchData(currentPage);
});
