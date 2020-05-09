var changeUserPassword = () => {
  var currentPassword = $("#u_c_pass").val().trim();
  var newPassword = $("#u_n_pass").val().trim();

  if (currentPassword == "" || newPassword == "") {
    return alert("Please enter every field");
  }

  updatePassword("user", currentPassword, newPassword);
};

var changeAdminPassword = () => {
  var currentPassword = $("#a_c_pass").val().trim();
  var newPassword = $("#a_n_pass").val().trim();

  if (currentPassword == "" || newPassword == "") {
    return alert("Please enter every field");
  }
  updatePassword("admin", currentPassword, newPassword);
};

var updatePassword = async (username, current, newP) => {
  showLoader();
  const response = await fetch("api/change_password.php", {
    method: "POST",
    body: JSON.stringify({ username, current, newP }),
  });
  hideLoader();
  if (response.status == 200) {
    var jsonResponce = await response.json();
    if (jsonResponce["success"]) {
      alert("Sucessfully Changed Password");
    } else {
      if (jsonResponce["status"] == "USER") {
        alert("Old Password did'nt match");
      } else {
        alert("Failed To Connect");
      }
    }
  } else {
    alert("Failed To Connect");
  }
};
