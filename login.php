<?php
error_reporting(1);
include_once('connection.php');



if(isset($_POST['signIn']))
{
	$un=$_POST['id'];
$pwd1=$_POST['pwd'];
$usernamelength= strlen($un);
$passwordlength= strlen($pwd1);
	if($_POST['id']=="" || $_POST['pwd']=="")
	{
	$err="fill your id and passwrod first";
	}
	else if($usernamelength<6){
					$err="Invalid Username";
			}
			else if($passwordlength<6){
					$err="Invalid password";
			}
			
			
	else
	{
	$d=mysqli_query($con,"SELECT * FROM userinfo WHERE (user_name='{$_POST['id']}')");
	$row=mysqli_fetch_object($d);
		$fid=$row->user_name;
		$fpass=$row->password;
		if($fid==$_POST['id'] && $fpass==$_POST['pwd'])
		{
			$_SESSION['sid']=$_POST['id'];
			//header('location:HomePage.php');
			echo "<script>window.location='HomePage.php'</script>";
		}
		else
		{
			$err="Username/Password combination doesn't exists";
		}
	}
}
?>
<form method="post">
<table width="90%" border="1" align="center">
  	<tr>
		<Td colspan="2" align="center"> <font color="#FF0000"><?php echo @$err; ?></font></Td>
	</tr>
  <tr>
    <th width="171" scope="row">Enter your username </th>
    <td width="136">
		<input type="text" name="id" />
	</td>
  </tr>
  <tr>
    <th scope="row">Enter your password </th>
    <td>
			<input type="password" name="pwd"/>
	</td>
  </tr>
  <tr>
    <th colspan="2" scope="row">
	<input type="submit" value="SignIn" name="signIn"/>
	<a href="http://localhost/Mailserver_updated_new/index.php?chk=4">SignUp</a>
	</th>
  </tr>
</table>
</form>