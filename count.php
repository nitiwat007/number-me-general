<?
//$PDFPath = $_FILES["fileUpload"]["name"];
include("A_connect.inc");

$sql				= "select * from numcontrol";
mysql_select_db('numberme',$connect);
$query2				= mysql_query($sql, $connect);

$num_rows 			= mysql_num_rows($query2);
$num_fields			= mysql_num_fields($query2);

$i=0;
$total=0;

while($i<$num_rows)	{
$result				=mysql_fetch_array($query2);
$File_NumControl	=$result['File_NumControl'];

if ($File_NumControl != "-"){

$PDFPath = "upload/".$File_NumControl;
$stream = fopen($PDFPath, "r");
$PDFContent = fread ($stream, filesize($PDFPath));
if(!$stream || !$PDFContent)
echo "Not Read";

$firstValue = 0;
$secondValue = 0;
if(preg_match("/\/N\s+([0-9]+)/", $PDFContent, $matches)) {
$firstValue = $matches[1];
}

if(preg_match_all("/\/Count\s+([0-9]+)/s", $PDFContent, $matches))
{
$secondValue = max($matches[1]);
}
$page = ($secondValue != 0) ? $secondValue : max($firstValue, $secondValue);
echo $page;
echo "<br>";
$total =$total+$page;
}
$i++;
}
echo $total;
?>