<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script>
            function emptyOpt(type) {
                var select = document.getElementById(`${type}`);
                var length = select.options.length;
                for (i = length - 1; i >= 0; i--) {
                    select.options[i] = null;
                }
                return select
            }
            function createOpts(length, parent) {
                for (var i = parent.id === "year" ? 1600 : 1; i < length; i++) {

                    var opt = document.createElement('option');
                    opt.value = i;
                    opt.innerHTML = i;
                    parent.appendChild(opt);
                }
            }
            function isLeap(year) {
                if (year % 4 === 0) {
                    if (year % 100 === 0) {
                        if (year % 400 === 0) {
                            return true
                        } else
                            return false
                    } else
                        return true
                } else
                    return false
            }
            function handleChange(month, year) {
                var select = emptyOpt("day")
                var numberOfDays;
                switch (parseInt(month)) {
                    case 2:
                        numberOfDays = isLeap(parseInt(year)) ? 29 : 28;
                        break;
                    case 1:
                    case 3:
                    case 5:
                    case 7:
                    case 8:
                    case 10:
                    case 12:
                        numberOfDays = 31;
                        break;
                    default:
                        numberOfDays = 30;
                        break;
                }
                createOpts(numberOfDays + 1, select)
            }
        </script>
    </head>
    <body>
        <form id="form" action="index.php" method="post">
            <p>Enter your name and select date and time for the appointment</p>
            <br>
            <div style="display: flex; justify-content: space-between; width: 250px;">
                <div>
                    <div>Your name:</div>
                    <div>Date:</div>
                    <div>Time:</div>
                </div>
                <div>
                    <input style="width: 148px;" type="text" name="name">
                    <br>
                    <select id="day" name="day">
                        <script>
                            var day = document.getElementById("day")
                            var days = [];
                            for (var i = 1; i < 32; i++) {
                                days.push(i)
                            }

                            createOpts(days.length + 1, day)
                        </script>
                    </select>
                    <select id="month" name="month">
                        <script >
                            var month = document.getElementById("month")
                            var year = document.getElementById("year")
                            for (var i = 1; i < 13; i++) {
                                var opt = document.createElement('option');
                                opt.value = i;
                                opt.innerHTML = i;
                                month.appendChild(opt);
                            }
                            month.addEventListener('change', function () {
                                var selected = month.options[month.selectedIndex].value
                                var selectedYear = year.options[year.selectedIndex].value
                                handleChange(selected, selectedYear)

                            })
                        </script>
                    </select>
                    <select id="year" name="year">
                        <script>
                            var year = document.getElementById("year")
                            createOpts(2021, year)
                            year.addEventListener('change', function () {
                                var selected = month.options[month.selectedIndex].value
                                var selectedYear = year.options[year.selectedIndex].value
                                handleChange(selected, selectedYear)

                            })
                        </script>
                    </select>
                    <br>
                    <select name="hour">
                        <?php
                        for ($i = 0; $i < 25; $i++) {
                            print "<option value=$i>$i</option>";
                        }
                        ?>
                    </select>
                    <select name="minute">
                        <?php
                        for ($i = 0; $i < 61; $i++) {
                            print "<option value=$i>$i</option>";
                        }
                        ?>
                    </select>
                    <select name="second">
                        <?php
                        for ($i = 0; $i < 61; $i++) {
                            print "<option value=$i>$i</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <br>
            <button id="btn" type="submit">submit</button>
            <input type="reset" value="reset">
            <br>
            <?php
            function isLeap($year) {
                if ($year % 4 == 0) {
                    if ($year % 100 == 0) {
                        if ($year % 400 == 0) return 1;
                        else return 0;
                    } else return 1;
                } else return 0;
            }
            function countDay($month, $year) {
                
                switch ($month) {
                    case 2:
                        $numberOfDays = isLeap($year) ? 29 : 28;
                        break;
                    case 1:
                    case 3:
                    case 5:
                    case 7:
                    case 8:
                    case 10:
                    case 12:
                        $numberOfDays = 31;
                        break;
                    default:
                        $numberOfDays = 30;
                        break;
                }
                return $numberOfDays;
            }
            $finished = FALSE;
            $name = $_POST["name"];
            $day = $_POST["day"];
            $month = $_POST["month"];
            $year = $_POST["year"];
            $hour = $_POST["hour"];
            $minute = $_POST["minute"];
            $second = $_POST["second"];


            if (strcmp($name, "") > 0) {
                $finished = TRUE;
            }
            if ($finished) {
                print "Hi $name! <br>";
                print "You have choose to have an appointment on $hour:$minute:$second, $day/$month/$year <br> <br>";

                switch (intval($hour)) {
                    case 13:
                        $hour = 1;
                        break;
                    case 14:
                        $hour = 2;
                        break;
                    case 15:
                        $hour = 3;
                        break;
                    case 16:
                        $hour = 4;
                        break;
                    case 17:
                        $hour = 5;
                        break;
                    case 18:
                        $hour = 6;
                        break;
                    case 19:
                        $hour = 7;
                        break;
                    case 20:
                        $hour = 8;
                        break;
                    case 21:
                        $hour = 9;
                        break;
                    case 22:
                        $hour = 10;
                        break;
                    case 23:
                        $hour = 11;
                        break;
                    case 24:
                        $hour = 12;
                        break;
                    default:
                        $hour = intval($hour);
                }
                print "In 12 hours, the time and date is $hour:$minute:$second, $day/$month/$year <br> <br>";
            
                $num_day = countDay(intval($month), intval($year));
                print "This month has $num_day days!";
            }
            ?>
        </form>
    </body>

</html>
