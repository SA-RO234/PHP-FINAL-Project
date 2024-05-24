$(document).ready(function () {


//  Fetch Data from database
var currentPage = 1;
FetchData(currentPage);
function FetchData(page) {
  $.ajax({
    type: "get",
    url: "ServerCourse.php?action=FetchData",
    data: { page: page },
    dataType: "json",
    success: function (response) {
      var data = response.data;
      if (data.length > 0) {
        var HTML = "";
        $.each(data, function (index, value) {
          HTML += "<tr>";
          HTML +=
            '<td class="py-3 border-primary">' + value.Course_id + "</td>";
          HTML +=
            '<td class="py-3 border-primary">' + value.Course_Name + "</td>";
          HTML +=
            '<td class="py-3 border-primary "><img class="object-fit-cover border rounded" style="width: 90px; height:70px ;  " src="upload_Course/' +
            value.Course_image +
            '" alt="' +
            value.Course_image +
            '"></td>';
          HTML +=
            '<td class="py-3 border-primary">' + value.Teacher_Name + "</td>";
          HTML +=
            '<td class="py-3 border-primary">' +
            value.Course_price +
            "$" +
            "</td>";
          HTML +=
            '<td class="py-3 border-primary"><p>' +
            value.Course_description +
            "</p></td>";
          HTML += '<td class="py-3 border-primary">';
          HTML += '<div class="position-relative ">';
          HTML +=
            '<button type="button" class="btn btnEdit" value="' +
            value.Course_id +
            '" ><i class="gd-pencil icon-text"></i></button>';
          HTML +=
            '<button type="button" class="ml-2 btn BtnDelete" value="' +
            value.Course_id +
            '" ><i class="gd-trash icon-text"></i></button>';
          HTML +=
            '<input type="hidden" class="imageDelete" id="oldimagedelete" value="' +
            value.Course_image +
            '"></input>';
          HTML += "</div>";
          HTML += "</td>";
          HTML += "</tr>";
        });
        $("#TbodyforCourse").html(HTML);
      }
    },
  });
}

var cardcurrentPage = 1;
pushintocard(cardcurrentPage); 
function pushintocard(page1) {
  $.ajax({
    type: "get",
    url: "ServerCourse.php?action=FetchDataasCard",
    data: {page:page1},
    dataType:"json",
    success: function (response) {
      var data = response.data;
      if (data.length > 0) {
        var html = "";
        $.each(data, function (index, value) {
          html += '<div class="col">';
          html += '<div class="card" style="width: 18rem;">';
          html +=
            '<img src="upload_Course/' +
            value.Course_image +
            '" class="card-img-top  rounded" alt="..." style="height: 300px; object-fit:cover;">';
          html += '<div class="card-body">';
          html += '<h5 class="card-title">' + value.Course_Name + "</h5>";
          html += '<p class="card-text">' + value.Course_description + "</p>";
          html +=
            '<div class="footer-card d-flex justify-content-between align-items-center">';
          html +=
            '<p class="teacher-section fw-bold">By : ' +
            value.Teacher_Name+
            "</p>";
          html +=
            '<p class="price-section">Price : <span class="text-primary">' +
            value.Course_price +
            "$</span></p>";
          html += "</div>";
          html +=
            '<a href="#" class="btn btn-primary ml-10">Start learning</a>';
          html += "</div>";
          html += "</div>";
          html += "</div>";
        });
        $("#bodycard").html(html);
      }
    },
  });
}

//  pagination
$(".pagination li").click(function (e) {
  e.preventDefault();
  var numberpage = $(this).attr("data-page");
  var id = $(this).attr("id");
  $(".page-item").removeClass("active");
  $("#" + id).addClass("active");
  FetchData(numberpage);
  pushintocard(numberpage); 
});

//  All for coure Form
//  Previous button
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

//  For card HOME
$("#PreviousButtoncard").click(function (e) { 
  e.preventDefault();
   if(cardcurrentPage > 1){
      cardcurrentPage--;
    pushintocard(cardcurrentPage); 
   }
});

$("#NextButtoncard").click(function (e) { 
  e.preventDefault();
    cardcurrentPage++;
    pushintocard(cardcurrentPage); 
});

//  Insert Data
$("#Create_Course").click(function (e) {
  e.preventDefault();
  var CourseData = new FormData($("#createcourse")[0]);
  CourseData.append("myphoto", $("#myphoto")[0].files[0]);
  $.ajax({
    type: "POST",
    url: "ServerCourse.php?action=InsertCourse",
    data: CourseData,
    contentType: false,
    processData: false,
    success: function (response) {
      FetchData();
      pushintocard(); 
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
          },
        });
        Toast.fire({
          icon: "error",
          title: response.message,
        });
      }
      if (response.status == 400) {
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

//  Fetch Individual data
$(document).on("click", ".btnEdit", function (e) {
  e.preventDefault();
  $("#MymodalUpdateCourse").modal("show");
  var id = $(this).val();
  $.ajax({
    type: "post",
    url: "ServerCourse.php?action=UpdateCourse",
    data: { id: id },
    dataType: "json",
    success: function (response) {
      var data = response.data;
      $.each(data, function (index, value) {
        $("#id").val(value.Course_id);
        $("#coursenameupdate").val(value.Course_Name);
        $("#coursepriceupdate").val(value.Course_price);
        $("#byteacherold ").val(value.by_Teacher);
        $("#descriptionupdate").val(value.Course_description);
        $("#oldimage").val(value.Course_image);
      });
    },
  });
});

//  Update data when click
$("#btnupdatecourse").click(function () {
  var oldData = new FormData($("#formupdatecourse")[0]);
  oldData.append("oldimage", $("#oldimage").val());
  oldData.append("myphotoupdate", $("#myphotoupdate")[0].files[0]);
  $.ajax({
    type: "post",
    url: "ServerCourse.php?action=UpdateoldCourse",
    data: oldData,
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
          },
        });
        Toast.fire({
          icon: "error",
          title: response.message,
        });
      }
      if (response.status == 400) {
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

//  Delete Course
$(document).on("click", ".BtnDelete", function (e) {
  e.preventDefault();
  var IDdelete = $(this).val();
  var imagefordelete = $(this).closest("td").find(".imageDelete").val();
  $("#deletecoursemodal").modal("show");
  //   Delete Course when submit
  $(document).on("click", ".ModalDeleteBtn", function (e) {
    e.preventDefault();
    $("#deletecoursemodal").modal("hide");
    $.ajax({
      type: "post",
      url: "ServerCourse.php?action=DeleteCourse",
      data: { id: IDdelete, imagefordelete: imagefordelete },
      dataType: "json",
      success: function (response) {
        if (response.status == 200) {
          FetchData(currentPage);
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
            },
          });
          Toast.fire({
            icon: "error",
            title: response.message,
          });
        }
      },
    });
  });
});

//  Live search
$("#live_search").keyup(function (e) {
  var value = $(this).val();
  if (value != "") {
    $.ajax({
      type: "post",
      url: "ServerCourse.php?action=SearchCourse",
      data: { value: value },
      dataType: "json",
      success: function (response) {
        if (response.status == 404) {
          $("#TbodyforCourse").html(response.message);
        } else {
          $("#TbodyforCourse").html(response.data);
        }
      },
    });
  } else {
    FetchData();
  }
});

//  LiveSearch in card
$("#live_searchcard").keyup(function (e) {
  var keyupvalue = $(this).val();
  if (keyupvalue != "") {
    $.ajax({
      type: "post",
      url: "ServerCourse.php?action=cardkeyup",
      data: { keyupvalue: keyupvalue },
      dataType: "json",
      success: function (response) {
        if (response.status == 404) {
          $("#bodycard").html("");
          $("#forNotfound").html(response.message);
        } else {
          $("#bodycard").html(response.data);
        }
      },
    });
  } else {
    pushintocard();
    $("#forNotfound").html("");
  }
});


//  function for pagination in Course .php
// var studentcurrentpage = 1;
// paginationofstudnet(studentcurrentpage);
// function paginationofstudnet(page){
//   $.ajax({
//     type: "get",
//     url: "Course.php",
//     data: {page:page},
//     dataType: "json",
//     success: function (response) {
        
//     }
//   });
// }

});
