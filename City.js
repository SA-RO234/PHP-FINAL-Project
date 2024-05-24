$(document).ready(function () {
  var currentPage = 1;
  //  Fetch Province Statistcs
  StatisticsProvince(currentPage);
  function StatisticsProvince(page) {
    $.ajax({
      type: "post",
      url: "ServerLocation.php?action=FetchStatictics",
      data: { page: page },
      dataType: "json",
      success: function (response) {
        var data = response.data;
        if (data.length > 0) {
          var HTML = "";
          $.each(data, function (index, value) {
            HTML += "<tr>";
            //    HTML +='<td class ="py-3 border-primary" >' + value.City_ID+'</td>'
            //    HTML +='<td class ="py-3 border-primary" >' + value.Country+'</td>'
            HTML +='<td class ="py-3 border-primary" >' +value.Student_Address +"</td>";
            HTML +='<td class ="py-3 border-primary mx-auto p-2" >'+value.Student_Number+"  People"+"</td>";
            $("#myTableBodylocation").html(HTML);
          });
        }
      },
    });
  }

});
