var query;
$(document).ready(function () {
  $("#any_disease").change(function () {
    if ($("#any_disease").prop("checked")) {
      $("#disease").show();
    }
  });

  $("#false_desease").change(function () {
    if ($("#false_desease").prop("checked")) {
      $("#disease").hide();
    }
  });

  $("#room_available").change(function () {
    if ($("#room_available").prop("checked")) {
      $("#home-quar").show();
    }
  });

  $("#no_room_available").change(function () {
    if ($("#no_room_available").prop("checked")) {
      $("#home-quar").hide();
    }
  });

  $("#disease").hide();
  $("#home-quar").hide();

  const urlParams = new URLSearchParams(window.location.search);
  query = urlParams.get("q");
  if (query != null) {
    fetchData();
  } else {
    $(".dlt").hide();
    $(".print").hide();
  }
});

//FETCH IF UPDATE
var fetchData = async () => {
  showLoader();

  const response = await fetch("api/get_persons_detail.php?q=" + query, {
    method: "GET",
  });
  hideLoader();
  if (response.status == 200) {
    var jsonResponce = await response.json();
    if (jsonResponce["success"]) {
      displayDetails(jsonResponce["person_details"]);
    } else {
      alert("Failed To Connect");
    }
  } else {
    alert("Failed To Connect");
  }
};
//SETTING PREV VALUES
var displayDetails = (personDetails) => {
  $("#organisation_name").val(personDetails["organisation_name"]);

  $("#ward_no").val(personDetails["ward_no"]);

  $("#full_name").val(personDetails["full_name"]);

  if (personDetails["sex"] == "1") {
    $("#sex").attr("checked", "checked");
  } else {
    $('[name="sex"]').attr("checked", "checked");
  }

  $("#age").val(personDetails["age"]);

  $("#address").val(personDetails["address"]);

  $("#current_country").val(personDetails["current_country"]);

  if (personDetails["return_registered"] == "1") {
    $("#return_registered").attr("checked", "checked");
  } else {
    $('[name="return_registered"]').attr("checked", "checked");
  }

  if (personDetails["any_disease"] == "1") {
    $("#any_disease").attr("checked", "checked");
    //IF DESEASES
    $("#disease").show();
    $("#disease_info").val(personDetails["disease_info"]);
  } else {
    $('[name="any_disease"]').attr("checked", "checked");
  }

  if (personDetails["room_available"] == "1") {
    $("#room_available").attr("checked", "checked");
    $("#home-quar").show();
    //CONDITION IF ROOM AVAILABLE
    if (personDetails["aged_person"] == "1") {
      $("#aged_person").attr("checked", "checked");
    } else {
      $('[name="aged_person"]').attr("checked", "checked");
    }

    if (personDetails["bed_rest_person"] == "1") {
      $("#bed_rest_person").attr("checked", "checked");
    } else {
      $('[name="bed_rest_person"]').attr("checked", "checked");
    }

    if (personDetails["desease_people"] == "1") {
      $("#desease_people").attr("checked", "checked");
    } else {
      $('[name="desease_people"]').attr("checked", "checked");
    }

    if (personDetails["pregnant_people"] == "1") {
      $("#pregnant_people").attr("checked", "checked");
    } else {
      $('[name="pregnant_people"]').attr("checked", "checked");
    }

    if (personDetails["confirmation_from_rrt"] == "1") {
      $("#confirmation_from_rrt").attr("checked", "checked");
    } else {
      $('[name="confirmation_from_rrt"]').attr("checked", "checked");
    }

    if (personDetails["relative_home_available"] == "1") {
      $("#relative_home_available").attr("checked", "checked");
    } else {
      $('[name="relative_home_available"]').attr("checked", "checked");
    }

    if (personDetails["relative_confirmation_from_rrt"] == "1") {
      $("#relative_confirmation_from_rrt").attr("checked", "checked");
    } else {
      $('[name="relative_confirmation_from_rrt"]').attr("checked", "checked");
    }

    $("#rrt_name").val(personDetails["rrt_name"]);

    //
  } else {
    $('[name="room_available"]').attr("checked", "checked");
  }
};

