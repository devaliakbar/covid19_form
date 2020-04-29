<?php
if (isset($_COOKIE['keep_login'])) {
    if ($_COOKIE['keep_login'] == 'false') {
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Record</title>
</head>

<body>

    <main class="payments-page">

        <div class="header">
            <h1>Record</h1>
            <div class="breadcrumb">
                <a href="#" onclick="window.location.replace('index.php')"><i class="fas fa-home"></i></a>
            </div>
            <div class="bottom-header">
            </div>
        </div>

        <div class="content">
            <div class="modal">
                <div class="row">

                    <div class="form-group mb-3 col-md-3">
                        <label  class="mb-2">തദ്ദേശ സ്ഥാപനത്തിന്റെ പേര്</label>
                        <input id="organisation_name" type="text" placeholder="തദ്ദേശ സ്ഥാപനത്തിന്റെ പേര്">
                    </div>

                    <div class="form-group mb-3 col-md-3 ">
                    <label  class="mb-2">വാർഡ് നം.</label>
                        <input id="ward_no" type="text" placeholder="വാർഡ് നം.">
                    </div>

                    <div class="form-group mb-3 col-md-3 ">
                    <label  class="mb-2">പേര്</label>
                        <input id="full_name" type="text" placeholder="പേര്">
                    </div>

                    <div class="form-group radio-inline col-auto mb-3 col-md-3">

                        <label class="custom-radio">പുരുഷൻ <input id="sex" name="sex" type="radio"><span class="checkmark ml-2"></label>
                        <label class="custom-radio">സ്ത്രീ <input name="sex" type="radio"><span class="checkmark ml-2"></label>
                    </div>

                    <div class="form-group mb-3 col-md-3 ">
                    <label  class="mb-2">വയസ്സ്</label>
                        <input id="age" type="number" placeholder="വയസ്സ്">
                    </div>

                    <div class="form-group mb-3 col-md-3 ">
                    <label  class="mb-2">വിലാസം</label>
                        <input id="address" type="text" placeholder="വിലാസം">
                    </div>

                    <div class="form-group mb-3 col-md-3 ">
                    <label  class="mb-2">ഇപ്പോൾ താമസിക്കുന്ന രാജ്യം</label>
                        <input id="current_country" type="text" placeholder="ഇപ്പോൾ താമസിക്കുന്ന രാജ്യം">
                    </div>




                    <div class="form-group radio-inline col-auto mb-3 col-md-3">
                        <label>തിരിച്ചെത്തുന്നതിനായി നോർക്കയിൽ രജിസ്റ്റർ ചെയ്തിട്ടുണ്ടോ</label>
                        <label class="custom-radio">ഉണ്ട് <input id="return_registered" name="return_registered" type="radio"><span class="checkmark ml-2"></label>
                        <label class="custom-radio">ഇല്ല <input name="return_registered" type="radio"><span class="checkmark ml-2"></label>
                    </div>

                    <div class="form-group radio-inline col-auto mb-3 col-md-3">
                        <label>രോഗങ്ങളെന്തെങ്കിലും ഉള്ള ആളാണോ ?</label>
                        <label class="custom-radio">അതെ <input id="any_disease" name="any_disease" type="radio"><span class="checkmark ml-2"></label>
                        <label class="custom-radio">അല്ല <input id="false_desease" name="any_disease" type="radio"><span class="checkmark ml-2"></label>
                    </div>


                    <div class="form-group mb-3 col-md-12 " id="disease">
                    <label>അതെ എങ്കിൽ രോഗത്തിന്റെ
വിവരം</label>
                        <input id="disease_info" type="text" placeholder="അതെ എങ്കിൽ രോഗത്തിന്റെ
വിവരം">
                    </div>



                    <div class="form-group radio-inline col-auto mb-3 col-md-12">
                        <label>ഹോം ക്വാറന്റൈനിങ്ങിനാവശ്യമായ ശുചി മുറിയോട് കൂടിയ പ്രത്യേക മുറി വീട്ടിൽ ലഭ്യമാണോ</label>
                        <label class="custom-radio">ഉണ്ട് <input id="room_available" name="room_available" type="radio"><span class="checkmark ml-2"></label>
                        <label class="custom-radio">ഇല്ല <input id="no_room_available" name="room_available" type="radio"><span class="checkmark ml-2"></label>
                    </div>

                    <div class="col-12" id="home-quar">
                        <div class="row">

                            <div class="col-12 mb-2"><label for="">ആണെങ്കിൽ വീട്ടിലെ മറ്റ് അംഗങ്ങളിൽ</label></div>


                            <div class="form-group radio-inline col-auto mb-3 col-md-3">
                                <label>പ്രായാധിക്യമുള്ളവർ</label>
                                <label class="custom-radio">ഉണ്ട് <input id="aged_person" name="aged_person" type="radio"><span class="checkmark ml-2"></label>
                                <label class="custom-radio">ഇല്ല <input name="aged_person" type="radio"><span class="checkmark ml-2"></label>
                            </div>

                            <div class="form-group radio-inline col-auto mb-3 col-md-3">
                                <label>കിടപ്പ് രോഗികൾ</label>
                                <label class="custom-radio">ഉണ്ട് <input id="bed_rest_person" name="bed_rest_person" type="radio"><span class="checkmark ml-2"></label>
                                <label class="custom-radio">ഇല്ല <input name="bed_rest_person" type="radio"><span class="checkmark ml-2"></label>
                            </div>

                            <div class="form-group radio-inline col-auto mb-3 col-md-3">
                                <label>ഗുരുതര രോഗമുള്ളവർ</label>
                                <label class="custom-radio">ഉണ്ട് <input id="desease_people" name="desease_people" type="radio"><span class="checkmark ml-2"></label>
                                <label class="custom-radio">ഇല്ല <input name="desease_people" type="radio"><span class="checkmark ml-2"></label>
                            </div>


                            <div class="form-group radio-inline col-auto mb-3 col-md-3">
                                <label>ഗർഭിണികൾ</label>
                                <label class="custom-radio">ഉണ്ട് <input id="pregnant_people" name="pregnant_people" type="radio"><span class="checkmark ml-2"></label>
                                <label class="custom-radio">ഇല്ല <input name="pregnant_people" type="radio"><span class="checkmark ml-2"></label>
                            </div>


                            <div class="form-group radio-inline col-auto mb-3 col-md-3">
                                <label>ഹോം ക്വാറന്റൈനിങ്ങിന് വീട്ടിൽ സൗകര്യമുണ്ടോ എന്നത് സംബന്ധിച്ച് ആർ ആർ ടി യുടെ ശിപാർശ</label>
                                <label class="custom-radio">ഉണ്ട് <input id="confirmation_from_rrt" name="confirmation_from_rrt" type="radio"><span class="checkmark ml-2"></label>
                                <label class="custom-radio">ഇല്ല <input name="confirmation_from_rrt" type="radio"><span class="checkmark ml-2"></label>
                            </div>

                            <div class="form-group radio-inline col-auto mb-3 col-md-3">
                                <label>ഇല്ല എന്നാണെങ്കിൽ ഹോം ക്വാറന്റൈനിങ്ങിനാവശ്യമായ മുറി വീട്ടിൽ ലഭ്യമല്ലങ്കിൽ ബന്ധുക്കളുടെ വീട്ടിൽ ലഭ്യമാണോ </label>
                                <label class="custom-radio">ഉണ്ട് <input id="relative_home_available" name="relative_home_available" type="radio"><span class="checkmark ml-2"></label>
                                <label class="custom-radio">ഇല്ല <input name="relative_home_available" type="radio"><span class="checkmark ml-2"></label>
                            </div>

                            <div class="form-group radio-inline col-auto mb-3 col-md-3">
                                <label>ഉണ്ടെങ്കിൽ ടി സൗകര്യം ആർ ആർ ടി ഹോം ക്വാറന്റൈനിങ്ങിന് ശിപാർശ ചെയ്യുന്നുവോ</label>
                                <label class="custom-radio">ഉണ്ട് <input id="relative_confirmation_from_rrt" name="relative_confirmation_from_rrt" type="radio"><span class="checkmark ml-2"></label>
                                <label class="custom-radio">ഇല്ല <input name="relative_confirmation_from_rrt" type="radio"><span class="checkmark ml-2"></label>
                            </div>


                            <div class="form-group mb-3 col-md-3 ">
                            <label  class="mb-2">ആർ ആർ ടി കൺവീനറുടെ പേരും ഒപ്പും</label>
                                <input id="rrt_name" type="text" placeholder="ആർ ആർ ടി കൺവീനറുടെ പേരും ഒപ്പും">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3 col-md-3 form-group-inline ml-auto bill-actions text-right">
                        <button onclick="save()" class="btn-primary">Save</button>
                        <button onclick="showReport()" class="btn-dark print mx-3"> Print </button>
                        <button onclick="deleteRecord()" class="btn-dark dlt"> Delete </button>
                    </div>

                </div>
            </div>
        </div>



    </main>

    <div class="loader">
        <div class="spinner"></div>
    </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/resizableColumns.min.js"></script>
    <script src="js/datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/add/add.js"></script>
</body>

</html>
