var searchTimer;

$(document).ready(function () {
  fetchData();

  $("#search_key").on("change keyup paste", function () {
    if (searchTimer) {
      clearTimeout(searchTimer);
      searchTimer = null;
    }
    searchTimer = setTimeout(() => {
      fetchData();
    }, 1000);
  });
});

var fetchData = async () => {
  showLoader();

  var url = "api/get_persons.php";
  if ($("#search_key").val().trim() != "") {
    url += "?q=" + $("#search_key").val().trim();
  }

  const response = await fetch(url, {
    method: "GET",
  });
  hideLoader();
  if (response.status == 200) {
    var jsonResponce = await response.json();
    if (jsonResponce["success"]) {
      fillTable(jsonResponce["persons"]);
    } else {
      if (jsonResponce["status"] == "EMPTY") {
        fillTable([]);
      } else {
        alert("Failed To Connect");
      }
    }
  } else {
    alert("Failed To Connect");
  }
};

var fillTable = (persons) => {
  jQuery(".tbody").empty();
  for (var i = 0; i < persons.length; i++) {
    var gender = persons[i]["sex"] == "1" ? "Male" : "Female";
    var appendRaw =
      "<div class='tr'>";
    appendRaw += "<div class='td'>" + (i + 1) + "</div>";
    appendRaw += "<div class='td'>" + persons[i]["full_name"] + "</div>";
    appendRaw += "<div class='td'>" + gender + "</div>";
    appendRaw += "<div class='td'>" + persons[i]["age"] + "</div>";
    appendRaw += "<div class='td'>" + persons[i]["current_country"] + "</div>";
    appendRaw += "<div class='td'>" + persons[i]["address"] + "</div>";
    appendRaw += "<a href='report.php?q=" + persons[i]["_id"] + "' class='td'> <i class='fas fa-eye'></i></a>";
    appendRaw += "<a href='add.php?q=" + persons[i]["_id"] + "' class='td'> <i class='fa fa-edit' aria-hidden='true'></i></div></a>";
    appendRaw += "</div>";
    jQuery(".tbody").append(appendRaw);
  }
};
