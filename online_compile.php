<!DOCTYPE html>
<html>
    <head>


        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>online Compile</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="js/vendor/jquery-1.12.0.min.js"></script>

        <style>
            .nbar {
                min-height: 68px;
                padding-top: 0px;
                color: white;
                font-size: 15px;
                font-weight: bold;
            }
            body {
                font-family: "";
                font-size: 14px;
                line-height: 1.42857143;
                color: #333;
            }
            .col-sm-10 {
                width: 83.33333333%;
                margin-top: 5%;
            }
            
        </style>

    </head>


    <body>
        <div class="main">

            <div class="row">
                <div class="col-sm-12">
                    <nav class="navbar navbar-inverse navbar-fixed-top nbar">
                        <?php
                        include'head.php';
                        include 'time_controling.php';
                        ?>
                    </nav>
                </div>
            </div>
            <div class="row log">
                <div class="col-sm-10">
                    <div class=""><h3 style="text-align:center;">Online Compiler</h3></div>
                </div>

                <div class="col-sm-1">

                </div>

                <div class="col-sm-1">

                </div>

            </div>




            <div class="row cspace">
                <div class="col-sm-8">
                    <div class="form-group">
                        <form action="compile.php" id="form" name="f2" method="POST" >
                            <label for="lang">Choose Language</label>

                            <select class="form-control" name="language">
                                <option value="c">C</option>
                                <option value="cpp">C++</option>
                                <option value="cpp11">C++11</option>
                                <option value="java">Java</option>


                            </select><br><br>

                            <label for="ta">Write Your Code</label>
                            <textarea class="form-control" name="code" rows="10" cols="50"></textarea><br><br>
                            <label for="in">Enter Your Input</label>
                            <textarea class="form-control" name="input" rows="10" cols="50"></textarea><br><br>
                            <input type="submit" id="st" class="btn btn-success" value="Run Code"><br><br><br>


                        </form>
                        <script type="text/javascript">

                            $(document).ready(function () {

                                $("#st").click(function () {

                                    $("#div").html("Loading ......");


                                });

                            });


                        </script>
                        <script>
                            //wait for page load to initialize script
                            $(document).ready(function () {
                                //listen for form submission
                                $('form').on('submit', function (e) {
                                    //prevent form from submitting and leaving page
                                    e.preventDefault();

                                    // AJAX 
                                    $.ajax({
                                        type: "POST", //type of submit
                                        cache: false, //important or else you might get wrong data returned to you
                                        url: "compile.php", //destination
                                        datatype: "html", //expected data format from process.php
                                        data: $('form').serialize(), //target your form's data and serialize for a POST
                                        success: function (result) { // data is the var which holds the output of your process.php

                                            // locate the div with #result and fill it with returned data from process.php
                                            $('#div').html(result);
                                        }
                                    });
                                });
                            });
                        </script>

                        <label for="out">Output</label>
                        <textarea id='div' class="form-control" name="output" rows="10" cols="50"></textarea><br><br>

                    </div>
                </div>
            </div>
            <div class = "footer" style="width: 103%; margin-left: -2%;"><?php include'foot.php'; ?></div>
        </div>
    </body>
</html>


