<?php
session_start();
include ".//SQLlib.php"; 
//FORMS LIBRARY!!!

function replace_extension($filename, $new_extension) {
    $info = pathinfo($filename);
    return $info['filename'] . '.' . $new_extension;
}
function makeFile($label,$name){
echo $label."<input type=\"file\" name=\"$name\"> \n";
}
function isPost(){
return $_SERVER['REQUEST_METHOD']=='POST'?true:false;
}
function printDocType(){//this prints the doctype!
echo "<!DOCTYPE html>";
}
function startDoc(){//This starts the document!
echo "<html> \n";
}
function startHead(){//This starts the head!
echo "<head> \n";
echo "<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>";
echo "<link href='http://fonts.googleapis.com/css?family=Josefin+Slab:400,700,400italic,700italic' rel='stylesheet' type='text/css'>";
echo "<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>";
}
function makeTitle($title){//This makes a title!  The title variable makes a title!
echo "<title>$title</title> \n";
}
function addCSSLink($link){//This adds a CSS link to a different page! The link parameter is the link!
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"$link\"> \n";
}
function endHead(){//This ends the head!
echo "</head> \n";
}
function startBody(){//This starts the body!
echo "<body> \n";
}
function startForm($method,$action,$newtab = null){//This starts a form! The $method is the method type, and $action is where it direts the form to.
if(strtolower($method)=='post')
	if ($newtab != null){
			echo "<form method=\"$method\" action=\"$action\" enctype=\"multipart/form-data\" target = \"_blank\"><div> \n";
	}
	else 
		echo "<form method=\"$method\" action=\"$action\" enctype=\"multipart/form-data\"><div> \n";
else
echo "<form method=\"$method\" action=\"$action\"><div> \n";
}
function textInput($label,$name,$size,$max,$value=null,$err=null,$rightAfter=null, $placehold = null){//This makes a text input!  the label is the label, the name is the name, the size is the size, and the max is the max number of characters and the $value is what you want in it.
echo "$label ";
echo "<input type=\"text\" name=\"$name\" size=\"$size\" maxlength=\"$max\" value=\"$value\" placeholder = \"$placehold\"> \n";
if($err!=null) 
echo "<span class=\"err\">$err</span>";
if($rightAfter!=null)
echo $rightAfter;
echo "</br>";
}

function textInputnew($name,$class, $placehold = null ,$err=null,$rightAfter=null, $label = null){//This makes a text input!  the label is the label, the name is the name, the size is the size, and the max is the max number of characters and the $value is what you want in it.
if($err!=null) 
echo "<span class=\"err\">$err</span>";
echo "$label ";
echo "<input type=\"text\" name=\"$name\" placeholder = \"$placehold\" class = \"$class\"> \n";
if($rightAfter!=null)
echo $rightAfter;
}
function textInputnew2($name,$class,$value, $placehold = null ,$err=null,$rightAfter=null, $label = null){//This makes a text input!  the label is the label, the name is the name, the size is the size, and the max is the max number of characters and the $value is what you want in it.
if($err!=null) 
echo "<span class=\"err\">$err</span>";
echo "$label ";
echo "<input type=\"text\" name=\"$name\" value = \"$value\" placeholder = \"$placehold\" class = \"$class\"> \n";
if($rightAfter!=null)
echo $rightAfter;
}
function passInput($label,$name,$size,$max,$value=null,$err=null){//This makes a password input! the label is the label, the name is the name, the size is the size, and the max is the max number of characters and the $value is what you want in it.
echo "$label ";
echo "<input type=\"password\" name=\"$name\" size=\"$size\" maxlength=\"$max\" value=\"$value\"> \n";
if($err!=null) {
echo "<span class=\"err\">$err</span>";
}
echo "</br>";
}

function passInputnew($name,$class, $placehold = null,$err=null, $label = null){//This makes a password input! the label is the label, the name is the name, the size is the size, and the max is the max number of characters and the $value is what you want in it.
echo "$label ";
echo "<input type=\"password\" name=\"$name\" class = \"$class\" placeholder = \"$placehold\"> \n";
if($err!=null) {
echo "<span class=\"err\">$err</span>";
}
}
function textArea($label,$name,$rows,$cols,$value=null,$id=null,$onfocus=null,$onblur=null){//This makes a text area! the label is the label, the name is the name, the size is the size, and the max is the max number of characters and the $value is what you want in it.
echo "$label<br><textarea id=\"$id\" name=\"$name\" rows=\"$rows\" cols=\"$cols\" onFocus=$onfocus onBlur=$onblur>";
echo $value;
echo "</textarea>";
}

