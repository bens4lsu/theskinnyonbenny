<html>
<head>
<?php include ('tracking.php') ?>

<link rel="stylesheet" href="https://theskinnyonbenny.com/pgstyle.css" type="text/css" media="screen" />
</head>
<body bgcolor="#B5B5CD" style="overflow-x: hidden;">

<?php
include("spgm/spgmlib.php");
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
if ($strParamPictureId == '')
	$strParamPictureId = 0;

spgm_LoadPictureCaptions($strParamGalleryId);

$strParamFilterFlags ='t';  // no thumbnails on this page

spgm_DisplayPicture_bms($strParamGalleryId, $strParamPictureId, $strParamFilterFlags);

?>

</body>
</html>