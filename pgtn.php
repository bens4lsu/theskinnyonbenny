<html>
<head>
<?php include ('tracking.php') ?>

<style type="text/css" media="screen">
	td {border-bottom-style:dotted;
	    border-width:thin;
	    text-align:center;
	    }
</style>
</head>
<body bgcolor="#B5B5CD">

<?php 

include("spgm/spgmlib.php");

$get_variable_array="HTTP_GET_VARS";
if(isset(${$get_variable_array}["spgmGal"])){ $spgmGal=${$get_variable_array}["spgmGal"]; }


$strParamGalleryId = '';
$strParamPictureId = '';
$strParamPageIndex = '';
$strParamFilterFlags = '';

if (REGISTER_GLOBALS) {
  if ( isset($$strVarGalleryId) ) { $strParamGalleryId = $$strVarGalleryId; }
  if ( isset($$strVarPictureId) ) { $strParamPictureId = $$strVarPictureId; }
  if ( isset($$strVarPageIndex) ) { $strParamPageIndex = $$strVarPageIndex; }
  if ( isset($$strVarFilterFlags) ) {$strParamFilterFlags = $$strVarFilterFlags; }
} else {
  if (isset($_GET[PARAM_NAME_GALID]))
    $strParamGalleryId = $_GET[PARAM_NAME_GALID];
  if (isset($_GET[PARAM_NAME_PICID]))
    $strParamPictureId = $_GET[PARAM_NAME_PICID];
  if (isset($_GET[PARAM_NAME_PAGE]))
    $strParamPageIndex = $_GET[PARAM_NAME_PAGE];
  if (isset($_GET[PARAM_NAME_FILTER]))
    $strParamFilterFlags = $_GET[PARAM_NAME_FILTER];
}

spgm_LoadConfig($strParamGalleryId);

spgm_DisplayGallery($strParamGalleryId, $strParamPageIndex, $strParamFilterFlags);

?>

</body>
</hmtl>