function radioGroup($label,$name,$valueArr,$preSelect=null,$err=''){//This makes a group of radio buttons!  The label is the label, the name is the name, the valuearr is the array of values, and the preselect is where you send it which one you want selected.
prnt($label."<span class=\"err\">$err</span>");
foreach($valueArr as $value){
if($value==$preSelect)
echo "<input type=\"radio\" name=\"$name\" value=\"$value\" checked=\"checked\">$value<br> \n";
else
echo "<input type=\"radio\" name=\"$name\" value=\"$value\">$value<br> \n";
}
}
function checkBox($label,$name,$value,$preCheck){//This makes a checkbox!  The label makes the label, the name is the name, the value is the value, and the precheck is where you send the one you want.
if(strtolower($preCheck)==strtolower($value))
prnt("<input type=\"checkbox\" name=\"$name\" value=\"$value\" checked=\"checked\">$label");
else
prnt("<input type=\"checkbox\" name=\"$name\" value=\"$value\">$label");
}
function checkGroup($title,$labelArr,$name,$valueArr,$preCheckArr=array('lol', 'lol'),$err=''){
//var_dump($title);
//var_dump($err);
prnt($title.$err);
for($i=0;$i<=count($labelArr)-1;$i++){
	//var_dump($valueArr[$i]);br();
	//var_dump($preCheckArr);br();
	//var_dump(array_search($valueArr[$i],$preCheckArr));br();br();
	if(array_search($valueArr[$i],$preCheckArr)!==false)//if the current check box value is found in the preCheck array, check it
	prnt("<input type=\"checkbox\" name=\"$name$i\" value=\"$valueArr[$i]\" checked=\"checked\">$labelArr[$i]");
	else
	prnt("<input type=\"checkbox\" name=\"$name$i\" value=\"$valueArr[$i]\">$labelArr[$i]");
}

}
function dropDown($label,$name,$valueArr,$preSelect){//This makes a dropdown list!  The label is what you will be seeing when you select one, the name is the name of the dropdown, the valuearr is the array of values for each one, the preselect is the one you want jpreselected.
echo "$label<select name=\"$name\"> \n";
foreach($valueArr as $value){
if($preSelect==$value)
echo "<option value=\"$value\" selected>$value</option> \n";
else
echo "<option value=\"$value\">$value</option> \n";
}
echo "</select> \n";
}
function makeSubmit($label,$name="submit"){//This makes a submit button  $value is the value you want the button to say.
echo "<input type=\"submit\" name=\"$name\" value=\"$label\"> \n";
}
function makeReset(){//This makes a reset button!
echo "<input type=\"reset\" name=\"reset\" value=\"Reset\"> \n";
}
function endForm(){//This ends the form!
echo "</div></form> \n";
}
function endBody(){//This ends the body!
echo "</body> \n";
}
function endDoc(){//This ends the document!
echo "</html>";
}
function makeCheckBoxGroup ($label, $name, $valueArr, $preCheckArr){ //the label is the label, the name is the name, the valuearr is the value array with all the values in it, and the precheckarr is the array with all the prechecked ones you want.
prnt($label);
foreach($valueArr as $value){
if(in_array($value,$preCheckArr))
echo "<input type=\"checkbox\" name=\"$name"."[]"."\" value=\"$value\" checked=\"checked\">$value <br>\n";
else
echo "<input type=\"checkbox\" name=\"$name"."[]"."\" value=\"$value\">$value <br>\n";
}
}
function linkButton($dir,$label='Return'){
echo "<input type=\"button\" onclick=\"window.location='$dir'\" value=\"$label\"></input>";
}
function dateList($str, $id){
if ($str == "")
	echo "No available dates at this time. Please send an email to contact";
else{
$dates=explode(",",$str);
foreach($dates as $date){
	linkButton("?id=$id&&d=$date", "$date");
//	echo "<a href=\"changeDate.php?d=$date\">".$date."</a>";
	br();
	
}
}
}

function dispArray($arr){
 foreach($arr as $a){
 echo $a;br();
 }
}

function testText($text,$req,$min=null,$max=null,$type='default'){
	
if($req==true){
	if($text==null ){
		return 'Value is required.';
	}
	if($min!=null){
		//echo "3333";
		if(strlen($text)<$min)
			return 'Value too short.';
		}
		

	if($max!=null){
		//echo "4444";
		if(strlen($text)>$max)
			return 'Value is too long.';
		}
		
	if($type=='email'){
		//echo "5555";
		if(strpos($text,'@')==false || strpos($text,'.')==false){//tests if it contains a '@' or '.'
			return "Please enter a valid email.";
		}
		else
			return null;		
	}
	
	if($type=='emailS'){
		//echo "7777";
		if(strpos($text,'@bvsd.org')==false){//tests if it contains a '@bvsd.org' 
			return "Please enter a valid  BVSD email.";
		}
		else
			return null;
	}
	if($type=='name'){
		//echo "9999";
		if (strcspn($text, '0123456789') != strlen($text)){
			return "Names cannot contain numbers.";//it does have numbers
			}
		else
			return null;
	}

	if($type=='username'){
		//echo "232323";
		if (strcspn($text, '!@#$%^&*?.,+-/') != strlen($text)){
			return "Names cannot contain special characters (!@#$%^&*?.,+-/)";//it does have special characters
		}
		else
			return null;
		
	}
	
	else{
		//echo "green";
		return null;
	}
	
}
else {
	//echo "moo";
	return null;	
}

}




