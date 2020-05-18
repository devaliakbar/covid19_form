var countries = [];
var panchayat_list = [];
var district = [
  "Alappuzha",
  "Ernakulam",
  "Idukki",
  "Kannur",
  "Kasaragod",
  "Kollam",
  "Kottayam",
  "Kozhikode",
  "Malappuram",
  "Palakkad",
  "Pathanamthitta",
  "Thrissur",
  "Thiruvananthapuram",
  "Wayanad",
];
var states = [
  "Andhra Pradesh",
  "Arunachal Pradesh",
  "Assam",
  "Bihar",
  "Chhattisgarh",
  "Goa",
  "Gujarat",
  "Haryana",
  "Himachal Pradesh",
  "Jammu and Kashmir",
  "Jharkhand",
  "Karnataka",
  "Kerala",
  "Madhya Pradesh",
  "Maharashtra",
  "Manipur",
  "Meghalaya",
  "Mizoram",
  "Nagaland",
  "Odisha",
  "Punjab",
  "Rajasthan",
  "Sikkim",
  "Tamil Nadu",
  "Telangana",
  "Tripura",
  "Uttarakhand",
  "Uttar Pradesh",
  "West Bengal",
  "Andaman and Nicobar Islands",
  "Chandigarh",
  "Dadra and Nagar Haveli",
  "Daman and Diu",
  "Delhi",
  "Lakshadweep",
  "Puducherry",
];

$(document).ready(function () {
  $("#place_to_vist").change(function () {
    if ($("#place_to_vist").val().trim() == "Inter District") {
      setUpArriveFromLocation(district);
    } else if ($("#place_to_vist").val().trim() == "International") {
      setUpArriveFromLocation(countries);
    } else {
      setUpArriveFromLocation(states);
    }
  });

  //SETTING PANCHAYATH
  $("#state_statutes").change(function () {
    checkPanchayat();
  });
  $("#district").change(function () {
    checkPanchayat();
  });
});

var fetchLocations = async () => {
  showLoader();
  setUpDistrict();
  const response = await fetch("api/get_countries.php", {
    method: "GET",
  });

  if (response.status == 200) {
    var jsonResponce = await response.json();
    if (jsonResponce["success"]) {
      countries = jsonResponce["country_list"];
      // panchayat_list = jsonResponce["panchayat_list"];
      // setUpPanchayat();

      /////////
      ////////
      const urlParams = new URLSearchParams(window.location.search);
      query = urlParams.get("q");
      if (query != null) {
        $(".preview_btn").show();
        fetchData();
      } else {
        hideLoader();
      }
      ///////
      ///////
    } else {
      alert("Failed To Connect");
    }
  } else {
    alert("Failed To Connect");
  }
};

var checkPanchayat = (currentValue) => {
  var district = $("#district").val().trim();
  var type = $("#state_statutes").val().trim();

  if (district == "" || type == "") {
    return;
  }

  fetchPanchayath(district, type, currentValue);
};

var fetchPanchayath = async (district, type, currentValue) => {
  showLoader();
  setUpDistrict();
  const response = await fetch(
    "api/get_panchayat.php?district=" + district + "&type=" + type,
    {
      method: "GET",
    }
  );

  if (response.status == 200) {
    var jsonResponce = await response.json();
    if (jsonResponce["success"]) {
      panchayat_list = jsonResponce["panchayat_list"];
    } else {
      panchayat_list = [];
    }
    setUpPanchayat(currentValue);
    hideLoader();
  } else {
    alert("Failed To Connect");
  }
};

var setUpPanchayat = (currentValue) => {
  $("#state_statutes_name").empty();

  $("#state_statutes_name").append(
    $("<option></option>").attr("value", "").text("State Statutes Name")
  );

  for (var i = 0; i < panchayat_list.length; i++) {
    $("#state_statutes_name").append(
      $("<option></option>")
        .attr("value", panchayat_list[i]["name"])
        .text(panchayat_list[i]["name"])
    );
  }
  $("#state_statutes_name").val(currentValue);
};

var setUpDistrict = () => {
  for (var i = 0; i < district.length; i++) {
    $("#district").append(
      $("<option></option>").attr("value", district[i]).text(district[i])
    );
  }
};

var setUpArriveFromLocation = (locationList) => {
  $("#orgin_country").empty();

  $("#orgin_country").append(
    $("<option></option>").attr("value", "").text("Arrive From")
  );

  for (var i = 0; i < locationList.length; i++) {
    var cLocation =
      locationList[i]["name"] == undefined
        ? locationList[i]
        : locationList[i]["name"];

    $("#orgin_country").append(
      $("<option></option>").attr("value", cLocation).text(cLocation)
    );
  }
};
