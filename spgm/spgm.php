<?php include("spgmlib.php");

#############
# Main
#############

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
spgm_LoadPictureCaptions($strParamGalleryId);

// User filter initialization
if ($cfg['conf']['filters'] != '') {
  if (! $cfg['global']['propagateFilters']) {
    if ( strstr($cfg['conf']['filters'], PARAM_VALUE_FILTER_NOTHUMBS)
         && ! strstr($strParamFilterFlags, PARAM_VALUE_FILTER_NOTHUMBS) )
      $strParamFilterFlags .= PARAM_VALUE_FILTER_NOTHUMBS;
    if ( strstr($cfg['conf']['filters'], PARAM_VALUE_FILTER_NEW)
         && ! strstr($strParamFilterFlags, PARAM_VALUE_FILTER_NEW) )
      $strParamFilterFlags .= PARAM_VALUE_FILTER_NEW;
  }
}


print "\n\n".'<!-- begin table wrapper -->'."\n".'<table class="'.CLASS_TABLE_WRAPPER.'">'."\n".' <tr>'."\n";

if ($strParamGalleryId == '') {
  // the gallery is not specified -> generate the gallery "tree"
  spgm_DisplayGalleryHierarchy('', 0, $strParamFilterFlags);
}
else {
  print '  <td>'."\n";
  if ($strParamPictureId == '') {
    // we've got a gallery but no picture -> display thumbnails
    spgm_DisplayGallery($strParamGalleryId, $strParamPageIndex, $strParamFilterFlags);
  }
  else {
    spgm_DisplayPicture($strParamGalleryId, $strParamPictureId, $strParamFilterFlags);
  }
  print '    </td>'."\n";
}

print ' </tr>'."\n";

// display the link to SPGM website
//print ' <tr>'."\n".'  <td colspan="'.$cfg['conf']['galleryListingCols'].'" class="'.CLASS_TD_SPGM_LINK.'">'."\n";
//spgm_DispSPGMLink();
//print '  </td>'."\n".' </tr>'."\n";


print '</table>'."\n".'<!-- end table wrapper -->'."\n\n";

?>
