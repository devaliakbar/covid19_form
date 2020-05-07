$(".preview_btn").hide();

//PRIMARY CONTACT PERSONS
var primaryContactPersons = [];
var currentPrimaryContactPersonLocation = { location: "", lat: "0", lon: "0" };

var addPrimaryContactPerson = () => {
  var name = $("#p_name").val();

  if (name == "") {
    return alert("Please enter the name");
  }

  var mobile = $("#p_mobile").val();
  var age = $("#p_age").val();
  var location = $("#p_location").val();

  var currentPerson = {
    name: name,
    mobile_no: mobile,
    age: age,
    location: location,
    lat: currentPrimaryContactPersonLocation.lat,
    lon: currentPrimaryContactPersonLocation.lon,
  };

  primaryContactPersons.push(currentPerson);

  currentPrimaryContactPersonLocation = { location: "", lat: "0", lon: "0" };

  $("#p_name").val("");
  $("#p_mobile").val("");
  $("#p_age").val("");
  $("#p_location").val("");

  fillPrimaryContactPersons();
};

var fillPrimaryContactPersons = () => {
  jQuery("#primary_contact_tbl").empty();
  for (var i = 0; i < primaryContactPersons.length; i++) {
    var primaryContactPersonInfo =
      "<tr><td>" +
      primaryContactPersons[i].name +
      "</td><td>" +
      primaryContactPersons[i].mobile_no +
      "</td><td>" +
      primaryContactPersons[i].age +
      "</td> <td>" +
      primaryContactPersons[i].location +
      "</td><td><button onclick='removePrimaryContactPerson(" +
      i +
      ")'><i class='fa fa-trash' aria-hidden='true'></i></button></td></tr>";

    jQuery("#primary_contact_tbl").append(primaryContactPersonInfo);
  }
};

var removePrimaryContactPerson = (index) => {
  primaryContactPersons.splice(index, 1);
  fillPrimaryContactPersons();
};

//SECONDARY CONTACT PERSON

var secondaryContactPersons = [];
var currentSecondaryContactPersonLocation = {
  location: "",
  lat: "0",
  lon: "0",
};

var addSecondaryContactPerson = () => {
  var name = $("#s_name").val();

  if (name == "") {
    return alert("Please enter the name");
  }

  var mobile = $("#s_mobile").val();
  var age = $("#s_age").val();
  var location = $("#s_location").val();

  var currentPerson = {
    name: name,
    mobile_no: mobile,
    age: age,
    location: location,
    lat: currentSecondaryContactPersonLocation.lat,
    lon: currentSecondaryContactPersonLocation.lon,
  };

  secondaryContactPersons.push(currentPerson);

  currentSecondaryContactPersonLocation = { location: "", lat: "0", lon: "0" };

  $("#s_name").val("");
  $("#s_mobile").val("");
  $("#s_age").val("");
  $("#s_location").val("");

  fillSecondaryContactPersons();
};

var fillSecondaryContactPersons = () => {
  jQuery("#secondary_contact_tbl").empty();
  for (var i = 0; i < secondaryContactPersons.length; i++) {
    var secondaryContactPersonInfo =
      "<tr><td>" +
      secondaryContactPersons[i].name +
      "</td><td>" +
      secondaryContactPersons[i].mobile_no +
      "</td><td>" +
      secondaryContactPersons[i].age +
      "</td> <td>" +
      secondaryContactPersons[i].location +
      "</td><td><button onclick='removeSecondaryContactPerson(" +
      i +
      ")'><i class='fa fa-trash' aria-hidden='true'></i></button></td></tr>";

    jQuery("#secondary_contact_tbl").append(secondaryContactPersonInfo);
  }
};

var removeSecondaryContactPerson = (index) => {
  secondaryContactPersons.splice(index, 1);
  fillSecondaryContactPersons();
};

//VISITED PLACES

var visitedLocation = [];

var addVisitedPlace = () => {
  var currentVisitedPlace = $("#visited_location").val().trim();
  if (currentVisitedPlace == "") {
    alert("Enter a Location Name");
    return;
  }

  var currentVisitedLocation = {
    location_name: currentVisitedPlace,
    lat: "0",
    lon: "0",
  };

  visitedLocation.push(currentVisitedLocation);

  $("#visited_location").val("");

  fillVisitedPlace();
};

var fillVisitedPlace = () => {
  jQuery(".add-list").empty();
  for (var i = 0; i < visitedLocation.length; i++) {
    var locationName =
      "<div class='item'>" +
      visitedLocation[i].location_name +
      "<span class='close' onclick='removeVisitedPlace(" +
      i +
      ")'>X</span></div>";

    jQuery(".add-list").append(locationName);
  }
};

