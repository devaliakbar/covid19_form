var save = () => {
  var record = {};

  if ($("#full_name").val() == "") {
    return alert("Please enter name");
  }

  record.organisation_name = $("#organisation_name").val().trim();

  record.ward_no = $("#ward_no").val().trim();

  record.full_name = $("#full_name").val().trim();

  if ($("#sex").prop("checked")) {
    record.sex = true;
  } else {
    record.sex = false;
  }

  record.age = $("#age").val().trim() == "" ? 0 : $("#age").val().trim();

  record.address = $("#address").val().trim();

  record.current_country = $("#current_country").val().trim();

  if ($("#return_registered").prop("checked")) {
    record.return_registered = true;
  } else {
    record.return_registered = false;
  }

  if ($("#any_disease").prop("checked")) {
    record.any_disease = true;
  } else {
    record.any_disease = false;
  }

  record.disease_info = $("#disease_info").val().trim();

  if ($("#room_available").prop("checked")) {
    record.room_available = true;
  } else {
    record.room_available = false;
  }

  if ($("#aged_person").prop("checked")) {
    record.aged_person = true;
  } else {
    record.aged_person = false;
  }

  if ($("#bed_rest_person").prop("checked")) {
    record.bed_rest_person = true;
  } else {
    record.bed_rest_person = false;
  }

  if ($("#desease_people").prop("checked")) {
    record.desease_people = true;
  } else {
    record.desease_people = false;
  }

  if ($("#pregnant_people").prop("checked")) {
    record.pregnant_people = true;
  } else {
    record.pregnant_people = false;
  }

  if ($("#confirmation_from_rrt").prop("checked")) {
    record.confirmation_from_rrt = true;
  } else {
    record.confirmation_from_rrt = false;
  }

  if ($("#relative_home_available").prop("checked")) {
    record.relative_home_available = true;
  } else {
    record.relative_home_available = false;
  }

  record.rrt_name = $("#rrt_name").val().trim();

  if ($("#relative_confirmation_from_rrt").prop("checked")) {
    record.relative_confirmation_from_rrt = true;
  } else {
    record.relative_confirmation_from_rrt = false;
  }

  console.log(record);
};
