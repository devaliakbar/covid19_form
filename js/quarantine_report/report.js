//SETTING MAP

function initMap() {
  var currentLat = 9.9312;
  var currentLon = 76.2673;

  if (currentPersonLocation.lat != "0" && currentPersonLocation.lon != "0") {
    currentLat = parseFloat(currentPersonLocation.lat);
    currentLon = parseFloat(currentPersonLocation.lon);
  }

  var map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: currentLat, lng: currentLon },
    zoom: 11,
  });

  if (currentPersonLocation.lat != "0" && currentPersonLocation.lon != "0") {
    new google.maps.Marker({
      position: { lat: currentLat, lng: currentLon },
      map: map,
      label: {
        fontSize: "11pt",
        fontWeight: "bold",
        color: "blue",
        text: $("#full_name").val(),
      },
      animation: google.maps.Animation.BOUNCE,
    });
  }

  //SETTING VISITED PLACES

  for (var i = 0; i < visitedLocation.length; i++) {
    var vLat = parseFloat(visitedLocation[i].lat);
    var vLon = parseFloat(visitedLocation[i].lon);
    new google.maps.Marker({
      position: { lat: vLat, lng: vLon },
      map: map,
      label: {
        fontSize: "11pt",
        color: "blue",
        text: "Visited Place",
        fontWeight: "bold",
      },
      icon: "http://maps.google.com/mapfiles/ms/icons/orange-dot.png",
      animation: google.maps.Animation.BOUNCE,
    });
  }

  //SETTING PRIMARY CONTACT
  for (var i = 0; i < primaryContactPersons.length; i++) {
    var vLat = parseFloat(primaryContactPersons[i].lat);
    var vLon = parseFloat(primaryContactPersons[i].lon);

    if (vLat != "0" && vLon != "0") {
      new google.maps.Marker({
        position: { lat: vLat, lng: vLon },
        map: map,
        label: {
          fontSize: "11pt",
          color: "blue",
          text: "Primary Contact",
          fontWeight: "bold",
        },
        icon: "http://maps.google.com/mapfiles/ms/icons/yellow-dot.png",
        animation: google.maps.Animation.BOUNCE,
      });
    }
  }

  //SETTING SECONDARY CONTACT
  for (var i = 0; i < secondaryContactPersons.length; i++) {
    var vLat = parseFloat(secondaryContactPersons[i].lat);
    var vLon = parseFloat(secondaryContactPersons[i].lon);

    if (vLat != "0" && vLon != "0") {
      new google.maps.Marker({
        position: { lat: vLat, lng: vLon },
        map: map,
        label: {
          fontSize: "11pt",
          color: "blue",
          text: "Secondary Contact",
          fontWeight: "bold",
        },
        icon: "http://maps.google.com/mapfiles/ms/icons/green-dot.png",
        animation: google.maps.Animation.BOUNCE,
      });
    }
  }
}

//LOADING IF EDIT ACTION
$(document).ready(function () {
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

  initMap();
};

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//PRIMARY CONTACT PERSONS
var primaryContactPersons = [];

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
      "</td>";

    jQuery("#primary_contact_tbl").append(primaryContactPersonInfo);
  }
};

//SECONDARY CONTACT PERSON

var secondaryContactPersons = [];

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
      primaryContactPersons[i].location +
      "</td>";

    jQuery("#secondary_contact_tbl").append(secondaryContactPersonInfo);
  }
};

//VISITED PLACES

var visitedLocation = [];

var fillVisitedPlace = () => {
  jQuery(".add-list").empty();
  for (var i = 0; i < visitedLocation.length; i++) {
    var locationName =
      "<div class='item'>" + visitedLocation[i].location_name + "</div>";

    jQuery(".add-list").append(locationName);
  }
};

var currentPersonLocation = { location: "Thoma", lat: "0", lon: "0" };

var editInfo = () => {
  window.location = "quarantine_form.php?q=" + query;
};

var deleteReport = async () => {
  var deleteConfirm = confirm("Are you sure, do you want to delete?");

  if (deleteConfirm == false) {
    return;
  }

  showLoader();
  const response = await fetch("api/delete_quarantine.php", {
    method: "POST",
    body: JSON.stringify({ id: query }),
  });
  hideLoader();
  if (response.status == 200) {
    var jsonResponce = await response.json();
    if (jsonResponce["success"]) {
      alert("Successfully Deleted");
      window.location.replace("quarantine_form_list.php");
    } else {
      alert("Failed To Delete");
    }
  } else {
    alert("Failed To Delete");
  }
};
