<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/26
 * Time: 14:07
 */
include "../Common/localSQLSettings.php";
localSettings();

$nowTime = date("Y-m-d G:i:s");

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!--禁止图像工具栏出现的网页标签-->
	<meta content="no" http-equiv="imagetoolbar">
	<!--用于iphone开发-->
	<meta content="width=device-width,initial-scale=1" name="viewport">
	<?php

	$sqlname=$_GET["sql"];
	$plateId=$_GET["commId"];
	$actionD=$_GET["actionD"];

	if ($_GET["commId"]) {
		$commentKey = substr($plateId, 0, 1);
	}

	switch($sqlname){
		case "car_procurement":
			cusIdCard($sqlname,$plateId);
			break;
		case "car_customer_idcard":
			ownerCus($sqlname,$plateId,$actionD);
			break;
		case "car_owner_unit":
			ownerUnit($sqlname,$plateId,$actionD);
			break;
		case "car_insurance":
			insurance($sqlname,$plateId,$actionD);
			break;
		case "car_regist":
			reGistCar($sqlname,$plateId,$actionD);
			break;
		case "car_loan":
			loan_car($sqlname,$plateId,$actionD);
			break;
		case "car_addequipment":
			add_equip($sqlname,$plateId,$actionD);
			break;
		case "car_violations":
			viola($sqlname,$plateId,$actionD);
			break;
		case "car_cost_tolls":
			tolls($sqlname,$plateId,$actionD);
			break;
		case "car_maintenance":
			teNance($sqlname,$plateId,$actionD);
			break;
		case "car_beauty":
			beAuty($sqlname,$plateId,$actionD);
			break;
		case "car_annual_inspection":
			anInspect($sqlname,$plateId,$actionD);
			break;
		default:
			break;
	}
	function cusIdCard($sqlname,$plateId){
		$infoList=array("idClas","idCate","idBran","idType","idSaUn","idSaPe","idPhon", "idFaPr","idPurch",
			"idBuWay","idBuPer","idFinPer","idFinOpn","idFinDate","idMan","idMaOpn","idMaDate");

		for($i=0;$i<count($infoList);$i++){
			$temp=$infoList[$i];

			if($_POST[$temp]==null){
				echo"<meta http-equiv='refresh' content='0.1;URL=carbasicontent.php?commId=$plateId'>";
				echo"<script>alert('信息不完整,请填写完整');</script>";
				break;
			}else if($i==count($infoList)-1){
				$query_unit="UPDATE $sqlname SET categories='$_POST[idCate]',class='$_POST[idClas]',
type='$_POST[idType]',brand='$_POST[idBran]',saleUnit='$_POST[idSaUn]',salePerson='$_POST[idSaPe]',phone='$_POST[idPhon]',
factoryPrice='$_POST[idFaPr]',purchasePrice='$_POST[idPurch]',buyWay='$_POST[idBuWay]',buyPerson='$_POST[idBuPer]',
financialPerson='$_POST[idFinPer]',financialOpinion='$_POST[idFinOpn]',financialDate='$_POST[idFinDate]',
manager='$_POST[idMan]',managerOpinion='$_POST[idMaOpn]',managerDate='$_POST[idMaDate]' WHERE carOId='$plateId'";
				mysql_query($query_unit) or die("Error in query: $query_unit. ".mysql_error());

				echo"<meta http-equiv='refresh' content='1.0;URL=carbasicontent.php?commId=$plateId'>";
				echo"<script>localStorage.clear();</script>";
				break;
			}
		}
	}
	function ownerCus($sqlname,$plateId,$actionD){
		if($actionD=="rev"){
			$infoList=array("carNamI","carSeI","carNatioI","carBirthdaI","carAddresI","carNuI",
				"carOriganizatioI","carUsefulDatI","carPhonI");

			for($i=0;$i<count($infoList);$i++){
				$temp=$infoList[$i];

				if($_POST[$temp]==null){
					$result_idcard=mysql_fetch_row(mysql_query("SELECT * FROM $sqlname WHERE carCompanyNum='$plateId'"));
					$tabList=array("$result_idcard[2]","$result_idcard[3]","$result_idcard[4]","$result_idcard[5]",
						"$result_idcard[6]","$result_idcard[7]","$result_idcard[8]","$result_idcard[9]","$result_idcard[10]");
					$_POST[$temp]=$tabList[$i];
//					echo"<meta http-equiv='refresh' content='0.1;URL=carbasicontent.php?commId=$plateId'>";
//					echo"<script>alert('信息不完整,请填写完整');</script>";
//					break;
				}else if($i==count($infoList)-1){
					$query_unit="UPDATE $sqlname SET carOwnerName='$_POST[carNamI]',carOwnerSex='$_POST[carSeI]',
carOwnerNation='$_POST[carNatioI]',carOwnerBothYear='$_POST[carBirthdaI]',carOwnerAddress='$_POST[carAddresI]',
carOwnerIdCard='$_POST[carNuI]',carOwnerOrganization='$_POST[carOriganizatioI]',UseDate='$_POST[carUsefulDatI]',
 p_phone='$_POST[carPhonI]' WHERE carCompanyNum='$plateId'";
					mysql_query($query_unit) or die("Error in query: $query_unit. ".mysql_error());

					echo"<meta http-equiv='refresh' content='1.0;URL=carbasicontent.php?commId=$plateId'>";
					echo"<script>localStorage.clear();</script>";
					break;
				}
			}
		}
	}
	function ownerUnit($sqlname,$plateId,$actionD){
		if($actionD=="add"){
			$infoList=array("czSCode","czName","czType","czAddress","czRepresent","czReCapital","czUpDate",
				"czUsefulDate","czScope","czOrganization","czReleaseDate","czPhone");

			for($i=0;$i<count($infoList);$i++){
				$temp=$infoList[$i];

				if($_POST[$temp]==null){
					echo"<meta http-equiv='refresh' content='0.1;URL=carbasicontent.php?commId=$plateId'>";
					echo"<script>alert('信息不完整,请填写完整');</script>";
					break;
				}else if($i==count($infoList)-1){
					$query_unit="insert into car_owner_unit(carCompanyNum,socialCreditCode,unit_name,unit_type,unit_address,
legalRepresentative,registeredCapital,setUpDate,businessUsefulDate,businessScope,organization,releaseDate,unit_phone)
 values ('$plateId','$_POST[czSCode]','$_POST[czName]','$_POST[czType]','$_POST[czAddress]',
 '$_POST[czRepresent]','$_POST[czReCapital]','$_POST[czUpDate]','$_POST[czUsefulDate]','$_POST[czScope]',
 '$_POST[czOrganization]','$_POST[czReleaseDate]','$_POST[czPhone]')";
					mysql_query($query_unit) or die("Error in query: $query_unit. ".mysql_error());

					echo"<meta http-equiv='refresh' content='1.0;URL=carbasicontent.php?commId=$plateId'>";
					echo"<script>localStorage.clear();</script>";
					break;
				}
			}
		}
		if($actionD=="rev"){
			$infoList=array("czSCodR","czNamR","czTypR","czAddresR","czRepresenR","czReCapitaR","czUpDatR",
				"czUsefulDatR","czScopR","czOrganizatioR","czReleaseDatR","czPhonR");

			for($i=0;$i<count($infoList);$i++){
				$temp=$infoList[$i];

				if($_POST[$temp]==null){
					$result_idcard=mysql_fetch_row(mysql_query("SELECT * FROM $sqlname WHERE carCompanyNum='$plateId'"));
					$tabList=array("$result_idcard[2]","$result_idcard[3]","$result_idcard[4]","$result_idcard[5]",
						"$result_idcard[6]","$result_idcard[7]","$result_idcard[8]","$result_idcard[9]","$result_idcard[10]",
						"$result_idcard[11]","$result_idcard[12]","$result_idcard[13]");
					$_POST[$temp]=$tabList[$i];
//					echo"<meta http-equiv='refresh' content='0.1;URL=carbasicontent.php?commId=$plateId'>";
//					echo"<script>alert('信息不完整,请填写完整');</script>";
//					break;
				}else if($i==count($infoList)-1){
					$query_unit="UPDATE $sqlname SET socialCreditCode='$_POST[czSCodR]',unit_name='$_POST[czNamR]',
unit_type='$_POST[czTypR]',unit_address='$_POST[czAddresR]',legalRepresentative= '$_POST[czRepresenR]',
registeredCapital='$_POST[czReCapitaR]',setUpDate='$_POST[czUpDatR]',businessUsefulDate='$_POST[czUsefulDatR]',
businessScope='$_POST[czScopR]',organization='$_POST[czOrganizatioR]',releaseDate='$_POST[czReleaseDatR]',
unit_phone='$_POST[czPhonR]' WHERE carCompanyNum='$plateId'";
					mysql_query($query_unit) or die("Error in query: $query_unit. ".mysql_error());

					echo"<meta http-equiv='refresh' content='1.0;URL=carbasicontent.php?commId=$plateId'>";
					echo"<script>localStorage.clear();</script>";
					break;
				}
			}
		}
	}
	function insurance($sqlname,$plateId,$actionD){
		if($actionD=="add") {
		$infoList = array("bxName", "bxCompany", "bxNumber", "bxAmount", "bxTax", "bxUsefulDate");

		for ($i = 0; $i < count($infoList); $i++) {
			$temp = $infoList[$i];

			if ($_POST[$temp] == null) {
				echo "<meta http-equiv='refresh' content='0.1;URL=carbasicontent.php?commId=$plateId'>";
				echo "<script>alert('信息不完整,请填写完整');</script>";
				break;
			} else if ($i == count($infoList) - 1) {
				$query_insur = "insert into $sqlname (carCompanyNum,insur_name,insur_company,insur_number,insur_amount,
insur_tax,usefulDate)
 values ('$plateId','$_POST[bxName]','$_POST[bxCompany]','$_POST[bxNumber]','$_POST[bxAmount]',
 '$_POST[bxTax]','$_POST[bxUsefulDate]')";
				mysql_query($query_insur) or die("Error in query: $query_insur. " . mysql_error());

				echo "<meta http-equiv='refresh' content='1.0;URL=carbasicontent.php?commId=$plateId'>";
				echo "<script>localStorage.clear();</script>";
				break;
			}
		}
	}
		if($actionD=="rev") {
			$infoList = array("bxNamI", "bxCompanI", "bxNumbeI", "bxAmounI", "bxTaI", "bxUsefulDatI");

			for ($i = 0; $i < count($infoList); $i++) {
				$temp = $infoList[$i];

				if ($_POST[$temp] == null) {
					$result_idcard=mysql_fetch_row(mysql_query("SELECT * FROM $sqlname WHERE carCompanyNum='$plateId'"));
					$tabList=array("$result_idcard[2]","$result_idcard[3]","$result_idcard[4]","$result_idcard[5]",
						"$result_idcard[6]","$result_idcard[7]");
					$_POST[$temp]=$tabList[$i];
				} else if ($i == count($infoList) - 1) {
					$query_insur = "UPDATE $sqlname SET insur_name='$_POST[bxNamI]',insur_company='$_POST[bxCompanI]',
insur_number='$_POST[bxNumbeI]',insur_amount='$_POST[bxAmounI]',insur_tax='$_POST[bxTaI]',
usefulDate='$_POST[bxUsefulDatI]' WHERE carCompanyNum='$plateId'";
					mysql_query($query_insur) or die("Error in query: $query_insur. " . mysql_error());

					echo "<meta http-equiv='refresh' content='1.0;URL=carbasicontent.php?commId=$plateId'>";
					echo "<script>localStorage.clear();</script>";
					break;
				}
			}
		}
	}
	function reGistCar($sqlname,$plateId,$actionD){
		if($actionD=="add") {
		$infoList = array("zcType", "zcPlateNumber", "zcOwner", "zcAddress", "zcOrganization", "zcReDate",
			"zcUsefulDate", "zcReUnit", "zcRePerson", "zcCostName", "zcCostAmount");

		for ($i = 0; $i < count($infoList); $i++) {
			$temp = $infoList[$i];

			if ($_POST[$temp] == null) {
				echo "<meta http-equiv='refresh' content='0.1;URL=carbasicontent.php?commId=$plateId'>";
				echo "<script>alert('信息不完整,请填写完整');</script>";
				break;
			} else if ($i == count($infoList) - 1) {
				$query_reg = "insert into $sqlname (carCompanyNum,reg_type,plateNumber,reg_owner,reg_address,
organization,registDate,usefulDate,registUnit,registPerson,costName,costAmount)
 values ('$plateId','$_POST[zcType]','$_POST[zcPlateNumber]','$_POST[zcOwner]','$_POST[zcAddress]',
 '$_POST[zcOrganization]','$_POST[zcReDate]','$_POST[zcUsefulDate]','$_POST[zcReUnit]','$_POST[zcRePerson]',
 '$_POST[zcCostName]','$_POST[zcCostAmount]')";
				mysql_query($query_reg) or die("Error in query: $query_reg. " . mysql_error());

				echo "<meta http-equiv='refresh' content='1.0;URL=carbasicontent.php?commId=$plateId'>";
				echo "<script>localStorage.clear();</script>";
				break;
			}
		}
	}
		if($actionD=="rev") {
			$infoList = array("zcTypR", "zcPlateNumbeR", "zcOwneR", "zcAddresR", "zcOrganizatioR", "zcReDatR",
				"zcUsefulDatR", "zcReUniR", "zcRePersoR", "zcCostNamR", "zcCostAmounR");

			for ($i = 0; $i < count($infoList); $i++) {
				$temp = $infoList[$i];

				if ($_POST[$temp] == null) {
					$result_idcard=mysql_fetch_row(mysql_query("SELECT * FROM $sqlname WHERE carCompanyNum='$plateId'"));
					$tabList=array("$result_idcard[2]","$result_idcard[3]","$result_idcard[4]","$result_idcard[5]",
						"$result_idcard[6]","$result_idcard[7]","$result_idcard[8]","$result_idcard[9]","$result_idcard[10]",
						"$result_idcard[11]","$result_idcard[12]");
					$_POST[$temp]=$tabList[$i];
				} else if ($i == count($infoList) - 1) {
					$query_reg = "UPDATE $sqlname SET reg_type='$_POST[zcTypR]',plateNumber='$_POST[zcPlateNumbeR]',
 reg_owner='$_POST[zcOwneR]',reg_address='$_POST[zcAddresR]',organization='$_POST[zcOrganizatioR]',
 registDate='$_POST[zcReDatR]',usefulDate='$_POST[zcUsefulDatR]',registUnit='$_POST[zcReUniR]',
 registPerson='$_POST[zcRePersoR]',costName='$_POST[zcCostNamR]',costAmount='$_POST[zcCostAmounR]' WHERE carCompanyNum='$plateId'";
					mysql_query($query_reg) or die("Error in query: $query_reg. " . mysql_error());

					echo "<meta http-equiv='refresh' content='1.0;URL=carbasicontent.php?commId=$plateId'>";
					echo "<script>localStorage.clear();</script>";
					break;
				}
			}
		}
	}
	function loan_car($sqlname,$plateId,$actionD){
		if($actionD=="add") {
			$infoList = array("dkLoanDate", "dkOverdue", "dkPayAmount", "dkIsPay", "dkPayDay", "dkPayWay", "dkPayPerson");

			for ($i = 0; $i < count($infoList); $i++) {
				$temp = $infoList[$i];

				if ($_POST[$temp] == null) {
					echo "<meta http-equiv='refresh' content='0.1;URL=carbasicontent.php?commId=$plateId'>";
					echo "<script>alert('信息不完整,请填写完整');</script>";
					break;
				} else if ($i == count($infoList) - 1) {
					$query_reg = "insert into $sqlname (carCompanyNum,loanPayDate,isOverdue,distancePay,payAmount,isPay,
	payDate,payWay,payPerson)
	 values ('$plateId','$_POST[dkLoanDate]','超期','$_POST[dkOverdue]','$_POST[dkPayAmount]','$_POST[dkIsPay]',
	 '$_POST[dkPayDay]','$_POST[dkPayWay]','$_POST[dkPayPerson]')";
					mysql_query($query_reg) or die("Error in query: $query_reg. " . mysql_error());

					echo "<meta http-equiv='refresh' content='1.0;URL=carbasicontent.php?commId=$plateId'>";
					echo "<script>localStorage.clear();</script>";
					break;
				}
			}
		}
	}
	function add_equip($sqlname,$plateId,$actionD){
		if($actionD=="add") {
			$infoList = array("equipType", "equipClass", "equipBrand", "equipNum", "equipSource", "equipAddress",
				"equipIsDemoli", "equipApplicant", "equipAppDate", "equipDepart", "equipOpinion", "equipDate",
				"equipPerson");

			for ($i = 0; $i < count($infoList); $i++) {
				$temp = $infoList[$i];

				if ($_POST[$temp] == null) {
					echo "<meta http-equiv='refresh' content='0.1;URL=carbasicontent.php?commId=$plateId'>";
					echo "<script>alert('信息不完整,请填写完整');</script>";
					break;
				} else if ($i == count($infoList) - 1) {
					$query_reg = "insert into $sqlname (carCompanyNum,equipType,equipClass,equipBrand,equipNumber,
	equipSource,addAddress,isDemolition,equipApplicant,applicationDate,department,auditOpinion,auditDate,auditPerson)
	 values ('$plateId','$_POST[equipType]','$_POST[equipClass]','$_POST[equipBrand]','$_POST[equipNum]',
	 '$_POST[equipSource]','$_POST[equipAddress]','$_POST[equipIsDemoli]','$_POST[equipApplicant]','$_POST[equipAppDate]',
	 '$_POST[equipDepart]','$_POST[equipOpinion]','$_POST[equipDate]','$_POST[equipPerson]')";
					mysql_query($query_reg) or die("Error in query: $query_reg. " . mysql_error());

					echo "<meta http-equiv='refresh' content='1.0;URL=carbasicontent.php?commId=$plateId'>";
					echo "<script>localStorage.clear();</script>";
					break;
				}
			}
		}
		if($actionD=="rev") {
			$infoList = array("equipTypA", "equipClasA", "equipBranA", "equipNuA", "equipSourcA", "equipAddresA",
				"equipIsDemolA", "equipApplicanA", "equipAppDatA", "equipDeparA", "equipOpinioA", "equipDatA",
				"equipPersoA");

			for ($i = 0; $i < count($infoList); $i++) {
				$temp = $infoList[$i];

				if ($_POST[$temp] == null) {
					$result_idcard=mysql_fetch_row(mysql_query("SELECT * FROM $sqlname WHERE carCompanyNum='$plateId'"));
					$tabList=array("$result_idcard[2]","$result_idcard[3]","$result_idcard[4]","$result_idcard[5]",
						"$result_idcard[6]","$result_idcard[7]","$result_idcard[8]","$result_idcard[9]","$result_idcard[10]",
						"$result_idcard[11]","$result_idcard[12]","$result_idcard[13]","$result_idcard[14]");
					$_POST[$temp]=$tabList[$i];
				} else if ($i == count($infoList) - 1) {
					$query_reg = "UPDATE $sqlname SET equipType='$_POST[equipTypA]',equipClass='$_POST[equipClasA]',
equipBrand='$_POST[equipBranA]',equipNumber='$_POST[equipNuA]',equipSource='$_POST[equipSourcA]',
addAddress='$_POST[equipAddresA]',isDemolition='$_POST[equipIsDemolA]',equipApplicant='$_POST[equipApplicanA]',
applicationDate='$_POST[equipAppDatA]',department='$_POST[equipDeparA]',auditOpinion='$_POST[equipOpinioA]',
auditDate='$_POST[equipDatA]',auditPerson='$_POST[equipPersoA]'";
					mysql_query($query_reg) or die("Error in query: $query_reg. " . mysql_error());

					echo "<meta http-equiv='refresh' content='1.0;URL=carbasicontent.php?commId=$plateId'>";
					echo "<script>localStorage.clear();</script>";
					break;
				}
			}
		}
	}
	function viola($sqlname,$plateId,$actionD){
		if($actionD=="add") {
			$infoList = array("violaTime", "violaInfo", "violaPlace", "violaFines", "violaDeduct", "violaDriver",
				"violaState", "violaOrgan", "violaPerson", "violaProChar", "violaTotalChar", "violaCost");

			for ($i = 0; $i < count($infoList); $i++) {
				$temp = $infoList[$i];

				if ($_POST[$temp] == null) {
					echo "<meta http-equiv='refresh' content='0.1;URL=carbasicontent.php?commId=$plateId'>";
					echo "<script>alert('信息不完整,请填写完整');</script>";
					break;
				} else if ($i == count($infoList) - 1) {
					$query_viola = "insert into $sqlname (carCompanyNum,viola_date,viola_content,viola_address,viola_fines,
	deductFraction,viola_driver,viola_state,processOrganization,processPerson,processCharge,totalCharge,costUndertake)
	 values ('$plateId','$_POST[violaTime]','$_POST[violaInfo]','$_POST[violaPlace]','$_POST[violaFines]',
	 '$_POST[violaDeduct]','$_POST[violaDriver]','$_POST[violaState]','$_POST[violaOrgan]','$_POST[violaPerson]',
	 '$_POST[violaProChar]','$_POST[violaTotalChar]','$_POST[violaCost]')";
					mysql_query($query_viola) or die("Error in query: $query_viola. " . mysql_error());

					echo "<meta http-equiv='refresh' content='1.0;URL=carbasicontent.php?commId=$plateId'>";
					echo "<script>localStorage.clear();</script>";
					break;
				}
			}
		}
		if($actionD=="rev") {
			$infoList = array("violaTimI", "violaInfI", "violaPlacI", "violaFineI", "violaDeducI", "violaDriveI",
				"violaStatI", "violaOrgaI", "violaPersoI", "violaProChaI", "violaTotalChaI", "violaCosI");

			for ($i = 0; $i < count($infoList); $i++) {
				$temp = $infoList[$i];

				if ($_POST[$temp] == null) {
					$result_idcard=mysql_fetch_row(mysql_query("SELECT * FROM $sqlname WHERE carCompanyNum='$plateId'"));
					$tabList=array("$result_idcard[2]","$result_idcard[3]","$result_idcard[4]","$result_idcard[5]",
						"$result_idcard[6]","$result_idcard[7]","$result_idcard[8]","$result_idcard[9]","$result_idcard[10]",
						"$result_idcard[11]","$result_idcard[12]","$result_idcard[13]");
					$_POST[$temp]=$tabList[$i];
				} else if ($i == count($infoList) - 1) {
					$query_viola = "UPDATE $sqlname SET viola_date='$_POST[violaTimI]',viola_content='$_POST[violaInfI]',
 viola_address='$_POST[violaPlacI]',viola_fines='$_POST[violaFineI]',deductFraction='$_POST[violaDeducI]',
 viola_driver='$_POST[violaDriveI]',viola_state='$_POST[violaStatI]',processOrganization='$_POST[violaOrgaI]',
  processPerson='$_POST[violaPersoI]',processCharge='$_POST[violaProChaI]',totalCharge='$_POST[violaTotalChaI]',
   costUndertake='$_POST[violaCosI]' WHERE carCompanyNum='$plateId'";
					mysql_query($query_viola) or die("Error in query: $query_viola. " . mysql_error());

					echo "<meta http-equiv='refresh' content='1.0;URL=carbasicontent.php?commId=$plateId'>";
					echo "<script>localStorage.clear();</script>";
					break;
				}
			}
		}
	}
	function tolls($sqlname,$plateId,$actionD){
		$type=$_GET["type"];
		if($type=="燃油费"){
			$infoList=array("happenDate","tolls_amount","oilNum","carCourse","withcar","submitPerson",
				"submitDate","auditPerson","auditOpinion","tolls_payWay");

			for($i=0;$i<count($infoList);$i++){
				$temp=$infoList[$i];

				if($_POST[$temp]==null){
					echo"<meta http-equiv='refresh' content='0.1;URL=carbasicontent.php?commId=$plateId'>";
					echo"<script>alert('信息不完整,请填写完整');</script>";
					break;
				}else if($i==count($infoList)-1){
					$query_tolls="insert into $sqlname (carCompanyNum,tolls_type,happenDate,tolls_amount,oilNum,carCourse,withcar,
submitPerson,submitDate,auditPerson,auditOpinion,tolls_payWay)
 values ('$plateId','$type','$_POST[happenDate]','$_POST[tolls_amount]','$_POST[oilNum]','$_POST[carCourse]','$_POST[withcar]',
 '$_POST[submitPerson]','$_POST[submitDate]','$_POST[auditPerson]','$_POST[auditOpinion]','$_POST[tolls_payWay]')";
					mysql_query($query_tolls) or die("Error in query: $query_tolls. ".mysql_error());

					echo"<meta http-equiv='refresh' content='1.0;URL=carbasicontent.php?commId=$plateId'>";
					echo"<script>localStorage.clear();</script>";
					break;
				}
			}
		}
		if($type=="过路费"){
			$infoList=array("guo_amount","guo_happenDate","guo_happenAddress","guo_contract","guo_subPerson",
				"guo_subDate","guo_audPerson","guo_audOpinion","guo_payWay");

			for($i=0;$i<count($infoList);$i++){
				$temp=$infoList[$i];

				if($_POST[$temp]==null){
					echo"<meta http-equiv='refresh' content='0.1;URL=carbasicontent.php?commId=$plateId'>";
					echo"<script>alert('信息不完整,请填写完整');</script>";
					break;
				}else if($i==count($infoList)-1){
					$query_tolls="insert into $sqlname (carCompanyNum,tolls_type,happenDate,happenAddress,tolls_amount,
tolls_contract,submitPerson,submitDate,auditPerson,auditOpinion,tolls_payWay)
 values ('$plateId','$type','$_POST[guo_happenDate]','$_POST[guo_happenAddress]','$_POST[guo_amount]',
 '$_POST[guo_contract]','$_POST[guo_subPerson]','$_POST[guo_subDate]','$_POST[guo_audPerson]','$_POST[guo_audOpinion]',
'$_POST[guo_payWay]')";
					mysql_query($query_tolls) or die("Error in query: $query_tolls. ".mysql_error());

					echo"<meta http-equiv='refresh' content='1.0;URL=carbasicontent.php?commId=$plateId'>";
					echo"<script>localStorage.clear();</script>";
					break;
				}
			}
		}
		if($type=="停车费"){
			$infoList=array("ti_amount","ti_happenDate","ti_happenAddress","ti_contract","ti_subPerson",
				"ti_subDate","ti_audPerson","ti_audOpinion","ti_payWay");

			for($i=0;$i<count($infoList);$i++){
				$temp=$infoList[$i];

				if($_POST[$temp]==null){
					echo"<meta http-equiv='refresh' content='0.1;URL=carbasicontent.php?commId=$plateId'>";
					echo"<script>alert('信息不完整,请填写完整');</script>";
					break;
				}else if($i==count($infoList)-1){
					$query_tolls="insert into $sqlname (carCompanyNum,tolls_type,happenDate,happenAddress,tolls_amount,
tolls_contract,submitPerson,submitDate,auditPerson,auditOpinion,tolls_payWay)
 values ('$plateId','$type','$_POST[ti_happenDate]','$_POST[ti_happenAddress]','$_POST[ti_amount]',
 '$_POST[ti_contract]','$_POST[ti_subPerson]','$_POST[ti_subDate]','$_POST[ti_audPerson]','$_POST[ti_audOpinion]',
'$_POST[ti_payWay]')";
					mysql_query($query_tolls) or die("Error in query: $query_tolls. ".mysql_error());

					echo"<meta http-equiv='refresh' content='1.0;URL=carbasicontent.php?commId=$plateId'>";
					echo"<script>localStorage.clear();</script>";
					break;
				}
			}
		}

	}
	function teNance($sqlname,$plateId,$actionD){
		$infoList=array("tenDate","tenMileage","tenAmount","tenAddress","tenProvider","tenPerson",
			"tenListing","tenPayWay");

		for($i=0;$i<count($infoList);$i++){
			$temp=$infoList[$i];

			if($_POST[$temp]==null){
				echo"<meta http-equiv='refresh' content='0.1;URL=carbasicontent.php?commId=$plateId'>";
				echo"<script>alert('信息不完整,请填写完整');</script>";
				break;
			}else if($i==count($infoList)-1){
				$query_viola="insert into $sqlname (carCompanyNum,tenDate,tenMileage,tenAmount,tenAddress,tenProvider,
tenPerson,tenListing,tenPayWay)
 values ('$plateId','$_POST[tenDate]','$_POST[tenMileage]','$_POST[tenAmount]','$_POST[tenAddress]','$_POST[tenProvider]',
 '$_POST[tenPerson]','$_POST[tenListing]','$_POST[tenPayWay]')";
				mysql_query($query_viola) or die("Error in query: $query_viola. ".mysql_error());

				echo"<meta http-equiv='refresh' content='1.0;URL=carbasicontent.php?commId=$plateId'>";
				echo"<script>localStorage.clear();</script>";
				break;
			}
		}
	}
	function beAuty($sqlname,$plateId,$actionD){
		$infoList=array("beaDate","beaType","beaAmount","beaProvider","beaDriver");

		for($i=0;$i<count($infoList);$i++){
			$temp=$infoList[$i];

			if($_POST[$temp]==null){
				echo"<meta http-equiv='refresh' content='0.1;URL=carbasicontent.php?commId=$plateId'>";
				echo"<script>alert('信息不完整,请填写完整');</script>";
				break;
			}else if($i==count($infoList)-1){
				$query_bea="insert into $sqlname (carCompanyNum,beaDate,beaType,beaAmount,beaProvider,beaDriver)
 values ('$plateId','$_POST[beaDate]','$_POST[beaType]','$_POST[beaAmount]','$_POST[beaProvider]','$_POST[beaDriver]')";
				mysql_query($query_bea) or die("Error in query: $query_bea. ".mysql_error());

				echo"<meta http-equiv='refresh' content='1.0;URL=carbasicontent.php?commId=$plateId'>";
				echo"<script>localStorage.clear();</script>";
				break;
			}
		}
	}
	function anInspect($sqlname,$plateId,$actionD){
		$infoList=array("annualDate","annualCycle","annualAmount","passageAmount","nextDate","annualPerson");

		for($i=0;$i<count($infoList);$i++){
			$temp=$infoList[$i];

			if($_POST[$temp]==null){
				echo"<meta http-equiv='refresh' content='0.1;URL=carbasicontent.php?commId=$plateId'>";
				echo"<script>alert('信息不完整,请填写完整');</script>";
				break;
			}else if($i==count($infoList)-1){
				$query_annu="insert into $sqlname (carCompanyNum,annualDate,annualCycle,annualAmount,passageAmount,
nextDate,annualPerson)
 values ('$plateId','$_POST[annualDate]','$_POST[annualCycle]','$_POST[annualAmount]','$_POST[passageAmount]',
 '$_POST[nextDate]','$_POST[annualPerson]')";
				mysql_query($query_annu) or die("Error in query: $query_annu. ".mysql_error());

				echo"<meta http-equiv='refresh' content='1.0;URL=carbasicontent.php?commId=$plateId'>";
				echo"<script>localStorage.clear();</script>";
				break;
			}
		}
	}



	?>

	<title>世纪风</title>
</head>
<body>
</body>
</html>