//  Insert Data to database
$("#Create_Student").click(function (e) {
  e.preventDefault();
  var myformData = new FormData($("#registerStudent")[0]);
  myformData.append("myimage", $("#image")[0].files[0]);

  $.ajax({
    type: "post",
    url: "ServerStudent.php?action=InsertStudent",
    data: myformData,
    contentType: false,
    processData: false,
    success: function (response) {
      Fetchdata();
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
          icon: "error",
          title: response.message,
        });
      }
    },
  });
});

var currentPage = 1;
Fetchdata(currentPage);
//  Create Fetch data from database
function Fetchdata(page) {
  $.ajax({
    type: "get",
    url: "ServerStudent.php?action=FetchStudent",
    data: { page: page },
    dataType: "json",
    success: function (response) {
      var data = response.data;
      if (data.length > 0) {
        var HTML = "";
        $.each(data, function (index, value) {
          var name = value.Student_Name;
          if (name.length > 0) {
            var initial = name.charAt(0).toUpperCase();
          }
          HTML += "<tr>";
          HTML +=
            '<td class="py-3 border-primary">' + value.Student_ID + "</td>";
          HTML += '<td class="align-middle py-3 border-primary">';
          HTML += '<div class="d-flex align-items-center">';
          HTML +=
            '<span class="avatar-placeholder mr-md-2">' + initial + "</span>";
          HTML += '<div class="position-relative mr-2">';
          HTML += "</div>" + value.Student_Name + "</div>";
          HTML += "</td>";
          HTML +=
            '<td class="py-3 border-primary">' + value.Student_Gender + "</td>";
          HTML +=
            '<td class="py-3 border-primary "><img class="object-fit-cover border rounded" style="width: 90px; height:70px ;  " src="upload_Student/' +
            value.image_Student+
            '" alt="' +
            value.Student_Name +
            '"></td>';
          HTML +=
            '<td class="py-3 border-primary">' + value.Student_Email + "</td>";
          HTML +=
            '<td class="py-3 border-primary"><p>' +
            value.Student_Address +
            "</p></td>";
          HTML +=
            '<td class="py-3 border-primary"><p>' +
            value.Country_student +
            "</p></td>";
          HTML +=
            '<td class="py-3 border-primary"><p>' +
            value.Student_course +
            "</p></td>";
          HTML +=
            '<td class="py-3 border-primary">' + value.Date_Student + "</td>";
          HTML += '<td class="py-3 border-primary">';
          HTML += '<div class="position-relative ">';
          HTML +=
            '<button type="button" class="btn btnEdit" value="' +
            value.Student_ID +
            '" ><i class="gd-pencil icon-text"></i></button>';
          HTML +=
            '<button type="button" class="ml-2 btn BtnDelete" value="' +
            value.Student_ID +
            '" ><i class="gd-trash icon-text"></i></button>';
          HTML +=
            '<input type="hidden" class="imageDelete" value="' +
            value.image_Student +
            '"></input>';
          HTML += "</div>";
          HTML += "</td>";
          HTML += "</tr>";
        });
        $("#TbodyforStudent").html(HTML);
      } else {
        $("#TbodyforStudent").html(
          '<tr ><td colspan="8" class="py-3 border-primary"> Not have student !<td/><tr/>'
        );
      }
    },
  });
}

//  Create Delete Student
$(document).on("click", ".BtnDelete", function () {
  $("#deleteStudentmodal").modal("show");
  var id = $(this).val();
  var imageFordelete = $(this).closest("td").find(".imageDelete").val();
  $(document).on("click", ".ModalDeleteBtn", function () {
    $("#deleteStudentmodal").modal("hide");
    $.ajax({
      type: "post",
      url: "ServerStudent.php?action=DeleteStudent",
      data: { id: id, image: imageFordelete },
      dataType: "json",
      success: function (response) {
        Fetchdata(currentPage);
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
});

//  Update student but fetch individual
$(document).on("click", ".btnEdit", function () {
  $("#MymodalUpdatestudent").modal("show");
  var id = $(this).val();
  $.ajax({
    type: "post",
    url: "ServerStudent.php?action=FetchSingle",
    data: { id: id },
    dataType: "json",
    success: function (response) {
      if (response.status == 200) {
        var data = response.data;
        $("#id").val(data.Student_ID);
        $("#name").val(data.Student_Name);
        $("#email").val(data.Student_Email);
        $("#country").val(data.Country_student);
        $("#Province_city").val(data.Student_Address);
        $("input[name='Gender'][value = '" + data.Student_Gender + "']").prop(
          "checked",
          true
        );
        $("#date").val(data.Date_Student);
        $("#course").val(data.Student_course);
        $("#old_image").val(data.image_Student);
      }
    },
  });
});

//  submit for update
$("#BtnUpdateStudent").click(function (e) {
  e.preventDefault();
  
  $("#MymodalUpdatestudent").modal("hide");
  var dataForUpdate = new FormData($("#formUpdateStudent")[0]);
  dataForUpdate.append("old_image", $("#old_image").val());
  dataForUpdate.append("myimage", $("#myimage")[0].files[0]);
  $.ajax({
    type: "post",
    url: "ServerStudent.php?action=UpdateStudent",
    data: dataForUpdate,
    processData: false,
    contentType: false,
    success: function (response) {
      Fetchdata();
      if (response.status == 200) {
        $("#formUpdateStudent")[0].reset();
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
          icon: "warning",
          title: response.message,
        });
      }
    },
  });
});

//  pagination
$(".pagination li").click(function (e) {
  e.preventDefault();
  var numpage = $(this).attr("data-page");
  var id = $(this).attr("id");
  $(".page-item").removeClass("active");
  $("#" + id).addClass("active");
  Fetchdata(numpage);
});

//  Previouse button
$("#PreviousButton").click(function (e) {
  e.preventDefault();
  if (currentPage > 1) {
    currentPage--;
    Fetchdata(currentPage);
  }
});

//   Next button
$("#NextButton").click(function (e) {
  e.preventDefault();
  currentPage++;
  Fetchdata(currentPage);
});

//  Search live
$("#live_search").keyup(function (e) {
  var Value = $(this).val();
  if (Value != "") {
    $.ajax({
      type: "post",
      url: "ServerStudent.php?action=SearchStudent",
      data: { Value: Value },
      success: function (response) {
        $("#TbodyforStudent").html(response.data);
      },
    });
  } else {
    Fetchdata();
  }
});

//  Course Statistics
var csts = 1;
CourseStatistics(csts);
function CourseStatistics(pagestatistics) {
  $.ajax({
    type: "get",
    url: "ServerLocation.php?action=mycourseStatistics",
    data: { pagestatistics: pagestatistics },
    dataType: "json",
    success: function (response) {
      var statistics = response.data;
      if (statistics.length > 0) {
        var HTML = "";
        $.each(statistics, function (index, value) {
          HTML += "<tr>";
          HTML +=
            '<td class ="py-3 border-primary" >' +
            value.Student_course +
            "</td>";
          HTML +=
            '<td class ="py-3 border-primary mx-auto p-2" >' +
            value.CourseNumber +
            "  People" +
            "</td>";
        });
        $("#myTableBodycoursestatictics").html(HTML);
      }
    },
  });
}