function testNum($text,$req,$min=null,$max=null,$type='default'){
if ($type == 'phone'){
	$text = preg_replace('/[^0-9]/','',$text);
}
if(!is_numeric($text)){
	if($type==='temp')
		return 'Please enter an actual temperature.';
	return 'Value must be numeric.';
if($req===true){
	if($text===null){
		if($type==='temp')
			return 'A temperature is required.';
		return 'Value is required.';
}
}
}

if($min!==null){
	if($text<$min){
		if($type==='temp')
			return 'Temperature is below absolute zero.';
		return 'Value too low.';
}}

if($max!==null){
if($text>$max){
if($type==='temp')
return 'Temperature is too high.';
return 'Value is too high.';
}
}



return null;

}
function testPass($pass){

if(strlen($pass)<8)
return 'Too short';

if(strcspn($pass,0123456789)==strlen($pass))
return 'You need at least one number.';
if(strcspn($pass,'qwertyuioplkjhgfdsazxcvbnm')==strlen($pass))
return 'At least one lowercase letter is needed.';
if(strcspn($pass,'QWERTYUIOPLKJHGFDSAZXCVBNM')==strlen($pass))
return 'At least one capital letter is needed.';
if(strcspn($pass,'!@#$%^&*()_+=-}{][;\":/.,?><`~\|')==strlen($pass))
return 'At least one special character is needed.';
return null;

}

function testLoginNew(){
	if (getSession('uname') != null && getSession('rand') != null)
		return;
	else {
		header("Location: JobshadowLogin.php");
	}
}
function testLoginA() {
$g = getValue('rememberMe');
$un = getValue('unCookie');
$pw = getValue('pwCookie');
$uID = getSession('userId');
$username = getByUserID($uID);
$p = getParentStatus($uID);
$y = testUserP($username , $pw, $p );
$uID2 = getByUsername($un);
$p2 = getParentStatus($uID2);
$z = testUserNP($un , $pw );

if ($z == 999) {
//not here
setSession('loggedIn' , true);
}
else {
}
$ret=getSession('loggedIn',false);
setSession('returnURL' , $_SERVER['PHP_SELF']);
if ($ret == true) {
	if ($p == 1)
		header("Location: parent.php");
return $ret;
}
else {
header("Location: JobshadowLogin.php");
}
}

function testLoginNP(){
$g = getValue('rememberMe');
$un = getValue('unCookie');
$pw = getValue('pwCookie');
$uID = getSession('userId');
$username = getByUserID($uID);
$p = getParentStatus($uID);
$y = testUserP($username , $pw, $p );
$uID2 = getByUsername($un);
$p2 = getParentStatus($uID2);
$z = testUserNP($un , $pw );

if ($z == 1999) {
//not here
setSession('loggedIn' , true);
}
else {
}
$ret=getSession('loggedIn',false);
setSession('returnURL' , $_SERVER['PHP_SELF']);
if ($ret == true) {
	if ($p == 1)
		header("Location: parent.php");
return $ret;
}
else {
header("Location: JobshadowLogin.php");
}
}
function testLogin() {
$g = getValue('rememberMe');
$un = getValue('unCookie');
$pw = getValue('pwCookie');
$uID = getSession('userId');
$username = getByUserID($uID);
$p = getParentStatus($uID);
$y = testUserP($username , $pw, $p );
$uID2 = getByUsername($un);
$p2 = getParentStatus($uID2);
$z = testUser($un , $pw );

if ($g and $z and $p2 == 0) {
//not here
setSession('loggedIn' , true);
}
else {
}
$ret=getSession('loggedIn',false);
setSession('returnURL' , $_SERVER['PHP_SELF']);
if ($ret == true) {
	if ($p == 1)
		header("Location: parent.php");
return $ret;
}
else {
header("Location: JobshadowLogin.php");
}
}

