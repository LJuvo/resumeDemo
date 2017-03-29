<?php
/**
 * Created by PhpStorm.
 * User: Juvo
 * Date: 2016/7/12
 * Time: 9:39
 */
//include "/Common/localSQLSettings.php";
//session_start();
//
//if (empty($_SESSION['userName'])) {
//	$url = "UserManger/login.php";
//	echo '<script language=javascript>window.location.href="' . $url . '"</script>';
//} else {
//
//	@$userName = $_SESSION['userName'];
//	localSettings();
//	$query = "SELECT * FROM user WHERE user.name='$userName'";
////	$query= "SELECT * FROM user";
//	$result = mysql_query($query);
//	if (mysql_num_rows($result) > 0) {
//		while ($row = mysql_fetch_row($result)) {
//			if (strcmp($userName, $row[1]) == 0) {
//				if (strcmp("909", $row[3] == 0)) {
					echo '<script language=javascript>window.location.href="UserManger/index_superadmin.php"</script>';
//				} else if (strcmp("606", $row[3] == 0)) {
//					echo '<script language=javascript>window.location.href="UserManger/index_admin.php"</script>';
//				} else {
//					echo '<script language=javascript>window.location.href="UserManger/index_user.php"</script>';
//				}
//			}
//		}
//	}
//}
?>
