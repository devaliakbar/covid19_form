$(".preview_btn").hide();

//LOADING IF EDIT ACTION
$(document).ready(function () {
  //////////SETTING MAP////////////
  //////////SETTING MAP////////////

  var autocomplete;
  autocomplete = new google.maps.places.Autocomplete(
    document.getElementById("location"),
    {
      types: ["geocode"],
    }
  );

  google.maps.event.addListener(autocomplete, "place_changed", function () {
    var near_place = autocomplete.getPlace();

    currentPersonLocation = {
      location: $("#location").val(),
      lat: near_place.geometry.location.lat(),
      lon: near_place.geometry.location.lng(),
    };
  });

  //FOR VISITED PLACE
  var visitedAutocomplete;
  visitedAutocomplete = new google.maps.places.Autocomplete(
    document.getElementById("visited_location"),
    {
      types: ["geocode"],
    }
  );

  google.maps.event.addListener(
    visitedAutocomplete,
    "place_changed",
    function () {
      var near_place = visitedAutocomplete.getPlace();

      addVisitedPlace(
        $("#visited_location").val().trim(),
        near_place.geometry.location.lat(),
        near_place.geometry.location.lng()
      );
    }
  );

  //FOR PRIMARY VISIT
  var primaryLocAutocomplete;
  primaryLocAutocomplete = new google.maps.places.Autocomplete(
    document.getElementById("p_location"),
    {
      types: ["geocode"],
    }
  );

  google.maps.event.addListener(
    primaryLocAutocomplete,
    "place_changed",
    function () {
      var near_place = primaryLocAutocomplete.getPlace();

      currentPrimaryContactPersonLocation = {
        location: $("#p_location").val().trim(),
        lat: near_place.geometry.location.lat(),
        lon: near_place.geometry.location.lng(),
      };
    }
  );

  //FOR SECONDARY VISIT
  var secondaryLocAutocomplete;
  secondaryLocAutocomplete = new google.maps.places.Autocomplete(
    document.getElementById("s_location"),
    {
      types: ["geocode"],
    }
  );

  google.maps.event.addListener(
    secondaryLocAutocomplete,
    "place_changed",
    function () {
      var near_place = secondaryLocAutocomplete.getPlace();

      currentSecondaryContactPersonLocation = {
        location: $("#s_location").val().trim(),
        lat: near_place.geometry.location.lat(),
        lon: near_place.geometry.location.lng(),
      };
    }
  );

  //////////SETTING MAP////////////
  //////////SETTING MAP////////////

  const urlParams = new URLSearchParams(window.location.search);
  query = urlParams.get("q");
  if (query != null) {
    $(".preview_btn").show();
    fetchData();
  }
});

var fetchData = async () => {
  showLoader();

  const response = await fetch("api/get_quarantine_detail.php?q=" + query, {
    method: "GET",
  });
  hideLoader();
  if (response.status == 200) {
    var jsonResponce = await response.json();
    if (jsonResponce["success"]) {
      displayDetails(
        jsonResponce["quarantine_details"],
        jsonResponce["family"],
        jsonResponce["visited"],
        jsonResponce["primary_contact"],
        jsonResponce["secondary_contact"]
      );
    } else {
      alert("Failed To Connect");
    }
  } else {
    alert("Failed To Connect");
  }
};

var displayDetails = (
  quarantineDetails,
  family,
  visitedPlace,
  primaryContact,
  secondaryContact
) => {
  //******* */

  currentPersonLocation = {
    location: quarantineDetails["location"],
    lat: quarantineDetails["lat"],
    lon: quarantineDetails["lon"],
  };

  $("#location").val(currentPersonLocation.location);

  //******* */

  $("#full_name").val(quarantineDetails["full_name"]);
  $("#age").val(quarantineDetails["age"]);

  if (quarantineDetails["sex"] == "1") {
    $("#sex").attr("checked", "checked");
  } else if (quarantineDetails["sex"] == "0") {
    $('[name="sex"]').attr("checked", "checked");
  }

  $("#contact_number").val(quarantineDetails["contact_number"]);

  $("#district").val(quarantineDetails["district"]);

  $("#address").val(quarantineDetails["address"]);

  $("#passport_number").val(quarantineDetails["passport_number"]);

  $("#orgin_country").val(quarantineDetails["orgin_country"]);

  $("#orgin_state").val(quarantineDetails["orgin_state"]);

  $("#orgin_district").val(quarantineDetails["orgin_district"]);

  $("#phc_area").val(quarantineDetails["phc_area"]);

  $("#phc_medical_officer_contact_number").val(
    quarantineDetails["phc_medical_officer_contact_number"]
  );

  $("#place_to_vist").val(quarantineDetails["place_to_vist"]);

  $("#departure_date").val(quarantineDetails["departure_date"]);

  $("#arrival_date").val(quarantineDetails["arrival_date"]);

  $("#date_of_information_received").val(
    quarantineDetails["date_of_information_received"]
  );

  $("#source_of_information").val(quarantineDetails["source_of_information"]);

  $("#panchayat_ward_no").val(quarantineDetails["panchayat_ward_no"]);

  $("#source_of_contact_number").val(
    quarantineDetails["source_of_contact_number"]
  );

  $("#observation_started_date").val(
    quarantineDetails["observation_started_date"]
  );

  $("#observation_end_date").val(quarantineDetails["observation_end_date"]);

  if (quarantineDetails["current_health_status"] == "1") {
    $("#current_health_status").attr("checked", "checked");
  } else if (quarantineDetails["current_health_status"] == "0") {
    $('[name="current_health_status"]').attr("checked", "checked");
  }

  if (quarantineDetails["risk_categorization"] == "1") {
    $("#risk_categorization").attr("checked", "checked");
  } else if (quarantineDetails["risk_categorization"] == "0") {
    $('[name="risk_categorization"]').attr("checked", "checked");
  }

  if (quarantineDetails["sample_to_test_taken"] == "1") {
    $("#sample_to_test_taken").attr("checked", "checked");
  } else if (quarantineDetails["sample_to_test_taken"] == "0") {
    $('[name="sample_to_test_taken"]').attr("checked", "checked");
  }

  $("#date_of_sample_taken").val(quarantineDetails["date_of_sample_taken"]);

  $("#result").val(quarantineDetails["result"]);

  if (quarantineDetails["travelled_with_positive_case"] == "1") {
    $("#travelled_with_positive_case").attr("checked", "checked");
  } else if (quarantineDetails["travelled_with_positive_case"] == "0") {
    $('[name="travelled_with_positive_case"]').attr("checked", "checked");
  }

  $("#remark").val(quarantineDetails["remark"]);

  //************************* */
  $("#under_five").val(family["under_five"]);

  $("#five_to_ten").val(family["five_to_ten"]);

  $("#ten_to_seventeen").val(family["ten_to_seventeen"]);

  $("#seventeen_to_fiftynine").val(family["seventeen_to_fiftynine"]);

  $("#sixty_and_above").val(family["sixty_and_above"]);

  $("#details").val(family["details"]);

  //************************ */

  visitedLocation = visitedPlace == undefined ? [] : visitedPlace;
  primaryContactPersons = primaryContact == undefined ? [] : primaryContact;
  secondaryContactPersons =
    secondaryContact == undefined ? [] : secondaryContact;

  fillVisitedPlace();
  fillPrimaryContactPersons();
  fillSecondaryContactPersons();
};

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//PRIMARY CONTACT PERSONS
var primaryContactPersons = [];
var currentPrimaryContactPersonLocation = { location: "", lat: "0", lon: "0" };

