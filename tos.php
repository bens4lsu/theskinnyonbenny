<?php 
	include("spgm/spgmlib.php");
	$InitWidth = 1024;
	$InitHeight = 768;

	$arrGalleries = spgm_CreateGalleryArray('', 1);

	// filter out galleries.  configure in pgHideGalleries.php

	include ('pgHideGalleries.php');
	foreach($arrGalleries as $key=>$value){
		$galNum = substr($value, 0, 3);
		if (in_array($galNum, $Hides)){
			unset ($arrGalleries[$key]);
		}	
	}

	rsort($arrGalleries);
?>

<html>
<head>
<?php include ('tracking.php') ?>

<title>Ben's Photo Collections</title>
<meta name=description content="Photo Site for Ben Schultz, Baton Rouge, LA ">
<meta name=keywords content="Baton Rouge, LSU, New Orleans, Sugar Bowl, Thailand, Halloween">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="PUBLIC">
<link rel="stylesheet" href="https://theskinnyonbenny.com/style.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="img/headers/favicon.ico" type="image/x-icon" />
<script language="javascript" src="https://theskinnyonbenny.com/menu.js"></script>
<style type="text/css" media="screen">
	body { background: url("https://theskinnyonbenny.com/blog2/wp-content/themes/ben/images/bgcolor.jpg"); }
	#page { background: url("https://theskinnyonbenny.com/blog2/wp-content/themes/ben/images/bg.jpg") repeat-y top; border: none; }
	#header { background: url("https://theskinnyonbenny.com/img/headers/header-theskinnyonbenny.jpg") no-repeat bottom center; }
	#footer { background: url("https://theskinnyonbenny.com/blog2/wp-content/themes/ben/images/footer.jpg") no-repeat bottom; border: none;}
	#header 	{ margin: 0 !important; margin: 0 0 0 1px; padding: 1px; height: 198px; width: 758px; }
	#headerimg 	{ margin: 7px 9px 0; height: 192px; width: 740px; }
	td, td.caption {margin-left:auto;margin-right:auto;text-align:center;}
</style>



</head>

<body>

<div class="topleft"><img src="https://theskinnyonbenny.com/img/BenPurpleGold.JPG"></div>
<div class="sb2"><?php include("menu2.php"); ?></div>

<div id="page">
	<div id="header">
		<div id="headerimg"></div>
	</div>

	<div id="content" class="widecolumn">
	
	
	
		<h2>
			Web Site Terms and Conditions of Use
		</h2>

		<h3>
			1. Terms
		</h3>

		<p>
			By accessing this web site, you are agreeing to be bound by these 
			web site Terms and Conditions of Use, all applicable laws and regulations, 
			and agree that you are responsible for compliance with any applicable local 
			laws. If you do not agree with any of these terms, you are prohibited from 
			using or accessing this site. The materials contained in this web site are 
			protected by applicable copyright and trade mark law.
		</p>

		<h3>
			2. Use License
		</h3>

		<ol type="a">
			<li>
				Permission is granted to temporarily download one copy of the materials 
				(information or software) on theskinnyonbenny.com's web site for personal, 
				non-commercial transitory viewing only. This is the grant of a license, 
				not a transfer of title, and under this license you may not:
		
				<ol type="i">
					<li>modify or copy the materials;</li>
					<li>use the materials for any commercial purpose, or for any public display (commercial or non-commercial);</li>
					<li>attempt to decompile or reverse engineer any software contained on theskinnyonbenny.com's web site;</li>
					<li>remove any copyright or other proprietary notations from the materials; or</li>
					<li>transfer the materials to another person or "mirror" the materials on any other server.</li>
				</ol>
			</li>
			<li>
				This license shall automatically terminate if you violate any of these restrictions and may be terminated by theskinnyonbenny.com at any time. Upon terminating your viewing of these materials or upon the termination of this license, you must destroy any downloaded materials in your possession whether in electronic or printed format.
			</li>
		</ol>

		<h3>
			3. Disclaimer
		</h3>

		<ol type="a">
			<li>
				The materials on theskinnyonbenny.com's web site are provided "as is". theskinnyonbenny.com makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties, including without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights. Further, theskinnyonbenny.com does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its Internet web site or otherwise relating to such materials or on any sites linked to this site.
			</li>
		</ol>

		<h3>
			4. Limitations
		</h3>

		<p>
			In no event shall theskinnyonbenny.com or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption,) arising out of the use or inability to use the materials on theskinnyonbenny.com's Internet site, even if theskinnyonbenny.com or a theskinnyonbenny.com authorized representative has been notified orally or in writing of the possibility of such damage. Because some jurisdictions do not allow limitations on implied warranties, or limitations of liability for consequential or incidental damages, these limitations may not apply to you.
		</p>
			
		<h3>
			5. Revisions and Errata
		</h3>

		<p>
			The materials appearing on theskinnyonbenny.com's web site could include technical, typographical, or photographic errors. theskinnyonbenny.com does not warrant that any of the materials on its web site are accurate, complete, or current. theskinnyonbenny.com may make changes to the materials contained on its web site at any time without notice. theskinnyonbenny.com does not, however, make any commitment to update the materials.
		</p>

		<h3>
			6. Links
		</h3>

		<p>
			theskinnyonbenny.com has not reviewed all of the sites linked to its Internet web site and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by theskinnyonbenny.com of the site. Use of any such linked web site is at the user's own risk.
		</p>

		<h3>
			7. Site Terms of Use Modifications
		</h3>

		<p>
			theskinnyonbenny.com may revise these terms of use for its web site at any time without notice. By using this web site you are agreeing to be bound by the then current version of these Terms and Conditions of Use.
		</p>

		<h3>
			8. Governing Law
		</h3>

		<p>
			Any claim relating to theskinnyonbenny.com's web site shall be governed by the laws of the State of Louisiana without regard to its conflict of law provisions.
		</p>

		<p>
			General Terms and Conditions applicable to Use of a Web Site.
		</p>



		<h2>
			Privacy Policy
		</h2>

		<p>
			Your privacy is very important to us. Accordingly, we have developed this Policy in order for you to understand how we collect, use, communicate and disclose and make use of personal information. The following outlines our privacy policy.
		</p>

		<ul>
			<li>
				Before or at the time of collecting personal information, we will identify the purposes for which information is being collected.
			</li>
			<li>
				We will collect and use of personal information solely with the objective of fulfilling those purposes specified by us and for other compatible purposes, unless we obtain the consent of the individual concerned or as required by law.		
			</li>
			<li>
				We will only retain personal information as long as necessary for the fulfillment of those purposes. 
			</li>
			<li>
				We will collect personal information by lawful and fair means and, where appropriate, with the knowledge or consent of the individual concerned. 
			</li>
			<li>
				Personal data should be relevant to the purposes for which it is to be used, and, to the extent necessary for those purposes, should be accurate, complete, and up-to-date. 
			</li>
			<li>
				We will protect personal information by reasonable security safeguards against loss or theft, as well as unauthorized access, disclosure, copying, use or modification.
			</li>
			<li>
				We will make readily available to customers information about our policies and practices relating to the management of personal information. 
			</li>
		</ul>

		<p>
			We are committed to conducting our business in accordance with these principles in order to ensure that the confidentiality of personal information is protected and maintained. 
		</p>		

			
	
	</div>

<?php include("indexFooter.php");	?>
</div>


</div>
</body>
</html>