function testLoginP() {
$g = getValue('rememberMe');
$un = getValue('unCookie');
$pw = getValue('pwCookie');
$uID = getSession('userId');
$username = getByUserID($uID);
$p = getParentStatus($uID);
$y = testUserP($username , $pw, $p );
$uID2 = getByUsername($un);
$p2 = getParentStatus($uID2);
$z = testUserP ($un, $pw, $p2);
if ($g and $p2 == 1) {
setSession('loggedIn' , true);
}
else {
}
$ret=getSession('loggedIn',false);
setSession('returnURL' , $_SERVER['PHP_SELF']);
if ($ret == true && $p == 1) {
return $ret;
}
else {
header("Location: JobshadowLogin.php");
}
}
//thx stakaovaflowa ^upvote^
function currentUrl() {
    $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') === FALSE ? 'http' : 'https';
    $host     = $_SERVER['HTTP_HOST'];
    $script   = $_SERVER['SCRIPT_NAME'];
    $params   = $_SERVER['QUERY_STRING'];

    return $protocol . '://' . $host . $script . '?' . $params;
}

function delSession($key){
unset($_SESSION[$key]);
}
function restartSession(){
$_SESSION=array();
}
function getSession($key,$def=null){
$val=isset($_SESSION[$key])?$_SESSION[$key]:$def;
return $val;
}
function setSession($key,$value){
$_SESSION[$key]=$value;
}

function add_get_parameter($arg, $value)
{
    $_GET[$arg] = $value;

    return "?" . http_build_query($_GET);
}














function absVal($x){
if(!is_numeric($x))
return false;

if($x<0)
$x=-$x;
return ($x);
}
function prnt($line){
echo "$line<br>\n";
}
function prnthr(){
prnt("<hr>");
}
function compare($x,$y){
if(!is_numeric($x))
return false;
if(!is_numeric($y))
return false;

if($x<$y)
return '<';
if($x>$y)
return '>';
if($x==$y)
return '=';
}
function sum($x,$y){
if(!is_numeric($x))
return false;
if(!is_numeric($y))
return false;

$sum=$x+$y;
return $sum;
}
function diff($x,$y){
if(!is_numeric($x))
return false;
if(!is_numeric($y))
return false;

$diff=$x-$y;
return $diff;
}
function product($x,$y){
if(!is_numeric($x))
return false;
if(!is_numeric($y))
return false;

$prod=$x*$y;
return $prod;
}
function average($x,$y){
if(!is_numeric($x))
return false;
if(!is_numeric($y))
return false;

$ave=($x+$y)/2;
return $ave;
}
function inOrder($x,$y,$z){
if(!is_numeric($x))
return false;
if(!is_numeric($y))
return false;
if(!is_numeric($z))
return false;

if($x<=$y && $y<=$z)
return true;
else
return false;
}
function getValue($key,$default=NULL){
$x=isset($_REQUEST[$key])?$_REQUEST[$key]:$default;
return $x;
}
function stringTimes($str,$count){
$finalstring="";
for($i=0;$i<=$count-1;$i++)
$finalstring="$finalstring$str";
return $finalstring;

}
function printFileList($path){
$handle = opendir ($path);
$filename = readdir ($handle);

echo ('<ol>');
while ($filename != false) {
if(!($filename=="." || $filename=="..")){
if(is_dir("$path/$filename")==true){
prnt("<a href=\"Assignment%202.1.php?path=$path/$filename\"><li style=\"color:blue; text-decoration:underline;\"><img src=\"folder.gif\">$filename</li></a>");}
else
prnt("<li>$filename</li>");
}

$filename = readdir ($handle);
}
prnt('</ol>');
closedir($handle);
}
function arrayMax($arr){
$max=$arr[1];
foreach ($arr as $value){
if($value>$max)
$max=$value;
}
return $max;
}
function arrayRand($x,$min=0,$max=100){
$arr=array();

for ($i=0; $i<=$x; $i++)
$arr[]=rand($min,$max);
return $arr;
}
function getFileList($dir,$type='jpg'){
$arr=array();

$path=realpath($dir);
if($path==false)
die('Please enter a valid directory.');


$handle=opendir($path);
$filename=readdir($handle);

while($filename!=false){
if($filename!='.' && $filename!='..' && getFileType($filename)==$type)
$arr[]=$filename;
$filename=readdir($handle);
}

closedir($handle);
return ($arr);



}
function pickRandom($arr){
$length=count($arr);
$rand=rand(0,($length-1));
return $arr[$rand];
}
function getFileType($filename){
$ltp=strcspn($filename,'.');
$front=substr($filename,0,$ltp);
$back=strtolower(substr($filename,$ltp));

switch ($back){
case '.jpg':return 'jpg';
break;
case '.png':return 'png';
break;
case '.bmp':return 'bmp';
break;
case '.jpeg':return 'jpg';
break;
}


}
function pigLatinize($word){
if($word=='')
return '';




$vowelPos=strcspn($word,"aeiouAEIOU");
$first=substr($word,0,$vowelPos);
$second=substr($word,$vowelPos);
$full=ucfirst(strtolower("$second$first"."ay"));
return $full;
}
function br(){
echo "<br>";
}


?>
