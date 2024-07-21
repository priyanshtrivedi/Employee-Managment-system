<?php
include("connection.php");
?>
<?php
 if(isset($_POST['searchdata']))
 {
$search=$_POST['search'];
$query= "SELECT * from form where id= '$search' ";
$data=mysqli_query($conn, $query);
$result=mysqli_fetch_assoc($data);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management system</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<img src="https://plus.unsplash.com/premium_photo-1661302846246-e8faef18255d?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
    <div class="center">
        <form action="#" method="POST">
        <h1>Employee Management system software</h1>
        <div class="form">
            <input type="text" class="textfield" placeholder="Search ID" name="search" value="<?php if(isset($_POST['searchdata'])) {echo $result['id'];}?>">
            <input type="text" class="textfield" placeholder="Employee Name" name="name" value="<?php if(isset($_POST['searchdata'])) {echo $result['emp_name'];}?>">
            <input type="text" class="textfield" placeholder="Employee CTC" name="salary">
            <select class="textfield" name="gender">
                <option value="Not selected">Select Gender</option>
                <option value="Male"<?php if($result['emp_gender'] == 'Male'){echo "selected";}?>>Male</option>
                <option value="Female"<?php if($result['emp_gender'] == 'Female'){echo "selected";}?>>Female</option>
                <option value="Prefer not to say"<?php if($result['emp_gender'] == 'Prefer not to say'){echo "selected";}?>>Prefer not to say</option>
            </select>
            <select class=" textfield" name="dept">
                <option value=" Not Selected">Select Department</option>
                <option value="IT"<?php if($result['emp_department'] == 'IT'){echo "selected";}?>>IT</option>
                <option value="Accounts"<?php if($result['emp_department'] == 'Accounts'){echo "selected";}?>>Accounts</option>
                <option value="Sales"<?php if($result['emp_department'] == 'Sales'){echo "selected";}?>>Sales</option>
                <option value="Marketing"<?php if($result['emp_department'] == 'Marketing'){echo "selected";}?>>Marketing</option>
                <option value="Buisness Development"<?php if($result['emp_department'] == 'Buisness Development'){echo "selected";}?>>Buisness Development</option>
                </select>
            <input type="text" class="textfield" placeholder="Email Address" name="email">
            <textarea placeholder="Address" name="address"></textarea>
            <input type="submit" value="Search" class="btn" name="searchdata">
            <input type="submit"  name="save" value="Save" class="btn" id="save">
            <input type="submit" value="Modify" class="btn" id="Update" name="update">
            <input type="submit" value="Delete" class="btn" id="delete" name="delete" onclick=" return confirmdelete()">
            <input type="reset" value="Clear" class="btn" id="clear">
        </div>
    </form>
    </div>
</body>
</html>
<script>
    function confirmdelete(){
         return confirm('Are you sure want to delete this record')
    }
    </script>
<?php
if(isset($_POST['save']))
{

$name= $_POST['name'];
$salary= $_POST['salary'];
$gender= $_POST['gender'];
$email= $_POST['email'];
$department= $_POST['dept'];
$address= $_POST['address'];

$query="INSERT INTO form(emp_name, emp_salary, emp_gender, emp_email, emp_department, emp_address) VALUES ('$name', '$salary', '$gender', '$email' , '$department', '$address')";
$data=mysqli_query($conn, $query);
if($data){
    echo "<script> alert('Data saved into Database Successfully !! ') </script>";
}
else{
    echo " <script> alert('Failed to save Data') </script>";
}
}

?>
<?php
if(isset($_POST['delete']))
{
    $id= $_POST['search'];
    $query= "DELETE FROM form WHERE id= '$id' ";
    $data=mysqli_query($conn, $query);
    if($data){
        echo "Record deleted successfully";
    }
    else{
        echo "Failed to delete ";
    }
}
?>
<?php
if(isset($_POST['update']))
{
$id= $_POST['search'];
$name= $_POST['name'];
$salary= $_POST['salary'];
$gender= $_POST['gender'];
$email= $_POST['email'];
$department= $_POST['dept'];
$address= $_POST['address'];
$query= "UPDATE form SET emp_name='$name', emp_salary='$salary', emp_gender='$gender', emp_email='$email', emp_department='$department', emp_address='$address' WHERE id='$id' ";
$data=mysqli_query($conn, $query);
if($data){
    echo "<script> alert('Record Updated successfully') </script>";
}
else{
    echo "<script> alert('Failed to update record') </script>";
}
}
?>