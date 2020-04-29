var save = () => {
  var record = {};

  if ($("#full_name").val() == "") {
    return alert("Please enter name");
  }

  record.organisation_name = $("#organisation_name").val().trim();

  record.ward_no = $("#ward_no").val().trim();

  record.full_name = $("#full_name").val().trim();

  if ($("#sex").prop("checked")) {
    record.sex = 1;
  } else {
    record.sex = 0;
  }

  record.age = $("#age").val().trim() == "" ? 0 : $("#age").val().trim();

  record.address = $("#address").val().trim();

  record.current_country = $("#current_country").val().trim();

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

  record.disease_info = $("#disease_info").val().trim();

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

  record.rrt_name = $("#rrt_name").val().trim();

  if ($("#relative_confirmation_from_rrt").prop("checked")) {
    record.relative_confirmation_from_rrt = 1;
  } else {
    record.relative_confirmation_from_rrt = 0;
  }

  saveToServer(record);
};

var saveToServer = async (body) => {
  showLoader();
  const response = await fetch("api/add.php", {
    method: "POST",
    body: JSON.stringify(body),
  });
  hideLoader();
  if (response.status == 200) {
    var jsonResponce = await response.json();
    if (jsonResponce["success"]) {
      alert("Successfully Saved");
    } else {
      alert("Failed To Save");
    }
  } else {
    alert("Failed To Save");
  }
};
