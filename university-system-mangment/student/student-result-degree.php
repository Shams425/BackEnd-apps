<?php  
	session_start();
	if (!$_SESSION["LoginStudent"]) {
		header('location:../login/login.php');
	}
		require_once "../config/config.php";
?>

<?php
    function grade($obtain_marks, $assign_date) {

        if($assign_date <=15){
            if ($obtain_marks>=85) {
                $grade = "A+";
            }
            else if ($obtain_marks>=80) {
                $grade = "A";
            }
            else if ($obtain_marks>=75) {
                $grade = "B+";
            }
            else if ($obtain_marks>=70) {
                $grade = "B";
            }
            else if ($obtain_marks>=65) {
                $grade = "C+";
            }
            else if ($obtain_marks>=60) {
                $grade = "C";
            }
            else if ($obtain_marks>=55) {
                $grade = "D+";
            }
            else if ($obtain_marks>=50) {
                $grade = "D";
            }
            else {
                $grade = "F";
            }
        } else{
            if ($obtain_marks>=85 and $obtain_marks) {
                $grade = "A+";
            }
            else if ($obtain_marks>=80) {
                $grade = "A";
            }
            else if ($obtain_marks>=75) {
                $grade = "B+";
            }
            else if ($obtain_marks>=70) {
                $grade = "B";
            }
            else if ($obtain_marks>=65) {
                $grade = "C+";
            }
            else if ($obtain_marks>=60) {
                $grade = "C";
            }
            else if ($obtain_marks>=55) {
                $grade = "D+";
            }
            else if ($obtain_marks>=50) {
                $grade = "D";
            }
            else {
                $grade = "F";
            }
          }

      return $grade;
    }
?>

<?php
    function gpa($obtain_marks, $assign_date) {

        if($assign_date <= 15){
            if ($obtain_marks>=80) {
                $gpa = "4.00";
            }
            else if ($obtain_marks>=75) {
                $gpa = "3.00";
            }
            else if ($obtain_marks>=70) {
                $gpa = "3.00";
            }
            else if ($obtain_marks>=65) {
                $gpa = "2.00";
            }
            else if ($obtain_marks>=60) {
                $gpa = "2.00";
            }
            else if ($obtain_marks>=55) {
                $gpa = "1.00";
            }
            else if ($obtain_marks>=50) {
                $gpa = "1.00";
            } else {
                $gpa = "0.00";
              }
        } else{
            if ($obtain_marks>=80) {
                $gpa = "4.00";
            }
            else if ($obtain_marks>=75) {
                $gpa = "3.50";
            }
            else if ($obtain_marks>=70) {
                $gpa = "3.00";
            }
            else if ($obtain_marks>=65) {
                $gpa = "2.50";
            }
            else if ($obtain_marks>=60) {
                $gpa = "2.00";
            }
            else if ($obtain_marks>=55) {
                $gpa = "1.50";
            }
            else if ($obtain_marks>=50) {
                $gpa = "1.00";
            }
            else {
                $gpa = "0.00";
            }
          }

        return $gpa;
    }
?>

  <title>Student - Transcript</title>