//SAVE
var save = () => {
  var record = {};

  if ($("#full_name").val() == "") {
    return alert("Please enter name");
  }

  record.organisation_name = mysql_real_escape_string(
    $("#organisation_name").val().trim()
  );

  record.ward_no = mysql_real_escape_string($("#ward_no").val().trim());

  record.full_name = mysql_real_escape_string($("#full_name").val().trim());

  if ($("#sex").prop("checked")) {
    record.sex = 1;
  } else {
    record.sex = 0;
  }

  record.age = $("#age").val().trim() == "" ? 0 : $("#age").val().trim();

  record.address = mysql_real_escape_string($("#address").val().trim());

  record.current_country = mysql_real_escape_string(
    $("#current_country").val().trim()
  );

  if ($("#return_registered").prop("checked")) {
    record.return_registered = 1;
  } else {
    record.return_registered = 0;
  }

  if ($("#any_disease").prop("checked")) {
    record.any_disease = 1;
  } else {
    record.any_disease = 0;
  }

  record.disease_info = mysql_real_escape_string(
    $("#disease_info").val().trim()
  );

  if ($("#room_available").prop("checked")) {
    record.room_available = 1;
  } else {
    record.room_available = 0;
  }

  if ($("#aged_person").prop("checked")) {
    record.aged_person = 1;
  } else {
    record.aged_person = 0;
  }

  if ($("#bed_rest_person").prop("checked")) {
    record.bed_rest_person = 1;
  } else {
    record.bed_rest_person = 0;
  }

  if ($("#desease_people").prop("checked")) {
    record.desease_people = 1;
  } else {
    record.desease_people = 0;
  }

  if ($("#pregnant_people").prop("checked")) {
    record.pregnant_people = 1;
  } else {
    record.pregnant_people = 0;
  }

  if ($("#confirmation_from_rrt").prop("checked")) {
    record.confirmation_from_rrt = 1;
  } else {
    record.confirmation_from_rrt = 0;
  }

  if ($("#relative_home_available").prop("checked")) {
    record.relative_home_available = 1;
  } else {
    record.relative_home_available = 0;
  }

  if ($("#relative_confirmation_from_rrt").prop("checked")) {
    record.relative_confirmation_from_rrt = 1;
  } else {
    record.relative_confirmation_from_rrt = 0;
  }

  record.rrt_name = mysql_real_escape_string($("#rrt_name").val().trim());

  saveToServer(record);
};

var saveToServer = async (body) => {
  var url = "api/add.php";
  if (query != null) {
    url = "api/update.php";
    body.id = query;
  }

  showLoader();
  const response = await fetch(url, {
    method: "POST",
    body: JSON.stringify(body),
  });
  hideLoader();
  if (response.status == 200) {
    var jsonResponce = await response.json();
    if (jsonResponce["success"]) {
      if (query == null) {
        query = jsonResponce["id"];
      }
      $(".dlt").show();
      $(".print").show();

      alert("Successfully Saved");
    } else {
      alert("Failed To Save");
    }
  } else {
    alert("Failed To Save");
  }
};

var deleteRecord = async () => {
  var deleteConfirm = confirm("Are you sure, do you want to delete?");

  if (deleteConfirm == false) {
    return;
  }

  showLoader();
  const response = await fetch("api/delete.php", {
    method: "POST",
    body: JSON.stringify({ id: query }),
  });
  hideLoader();
  if (response.status == 200) {
    var jsonResponce = await response.json();
    if (jsonResponce["success"]) {
      alert("Successfully Deleted");
      window.location.replace("index.php");
    } else {
      alert("Failed To Delete");
    }
  } else {
    alert("Failed To Delete");
  }
};

function mysql_real_escape_string(str) {
  return str.replace(/[\0\x08\x09\x1a\n\r"'\\\%]/g, function (char) {
    switch (char) {
      case "\0":
        return "\\0";
      case "\x08":
        return "\\b";
      case "\x09":
        return "\\t";
      case "\x1a":
        return "\\z";
      case "\n":
        return "\\n";
      case "\r":
        return "\\r";
      case '"':
      case "'":
      case "\\":
      case "%":
        return "\\" + char; // prepends a backslash to backslash, percent,
      // and double/single quotes
      default:
        return char;
    }
  });
}

var showReport = () => {
  window.open("report.php?q=" + query);
};
