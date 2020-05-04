<?php
include 'api/db/common.php';

$query = '';
if (isset($_GET['q'])) {
    $query = $_GET['q'];
}

$queryForFechingRecords = "SELECT * FROM person_info WHERE _id = '" . $query . "'";

$result = mysqli_query($conn, $queryForFechingRecords);
if (mysqli_num_rows($result) > 0) {
    $response["success"] = true;

    $details = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $details['_id'] = $row["_id"];
        $details['organisation_name'] = $row["organisation_name"];
        $details['ward_no'] = $row["ward_no"];
        $details['full_name'] = $row["full_name"];
        $details['sex'] = $row["sex"];
        $details['age'] = $row["age"];
        $details['address'] = $row["address"];
        $details['current_country'] = $row["current_country"];
        $details['return_registered'] = $row["return_registered"];
        $details['any_disease'] = $row["any_disease"];
        $details['disease_info'] = $row["disease_info"];
        $details['room_available'] = $row["room_available"];
        $details['aged_person'] = $row["aged_person"];
        $details['bed_rest_person'] = $row["bed_rest_person"];
        $details['desease_people'] = $row["desease_people"];
        $details['pregnant_people'] = $row["pregnant_people"];
        $details['confirmation_from_rrt'] = $row["confirmation_from_rrt"];
        $details['relative_home_available'] = $row["relative_home_available"];
        $details['relative_confirmation_from_rrt'] = $row["relative_confirmation_from_rrt"];
        $details['rrt_name'] = $row["rrt_name"];
    }
}

?>


<!DOCTYPE html>
<html lang="en">


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Report</title>
</head>

<body>
    <section class="form-2">
        <div class="container">

            <div class="wrapper">
                <div class="row">
                    <div class="col-12">
                        <h6>ഫോറം 2</h4>

                            <div class="head">
                                <h3>കോവിഡ് കാലത്ത് തിരിച്ചെത്താൻ സാധ്യതയുള്ള വിദേശ മലയാളികളുടെ വിവര ശേഖരണത്തിനുള്ള മാതൃക
                                </h3>
                            </div>

                            <div class="content">

                                <form class="">

                                    <div class="form-row">
                                        <div class="col">
                                            <label for="company">തദ്ദേശ സ്ഥാപനത്തിന്റെ പേര്</label>
                                        </div>
                                        <div class="col">
                                            <input type="text"  id="company" class="form-control" value="<?php echo $details['organisation_name']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <label for="ward">വാർഡ് നം.</label>
                                        </div>
                                        <div class="col">
                                            <input type="text"  id="ward" class="form-control" value="<?php echo $details['ward_no']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <label for="name">പേര്</label>
                                        </div>
                                        <div class="col">
                                            <input type="text"  id="name" class="form-control" value="<?php echo $details['full_name']; ?>">
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col">
                                            <div class="row">

                                                <div class="col-md-6">

                                                    <div class="form-row">

                                                        <div class="col">
                                                            <label>പുരുഷൻ</label>
                                                        </div>
                                                        <div class="col">

                                                            <label class="checkbox">
                                                                <input type="checkbox" <?php echo $details['sex'] == '1' ? 'checked' : ''; ?>>
                                                                <span class="checkmark"></span>
                                                            </label>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label>സ്ത്രീ</label>
                                                        </div>
                                                        <div class="col">

                                                            <label class="checkbox">
                                                                <input type="checkbox" <?php echo $details['sex'] == '0' ? 'checked' : ''; ?>>
                                                                <span class="checkmark"></span>
                                                            </label>


                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-row">
                                                <div class="col">
                                                    <label for="age">വയസ്സ്</label>
                                                </div>
                                                <div class="col">
                                                    <input type="text"  id="age" class="form-control" value="<?php echo $details['age']; ?>">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row address-group">
                                        <div class="col-auto">
                                            <label for="addr">വിലാസം</label>
                                        </div>
                                        <div class="col">
                                            <textarea name="" id="addr" class="form-control"><?php echo $details['address']; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <label for="resi">ഇപ്പോൾ താമസിക്കുന്ന രാജ്യം</label>
                                        </div>
                                        <div class="col">
                                            <input type="text"  id="resi" class="form-control" value="<?php echo $details['current_country']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <label for="ret">തിരിച്ചെത്തുന്നതിനായി നോർക്കയിൽ രജിസ്റ്റർ ചെയ്തിട്ടുണ്ടോ</label>
                                        </div>
                                        <div class="col-auto bd-l">
                                            <div class="row">
                                                <div class="col">

                                                    <label class="checkbox yes">
                                                        <input type="checkbox" <?php echo $details['return_registered'] == '1' ? 'checked' : ''; ?>>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <label class="checkbox no">
                                                        <input type="checkbox" <?php echo $details['return_registered'] == '0' ? 'checked' : ''; ?>>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <label for="disease">രോഗങ്ങളെന്തെങ്കിലും ഉള്ള ആളാണോ</label>
                                        </div>
                                        <div class="col-auto bd-l">
                                            <div class="row">

                                                <div class="col">
                                                    <label class="checkbox yes">
                                                        <input type="checkbox" <?php echo $details['any_disease'] == '1' ? 'checked' : ''; ?>>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                                <div class="col">
                                                    <label class="checkbox no">
                                                        <input type="checkbox" <?php echo $details['any_disease'] == '0' ? 'checked' : ''; ?>>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <label for="sympt">അതെ എങ്കിൽ രോഗത്തിന്റെ