<?php include "../common/common-header.php"?>
    <div class="container mt-4">
        <div class="text-danger text-center m-auto">
            <img src="../Images/icbs_logo.png" alt="" width="100" height="100">
            <h4 class="text-dark mt-3">IMPERIAL COLLEGE OF BUSINESS STUDIES - ICBS*</h4>
            <h4 class="text-dark">SCHOOL OF ARCHITECTURE, ART & DESIGN - SAAD</h4>
        </div>
    </div>
    <div class="container-fluid mb-4 text-dark">
        <div class="program-info">
            <?php  
                $roll_no = $_SESSION['LoginStudent'];
                $query = "SELECT * FROM student_info 
                INNER JOIN 
                  sessions ON sessions.session = student_info.session 
                WHERE 
                  roll_no = '$roll_no'";

                $run = mysqli_query($con, $query);
                while($row = mysqli_fetch_array($run)){ ?>
                  <h5>Student Transcript - <?php echo $row['course_code']; ?> Program</h5>
                  </div>
                  <div class="d-flex mt-3">
                      <div>
                        <h5>Student Name : <?php echo $row['first_name']. " ". $row['middle_name']. " ". $row['last_name']; ?></h5>
                        <h5>S/O : <?php echo $row['father_name']; ?></h5>
                      </div>
                      <div class="ml-auto">
                        <h5>Student I.D # : <?php echo $row['roll_no']; ?></h5>
                        <h5>Year of Addmission : <?php echo intval($row['admission_date']) . " ". $row['session_name']; ?></h5>
                      </div>
                  </div>
                <?php }
            ?>
    </div>
    <div class="container-fluid table-font-for-transcript">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div>
                    <section class="mt-3">
                        <div class="mt-2">
                            <table class="w-100 table-elements table-six-tr"cellpadding="2">
                                <tr class="pt-5 table-six text-white" style="height: 32px;">
                                <?php
                                    $que=
                                    "SELECT * FROM 
                                      student_courses sc 
                                    INNER JOIN 
                                      sessions AS s ON sc.session = s.session_id 
                                    WHERE 
                                      sc.semester='1' AND sc.roll_no = '$roll_no'";

                                    $run=mysqli_query($con,$que);
                                    while ($row=mysqli_fetch_array($run)) {
                                      $session = $row['session_name'];
                                      $assign_date = date("Y", strtotime($row['assign_date']));;
                                    }
                                ?>
                                    <th colspan="2"><div class="d-flex"><span class="mr-5">Semester - 1</span><span class="ml-5"><?php echo  $assign_date. " ".$session; ?> </span></div></th>
                                    <th>CH</th>
                                    <th>%</th>
                                    <th>G.P</th>
                                    <th>Letter</th>
                                </tr>
                                <?php
                                    $completed_ch = 0;
                                    $total_semester_ch = 0;
                                    $obtain_marks = "";
                                    $total_ch = 0;
                                    $quality_points = 0;
                                    $total_quality_points = 0;
                                    $all_semester_quality_points = 0;
                                    $que="SELECT * FROM course_subjects WHERE dept_id='1' AND semester = 1 ORDER BY semester ASC";
                                    $run=mysqli_query($con,$que);
                                    while ($row=mysqli_fetch_array($run)) {
                                      $gpa = "";
                                      $grade = "";
                                      ?>
                                      <tr>
                                        <td><?php echo $row['subject_code'] ?></td>
                                        <td><?php echo $row['subject_name'] ?></td>
                                        <td><?php echo $row['credit_hours'] ?></td>
                                        <?php
                                            $subject = $row['subject_code'];
                                            $result_query = 
                                            "SELECT * FROM 
                                              class_result cr 
                                            INNER JOIN 
                                              student_courses AS cs ON cr.subject_code = cs.subject_code AND cr.roll_no = cs.roll_no 
                                            WHERE 
                                              cr.subject_code = '$subject' AND cr.roll_no = '$roll_no'";

                                            $run_result = mysqli_query($con, $result_query);
                                            while($result_row = mysqli_fetch_array($run_result)){
                                              $obtain_marks = $result_row['obtain_marks'];
                                              $assign_date = date("y", strtotime($result_row['assign_date']));
                                            }
                                        ?>
                                          <td><?php echo $obtain_marks ?></td>
                                          <?php
                                            $gpa = gpa($obtain_marks, $assign_date); 
                                            $grade = grade($obtain_marks, $assign_date);
                                          ?>
                                          <td><?php echo $gpa; ?></td>
                                          <td><?php echo $grade; ?></td>
                                          <?php
                                            $total_ch = $total_ch + $row['credit_hours'];
                                            if($obtain_marks>=50){
                                                $quality_points = $gpa * $row['credit_hours'];
                                                $total_quality_points = $total_quality_points + $quality_points;
                                                $completed_ch = $completed_ch + $row['credit_hours'];
                                            }
                                          ?>
                                      </tr>
                                      <?php
                                      $obtain_marks = "";
                                    } 
                                ?>
                                <tr>
                                    <th colspan="2">Total Semester CH</th>
                                    <?php $total_semester_ch = $total_semester_ch + $total_ch; ?>
                                    <th><?php echo $total_ch; ?></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td colspan="4">.</td>
                                    <td colspan="2">.</td>
                                </tr>
                                <tr>
                                    <td colspan="4">.</td>
                                    <td colspan="2">.</td>
                                </tr>
                                <tr>
                                    <th colspan="4">Semester GPA</th>
                                    <?php $all_semester_quality_points = $all_semester_quality_points + $total_quality_points; ?>
                                    <th colspan="2"><?php echo  round($total_quality_points/$total_ch, 2); ?></th>
                                </tr>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div>
                    <section class="mt-3">
                        <div class="mt-2">
                            <table class="w-100 table-elements table-six-tr"cellpadding="2">
                                <tr class="pt-5 table-six text-white" style="height: 32px;">
                                <?php
                                    $que=
                                    "SELECT * FROM 
                                      student_courses sc 
                                    INNER JOIN 
                                      sessions AS s ON sc.session = s.session_id 
                                    WHERE 
                                      sc.semester='2' AND sc.roll_no='$roll_no'";

                                    $run=mysqli_query($con,$que);
                                    while ($row=mysqli_fetch_array($run)) {
                                      $session = $row['session_name'];
                                      $assign_date = date("Y", strtotime($row['assign_date']));
                                    }
                                ?>
                                    <th colspan="2"><div class="d-flex"><span class="mr-5">Semester - 2</span><span class="ml-5"><?php echo  $assign_date. " ".$session; ?> </span></div></th>
                                    <th>CH</th>
                                    <th>%</th>
                                    <th>G.P</th>
                                    <th>Letter</th>
                                </tr>
                                <?php
                                  $obtain_marks = "";
                                  $total_ch = 0;
                                  $quality_points = 0;
                                  $total_quality_points = 0;
                                  $que="select * from course_subjects where dept_id='1' and semester=2 ORDER BY semester ASC";
                                  $run=mysqli_query($con,$que);
                                  while ($row=mysqli_fetch_array($run)) {
                                    $gpa = "";
                                    $grade = "";
                                ?>
                                    <tr>
                                      <td><?php echo $row['subject_code'] ?></td>
                                      <td><?php echo $row['subject_name'] ?></td>
                                      <td><?php echo $row['credit_hours'] ?></td>
                                      <?php
                                          $subject = $row['subject_code'];
                                          $result_query = 
                                          "SELECT * FROM 
                                            class_result cr 
                                          INNER JOIN 
                                            student_courses AS cs ON cr.subject_code = cs.subject_code AND cr.roll_no = cs.roll_no 
                                          WHERE 
                                            cr.subject_code = '$subject' AND cr.roll_no='$roll_no'";

                                          $run_result = mysqli_query($con, $result_query);
                                          while($result_row = mysqli_fetch_array($run_result)){
                                            $obtain_marks = $result_row['obtain_marks'];
                                            $assign_date = date("y", strtotime($result_row['assign_date']));
                                          }
                                      ?>
                                      <td><?php echo $obtain_marks ?></td>
                                      <?php
                                        $gpa = gpa($obtain_marks, $assign_date); 
                                        $grade = grade($obtain_marks, $assign_date);
                                      ?>
                                      <td><?php echo $gpa; ?></td>
                                      <td><?php echo $grade; ?></td>
                                      <?php
                                        $total_ch = $total_ch + $row['credit_hours'];
                                        if($obtain_marks>=50){
                                            $quality_points = $gpa * $row['credit_hours'];
                                            $total_quality_points = $total_quality_points + $quality_points;
                                            $completed_ch = $completed_ch + $row['credit_hours'];
                                        }
                                      ?>
                                    </tr>
                                    <?php
                                    $obtain_marks = "";
                                  } 
                                ?>
                                <tr>
                                    <th colspan="2">Total Semester CH</th>
                                    <?php $total_semester_ch = $total_semester_ch + $total_ch; ?>
                                    <th><?php echo $total_ch; ?></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th colspan="4">Semester GPA</th>
                                    <?php $all_semester_quality_points = $all_semester_quality_points + $total_quality_points; ?>
                                    <th colspan="2"><?php echo  round($total_quality_points/$total_ch, 2); ?></th>
                                </tr>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div>
                    <section class="mt-3">
                        <div class="mt-2">
                            <table class="w-100 table-elements table-six-tr"cellpadding="2">
                                <tr class="pt-5 table-six text-white" style="height: 32px;">
                                <?php
                                    $que=
                                    "SELECT * FROM 
                                        student_courses AS sc 
                                    INNER JOIN 
                                        sessions AS s ON sc.session = s.session_id 
                                    WHERE 
                                        sc.semester='3' AND sc.roll_no='$roll_no'";
                                    $run=mysqli_query($con,$que);
                                    while ($row=mysqli_fetch_array($run)) {
                                        $session = $row['session_name'];
                                        $assign_date = date("Y", strtotime($row['assign_date']));;
                                    }
                                ?>
                                    <th colspan="2"><div class="d-flex"><span class="mr-5">Semester - 3</span><span class="ml-5"><?php echo  $assign_date. " ".$session; ?> </span></div></th>
                                    <th>CH</th>
                                    <th>%</th>
                                    <th>G.P</th>
                                    <th>Letter</th>
                                </tr>
                                <?php
                                    $obtain_marks = "";
                                    $total_ch = 0;
                                    $quality_points = 0;
                                    $total_quality_points = 0;
                                    $que="SELECT * FROM course_subjects WHERE dept_id='1' AND semester=3 ORDER BY semester ASC";
                                    $run=mysqli_query($con,$que);
                                    while ($row=mysqli_fetch_array($run)) {
                                        $gpa = "";
                                        $grade = "";
                                        ?>
                                        <tr>
                                            <td><?php echo $row['subject_code'] ?></td>
                                            <td><?php echo $row['subject_name'] ?></td>
                                            <td><?php echo $row['credit_hours'] ?></td>
                                            <?php
                                                $subject = $row['subject_code'];
                                                $result_query = 
                                                "SELECT * FROM 
                                                    class_result AS cr 
                                                INNER JOIN 
                                                    student_courses AS cs ON cr.subject_code = cs.subject_code AND cr.roll_no=cs.roll_no 
                                                WHERE 
                                                    cr.subject_code='$subject' AND cr.roll_no='$roll_no'";

                                                $run_result = mysqli_query($con, $result_query);
                                                while($result_row = mysqli_fetch_array($run_result)){
                                                    $obtain_marks = $result_row['obtain_marks'];
                                                    $assign_date = date("y", strtotime($result_row['assign_date']));
                                                }
                                            ?>
                                            <td><?php echo $obtain_marks ?></td>
                                            <?php
                                                $gpa = gpa($obtain_marks, $assign_date); 
                                                $grade = grade($obtain_marks, $assign_date);
                                            ?>
                                            <td><?php echo $gpa; ?></td>
                                            <td><?php echo $grade; ?></td>
                                            <?php
                                                $total_ch = $total_ch + $row['credit_hours'];
                                                if($obtain_marks>=50){
                                                    $quality_points = $gpa * $row['credit_hours'];
                                                    $total_quality_points = $total_quality_points + $quality_points;
                                                    $completed_ch = $completed_ch + $row['credit_hours'];
                                                }
                                            ?>
                                        </tr>
                                        <?php
                                         $obtain_marks = "";
                                    } 
                                ?>
                                <tr>
                                    <th colspan="2">Total Semester CH</th>
                                    <?php $total_semester_ch = $total_semester_ch + $total_ch; ?>
                                    <th><?php echo $total_ch; ?></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th colspan="4">Semester GPA</th>
                                    <?php $all_semester_quality_points = $all_semester_quality_points + $total_quality_points; ?>
                                    <th colspan="2"><?php echo  round($total_quality_points/$total_ch, 2); ?></th>
                                </tr>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div>
                    <section class="mt-3">
                        <div class="mt-2">
                            <table class="w-100 table-elements table-six-tr"cellpadding="2">
                                <tr class="pt-5 table-six text-white" style="height: 32px;">
                                <?php
                                    $que=
                                    "SELECT * FROM 
                                      student_courses sc 
                                    INNER JOIN 
                                      sessions AS s ON sc.session = s.session_id 
                                    WHERE 
                                      sc.semester='4' AND sc.roll_no='$roll_no'";

                                    $run=mysqli_query($con,$que);
                                    while ($row=mysqli_fetch_array($run)) {
                                        $session = $row['session_name'];
                                        $assign_date = date("Y", strtotime($row['assign_date']));
                                    }
                                ?>
                                    <th colspan="2"><div class="d-flex"><span class="mr-5">Semester - 4</span><span class="ml-5"><?php echo  $assign_date. " ".$session; ?> </span></div></th>
                                    <th>CH</th>
                                    <th>%</th>
                                    <th>G.P</th>
                                    <th>Letter</th>
                                </tr>
                                <?php
                                    $obtain_marks = "";
                                    $total_ch = 0;
                                    $quality_points = 0;
                                    $total_quality_points = 0;
                                    $que="SELECT * FROM course_subjects WHERE dept_id='1' and semester=4 ORDER BY semester ASC";
                                    $run=mysqli_query($con,$que);
                                    while ($row=mysqli_fetch_array($run)) {
                                        $gpa = "";
                                        $grade = "";
                                      ?>
                                      <tr>
                                        <td><?php echo $row['subject_code'] ?></td>
                                        <td><?php echo $row['subject_name'] ?></td>
                                        <td><?php echo $row['credit_hours'] ?></td>
                                        <?php
                                            $subject = $row['subject_code'];
                                            $result_query = "SELECT * FROM class_result AS cr INNER JOIN student_courses AS cs ON cr.subject_code = cs.subject_code AND cr.roll_no=cs.roll_no WHERE cr.subject_code='$subject' AND cr.roll_no='$roll_no'";
                                            $run_result = mysqli_query($con, $result_query);
                                            while($result_row = mysqli_fetch_array($run_result)){
                                                $obtain_marks = $result_row['obtain_marks'];
                                                $assign_date = date("y", strtotime($result_row['assign_date']));
                                            }
                                        ?>
                                        <td><?php echo $obtain_marks ?></td>
                                        <?php
                                            $gpa = gpa($obtain_marks, $assign_date); 
                                            $grade = grade($obtain_marks, $assign_date);
                                        ?>
                                        <td><?php echo $gpa; ?></td>
                                        <td><?php echo $grade; ?></td>
                                        <?php
                                            $total_ch = $total_ch + $row['credit_hours'];
                                            if($obtain_marks>=50){
                                                $quality_points = $gpa * $row['credit_hours'];
                                                $total_quality_points = $total_quality_points + $quality_points;
                                                $completed_ch = $completed_ch + $row['credit_hours'];
                                            }
                                        ?>
                                      </tr>
                                      <?php
                                      $obtain_marks = "";
                                    } 
                                ?>
                                <tr>
                                    <th colspan="2">Total Semester CH</th>
                                    <?php $total_semester_ch = $total_semester_ch + $total_ch; ?>
                                    <th><?php echo $total_ch; ?></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td colspan="4">.</td>
                                    <td colspan="2">.</td>
                                </tr>
                                <tr>
                                    <th colspan="4">Semester GPA</th>
                                    <?php $all_semester_quality_points = $all_semester_quality_points + $total_quality_points; ?>
                                    <th colspan="2"><?php echo  round($total_quality_points/$total_ch, 2); ?></th>
                                </tr>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div>
                    <section class="mt-3">
                        <div class="mt-2">
                            <table class="w-100 table-elements table-six-tr"cellpadding="2">
                                <tr class="pt-5 table-six text-white" style="height: 32px;">
                                <?php
                                    $que="SELECT * FROM student_courses AS sc INNER JOIN sessions AS s ON sc.session = s.session_id WHERE sc.semester='5' AND sc.roll_no='$roll_no'";
                                    $run=mysqli_query($con,$que);
                                    while ($row=mysqli_fetch_array($run)) {
                                        $session = $row['session_name'];
                                        $assign_date = date("Y", strtotime($row['assign_date']));;
                                    }
                                ?>
                                    <th colspan="2"><div class="d-flex"><span class="mr-5">Semester - 5</span><span class="ml-5"><?php echo  $assign_date. " ".$session; ?> </span></div></th>
                                    <th>CH</th>
                                    <th>%</th>
                                    <th>G.P</th>
                                    <th>Letter</th>
                                </tr>
                                <?php
                                    $obtain_marks = "";
                                    $total_ch = 0;
                                    $quality_points = 0;
                                    $total_quality_points = 0;
                                    $que="SELECT * FROM course_subjects WHERE dept_id='1' AND semester=5 ORDER BY semester ASC";
                                    $run=mysqli_query($con,$que);
                                    while ($row=mysqli_fetch_array($run)) {
                                        $gpa = "";
                                        $grade = "";
                                ?>
                                <tr>
                                    <td><?php echo $row['subject_code'] ?></td>
                                    <td><?php echo $row['subject_name'] ?></td>
                                    <td><?php echo $row['credit_hours'] ?></td>
                                    <?php
                                        $subject = $row['subject_code'];
                                        $result_query = "SELECT * FROM class_result AS cr INNER JOIN student_courses cs ON cr.subject_code = cs.subject_code AND cr.roll_no=cs.roll_no WHERE cr.subject_code='$subject' AND cr.roll_no='$roll_no'";
                                        $run_result = mysqli_query($con, $result_query);
                                        while($result_row = mysqli_fetch_array($run_result)){
                                            $obtain_marks = $result_row['obtain_marks'];
                                            $assign_date = date("y", strtotime($result_row['assign_date']));
                                        }
                                    ?>
                                    <td><?php echo $obtain_marks ?></td>
                                    <?php
                                        $gpa = gpa($obtain_marks, $assign_date); 
                                        $grade = grade($obtain_marks, $assign_date);
                                    ?>
                                    <td><?php echo $gpa; ?></td>
                                    <td><?php echo $grade; ?></td>
                                    <?php
                                        $total_ch = $total_ch + $row['credit_hours'];
                                        if($obtain_marks>=50){
                                            $quality_points = $gpa * $row['credit_hours'];
                                            $total_quality_points = $total_quality_points + $quality_points;
                                            $completed_ch = $completed_ch + $row['credit_hours'];
                                        }
                                    ?>
                                </tr>
                                <?php
                                $obtain_marks = "";
                                    } 
                                ?>
                                <tr>
                                    <th colspan="2">Total Semester CH</th>
                                    <?php $total_semester_ch = $total_semester_ch + $total_ch; ?>
                                    <th><?php echo $total_ch; ?></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th colspan="4">Semester GPA</th>
                                    <?php $all_semester_quality_points = $all_semester_quality_points + $total_quality_points; ?>
                                    <th colspan="2"><?php echo  round($total_quality_points/$total_ch, 2); ?></th>
                                </tr>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div>
                    <section class="mt-3">
                        <div class="mt-2">
                            <table class="w-100 table-elements table-six-tr"cellpadding="2">
                                <tr class="pt-5 table-six text-white" style="height: 32px;">
                                <?php
                                    $que="SELECT * FROM student_courses sc INNER JOIN sessions s on sc.session = s.session_id where sc.semester='6' and sc.roll_no='$roll_no'";
                                    $run=mysqli_query($con,$que);
                                    while ($row=mysqli_fetch_array($run)) {
                                        $session = $row['session_name'];
                                        $assign_date = date("Y", strtotime($row['assign_date']));;
                                    }
                                ?>
                                    <th colspan="2"><div class="d-flex"><span class="mr-5">Semester - 6</span><span class="ml-5"><?php echo  $assign_date. " ".$session; ?> </span></div></th>
                                    <th>CH</th>
                                    <th>%</th>
                                    <th>G.P</th>
                                    <th>Letter</th>
                                </tr>
                                <?php
                                    $obtain_marks = "";
                                    $total_ch = 0;
                                    $quality_points = 0;
                                    $total_quality_points = 0;
                                    $que="SELECT * FROM course_subjects WHERE dept_id='1' AND semester=6 ORDER BY semester ASC";
                                    $run=mysqli_query($con,$que);
                                    while ($row=mysqli_fetch_array($run)) {
                                        $gpa = "";
                                        $grade = "";
                                ?>
                                <tr>
                                    <td><?php echo $row['subject_code'] ?></td>
                                    <td><?php echo $row['subject_name'] ?></td>
                                    <td><?php echo $row['credit_hours'] ?></td>
                                    <?php
                                        $subject = $row['subject_code'];
                                        $result_query = "SELECT * from class_result cr INNER JOIN student_courses cs on cr.subject_code = cs.subject_code and cr.roll_no=cs.roll_no where cr.subject_code='$subject' and cr.roll_no='$roll_no'";
                                        $run_result = mysqli_query($con, $result_query);
                                        while($result_row = mysqli_fetch_array($run_result)){
                                            $obtain_marks = $result_row['obtain_marks'];
                                            $assign_date = date("y", strtotime($result_row['assign_date']));
                                        }
                                    ?>
                                    <td><?php echo $obtain_marks ?></td>
                                    <?php
                                        $gpa = gpa($obtain_marks, $assign_date); 
                                        $grade = grade($obtain_marks, $assign_date);
                                    ?>
                                    <td><?php echo $gpa; ?></td>
                                    <td><?php echo $grade; ?></td>
                                    <?php
                                        $total_ch = $total_ch + $row['credit_hours'];
                                        if($obtain_marks>=50){
                                            $quality_points = $gpa * $row['credit_hours'];
                                            $total_quality_points = $total_quality_points + $quality_points;
                                            $completed_ch = $completed_ch + $row['credit_hours'];
                                        }
                                    ?>
                                </tr>
                                <?php
                                $obtain_marks = "";
                                    } 
                                ?>
                                <tr>
                                    <th colspan="2">Total Semester CH</th>
                                    <?php $total_semester_ch = $total_semester_ch + $total_ch; ?>
                                    <th><?php echo $total_ch; ?></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th colspan="4">Semester GPA</th>
                                    <?php $all_semester_quality_points = $all_semester_quality_points + $total_quality_points; ?>
                                    <th colspan="2"><?php echo  round($total_quality_points/$total_ch, 2); ?></th>
                                </tr>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div>
                    <section class="mt-3">
                        <div class="mt-2">
                            <table class="w-100 table-elements table-six-tr"cellpadding="2">
                                <tr class="pt-5 table-six text-white" style="height: 32px;">
                                <?php
                                    $que="SELECT * FROM student_courses sc INNER JOIN sessions s on sc.session = s.session_id where sc.semester='7' and sc.roll_no='$roll_no'";
                                    $run=mysqli_query($con,$que);
                                    while ($row=mysqli_fetch_array($run)) {
                                        $session = $row['session_name'];
                                        $assign_date = date("Y", strtotime($row['assign_date']));;
                                    }
                                ?>
                                    <th colspan="2"><div class="d-flex"><span class="mr-5">Semester - 7</span><span class="ml-5"><?php echo  $assign_date. " ".$session; ?> </span></div></th>
                                    <th>CH</th>
                                    <th>%</th>
                                    <th>G.P</th>
                                    <th>Letter</th>
                                </tr>
                                <?php
                                    $obtain_marks = "";
                                    $total_ch = 0;
                                    $quality_points = 0;
                                    $total_quality_points = 0;
                                    $que="SELECT * FROM course_subjects where dept_id='1' and semester=7 ORDER BY semester ASC";
                                    $run=mysqli_query($con,$que);
                                    while ($row=mysqli_fetch_array($run)) {
                                        $gpa = "";
                                        $grade = "";
                                ?>
                                <tr>
                                    <td><?php echo $row['subject_code'] ?></td>
                                    <td><?php echo $row['subject_name'] ?></td>
                                    <td><?php echo $row['credit_hours'] ?></td>
                                    <?php
                                        $subject = $row['subject_code'];
                                        $result_query  * from class_result cr INNER JOIN student_courses cs on cr.subject_code = cs.subject_code and cr.roll_no=cs.roll_no where cr.subject_code='$subject' and cr.roll_no='$roll_no'";
                                        $run_result = mysqli_query($con, $result_query);
                                        while($result_row = mysqli_fetch_array($run_result)){
                                            $obtain_marks = $result_row['obtain_marks'];
                                            $assign_date = date("y", strtotime($result_row['assign_date']));
                                        }
                                    ?>
                                    <td><?php echo $obtain_marks ?></td>
                                    <?php
                                        $gpa = gpa($obtain_marks, $assign_date); 
                                        $grade = grade($obtain_marks, $assign_date);
                                    ?>
                                    <td><?php echo $gpa; ?></td>
                                    <td><?php echo $grade; ?></td>
                                    <?php
                                        $total_ch = $total_ch + $row['credit_hours'];
                                        if($obtain_marks>=50){
                                            $quality_points = $gpa * $row['credit_hours'];
                                            $total_quality_points = $total_quality_points + $quality_points;
                                            $completed_ch = $completed_ch + $row['credit_hours'];
                                        }
                                    ?>
                                </tr>
                                <?php
                                $obtain_marks = "";
                                    } 
                                ?>
                                <tr>
                                    <th colspan="2">Total Semester CH</th>
                                    <?php $total_semester_ch = $total_semester_ch + $total_ch; ?>
                                    <th><?php echo $total_ch; ?></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th colspan="4">Semester GPA</th>
                                    <?php $all_semester_quality_points = $all_semester_quality_points + $total_quality_points; ?>
                                    <th colspan="2"><?php echo  round($total_quality_points/$total_ch, 2); ?></th>
                                </tr>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div>
                    <section class="mt-3">
                        <div class="mt-2">
                            <table class="w-100 table-elements table-six-tr"cellpadding="2">
                                <tr class="pt-5 table-six text-white" style="height: 32px;">
                                <?php
                                    $que="SELECT * FROM student_courses sc INNER JOIN sessions s on sc.session = s.session_id where sc.semester='8' and sc.roll_no='$roll_no'";
                                    $run=mysqli_query($con,$que);
                                    while ($row=mysqli_fetch_array($run)) {
                                        $session = $row['session_name'];
                                        $assign_date = date("Y", strtotime($row['assign_date']));;
                                    }
                                ?>
                                    <th colspan="2"><div class="d-flex"><span class="mr-5">Semester - 8</span><span class="ml-5"><?php echo  $assign_date. " ".$session; ?> </span></div></th>
                                    <th>CH</th>
                                    <th>%</th>
                                    <th>G.P</th>
                                    <th>Letter</th>
                                </tr>
                                <?php
                                    $obtain_marks = "";
                                    $total_ch = 0;
                                    $quality_points = 0;
                                    $total_quality_points = 0;
                                    $que="SELECT * FROM course_subjects where dept_id='1' and semester=8 ORDER BY semester ASC";
                                    $run=mysqli_query($con,$que);
                                    while ($row=mysqli_fetch_array($run)) {
                                        $gpa = "";
                                        $grade = "";
                                ?>
                                <tr>
                                    <td><?php echo $row['subject_code'] ?></td>
                                    <td><?php echo $row['subject_name'] ?></td>
                                    <td><?php echo $row['credit_hours'] ?></td>
                                    <?php
                                        $subject = $row['subject_code'];
                                        $result_query  * from class_result cr INNER JOIN student_courses cs on cr.subject_code = cs.subject_code and cr.roll_no=cs.roll_no where cr.subject_code='$subject' and cr.roll_no='$roll_no'";
                                        $run_result = mysqli_query($con, $result_query);
                                        while($result_row = mysqli_fetch_array($run_result)){
                                            $obtain_marks = $result_row['obtain_marks'];
                                            $assign_date = date("y", strtotime($result_row['assign_date']));
                                        }
                                    ?>
                                    <td><?php echo $obtain_marks ?></td>
                                    <?php
                                        $gpa = gpa($obtain_marks, $assign_date); 
                                        $grade = grade($obtain_marks, $assign_date);
                                    ?>
                                    <td><?php echo $gpa; ?></td>
                                    <td><?php echo $grade; ?></td>
                                    <?php
                                        $total_ch = $total_ch + $row['credit_hours'];
                                        if($obtain_marks>=50){
                                            $quality_points = $gpa * $row['credit_hours'];
                                            $total_quality_points = $total_quality_points + $quality_points;
                                            $completed_ch = $completed_ch + $row['credit_hours'];
                                        }
                                    ?>
                                </tr>
                                <?php
                                $obtain_marks = "";
                                    } 
                                ?>
                                <tr>
                                    <th colspan="2">Total Semester CH</th>
                                    <?php $total_semester_ch = $total_semester_ch + $total_ch; ?>
                                    <th><?php echo $total_ch; ?></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th colspan="4">Semester GPA</th>
                                    <?php $all_semester_quality_points = $all_semester_quality_points + $total_quality_points; ?>
                                    <th colspan="2"><?php echo  round($total_quality_points/$total_ch, 2); ?></th>
                                </tr>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div>
                    <section class="mt-3">
                        <div class="mt-2">
                            <table class="w-100 table-elements table-six-tr"cellpadding="2">
                                <tr class="pt-5 table-six text-white" style="height: 32px;">
                                <?php
                                    $que="SELECT * FROM student_courses sc INNER JOIN sessions s on sc.session = s.session_id where sc.semester='9' and sc.roll_no='$roll_no'";
                                    $run=mysqli_query($con,$que);
                                    while ($row=mysqli_fetch_array($run)) {
                                        $session = $row['session_name'];
                                        $assign_date = date("Y", strtotime($row['assign_date']));;
                                    }
                                ?>
                                    <th colspan="2"><div class="d-flex"><span class="mr-5">Semester - 9</span><span class="ml-5"><?php echo  $assign_date. " ".$session; ?> </span></div></th>
                                    <th>CH</th>
                                    <th>%</th>
                                    <th>G.P</th>
                                    <th>Letter</th>
                                </tr>
                                <?php
                                    $obtain_marks = "";
                                    $total_ch = 0;
                                    $quality_points = 0;
                                    $total_quality_points = 0;
                                    $que="SELECT * FROM course_subjects where dept_id='1' and semester=9 ORDER BY semester ASC";
                                    $run=mysqli_query($con,$que);
                                    while ($row=mysqli_fetch_array($run)) {
                                        $gpa = "";
                                        $grade = "";
                                ?>
                                <tr>
                                    <td><?php echo $row['subject_code'] ?></td>
                                    <td><?php echo $row['subject_name'] ?></td>
                                    <td><?php echo $row['credit_hours'] ?></td>
                                    <?php
                                        $subject = $row['subject_code'];
                                        $result_query = "SELECT * from class_result cr INNER JOIN student_courses cs on cr.subject_code = cs.subject_code and cr.roll_no=cs.roll_no where cr.subject_code='$subject' and cr.roll_no='$roll_no'";
                                        $run_result = mysqli_query($con, $result_query);
                                        while($result_row = mysqli_fetch_array($run_result)){
                                            $obtain_marks = $result_row['obtain_marks'];
                                            $assign_date = date("y", strtotime($result_row['assign_date']));
                                        }
                                    ?>
                                    <td><?php echo $obtain_marks ?></td>
                                    <?php
                                        $gpa = gpa($obtain_marks, $assign_date); 
                                        $grade = grade($obtain_marks, $assign_date);
                                    ?>
                                    <td><?php echo $gpa; ?></td>
                                    <td><?php echo $grade; ?></td>
                                    <?php
                                        $total_ch = $total_ch + $row['credit_hours'];
                                        if($obtain_marks>=50){
                                            $quality_points = $gpa * $row['credit_hours'];
                                            $total_quality_points = $total_quality_points + $quality_points;
                                            $completed_ch = $completed_ch + $row['credit_hours'];
                                        }
                                    ?>
                                </tr>
                                <?php
                                $obtain_marks = "";
                                    } 
                                ?>
                                <tr>
                                    <th colspan="2">Total Semester CH</th>
                                    <?php $total_semester_ch = $total_semester_ch + $total_ch; ?>
                                    <th><?php echo $total_ch; ?></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th colspan="4">Semester GPA</th>
                                    <?php $all_semester_quality_points = $all_semester_quality_points + $total_quality_points; ?>
                                    <th colspan="2"><?php echo  round($total_quality_points/$total_ch, 2); ?></th>
                                </tr>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div>
                    <section class="mt-3">
                        <div class="mt-2">
                            <table class="w-100 table-elements table-six-tr"cellpadding="2">
                                <tr class="pt-5 table-six text-white" style="height: 32px;">
                                <?php
                                    $que="SELECT * FROM student_courses sc INNER JOIN sessions s on sc.session = s.session_id where sc.semester='10' and sc.roll_no='$roll_no'";
                                    $run=mysqli_query($con,$que);
                                    while ($row=mysqli_fetch_array($run)) {
                                        $session = $row['session_name'];
                                        $assign_date = date("Y", strtotime($row['assign_date']));;
                                    }
                                ?>
                                    <th colspan="2"><div class="d-flex"><span class="mr-5">Semester - 10</span><span class="ml-5"><?php echo  $assign_date. " ".$session; ?> </span></div></th>
                                    <th>CH</th>
                                    <th>%</th>
                                    <th>G.P</th>
                                    <th>Letter</th>
                                </tr>
                                <?php
                                    $obtain_marks = "";
                                    $total_ch = 0;
                                    $quality_points = 0;
                                    $total_quality_points = 0;
                                    $que="SELECT * FROM course_subjects where dept_id='1' and semester=10 ORDER BY semester ASC";
                                    $run=mysqli_query($con,$que);
                                    while ($row=mysqli_fetch_array($run)) {
                                        $gpa = "";
                                        $grade = "";
                                ?>
                                <tr>
                                    <td><?php echo $row['subject_code'] ?></td>
                                    <td><?php echo $row['subject_name'] ?></td>
                                    <td><?php echo $row['credit_hours'] ?></td>
                                    <?php
                                        $subject = $row['subject_code'];
                                        $result_query = "SELECT * from class_result AS cr INNER JOIN student_courses AS cs ON cr.subject_code = cs.subject_code AND cr.roll_no=cs.roll_no where cr.subject_code='$subject' and cr.roll_no='$roll_no'";
                                        $run_result = mysqli_query($con, $result_query);
                                        while($result_row = mysqli_fetch_array($run_result)){
                                            $obtain_marks = $result_row['obtain_marks'];
                                            $assign_date = date("y", strtotime($result_row['assign_date']));
                                        }
                                    ?>
                                    <td><?php echo $obtain_marks ?></td>
                                    <?php
                                        $gpa = gpa($obtain_marks, $assign_date); 
                                        $grade = grade($obtain_marks, $assign_date);
                                    ?>
                                    <td><?php echo $gpa; ?></td>
                                    <td><?php echo $grade; ?></td>
                                    <?php
                                        $total_ch = $total_ch + $row['credit_hours'];
                                        if($obtain_marks>=50){
                                            $quality_points = $gpa * $row['credit_hours'];
                                            $total_quality_points = $total_quality_points + $quality_points;
                                            $completed_ch = $completed_ch + $row['credit_hours'];
                                        }
                                    ?>
                                </tr>
                                <?php
                                $obtain_marks = "";
                                    } 
                                ?>
                                <tr>
                                    <th colspan="2">Total Semester CH</th>
                                    <?php $total_semester_ch = $total_semester_ch + $total_ch; ?>
                                    <th><?php echo $total_ch; ?></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th colspan="2">Total C.H for Graduation</th>
                                    <th><?php echo $total_semester_ch; ?></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </tr>
                                    <th colspan="2">C.H Completed</th>
                                    <th><?php echo $completed_ch ?></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th colspan="4">.</th>
                                    <th colspan="2">.</th>
                                </tr>
                                <tr>
                                    <th colspan="4">Semester GPA</th>
                                    <?php $all_semester_quality_points = $all_semester_quality_points + $total_quality_points; ?>
                                    <th colspan="2"><?php echo  round($total_quality_points/$total_ch, 2); ?></th>
                                </tr>
                                </tr>
                                    <th colspan="4">CGPA</th>
                                    <th colspan="2"><?php echo round(($all_semester_quality_points/$total_semester_ch), 2) ?></th>
                                </tr>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row text-center font-weight-bold mb-5">
            <div class="col-xl-4">PREPARED BY</div>
            <div class="col-xl-4">DEAN</div>
            <div class="col-xl-4">CONTROLLER EXAMINATIONS</div>
        </div>
    </div>

</body>
</html>