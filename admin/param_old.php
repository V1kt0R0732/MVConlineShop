<?php
/*

$host="127.0.0.1";
$login="root";
$pass="";
$db="kran";



$baseURL="http://localhost/kran/";
$localPath="c:/wamp/www/kran";
/**/

$dbc=mysqli_connect("$host","$login","$pass","$db") or die("Ќе удалось соеденитс€ с сервером");


$photo_folder="../photos";
$big_height=300; // ¬ысота большого рисунка, делаем такое ограничение чтобы все большие фотки были одинаковы по высоте
//$photo_folder="photos";
$tn_height=160;
//$tn_width=150;
function my_date($dates)
{
	$year=substr($dates, 0, 4);
	$mes=substr($dates,5,2);
  	$day=substr($dates, 8, 2);
return ($day."-".$mes."-".$year);

}


$editor_cnf_UserFilesPath=$baseURL."userfiles/";
$editor_cnf_UserFilesAbsolutePath=$localPath."/userfiles/";

function table_row_format(&$row_counter)
{
	if($row_counter & 1)
		{
			$row_color="row2";
		}
	else
		{
			$row_color="row1";
		}	
	$row_counter++;
	return $row_color;
		
}
/*
делаем элементарный счетчик который считает строки которые ввыгружаютс€ с базы.
кода формируем шаблон передаем в масив и выбранный стиль
{literal}
<style type="text/css" >
	tr.row1 {background-color:#3DABEA;}
	tr.row2 {background-color:#FFFFFF;}
	tr.row3 {background-color:#16416B;}
</style>{/literal}
*/

?>