വിവരം</label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-12">
                                            <input type="text"  id="sympt" class="form-control" value="<?php echo $details['disease_info']; ?>">
                                        </div>
                                    </div>



                                    <div class="row">

                                        <div class="col">
                                            <label for="age">ഹോം ക്വാറന്റൈനിങ്ങിനാവശ്യമായ ശുചി മുറിയോട് കൂടിയ പ്രത്യേക മുറി വീട്ടിൽ ലഭ്യമാണോ</label>
                                        </div>

                                        <div class="col-auto bd-l">
                                            <div class="form-row">

                                                <div class="col">

                                                    <label class="checkbox yes">
                                                        <input type="checkbox" <?php echo $details['room_available'] == '1' ? 'checked' : ''; ?>>
                                                        <span class="checkmark"></span>
                                                    </label>

                                                </div>
                                                <div class="col">
                                                    <label class="checkbox no">
                                                        <input type="checkbox" <?php echo $details['room_available'] == '0' ? 'checked' : ''; ?>>
                                                        <span class="checkmark"></span>
                                                    </label>

                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col">
                                            <label for="age">ആണെങ്കിൽ വീട്ടിലെ മറ്റ് അംഗങ്ങളിൽ</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">

                                            <div class="row">
                                                <div class="col">
                                                    <label for="age">പ്രായാധിക്യമുള്ളവർ</label>
                                                </div>
                                                <div class="col-auto bd-l">
                                                    <div class="row">
                                                        <div class="col">

                                                            <label class="checkbox yes">
                                                                <input type="checkbox" <?php echo $details['aged_person'] == '1' ? 'checked' : ''; ?>>
                                                                <span class="checkmark"></span>
                                                            </label>

                                                        </div>
                                                        <div class="col">

                                                            <label class="checkbox no">
                                                                <input type="checkbox" <?php echo $details['aged_person'] == '0' ? 'checked' : ''; ?>>
                                                                <span class="checkmark"></span>
                                                            </label>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col">

                                            <div class="row">
                                                <div class="col">
                                                    <label for="age">കിടപ്പ് രോഗികൾ</label>
                                                </div>
                                                <div class="col-auto bd-l pl--5">
                                                    <div class="row">
                                                        <div class="col">

                                                            <label class="checkbox yes">
                                                                <input type="checkbox" name="gender" id="" <?php echo $details['bed_rest_person'] == '1' ? 'checked' : ''; ?>>
                                                                <span class="checkmark"></span>
                                                            </label>

                                                        </div>
                                                        <div class="col">

                                                            <label class="checkbox no">
                                                                <input type="checkbox" name="gender" id="" <?php echo $details['bed_rest_person'] == '0' ? 'checked' : ''; ?>>
                                                                <span class="checkmark"></span>
                                                            </label>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col">

                                            <div class="row">
                                                <div class="col">
                                                    <label for="age">ഗുരുതര രോഗമുള്ളവർ</label>
                                                </div>
                                                <div class="col-auto bd-l">
                                                    <div class="row">
                                                        <div class="col">

                                                            <label class="checkbox yes">
                                                                <input type="checkbox" name="" id="" <?php echo $details['desease_people'] == '1' ? 'checked' : ''; ?>>
                                                                <span class="checkmark"></span>
                                                            </label>

                                                        </div>
                                                        <div class="col">
                                                            <label class="checkbox no">
                                                                <input type="checkbox" name="" id="" <?php echo $details['desease_people'] == '0' ? 'checked' : ''; ?>>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col">

                                            <div class="row">
                                                <div class="col">
                                                    <label for="age">ഗർഭിണികൾ</label>
                                                </div>
                                                <div class="col-auto bd-l pl--5">
                                                    <div class="row">
                                                        <div class="col">

                                                            <label class="checkbox yes">
                                                                <input type="checkbox" name="" id="" <?php echo $details['pregnant_people'] == '1' ? 'checked' : ''; ?>>
                                                                <span class="checkmark"></span>
                                                            </label>

                                                        </div>
                                                        <div class="col">

                                                            <label class="checkbox no">
                                                                <input type="checkbox" name="" id="" <?php echo $details['pregnant_people'] == '0' ? 'checked' : ''; ?>>
                                                                <span class="checkmark"></span>
                                                            </label>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="row">

                                        <div class="col">
                                            <label for="age">ഹോം ക്വാറന്റൈനിങ്ങിന് വീട്ടിൽ സൗകര്യമുണ്ടോ എന്നത് സംബന്ധിച്ച് ആർ ആർ ടി യുടെ ശിപാർശ</label>
                                        </div>

                                        <div class="col-auto bd-l">

                                            <div class="row">
                                                <div class="col">

                                                    <label class="checkbox yes">
                                                        <input type="checkbox" name="" id="" <?php echo $details['confirmation_from_rrt'] == '1' ? 'checked' : ''; ?>>
                                                        <span class="checkmark"></span>
                                                    </label>

                                                </div>
                                                <div class="col">

                                                    <label class="checkbox no">
                                                        <input type="checkbox" name="" id="" <?php echo $details['confirmation_from_rrt'] == '0' ? 'checked' : ''; ?>>
                                                        <span class="checkmark"></span>
                                                    </label>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col">
                                            <label for="age">ഇല്ല എന്നാണെങ്കിൽ ഹോം ക്വാറന്റൈനിങ്ങിനാവശ്യമായ മുറി വീട്ടിൽ ലഭ്യമല്ലങ്കിൽ ബന്ധുക്കളുടെ വീട്ടിൽ ലഭ്യമാണോ</label>
                                        </div>

                                        <div class="col-auto bd-l">

                                            <div class="row">
                                                <div class="col">

                                                    <label class="checkbox yes">
                                                        <input type="checkbox" name="" id="" <?php echo $details['relative_home_available'] == '1' ? 'checked' : ''; ?>>
                                                        <span class="checkmark"></span>
                                                    </label>

                                                </div>
                                                <div class="col">

                                                    <label class="checkbox no">
                                                        <input type="checkbox" name="" id="" <?php echo $details['relative_home_available'] == '0' ? 'checked' : ''; ?>>
                                                        <span class="checkmark"></span>
                                                    </label>


                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col">
                                            <label for="age">ഉണ്ടെങ്കിൽ ടി സൗകര്യം ആർ ആർ ടി ഹോം ക്വാറന്റൈനിങ്ങിന് ശിപാർശ ചെയ്യുന്നുവോ</label>
                                        </div>

                                        <div class="col-auto bd-l">

                                            <div class="row">
                                                <div class="col">

                                                    <label class="checkbox yes">
                                                        <input type="checkbox" name="" id="" <?php echo $details['relative_confirmation_from_rrt'] == '1' ? 'checked' : ''; ?>>
                                                        <span class="checkmark"></span>
                                                    </label>

                                                </div>
                                                <div class="col">

                                                    <label class="checkbox no">
                                                        <input type="checkbox" name="" id="" <?php echo $details['relative_confirmation_from_rrt'] == '0' ? 'checked' : ''; ?>>
                                                        <span class="checkmark"></span>
                                                    </label>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-auto">
                                            <label for="age">ആർ ആർ ടി കൺവീനറുടെ പേരും ഒപ്പും</label>
                                        </div>

                                        <div class="col">

                                            <input type="text"  class="form-control" value="<?php echo $details['rrt_name']; ?>">

                                        </div>
                                    </div>

                                </form>

                            </div>

                    </div>
                </div>
            </div>

        </div>
    </section>



    <script src="js/jquery.min.js"></script>
    <script src="js/resizableColumns.min.js"></script>
    <script src="js/datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/login/login.js"></script>
    <script>
    $(document).ready(function () {
    print()
});
    </script>
</body>

</html>