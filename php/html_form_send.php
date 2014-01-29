<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link href="../css/styles.css" rel="stylesheet" type="text/css" media="screen">
<link href="../css/print.css" rel="stylesheet" type="text/css" media="print">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MIDSKraft Limited - Form</title>
</head>

<body><div id="outer"> <!-- -->
<div id="wrapper">

        <div id="logo"> 
                <a href="../index.html"><img src="../images/logo.png" style="width:100px"/></a> 
        </div>
        
        <div id="leftnav">   
            <ul>
                 <li>Branded merchandise</li>
            </ul>
        </div>
        
        <div id="rightnav">      
            <ul><li><a href="../index.html">HOME</a></li>
                <li><a href="../about.html">WHO WE ARE</a></li>
                <li><a href="../services.html">WHAT WE DO</a></li>
                <li><a href="../contact.html" style="color:#F90">CONTACT</a></li> 
            </ul>
		</div>
        
	<div id="line_top"> <img src="../images/line_top.png" /> </div>


<?php
	$request_method = $_SERVER["REQUEST_METHOD"];
	if($request_method == "GET")
	{
		$query_vars = $_GET;
	} 
	elseif ($request_method == "POST")
	{
		$query_vars = $_POST;
	}

	reset($query_vars);
	$t = date("U");
	$file = $_SERVER['DOCUMENT_ROOT'] . "\ssfm\gdform_" . $t;
	$fp = fopen($file,"w");

	while (list ($key, $val) = each ($query_vars)) 
	{
		fputs($fp,"<GDFORM_VARIABLE NAME=$key START>\r\n"); 
		fputs($fp,"$val\r\n");
		fputs($fp,"<GDFORM_VARIABLE NAME=$key END>\r\n");
		if ($key == "redirect") 
		{ 
			$landing_page = $val;
		}
	}

	fclose($fp);
	
	if ($landing_page != "")
	{
		header("Location: http://".$_SERVER["HTTP_HOST"]."/$landing_page");
	} 
	else 
	{
		header("Location: http://".$_SERVER["HTTP_HOST"]."/");
	}
?>
 
<p style="text-align=center; text-justify:">Thank you for contacting us. We will be in touch with you very soon.</p>
 
<?php
die();
?>


    <div id="line_bottom"> <img src="../images/line_bottom.png" /></div>
        
    <div id="footer">
        <p class="footer-text">Copyright &copy; 2014 - MIDSKraft Ghana Limited</p>
    </div>
    
    </div></div>
</body>
    

</html>