var addPrimaryContactPerson = () => {
  var name = mysql_real_escape_string($("#p_name").val().trim());

  if (name == "") {
    return alert("Please enter the name");
  }

  var mobile = mysql_real_escape_string($("#p_mobile").val().trim());
  var age = mysql_real_escape_string(
    $("#p_age").val().trim() == "" ? 0 : $("#p_age").val().trim()
  );

  var currentPerson = {
    name: name,
    mobile_no: mobile,
    age: age,
    location: mysql_real_escape_string(
      currentPrimaryContactPersonLocation.location
    ),
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
  var name = mysql_real_escape_string($("#s_name").val().trim());

  if (name == "") {
    return alert("Please enter the name");
  }

  var mobile = mysql_real_escape_string($("#s_mobile").val().trim());
  var age = mysql_real_escape_string(
    $("#s_age").val().trim() == "" ? 0 : $("#s_age").val().trim()
  );
  var location = $("#s_location").val().trim();

  var currentPerson = {
    name: name,
    mobile_no: mobile,
    age: age,
    location: mysql_real_escape_string(location),
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

var addVisitedPlace = (loationName, lat, lon) => {
  var currentVisitedLocation = {
    location_name: loationName,
    lat: lat,
    lon: lon,
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

var currentPersonLocation = { location: "", lat: "0", lon: "0" };

//SAVE
var save = () => {
  var record = {};

  if ($("#full_name").val().trim() == "") {
    return alert("Please enter name");
  }

  record.full_name = mysql_real_escape_string($("#full_name").val().trim());

  record.age = mysql_real_escape_string(
    $("#age").val().trim() == "" ? 0 : $("#age").val().trim()
  );

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

  record.location = mysql_real_escape_string(currentPersonLocation.location);
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

  record.panchayat_ward_no = mysql_real_escape_string(
    $("#panchayat_ward_no").val().trim()
  );

  record.source_of_contact_number = mysql_real_escape_string(
    $("#source_of_contact_number").val().trim()
  );

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

  record.remark = mysql_real_escape_string($("#remark").val().trim());

  record.under_five = mysql_real_escape_string(
    $("#under_five").val().trim() == "" ? 0 : $("#under_five").val().trim()
  );

  record.five_to_ten = mysql_real_escape_string(
    $("#five_to_ten").val().trim() == "" ? 0 : $("#five_to_ten").val().trim()
  );

  record.ten_to_seventeen = mysql_real_escape_string(
    $("#ten_to_seventeen").val().trim() == ""
      ? 0
      : $("#ten_to_seventeen").val().trim()
  );

  record.seventeen_to_fiftynine = mysql_real_escape_string(
    $("#seventeen_to_fiftynine").val().trim() == ""
      ? 0
      : $("#seventeen_to_fiftynine").val().trim()
  );

  record.sixty_and_above = mysql_real_escape_string(
    $("#sixty_and_above").val().trim() == ""
      ? 0
      : $("#sixty_and_above").val().trim()
  );

  record.details = mysql_real_escape_string($("#details").val().trim());

  record.visitedLocation = visitedLocation;

  record.primaryContactList = primaryContactPersons;

  record.secondaryConatctList = secondaryContactPersons;

  saveToServer(record);
};

var saveToServer = async (body) => {
  var url = "api/add_quarantine.php";

  if (query != null) {
    url = "api/update_quarantine.php";
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
      $(".preview_btn").show();
      if (query == null) {
        query = jsonResponce["id"];
      }
      alert("Successfully Saved");
    } else {
      alert("Failed To Save");
    }
  } else {
    alert("Failed To Save");
  }
};

function mysql_real_escape_string(str) {
  str = str.toString();
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
  window.location = "quarantine_report.php?q=" + query;
};
