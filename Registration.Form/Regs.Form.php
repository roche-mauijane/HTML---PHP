<?php

$Firstname=$_POST['firstname'];
$Middlename=$_POST['middlename'];
$Lastname=$_POST['lastname'];
$Subjects=$_POST['subjects'];
$Email=$_POST['email'];
$Sex=$_POST['sex'];

//Java
 function backtoReg(){
   echo"<script>alert('Invalid Email')
    window.location.href='../../html/2.0.html';
    </script>";
 }

echo '<b>'.'First name:   '.'</b>'.  $Firstname.'<br/>';
echo '<b>'.'Middle name:   '. '</b>'. $Middlename.'<br/>';
echo '<b>'.'Last name:   '. '</b>'. $Lastname.'<br/>'.'<br/>';
if(filter_var($Email, FILTER_VALIDATE_EMAIL)==true){
    //echo '<b>'.'This email: '.'</b>'.$Email.'<b>'.' is valid <br/>'.'<br/>'.'</b>';
 }else{ backtoReg();
    //echo '<b>'.'This email: '.$Email.'<b>'.' is invalid <br/>'.'</b>';
 }
 echo '<b>'. 'Sex:   '. '</b>' .$Sex.'<br/>';
 echo '<b>'. 'Email:   '. '</b>' .$Email.'<br/>';
 echo '<b>'. 'Subjects Taken: '. '</b>' .'<br/>';
 for ($i=0; $i<count ($Subjects); $i++){
    echo $Subjects[$i].'<br/>';
 }
echo '</br>';
echo '<hr>';

$csv=array(
   array("First Name","Middle Name", "Last Name", "Sex", "Email", "Subjects Taken"),
   array($Firstname, $Middlename, $Lastname, $Sex, $Email, implode(",",$Subjects))
);
 /*Creating arrays for rows and columns -excel*/
 /*creation and naming of file*/
 $exists = false;
 
 if(file_exists('info.csv')){
  $exists = true;
 }
 
 if(!$exists){
  $file = fopen("info.csv",'w'); /*creation and naming of file  */
  fputcsv($file, $csv[0]); /*adding array to the 1st row(in spreadsheet) follwed by a comma*/
  fputcsv($file, $csv[1]);
  fclose($file);
 }
 else{
  $file = fopen("info.csv",'a'); /*creation and naming of file  */
  fputcsv($file, $csv[1]);
  fclose($file);
 } /*closing the file */
 echo "CSV File Has been created.";
   echo'<hr>';

 /*Table*/
echo '</br>';
echo '<table border="1">';
echo '<tr>';

echo '<th>Firstname</th>';
echo '<th>Middlename</th>';
echo '<th>Lastname</th>';

   echo '<th>Email</th>';
   echo '<th>Sex</th>';
   echo '<th>Subjects</th>';

      echo '</tr>';

         echo '<td>'.$Firstname.'</td>';
         echo '<td>'.$Middlename.'</td>';
         echo '<td>'.$Lastname.'</td>';
         echo '<td>'.$Email.'</td>';
         echo '<td>'.$Sex.'</td>';
         echo '<td>'.implode(',', $Subjects).'</td>';

      echo '</tr>';
      echo '</table>';

?>