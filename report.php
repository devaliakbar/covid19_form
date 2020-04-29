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
    <title>Log In</title>
</head>

<body>
    <section class="form-2">
        <div class="container">

            <div class="wrapper">
                <div class="row">
                    <div class="col-12">

                        <div class="head">
                            <h6>Form 2</h4>
                                <h1>Format to collect details from foreighn malayalees who come back at the time of
                                    pandemic
                                </h1>
                        </div>

                        <div class="content">

                            <form class="">

                                <div class="form-row">
                                    <div class="col">
                                        <label for="company">Name of the Company</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" id="company" class="form-control" value="<?php echo $details['organisation_name']; ?>">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="ward">Ward No</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" id="ward" class="form-control"
                                        value="<?php echo $details['ward_no']; ?>">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="name">Name</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" id="name" class="form-control"
                                        value="<?php echo $details['full_name']; ?>">
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col">
                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="form-row">

                                                    <div class="col">
                                                        <label for="M">Male</label>
                                                    </div>
                                                    <div class="col">
                                                        <input type="radio" name="gender" id="M" class="form-control"

                                                        <?php echo $details['sex'] == '1' ? 'checked' : ''; ?>
                                                        >
                                                    </div>
                                                    <div class="col">
                                                        <label for="F">Female</label>
                                                    </div>
                                                    <div class="col">
                                                        <input type="radio" name="gender" id="F" class="form-control"
                                                        <?php echo $details['sex'] == '0' ? 'checked' : ''; ?>
                                                        >
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="age">Age</label>
                                            </div>
                                            <div class="col">
                                                <input type="text" id="age" class="form-control"
                                                value="<?php echo $details['age']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="col-auto">
                                        <label for="addr">Address</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" id="addr" class="form-control"
                                        value="<?php echo $details['address']; ?>">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="resi">Country of present residency </label>
                                    </div>
                                    <div class="col">
                                        <input type="text" id="resi" class="form-control"
                                        value="<?php echo $details['current_country']; ?>">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="ret">Registered in norca as a returning person</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="ret" class="form-control">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="disease">Person with disease</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="disease" class="form-control">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-12">
                                        <label for="sympt">If Yes, describe the symptoms</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" id="sympt" class="form-control"
                                        value="<?php echo $details['disease_info']; ?>">
                                    </div>
                                </div>



                                <div class="row">

                                    <div class="col">
                                        <label for="age">Attached washroom room available at home for quarantine</label>
                                    </div>

                                    <div class="col-auto">
                                        <div class="form-row">

                                            <div class="col">
                                                <input type="radio" name="gender" id=""
                                                <?php echo $details['room_available'] == '1' ? 'checked' : ''; ?>>
                                            </div>
                                            <div class="col">
                                                <input type="radio" name="gender" id=""
                                                <?php echo $details['room_available'] == '0' ? 'checked' : ''; ?>>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="age">If yes, specify the other family members</label>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col">

                                        <div class="row">
                                            <div class="col">
                                                <label for="age">overaged peoples</label>
                                            </div>
                                            <div class="col-auto">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="radio" name="gender" id=""
                                                        <?php echo $details['aged_person'] == '1' ? 'checked' : ''; ?>>
                                                    </div>
                                                    <div class="col">
                                                        <input type="radio" name="gender" id=""
                                                        <?php echo $details['aged_person'] == '0' ? 'checked' : ''; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col">

                                        <div class="row">
                                            <div class="col">
                                                <label for="age">Bed Rest peoples</label>
                                            </div>
                                            <div class="col-auto">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="radio" name="gender" id=""
                                                        <?php echo $details['bed_rest_person'] == '1' ? 'checked' : ''; ?>>
                                                    </div>
                                                    <div class="col">
                                                        <input type="radio" name="gender" id=""
                                                        <?php echo $details['bed_rest_person'] == '0' ? 'checked' : ''; ?>>
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
                                                <label for="age">With dangerous diseases</label>
                                            </div>
                                            <div class="col-auto">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="radio" name="" id=""
                                                        <?php echo $details['desease_people'] == '1' ? 'checked' : ''; ?>>
                                                    </div>
                                                    <div class="col">
                                                        <input type="radio" name="" id=""
                                                        <?php echo $details['desease_people'] == '0' ? 'checked' : ''; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col">

                                        <div class="row">
                                            <div class="col">
                                                <label for="age">Pregnant lady</label>
                                            </div>
                                            <div class="col-auto">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="radio" name="" id=""
                                                        <?php echo $details['pregnant_people'] == '1' ? 'checked' : ''; ?>>
                                                    </div>
                                                    <div class="col">
                                                        <input type="radio" name="" id=""
                                                        <?php echo $details['pregnant_people'] == '0' ? 'checked' : ''; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="row">

                                    <div class="col">
                                        <label for="age">Recomendation from rrt home for hom e quarantine</label>
                                    </div>

                                    <div class="col-auto">

                                        <div class="row">
                                            <div class="col">
                                                <input type="radio" name="" id=""
                                                <?php echo $details['confirmation_from_rrt'] == '1' ? 'checked' : ''; ?>>
                                            </div>
                                            <div class="col">
                                                <input type="radio" name="" id=""
                                                <?php echo $details['confirmation_from_rrt'] == '0' ? 'checked' : ''; ?>>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col">
                                        <label for="age">If not available in your home, how about yotr neighbour's</label>
                                    </div>

                                    <div class="col-auto">

                                        <div class="row">
                                            <div class="col">
                                                <input type="radio" name="" id=""
                                                <?php echo $details['relative_home_available'] == '1' ? 'checked' : ''; ?>>
                                            </div>
                                            <div class="col">
                                                <input type="radio" name="" id=""
                                                <?php echo $details['relative_home_available'] == '0' ? 'checked' : ''; ?>>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col">
                                        <label for="age">If yes available in your home, how about yotr neighbour's</label>
                                    </div>

                                    <div class="col-auto">

                                        <div class="row">
                                            <div class="col">
                                                <input type="radio" name="" id=""
                                                <?php echo $details['relative_confirmation_from_rrt'] == '1' ? 'checked' : ''; ?>>
                                            </div>
                                            <div class="col">
                                                <input type="radio" name="" id=""
                                                <?php echo $details['relative_confirmation_from_rrt'] == '0' ? 'checked' : ''; ?>>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-auto">
                                        <label for="age">name and siign of rrt officer</label>
                                    </div>

                                    <div class="col">

                                        <div class="row">
                                            <input type="text" class="form-control"
                                            value="<?php echo $details['rrt_name']; ?>">
                                        </div>

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
</body>

</html>