var removeVisitedPlace = (index) => {
  visitedLocation.splice(index, 1);
  fillVisitedPlace();
};

var currentPersonLocation = { location: "", lat: "", lon: "" };

//SAVE
var save = () => {
  var record = {};

  if ($("#full_name").val() == "") {
    return alert("Please enter name");
  }

  record.full_name = mysql_real_escape_string($("#full_name").val().trim());

  record.age = $("#age").val().trim() == "" ? 0 : $("#age").val().trim();

  if ($("#sex").prop("checked")) {
    record.sex = 1;
  } else {
    record.sex = 0;
  }

  if (!$('input:radio[name="sex"]').is(":checked")) {
    record.sex = 2;
  }

  record.district = mysql_real_escape_string($("#district").val().trim());

  record.contact_number = mysql_real_escape_string(
    $("#contact_number").val().trim()
  );

  record.address = mysql_real_escape_string($("#address").val().trim());

  record.passport_number = mysql_real_escape_string(
    $("#passport_number").val().trim()
  );

  record.location = currentPersonLocation.location;
  record.lat = currentPersonLocation.lat;
  record.lon = currentPersonLocation.lon;

  record.orgin_country = mysql_real_escape_string(
    $("#orgin_country").val().trim()
  );

  record.orgin_state = mysql_real_escape_string($("#orgin_state").val().trim());

  record.orgin_district = mysql_real_escape_string(
    $("#orgin_district").val().trim()
  );

  record.phc_area = mysql_real_escape_string($("#phc_area").val().trim());

  record.phc_medical_officer_contact_number = mysql_real_escape_string(
    $("#phc_medical_officer_contact_number").val().trim()
  );

  record.place_to_vist = $("#place_to_vist").val().trim();

  record.departure_date = $("#departure_date").val().trim();

  record.arrival_date = $("#arrival_date").val().trim();

  record.date_of_information_received = $("#date_of_information_received")
    .val()
    .trim();

  record.source_of_information = $("#source_of_information").val().trim();

  record.panchayat_ward_no = $("#panchayat_ward_no").val().trim();

  record.observation_started_date = $("#observation_started_date").val().trim();

  record.observation_end_date = $("#observation_end_date").val().trim();

  if ($("#current_health_status").prop("checked")) {
    record.current_health_status = 1;
  } else {
    record.current_health_status = 0;
  }

  if (!$('input:radio[name="current_health_status"]').is(":checked")) {
    record.current_health_status = 2;
  }

  if ($("#risk_categorization").prop("checked")) {
    record.risk_categorization = 1;
  } else {
    record.risk_categorization = 0;
  }

  if (!$('input:radio[name="risk_categorization"]').is(":checked")) {
    record.risk_categorization = 2;
  }

  if ($("#sample_to_test_taken").prop("checked")) {
    record.sample_to_test_taken = 1;
  } else {
    record.sample_to_test_taken = 0;
  }

  if (!$('input:radio[name="sample_to_test_taken"]').is(":checked")) {
    record.sample_to_test_taken = 2;
  }

  record.date_of_sample_taken = $("#date_of_sample_taken").val().trim();

  record.result = $("#result").val().trim();

  if ($("#travelled_with_positive_case").prop("checked")) {
    record.travelled_with_positive_case = 1;
  } else {
    record.travelled_with_positive_case = 0;
  }

  if (!$('input:radio[name="travelled_with_positive_case"]').is(":checked")) {
    record.travelled_with_positive_case = 2;
  }

  record.result = $("#remark").val().trim();

  record.under_five = $("#under_five").val().trim();

  record.five_to_ten = $("#five_to_ten").val().trim();

  record.ten_to_seventeen = $("#ten_to_seventeen").val().trim();

  record.seventeen_to_fiftynine = $("#seventeen_to_fiftynine").val().trim();

  record.sixty_and_above = $("#sixty_and_above").val().trim();

  record.details = $("#details").val().trim();

  record.visitedLocation = visitedLocation;

  record.primaryContactList = primaryContactPersons;

  record.secondaryConatctList = secondaryContactPersons;

  console.log(record);

  return;
  saveToServer(record);
};

var saveToServer = async (body) => {
  var url = "api/add.php";
  showLoader();
  const response = await fetch(url, {
    method: "POST",
    body: JSON.stringify(body),
  });
  hideLoader();
  if (response.status == 200) {
    var jsonResponce = await response.json();
    if (jsonResponce["success"]) {
      $(".preview_btn").show();
      alert("Successfully Saved");
    } else {
      alert("Failed To Save");
    }
  } else {
    alert("Failed To Save");
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
