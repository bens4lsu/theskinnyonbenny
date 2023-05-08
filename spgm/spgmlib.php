<?php

#  SPGM (Simple Picture Gallery Manager), a basic and configurable PHP script
#  to display picture galleries on the web
#  Copyright (C) 2002, Sylvain Pajot <spajot@users.sourceforge.net>
#  Official website: http://spgm.sourceforge.net
#
#  This program is free software; you can redistribute it and/or modify
#  it under the terms of the GNU General Public License as published by
#  the Free Software Foundation; either version 2 of the License, or
#  (at your option) any later version.
#
#  This program is distributed in the hope that it will be useful,
#  but WITHOUT ANY WARRANTY; without even the implied warranty of
#  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#  GNU General Public License for more details.
#
#  You should have received a copy of the GNU General Public License
#  along with this program; if not, write to the Free Software
#  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA


###### Toggles #############
define("MODE_TRACE", false); // toggles debug mode
define("MODE_WARNING", true); // toggles warning mode
define("REGISTER_GLOBALS", false); // toggle for register_globals mode
                                  // must match the php.ini configuration

define("DIR_GAL", "img/gal/");  // galleries base directory (relative path from
                            // spgm.php or the file requiring it if there's one)
define("DIR_LANG", "spgm/lang/"); // language packs (relative path from spgm.php or
                             // the file requiring it if there's one)
define("DIR_THEMES", "spgm/flavors/"); // themes base directory (relative path from
                                  // spgm.php or the file requiring it
                                  // if there's one)
//define("DIR_THUMBS", "thumbnails/"); // if defined, points to the directory
                                     // where thumbnails reside, relatively
                                     // from the gallery directory

define("FILE_GAL_TITLE", "gal-title.txt");  // default title file for a gallery
define("FILE_GAL_SORT", "gal-sort.txt");   // file for explicit gallery sort
define("FILE_GAL_CAPTION", "gal-desc.txt"); // default caption file for a gallery
define("FILE_PIC_SORT", "pic-sort.txt");   // file for explicit picture sort
define("FILE_PIC_CAPTIONS", "pic-desc.txt"); // default caption file for pictures/thumbnails
define("FILE_THEME", "spgm.thm");           // theme file
define("FILE_CONF", "spgm.conf");           // config file
define("FILE_LANG", "lang");                // language file short name (without extension)
define("PREF_THUMB", "_thb_");              // prefix for thumbnail pictures
define("EXT_PIC_CAPTION", ".cmt");          // file extension for pictures comment (DEPRECATED)
define("CAPTION_DELIMITER", '|');

define("PARAM_PREFIX", "spgm");             // MUST NOT be empty
define("PARAM_NAME_GALID", PARAM_PREFIX."Gal");
define("PARAM_NAME_PICID", PARAM_PREFIX."Pic");
define("PARAM_NAME_PAGE", PARAM_PREFIX."Page");
define("PARAM_NAME_FILTER", PARAM_PREFIX."Filters");
define("PARAM_VALUE_FILTER_NEW", "n");
define("PARAM_VALUE_FILTER_NOTHUMBS", "t");
define("PARAM_VALUE_FILTER_SLIDESHOW", "s");

define("CLASS_TABLE_WRAPPER", "table-wrapper");
define("CLASS_TABLE_MAIN_TITLE", "table-main-title");
define("CLASS_TD_SPGM_LINK", "td-main-title-spgm-link");
define("CLASS_A_SPGM_LINK", "a-spgm-link");
define("CLASS_TABLE_GALLISTING_GRID", "table-gallisting-grid");
define("CLASS_TD_GALLISTING_CELL", "td-gallisting-cell");
define("CLASS_TABLE_GALITEM", "table-galitem");
define("CLASS_TD_GALITEM_ICON", "td-galitem-icon");
define("CLASS_TD_GALITEM_TITLE", "td-galitem-title");
define("CLASS_TD_GALITEM_CAPTION", "td-galitem-caption");
define("CLASS_TABLE_PICTURE", "table-picture");
define("CLASS_TD_PICTURE_NAVI", "td-picture-navi");
define("CLASS_TD_ZOOM_FACTORS", "td-zoom-factors");
define("ID_PICTURE", "picture");
define("ID_PICTURE_CAPTION", "picture-caption");
define("CLASS_BUTTON_ZOOM_FACTORS", "button-zoom-factors");
define("CLASS_TD_PICTURE_PIC", "td-picture-pic");
define("ID_PICTURE_NAVI", "pic-navi");
define("CLASS_TD_PICTURE_FILENAME", "td-picture-filename");
define("CLASS_TD_PICTURE_CAPTION", "td-picture-caption");
define("CLASS_TABLE_THUMBNAILS", "table-thumbnails");
define("CLASS_TD_THUMBNAILS_THUMB", "td-thumbnails-thumb");
define("CLASS_TD_THUMBNAILS_THUMB_SELECTED", "td-thumbnails-thumb-selected");
define("CLASS_TD_THUMBNAILS_NAVI", "td-thumbnails-navi");
define("CLASS_DIV_THUMBNAILS_CAPTION", "div-thumbnails-caption");
define("CLASS_TABLE_SHADOWS", "table-shadows");
define("CLASS_TD_SHADOWS_RIGHT", "td-shadows-right");
define("CLASS_TD_SHADOWS_BOTTOM", "td-shadows-bottom");
define("CLASS_TD_SHADOWS_BOTTOMRIGHT", "td-shadows-bottomright");
define("CLASS_TD_SHADOWS_MAIN", "td-shadows-main");
define("CLASS_SPAN_FILTERS", "span-filters");
define("CLASS_IMG_PICTURE", "img-picture");
define("CLASS_IMG_THUMBNAIL", "img-thumbnail");
define("CLASS_IMG_THUMBNAIL_SELECTED", "img-thumbnail-selected");
define("CLASS_IMG_FOLDER", "img-folder");
define("CLASS_IMG_GALICON", "img-galicon");
define("CLASS_IMG_PICTURE_PREV", "img-picture-prev");
define("CLASS_IMG_PICTURE_NEXT", "img-picture-next");
define("CLASS_IMG_THMBNAVI_PREV", "img-thmbnavi-prev");
define("CLASS_IMG_THMBNAVI_NEXT", "img-thmbnavi-next");
define("CLASS_IMG_NEW", "img-new");
define("CLASS_DIV_GALHEADER", "div-galheader");

define("ERRMSG_UNKNOWN_GALLERY", "unknown gallery");
define("ERRMSG_UNKNOWN_PICTURE", "unknown picture");
define("ERRMSG_INVALID_NUMBER_OF_PICTURES", "invalid number of picture");
define("ERRMSG_INVALID_VALUE", "invalid value");
define("WARNMSG_FILE_INSUFFICIENT_PERMISSIONS", "insufficient permissions (644 required)");
define("WARNMSG_THUMBNAIL_UNREADABLE", "no associated thumbnail or insufficient permissions");
define("WARNMSG_DIR_INSUFFICIENT_PERMISSIONS", "insufficient permissions (755 required)");

define("GALICON_NONE", 0);
define("GALICON_RANDOM", 1);
define("ORIGINAL_SIZE", 0);
define("SORTTYPE_CREATION_DATE", 0);
define("SORTTYPE_NAME", 1);
define("SORT_ASCENDING", 0);
define("SORT_DESCENDING", 1);
define("RIGHT", 0);
define("BOTTOM", 1);

/* multi-language support... */
define("PATTERN_SPGM_LINK", ">SPGM_LINK<");
define("PATTERN_CURRENT_PAGE", ">CURRENT_PAGE<");
define("PATTERN_NB_PAGES", ">NB_PAGES<");
define("PATTERN_CURRENT_PIC", ">CURRENT_PIC<");
define("PATTERN_NB_PICS", ">NB_PICS<");

// Used for variable variables in main function
$strVarGalleryId = PARAM_NAME_GALID;
$strVarPictureId = PARAM_NAME_PICID;
$strVarPageIndex = PARAM_NAME_PAGE;
$strVarFilterFlags = PARAM_NAME_FILTER;


$cfg = array();
$cfg['conf']['newStatusDuration']       = 0;
$cfg['conf']['thumbnailsPerPage']       = 15;
$cfg['conf']['thumbnailsPerRow']        = 7;
$cfg['conf']['galleryListingCols']      = 2;
$cfg['conf']['galleryCaptionPos']       = RIGHT;
$cfg['conf']['subGalleryLevel']         = 1;
$cfg['conf']['gallerySortType']         = SORTTYPE_NAME;
$cfg['conf']['gallerySortOptions']      = SORT_ASCENDING;
$cfg['conf']['pictureSortType']         = SORTTYPE_NAME;
$cfg['conf']['pictureSortOptions']      = SORT_ASCENDING;
$cfg['conf']['pictureInfoedThumbnails'] = false;
$cfg['conf']['captionedThumbnails']     = false;
$cfg['conf']['pictureCaptionedThumbnails'] = false;
$cfg['conf']['filenameWithThumbnails']  = false;
$cfg['conf']['filenameWithPictures']    = false;
$cfg['conf']['enableSlideshow']         = false;
$cfg['conf']['enableDropShadows']       = false;
$cfg['conf']['popupPictures']           = false;
$cfg['conf']['popupFitPicture']         = true;
$cfg['conf']['popupWidth']              = 750;
$cfg['conf']['popupHeight']             = 600;
$cfg['conf']['filters']                 = '';
$cfg['conf']['exifInfo']                = array();
$cfg['conf']['zoomFactors']             = array();
$cfg['conf']['galleryIconType']         = GALICON_NONE;
$cfg['conf']['galleryIconHeight']       = ORIGINAL_SIZE;
$cfg['conf']['galleryIconWidth']        = ORIGINAL_SIZE;
$cfg['conf']['theme']                   = 'default';
$cfg['conf']['language']                = 'en';

$cfg['locale']['spgmLink']
  = 'a gallery generated by '.PATTERN_SPGM_LINK;
$cfg['locale']['thumbnailNaviBar']
  = 'Page '.PATTERN_CURRENT_PAGE.' of '.PATTERN_NB_PAGES;
$cfg['locale']['filter']      = 'filter';
$cfg['locale']['filterNew']   = 'new';
$cfg['locale']['filterAll']   = 'all';
$cfg['locale']['filterSlideshow'] = 'Slideshow';
$cfg['locale']['pictureNaviBar']
   = 'Picture '.PATTERN_CURRENT_PIC.' of '.PATTERN_NB_PICS;
$cfg['locale']['newPictures'] = 'new pictures';
$cfg['locale']['newPicture']  = 'new picture';
$cfg['locale']['newGallery']  = 'new gallery';
$cfg['locale']['pictures']    = 'pictures';
$cfg['locale']['picture']     = 'picture';
$cfg['locale']['rootGallery'] = 'Main gallery';
$cfg['locale']['exifHeading'] = 'EXIF data for';

$cfg['theme']['gallerySmallIcon']    = '';
$cfg['theme']['galleryBigIcon']      = '';
$cfg['theme']['newItemIcon']         = '';
$cfg['theme']['previousPictureIcon'] = '';
$cfg['theme']['nextPictureIcon']     = '';
$cfg['theme']['previousPageIcon']    = '&laquo;';
$cfg['theme']['previousPageIconNot'] = '&laquo;';
$cfg['theme']['nextPageIcon']        = '&raquo;';
$cfg['theme']['nextPageIconNot']     = '&raquo;';
$cfg['theme']['firstPageIcon']       = '&laquo;&laquo;';
$cfg['theme']['firstPageIconNot']    = '&laquo;&laquo;';
$cfg['theme']['lastPageIcon']        = '&raquo;&raquo;';
$cfg['theme']['lastPageIconNot']     = '&raquo;&raquo;';

$cfg['global']['supportedExtensions']
  = array('.jpg', '.png', '.gif');    // supported picture file extensions
$cfg['global']['propagateFilters'] = false; // used to propagate filters in URLs
$cfg['global']['documentSelf'] = '';
$cfg['global']['tmpPathToPics'] = ''; // hack to avoid comparisons of long
                                      // strings (only used by the
                                      // spgm_CallbackCompareMTime
                                      // callback function)
$cfg['global']['URLExtraParams'] = ''; // Contains the extra paramaters for SPGM
                               // to be able to link back in template mode

# A bit of logic to set a few of the variables above...
if (REGISTER_GLOBALS) {
  if (isset($$strVarFilterFlags) ) $cfg['global']['propagateFilters'] = true;
  $cfg['global']['documentSelf'] = basename($PHP_SELF);
} else {
  if (isset($_GET[PARAM_NAME_FILTER]) ) $cfg['global']['propagateFilters'] = true;
  $cfg['global']['documentSelf'] = basename( $_SERVER['PHP_SELF'] );
}

// Auto-template mode
foreach ($_GET as $key => $value) {
  if (substr($key, 0, strlen(PARAM_PREFIX)) != PARAM_PREFIX) {
    $cfg['global']['URLExtraParams'] .= '&amp;'.$key.'='.$value;
  }
}



###### REPORTING FUNCTIONS #############################################

function spgm_Error($strErrorMessage) {
  print '<div style="color: #ff0000; font_family: helvetica, arial; font-size:12pt; font-weight: bold;">'.$strErrorMessage.'</div>'."\n";
}

function spgm_Warning($strWarningMessage) {
  if (MODE_WARNING) {
    print '<div style="color: #0000ff; font_family: helvetica, arial; font-size:12pt; font-weight: bold;">'.$strWarningMessage.'</div>'."\n";
  }
}

function spgm_Trace($strTrace) {
  if (MODE_TRACE) {
    print '<div style="color: #000000; font_family: verdana, helvetica, arial; font-size:12pt;">'.$strTrace.'</div>'."\n";
  }
}



################## DISPLAY INFO FUNCTIONS #####################################

function spgm_DispSPGMLink() {

  global $cfg;

  spgm_Trace( '<p>function spgm_DispSPGMLink</p>'."\n" );

  // multi-language support
  $cfg['locale']['spgmLink'] = ereg_replace(PATTERN_SPGM_LINK, '<a href="http://spgm.sourceforge.net" class="'.CLASS_A_SPGM_LINK.'">SPGM</a>', $cfg['locale']['spgmLink']);

  print $cfg['locale']['spgmLink'];
}

################################################################################
# Checks if a file or directory is "new"
function spgm_IsNew($strFilePath) {

  global $cfg;

  spgm_Trace(
    '<p>function spgm_IsNew</p>'."\n"
    .'strFilePath: '.$strFilePath.'<br />'."\n"
  );

  if (! file_exists($strFilePath) || $cfg['conf']['newStatusDuration'] == 0) return false;
  return (filemtime($strFilePath) > (time()-$cfg['conf']['newStatusDuration']*24*3600));
}

################################################################################
# Checks for permissions on either pictures, galleries, config files, etc...

function spgm_CheckPerms($strFilePath) {

  spgm_Trace(
    '<p>function spgm_CheckPerms</p>'."\n"
    .'strFilePath: '.$strFilePath.'<br />'."\n"
  );

  return is_readable($strFilePath);
}

################################################################################
# Checks if the filname exists, refers to a picture associated to a thumbnail
# and is granted the necessary access rigths

function spgm_IsPicture($strPictureFileName, $strGalleryId) {

  global $cfg;

  $strPicturePath = DIR_GAL.$strGalleryId.'/'.$strPictureFileName;
  $strThumbnailPath = DIR_GAL.$strGalleryId.'/'.PREF_THUMB.$strPictureFileName;
  if ( defined('DIR_THUMBS') ) {
    $strThumbnailPath =
        DIR_GAL.$strGalleryId.'/'.DIR_THUMBS.PREF_THUMB.$strPictureFileName;
  }

  spgm_Trace(
    '<p>function spgm_IsPicture</p>'."\n"
    .'strPictureFileName: '.$strPictureFileName.'<br />'."\n"
    .'strGalleryId: '.$strGalleryId.'<br />'."\n"
    .'strPicturePath: '.$strPicturePath.'<br />'."\n"
    .'strThumbnailPath: '.$strThumbnailPath.'<br />'."\n"
  );

  // check filename patterns
  if ( eregi('^'.PREF_THUMB.'*', $strPictureFileName) )
    return false;
  $validated = false;
  $extnb = count($cfg['global']['supportedExtensions']);
  for ($i=0; $i<$extnb; $i++) {
    if ( eregi($cfg['global']['supportedExtensions'][$i].'$', $strPictureFileName) ) {
      $validated = true;
      break;
    }
  }
  if (! $validated)
    return false;

  // does it exist, is it a regular file and does it have the expected permissions ?
  if (! spgm_CheckPerms($strPicturePath) ) {
    return false;
  }

  // an associated thumbnail is required... same job again !
  if (! spgm_CheckPerms($strThumbnailPath) ) {
    spgm_Warning( $strPicturePath.': '.WARNMSG_THUMBNAIL_UNREADABLE.'<br />' );
    return false;
  }

  return true;
}

##############################################################################
# Checks if the directory corresponding the gallery is well-formed, exists
# and is granted the necessary access rights
# $galid can be empty

function spgm_IsGallery($strGalleryId) {

  $strPathToPictures = DIR_GAL.$strGalleryId;

  spgm_Trace(
    '<p>function spgm_IsGallery</p>'."\n"
    .'strGalleryId: '.$strGalleryId.'<br />'."\n"
    .'strPathToPictures: '.$strPathToPictures.'<br />'."\n"
  );

  // searching for hazardous patterns
  if ( strpos($strGalleryId, '^/') > 0 || strpos($strGalleryId, '\.\.') > 0 || strpos($strGalleryId, '/$') > 0 ) {
    return false;
  }


  // does it exist, is it a directory and does it have the expected permissions ?
  if (! is_dir($strPathToPictures))
    return false;
  if (! spgm_CheckPerms($strPathToPictures) ) {
    spgm_Warning(
      $strPathToPictures.': '.WARNMSG_FILE_INSUFFICIENT_PERMISSIONS.'<br />'
    );
    return false;
  }

  if ( defined('DIR_THUMBS') ) {
    if (basename($strGalleryId).'/' == DIR_THUMBS) {
      return false;
    }
  }

  return true;
}


################################################################################
# Loads a flavor
function spgm_LoadFlavor($strThemeName) {

  global $cfg;

  spgm_Trace(
    '<p>function spgm_LoadFlavor</p>'."\n"
    .'strThemeName: '.$strThemeName.'<br />'."\n"
  );

  if ( spgm_CheckPerms(DIR_THEMES.$strThemeName.'/'.FILE_THEME) ) {
    include(DIR_THEMES.$strThemeName.'/'.FILE_THEME);
  }
  else
    spgm_Warning(
      'unable to load '.DIR_THEMES.$strThemeName.'/'.FILE_THEME.': '
      .WARNMSG_FILE_INSUFFICIENT_PERMISSIONS.'<br />'
    );
}

################################################################################
# Loads textual ressources from an SPGM language file.

function spgm_LoadLanguage($strCountryCode) {

  global $cfg;

  spgm_Trace(
    '<p>funtion spgm_LoadLanguage</p>'."\n"
    .'country code: '.$strCountryCode.'<br />'."\n"
  );

  if ($strCountryCode != '') {
    $filename_lang = DIR_LANG.FILE_LANG.'.'.$strCountryCode;
    if (file_exists($filename_lang) ) {
      if ( spgm_CheckPerms($filename_lang) ) {
        include($filename_lang);
      }
    }
    else
      spgm_Warning(
        'No support for lang. '.$strCountryCode.' &raquo; default: english<br />'
      );
  }
}


###############################################################################
# Loads picture/thumbnail captions for a given gallery
function spgm_LoadPictureCaptions($strGalleryId) {

  global $cfg;


  $strCaptionsFilename = DIR_GAL.$strGalleryId.'/'.FILE_PIC_CAPTIONS;
  if ( spgm_CheckPerms($strCaptionsFilename) ) {
    //goo
    $arrCaptions = file($strCaptionsFilename);
    $_max = count($arrCaptions);
    for ($i=0; $i<$_max; $i++) {
      list($strPictureFilename, $strCaption) = explode(CAPTION_DELIMITER, $arrCaptions[$i]);
      $cfg['captions'][trim($strPictureFilename)] = trim($strCaption);
//    print '<br />'.$i.' '.$strPictureFilename.' '.$cfg['captions'][trim($strPictureFilename)];

    }

  }

  spgm_Trace(
    '<p>funtion spgm_LoadPictureCaption</p>'."\n"
    .'strGalleryId: '.$strGalleryId.'<br />'."\n"
    .'strCaptionsFilename: '.$strCaptionsFilename.'<br />'."\n"
    .'_max: '.$_max.'<br />'."\n"
    .'i: '.$i.'<br />'."\n"
  );

}

##################################################################
# Loads Exif Data from and returns it as an XHTML-formatted string
function spgm_LoadExif($strPictureURL) {

  global $cfg;

  $arrExifData = exif_read_data($strPictureURL);
  $strExifData = '';

  if ( $cfg['conf']['exifInfo'][0] == 'ALL' ) {
    foreach ($arrExifData as $key => $value) {
      if (! is_array($arrExifData[$key]) ) {
        $strExifData .= '&lt;b&gt;'.$key.'&lt;/b&gt; '.$value.'&lt;br /&gt;';
      }
    }
    $strExifData = ereg_replace("\n", '', $strExifData);
  } else {
    $max = count( $cfg['conf']['exifInfo'] );
    for ($i=0; $i<$max; $i++) {
      $key = $cfg['conf']['exifInfo'][$i];
      $strExifData .= '&lt;b&gt;'.$key.'&lt;/b&gt; '.$arrExifData[$key].'&lt;br /&gt;';
    }
  }

  return $strExifData;
}


################################################################################
function spgm_PostInitCheck() {

  global $cfg;

  spgm_Trace( '<p>funtion spgm_PostInitCheck</p>'."\n" );

  $_mix = $cfg['conf']['newStatusDuration'];
  if (! is_int($_mix) || ($_mix < 0) )
    spgm_Error('cfg[conf][newStatusDuration]: '.ERRMSG_INVALID_VALUE);

  $_mix = $cfg['conf']['thumbnailsPerPage'];
  if (! is_int($_mix) || ($_mix < 1) )
    spgm_Error('cfg[conf][thumbnailsPerPage]: '.ERRMSG_INVALID_VALUE);

  $_mix = $cfg['conf']['thumbnailsPerRow'];
  if (! is_int($_mix) || ($_mix < 1) )
    spgm_Error('cfg[conf][thumbnailsPerRow]: '.ERRMSG_INVALID_VALUE);

  $_mix = $cfg['conf']['galleryListingCols'];
  if (! is_int($_mix) || ($_mix < 1) )
    spgm_Error('cfg[conf][galleryListingCols]: '.ERRMSG_INVALID_VALUE);

  $_mix = $cfg['conf']['subGalleryLevel'];
  if (! is_int($_mix) || ($_mix < 0) )
    spgm_Error('cfg[conf][subGalleryLevel]: '.ERRMSG_INVALID_VALUE);

  $_mix = $cfg['conf']['galleryIconType'];
  if ( ! is_int($_mix) || ($_mix != GALICON_NONE
       && $_mix != GALICON_RANDOM) )
    spgm_Error('cfg[conf][galleryIconType]: '.ERRMSG_INVALID_VALUE);

  $_mix = $cfg['conf']['galleryIconHeight'];
  if (! is_int($_mix) || ($_mix < ORIGINAL_SIZE) )
    spgm_Error('cfg[conf][galleryIconHeight]: '.ERRMSG_INVALID_VALUE);

  $_mix = $cfg['conf']['galleryIconWidth'];
  if (! is_int($_mix) || ($_mix < ORIGINAL_SIZE) )
    spgm_Error('cfg[conf][galleryIconWidth]: '.ERRMSG_INVALID_VALUE);

  $_mix = $cfg['conf']['galleryCaptionPos'];
  if ( ! is_int($_mix) || ($_mix != RIGHT && $_mix != BOTTOM) )
    spgm_Error('cfg[conf][galleryCaptionPos]: '.ERRMSG_INVALID_VALUE);

  $_mix = $cfg['conf']['gallerySortType'];
  if ( ! is_int($_mix) || ($_mix != SORTTYPE_CREATION_DATE
       && $_mix != SORTTYPE_NAME) )
    spgm_Error('cfg[conf][gallerySortType]: '.ERRMSG_INVALID_VALUE);

  $_mix = $cfg['conf']['gallerySortOptions'];
  if ( ! is_int($_mix) || ($_mix != SORT_ASCENDING
       && $_mix != SORT_DESCENDING) )
    spgm_Error('cfg[conf][gallerySortOptions]: '.ERRMSG_INVALID_VALUE);

  $_mix = $cfg['conf']['pictureSortType'];
  if ( ! is_int($_mix) || ($_mix != SORTTYPE_CREATION_DATE
      && $_mix != SORTTYPE_NAME) )
    spgm_Error('cfg[conf][pictureSortType]: '.ERRMSG_INVALID_VALUE);

  $_mix = $cfg['conf']['pictureSortOptions'];
  if ( ! is_int($_mix) || ($_mix != SORT_ASCENDING
      && $_mix != SORT_DESCENDING) )
    spgm_Error('cfg[conf][pictureSortOptions]: '.ERRMSG_INVALID_VALUE);

  if ( ! is_bool($cfg['conf']['pictureInfoedThumbnails']) )
    spgm_Error('cfg[conf][pictureInfoedThumbnail]: '.ERRMSG_INVALID_VALUE);

  if ( ! is_bool($cfg['conf']['captionedThumbnails']) )
    spgm_Error('cfg[conf][captionedThumbnails]: '.ERRMSG_INVALID_VALUE);

  if ( ! is_bool($cfg['conf']['pictureCaptionedThumbnails']) )
    spgm_Error('cfg[conf][pictureCaptionedThumbnails]: '.ERRMSG_INVALID_VALUE);

  if ( ! is_bool($cfg['conf']['popupPictures']) )
    spgm_Error('cfg[conf][popupPictures]: '.ERRMSG_INVALID_VALUE);

  $_mix = $cfg['conf']['popupWidth'];
  if ( ! is_int($_mix) || $_mix < 1)
    spgm_Error('cfg[conf][popupWidth]: '.ERRMSG_INVALID_VALUE);

  $_mix = $cfg['conf']['popupHeight'];
  if ( ! is_int($_mix) || $_mix < 1)
    spgm_Error('cfg[conf][popupHeight]: '.ERRMSG_INVALID_VALUE);

  if ( ! is_string($cfg['conf']['filters']) )
    spgm_Error('cfg[conf][filters]: '.ERRMSG_INVALID_VALUE);

  if ( ! is_array($cfg['conf']['zoomFactors']) )
    spgm_Error('cfg[conf][zoomFactors]: '.ERRMSG_INVALID_VALUE);

  if ( ! is_array($cfg['conf']['exifInfo']) )
    spgm_Error('cfg[conf][exifInfo]: '.ERRMSG_INVALID_VALUE);

  if ( ! is_string($cfg['conf']['theme']) )
    spgm_Error('cfg[conf][theme]: '.ERRMSG_INVALID_VALUE);

  if ( ! is_string($cfg['conf']['language']) )
    spgm_Error('cfg[conf][language]: '.ERRMSG_INVALID_VALUE);



  # Link labels initialization

  $arrIconInfo = array(
    // key in $cfg | ALT value | CLASS value | alternative (if resource is N/A)
    array('gallerySmallIcon', '', CLASS_IMG_FOLDER, ''),
    array('galleryBigIcon', '', CLASS_IMG_FOLDER, '&raquo;'),
    array('previousPageIcon', 'Previous thumbnail page',
          CLASS_IMG_THMBNAVI_PREV, '&laquo;'),
    array('previousPageIconNot', 'Disabled previous thumbnail page',
          CLASS_IMG_THMBNAVI_PREV, '&laquo;'),
    array('firstPageIcon', 'First thumbnail page',
          CLASS_IMG_THMBNAVI_PREV, '&laquo;&laquo;'),
    array('firstPageIconNot', 'Disabled first thumbnail page',
          CLASS_IMG_THMBNAVI_PREV, '&laquo;&laquo;'),
    array('nextPageIcon', 'Next thumbnail page', CLASS_IMG_THMBNAVI_NEXT,
          '&raquo;'),
    array('nextPageIconNot', 'Disabled next thumbnail page',
          CLASS_IMG_THMBNAVI_NEXT, '&raquo;'),
    array('lastPageIcon', 'Last thumbnail page', CLASS_IMG_THMBNAVI_NEXT,
          '&raquo;&raquo;'),
    array('lastPageIconNot', 'Disabled last thumbnail page',
          CLASS_IMG_THMBNAVI_NEXT, '&raquo;&raquo;'),
    array('previousPictureIcon', 'Previous picture', CLASS_IMG_PICTURE_PREV,
          '&laquo;'),
    array('nextPictureIcon', 'Next picture', CLASS_IMG_PICTURE_NEXT, '&raquo;'),
    array('newItemIcon', '', CLASS_IMG_NEW, '')
  );

  $dim = array();
  $iIconNumber = count($arrIconInfo);
  $strIconFileName = '';
  $_key = '';
  $_lblAlt = '';
  $_lblClass = '';
  $_lblNa = '';

  for ($i=0; $i<$iIconNumber; $i++) {

    $_key = $arrIconInfo[$i][0];
    $_lblAlt = $arrIconInfo[$i][1];
    $_lblClass = $arrIconInfo[$i][2];
    $_lblNa = $arrIconInfo[$i][3];
    $strIconFileName = DIR_THEMES.$cfg['conf']['theme'].'/'.$cfg['theme'][$_key];

    if ( $cfg['theme'][$_key] != '' && spgm_CheckPerms($strIconFileName) ) {
      $dim = getimagesize($strIconFileName);
      $cfg['theme'][$_key] = '<img src="'.$strIconFileName.'"';
      $cfg['theme'][$_key] .= ' alt="'.$_lblAlt.'"';
      $cfg['theme'][$_key] .= ' class="'.$_lblClass.'"';
      $cfg['theme'][$_key] .= ' width="'.$dim[0].'"';
      $cfg['theme'][$_key] .= ' height="'.$dim[1].'" />';
    } else {
      if ($_lblNa != '')
        $cfg['theme'][$_key] = $_lblNa;
    }
  }
}



################################################################################
# Loads config files from the possible different locations.
# To allow properties inheritance, it includes all the config file from the
# top level gallery to the gallery itself.
# TODO: support for INI files (PHP4) ?

function spgm_LoadConfig($strGalleryId) {

  global $cfg;

  spgm_Trace(
    '<p>funtion spgm_LoadConfig</p>'."\n"
    .'strGalleryId: '.$strGalleryId.'<br />'."\n"
  );


  if ( spgm_IsGallery($strGalleryId) ) {

  	// always load the default config file
  	$strConfigurationFileName = DIR_GAL.FILE_CONF;

  	if ( spgm_CheckPerms($strConfigurationFileName) ) {
  	    include($strConfigurationFileName);
  	}

  	// now, include all the possible config files
  	if ( $strGalleryId != '' ) {
      $strConfigurationPathElements = explode('/', $strGalleryId);
      $iPathDepth = count($strConfigurationPathElements);
      $_strConfigurationPath = ''; // grows inside the follwing loop ("gal1" -> "gal1/gal2"...)
      for ($i=0; $i<$iPathDepth; $i++) { // use "foreach ($strConfigurationPathElements as $dir_name) {" in PHP4
        $_strConfigurationPath .= $strConfigurationPathElements[$i].'/';
        $strConfigurationFileName = DIR_GAL.$_strConfigurationPath.FILE_CONF;
        if ( spgm_CheckPerms($strConfigurationFileName) ) {
          include($strConfigurationFileName);
        }
      }
    }
  }

  spgm_LoadLanguage($cfg['conf']['language']);
  spgm_LoadFlavor($cfg['conf']['theme']);
  spgm_PostInitCheck();

}





################################################################################
# returns an array containing various information for a given gallery and its
# provided pictures.
# returned array:
# $array[0] = total number of pictures
# $array[1] = number of new pictures
# $array[2] = the thumbnail's filename to use for the gallery icon

function spgm_GetGalleryInfo($strGalleryId, $arrPictureFilenames) {

  global $cfg;

  $iPictureNumber = 0;
  $iNewPictureNumber = 0;
  $strPathToGalleries = DIR_GAL.$strGalleryId;
  $iPictureNumber = count($arrPictureFilenames);
  $iNewPictureNumber = 0;
  for ($i=0; $i<$iPictureNumber; $i++)
    if (spgm_IsNew($strPathToGalleries.'/'.$arrPictureFilenames[$i]) )
      $iNewPictureNumber++;

  spgm_Trace(
    '<p>function spgm_GetGalleryInfo</p>'."\n"
    .'strGalleryId: '.$strGalleryId.'<br />'."\n"
    .'iPictureNumber: '.$iPictureNumber.'<br />'."\n"
    .'strPathToGalleries: '.$strPathToGalleries.'<br />'."\n"
  );

  $arrGalleryInfo[0] = $iPictureNumber;
  $arrGalleryInfo[1] = $iNewPictureNumber;
  if ($cfg['conf']['galleryIconType'] == GALICON_RANDOM && $iPictureNumber > 0)
    @$arrGalleryInfo[2] = $arrPictureFilenames[rand(0, $iPictureNumber - 1)];
  else $arrGalleryInfo[2] = '';
  return $arrGalleryInfo;
}



###############################################################################
# Callback function used to sort galleries/pictures against modification date
# The two parameters are automatically passed by the usort() function

function spgm_CallbackCompareMTime($strFilePath1, $strFilePath2) {

  global $cfg;

  if ( !strcmp($strFilePath1, $strFilePath2) ) return 0;

  return
    ( filemtime($cfg['global']['tmpPathToPics'].$strFilePath1)
    > filemtime($cfg['global']['tmpPathToPics'].$strFilePath2)
    ) ? 1 : -1;
}



################################################################################
# Creates a sorted array containing first level sub-galleries of a given gallery
# $galid - the gallery ID to introspect
# $display - boolean indicating that galleries will be rendered and that sort
#            options consequently have to be turned on
# returns: a sorted array containing the sub-gallery filenames for the given
#          gallery

function spgm_CreateGalleryArray($strGalleryId, $bToBeDisplayed) {

  global $cfg;

  $strPathToGallery = DIR_GAL.$strGalleryId;

  spgm_Trace(
    '<p>function spgm_CreateGalleryArray</p>'."\n"
    .'strGalleryId: '.$strGalleryId.'<br />'."\n"
    .'strPathToGallery: '.$strPathToGallery.'<br />'."\n"
    .'bToBeDisplayed: '.$bToBeDisplayed.'<br />'."\n"
  );

  if ( spgm_IsGallery($strGalleryId) ) $_hDir = @opendir($strPathToGallery);
  else spgm_Error($strGalleryId.': '.ERRMSG_UNKNOWN_GALLERY);
  if ($strGalleryId != '') $strGalleryId .= '/'; // little hack

  if ($strPathToGallery == DIR_GAL) $strSortFilePath = $strPathToGallery.FILE_GAL_SORT;
  else $strSortFilePath = $strPathToGallery.'/'.FILE_GAL_SORT;

  $arrSubGalleries = array();
  if ( spgm_CheckPerms($strSortFilePath) ) {
    $strGalleryNames = file($strSortFilePath);
    $iGalleryNumber = count($strGalleryNames);
    for ($i=0; $i<$iGalleryNumber; $i++) {
      $strGalleryName = trim($strGalleryNames[$i]);
      if (spgm_IsGallery($strGalleryId.$strGalleryName))
        $arrSubGalleries[] = $strGalleryName;
    }
  } else {
    while ($_strFilename = readdir($_hDir)) {
      if ($_strFilename != '.' && $_strFilename != '..' && spgm_IsGallery($strGalleryId.$_strFilename))
        $arrSubGalleries[] = $_strFilename;
    }
    closedir($_hDir);

    // Apply sort options if needed
    if ($bToBeDisplayed) {
      if (count($arrSubGalleries) > 0) {
        if ($cfg['conf']['gallerySortType'] == SORTTYPE_NAME) {
          if ($cfg['conf']['gallerySortOptions'] == SORT_DESCENDING) rsort($arrSubGalleries);
          else sort($arrSubGalleries);
        } else if ($cfg['conf']['gallerySortType'] == SORTTYPE_CREATION_DATE) {
          $cfg['global']['tmpPathToPics'] = DIR_GAL.$strGalleryId;
          usort($arrSubGalleries, 'spgm_CallbackCompareMTime'); // TODO: omit it ?
          if ($cfg['conf']['gallerySortOptions'] == SORT_DESCENDING)
            $arrSubGalleries = array_reverse($arrSubGalleries);
        }
      }
    }
  }
  return $arrSubGalleries;
}


################################################################################
# Creates a sorted array of the pictures to diplay for a given gallery
# $galid - the gallery ID (must be always valid)
# $filter - the filter that defines the pictures to include in the list
# $display - boolean indicating that thumbnails will be rendered and that sort
#            options consequently have to be turned on
# returns: a sorted array containing the thumbnails' basenames of the gallery

function spgm_CreatePictureArray($strGalleryId, $strFilterFlags, $bForDisplayPurpose) {

  global $cfg;

  $strPathToGallery = DIR_GAL.$strGalleryId.'/';
  $hDir=opendir($strPathToGallery);

  spgm_Trace(
    '<p>function spgm_CreatePictureArray</p>'."\n"
    .'strGalleryId: '.$strGalleryId.'<br />'."\n"
    .'strFilterFlags: '.$strFilterFlags.'<br />'."\n"
    .'strPathToGallery: '.$strPathToGallery.'<br />'."\n"
    .'bForDisplayPurpose: '.$bForDisplayPurpose.'<br />'."\n"
  );

  $arrPictureFilenames = array();
  $strPathToSortFile = $strPathToGallery.FILE_PIC_SORT;
  if ( spgm_CheckPerms($strPathToSortFile) ) {
    $arrSortedPictureFilenames = file($strPathToSortFile);
    $_max = count($arrSortedPictureFilenames);
    for ($i=0; $i<$_max; $i++) {
      $strPictureName = trim($arrSortedPictureFilenames[$i]);
      if ( spgm_IsPicture($strPictureName, $strGalleryId) ) {
        if ( strstr($strFilterFlags, PARAM_VALUE_FILTER_NEW) ) {
          if ( spgm_IsNew($strPathToGallery.$strPictureName) )
            $arrPictureFilenames[] = $strPictureName;
        } else $arrPictureFilenames[] = $strPictureName;
      }
    }
  }
  else {
    while ($strFileName = readdir($hDir)) {
      if ( spgm_IsPicture($strFileName, $strGalleryId) ) {
        if ( strstr($strFilterFlags, PARAM_VALUE_FILTER_NEW) ) {
          if ( spgm_IsNew($strPathToGallery.$strFileName) )
            $arrPictureFilenames[] = $strFileName;
        } else $arrPictureFilenames[] = $strFileName;
      }
    }
    closedir($hDir);

    // Apply sort optionsif needed
    if ($bForDisplayPurpose) {
      if (count($arrPictureFilenames) > 0) {
        if ($cfg['conf']['pictureSortType'] == SORTTYPE_NAME) {
          if ($cfg['conf']['pictureSortOptions'] == SORT_DESCENDING) rsort($arrPictureFilenames);
          else sort($arrPictureFilenames);
        } else if ($cfg['conf']['pictureSortType'] == SORTTYPE_CREATION_DATE) {
          $cfg['global']['tmpPathToPics'] = $strPathToGallery;
          usort($arrPictureFilenames, 'spgm_CallbackCompareMTime'); // TODO: omit it ?
          if ($cfg['conf']['pictureSortOptions'] == SORT_DESCENDING)
            $arrPictureFilenames = array_reverse($arrPictureFilenames);
        }
      }
    }
  }

  return $arrPictureFilenames;
}


################################################################################
function spgm_DisplayThumbnailNavibar($iCurrentPageIndex, $iPageNumber, $strGalleryId, $strFilterFlags) {

  global $cfg;

  spgm_Trace(
    '<p>function spgm_DisplayThumbnailNavibar</p>'."\n"
    .'iCurrentPageIndex: '.$iCurrentPageIndex.'<br />'."\n"
    .'iPageNumber: '.$iPageNumber.'<br />'."\n"
    .'strGalleryId: '.$strGalleryId.'<br />'."\n"
  );

  // display left arrows
  if ($iCurrentPageIndex > 1) {
    $iPreviousPageIndex = $iCurrentPageIndex - 1;
    print '<a href="'.$cfg['global']['documentSelf'].'?'.PARAM_NAME_GALID.'='.$strGalleryId.'&amp;'.PARAM_NAME_PAGE.'=1&amp;'.PARAM_NAME_FILTER.'='.ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags).$cfg['global']['URLExtraParams'].'">'.$cfg['theme']['firstPageIcon'].'</a> ';
    print '&middot; ';
    print '<a href="'.$cfg['global']['documentSelf'].'?'.PARAM_NAME_GALID.'='.$strGalleryId.'&amp;'.PARAM_NAME_PAGE.'='.$iPreviousPageIndex.'&amp;'.PARAM_NAME_FILTER.'='.ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags).$cfg['global']['URLExtraParams'].'">'.$cfg['theme']['previousPageIcon'].'</a> ';
  } else {
    print ' '.$cfg['theme']['firstPageIconNot'];
    print ' &middot; '.$cfg['theme']['previousPageIconNot'];
  }
  print ' &middot; ';

  // display the page numbers
  for ($i = 1; $i <= $iPageNumber; $i++) {
    if ($i != $iCurrentPageIndex)
      print '<a href="'.$cfg['global']['documentSelf'].'?'.PARAM_NAME_GALID.'='.$strGalleryId.'&amp;'.PARAM_NAME_PAGE.'='.$i.'&amp;'.PARAM_NAME_FILTER.'='.ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags).$cfg['global']['URLExtraParams'].'" class="navi">'.$i.'</a>';
    else print $i; // don't make it an anchor if this is the current page
    if ($i < $iPageNumber) print ' &middot; ';
  }

  // display right arrows
  print ' &middot;';
  if ($iCurrentPageIndex < $iPageNumber) {
    $iNextPageIndex = $iCurrentPageIndex + 1;
    print ' <a href="'.$cfg['global']['documentSelf'].'?'.PARAM_NAME_GALID.'='.$strGalleryId.'&amp;'.PARAM_NAME_PAGE.'='.$iNextPageIndex.'&amp;'.PARAM_NAME_FILTER.'='.ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags).$cfg['global']['URLExtraParams'].'">'.$cfg['theme']['nextPageIcon'].'</a> ';
    print '&middot; ';
    print '<a href="'.$cfg['global']['documentSelf'].'?'.PARAM_NAME_GALID.'='.$strGalleryId.'&amp;'.PARAM_NAME_PAGE.'='.$iPageNumber.'&amp;'.PARAM_NAME_FILTER.'='.ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags).$cfg['global']['URLExtraParams'].'">'.$cfg['theme']['lastPageIcon'].'</a> ';
  } else {
    print ' '.$cfg['theme']['nextPageIconNot'];
    print ' &middot; '.$cfg['theme']['lastPageIconNot'];
  }
}

################################################################################
function spgm_DisplayFilterToggles($strGalleryId, $strFilterFlags, $arrGalleryInfo) {

  global $cfg;

  spgm_Trace(
    '<p>function spgm_DisplayFilterToggles</p>'."\n"
    .'strGalleryId: '.$strGalleryId.'<br />'."\n"
    .'strFilterFlags: '.$strFilterFlags.'<br />'."\n"
  );

  $strHtmlToggles = '';
  $bFilterNewOn = strstr($strFilterFlags, PARAM_VALUE_FILTER_NEW);
  if (($arrGalleryInfo[1] > 0 && $arrGalleryInfo[0] != $arrGalleryInfo[1]) || $bFilterNewOn) {
    if ( $bFilterNewOn ) {
      $strHtmlToggles .= '<a href="'.$cfg['global']['documentSelf'].'?'.PARAM_NAME_GALID.'='.$strGalleryId.'&amp;'.PARAM_NAME_FILTER.'=';
      $strHtmlToggles .= str_replace(PARAM_VALUE_FILTER_NEW, '', $strFilterFlags).$cfg['global']['URLExtraParams'].'">';
      $strHtmlToggles .= $cfg['locale']['filterAll'].'</a>';
    }
    else {
      $strHtmlToggles .= '<a href="'.$cfg['global']['documentSelf'].'?'.PARAM_NAME_GALID.'='.$strGalleryId.'&amp;'.PARAM_NAME_FILTER.'='.ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags);
      $strHtmlToggles .= PARAM_VALUE_FILTER_NEW.$cfg['global']['URLExtraParams'].'">'.$cfg['locale']['filterNew'].'</a>';
    }

    print ' &nbsp;&nbsp;<span class="'.CLASS_SPAN_FILTERS.'">['.$cfg['locale']['filter'].' &raquo; '.$strHtmlToggles.']</span>'."\n";
  }
}


################################################################################
# Prerequisite: spgm_IsGallery($galid) == true

function spgm_DisplayGalleryNavibar($strGalleryId, $strFilterFlags, $mixPictureId = '', $arrPictureFilenames) {

  global $cfg;

  spgm_Trace(
    '<p>function spgm_DisplayGalleryNavibar</p>'."\n"
    .'strGalleryId: '.$strGalleryId.'<br />'."\n"
    .'strFilterFlags: '.$strFilterFlags.'<br />'."\n"
    .'mixPictureId: '.$mixPictureId.'<br />'."\n"
  );

  $arrExplodedPathToGallery = explode('/', $strGalleryId);

  // display main gallery link
  print '    <div class="'.CLASS_DIV_GALHEADER.'">'."\n";
  print '      <a href="'.$cfg['global']['documentSelf'].'?';
  if ($cfg['global']['propagateFilters']) print PARAM_NAME_FILTER.'='.ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags);
  print $cfg['global']['URLExtraParams'].'" class="'.CLASS_TD_GALITEM_TITLE.'">';
  if ( $cfg['theme']['gallerySmallIcon'] != '' ) {
    print $cfg['theme']['gallerySmallIcon'];
  } else {
    print $cfg['locale']['rootGallery'];
  }
  print '</a>';

  // display each gallery of the hierarchy
  $strHtmlGalleryLink = $arrExplodedPathToGallery[0]; // to avoid the first '/'
  $_max = count($arrExplodedPathToGallery);
  $_strGalleryId = '';

  for ($i=0; $i<$_max; $i++) {
    $_strGalleryId .= $arrExplodedPathToGallery[$i].'/';
    $_strPathToGallery = DIR_GAL.$_strGalleryId;
    $_strPathToGalleryTitle = $_strPathToGallery.FILE_GAL_TITLE;
    $strHtmlGalleryName = '';
    if (spgm_CheckPerms($_strPathToGalleryTitle)) {
      $arrTitle = file($_strPathToGalleryTitle);
      $strHtmlGalleryName = $arrTitle[0];
    } else {
      $strHtmlGalleryName = ereg_replace('_', ' ', $arrExplodedPathToGallery[$i]);
    }

    print ' &raquo; ';

    if ($i < ($_max - 1)) {
      print '<a href="'.$cfg['global']['documentSelf'].'?'.PARAM_NAME_GALID.'='.$strHtmlGalleryLink;
      if ($cfg['global']['propagateFilters'])
        print '&amp;'.PARAM_NAME_FILTER.'='.ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags);
      print $cfg['global']['URLExtraParams'].'" ';
      print 'class="'.CLASS_DIV_GALHEADER.'">'.$strHtmlGalleryName.'</a>';
      $strHtmlGalleryLink .= '/'.$arrExplodedPathToGallery[$i+1];
    } else {
      // Final gallery display
      $iCurrentPageIndex = 1;

      if ( strstr($strFilterFlags, PARAM_VALUE_FILTER_NOTHUMBS)
           || strstr($strFilterFlags, PARAM_VALUE_FILTER_SLIDESHOW) ) {
        if ($mixPictureId == '') {
          print $strHtmlGalleryName;
        } else {
          $iCurrentPageIndex = ((int)($mixPictureId / $cfg['conf']['thumbnailsPerPage'])) + 1;
          print '<a href="'.$cfg['global']['documentSelf'].'?'.PARAM_NAME_GALID.'='.$strHtmlGalleryLink;
          print '&amp;'.PARAM_NAME_PAGE.'='.$iCurrentPageIndex.'&amp;'.PARAM_NAME_FILTER.'='.ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags).$cfg['global']['URLExtraParams'].'"';
          print ' class="'.CLASS_DIV_GALHEADER.'">'.$strHtmlGalleryName.'</a>';
        }
      } else {
        print $strHtmlGalleryName;
      }
    }
  }

  // Notify if we are in "new picture mode"
  if ( strstr($strFilterFlags, PARAM_VALUE_FILTER_NEW) )
    print ' ('.$cfg['locale']['newPictures'].')';

  // Link to slideshow mode
  if ($cfg['conf']['enableSlideshow'] == true) {
    if ( ! strstr($strFilterFlags, PARAM_VALUE_FILTER_SLIDESHOW)
         && count($arrPictureFilenames) > 0 ) {
      print ' [<a href="'.$cfg['global']['documentSelf'].'?';
      print PARAM_NAME_GALID.'='.$strHtmlGalleryLink;
      print '&amp;'.PARAM_NAME_PAGE.'='.$iCurrentPageIndex;
      print '&amp;'.PARAM_NAME_PICID.'=0';
      print '&amp;'.PARAM_NAME_FILTER.'='.ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags).PARAM_VALUE_FILTER_SLIDESHOW.$cfg['global']['URLExtraParams'].'"';
      print ' class="'.CLASS_DIV_GALHEADER.'">'.$cfg['locale']['filterSlideshow'];
      print '</a>]';
    }
  }


  print "\n".'    </div>'."\n";

}


################################################################################
# Recursive function to display all galleries as a hierarchy

function spgm_DisplayGalleryHierarchy($strGalleryId, $iGalleryDepth, $strFilterFlags) {

  global $cfg;

  $strPathToGallery = DIR_GAL.$strGalleryId;

  spgm_Trace(
    '<p>function spgm_DisplayGalleryHierarchy</p>'."\n"
    .'strGalleryId: '.$strGalleryId.'<br />'."\n"
    .'iGalleryDepth: '.$iGalleryDepth.'<br />'."\n"
    .'strFilterFlags: '.$strFilterFlags.'<br />'."\n"
    .'strPathToGallery: '.$strPathToGallery.'<br />'."\n"
  );

  $strHtmlOffset = '';

  // check for super gallery.
  if ($strGalleryId == '') {
    $strPathToSuperGallery = '';
  }
  else {
    $strPathToSuperGallery = $strGalleryId.'/';
    for ($i=0; $i < $iGalleryDepth; $i++)
      $strHtmlOffset .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
  }

  # 'new' label tuning according to the actual new item
  if ($cfg['theme']['newItemIcon'] != '') {
    $strHtmlNewGallery = $cfg['theme']['newItemIcon'];
    $strHtmlNewPictures = $cfg['theme']['newItemIcon'];
    $strNewPicture = $cfg['theme']['newItemIcon'];
  } else {
    $strHtmlSpanNewItem = '<span style="color: #ffd600">';
    $strHtmlNewGallery = $strHtmlSpanNewItem.$cfg['locale']['newGallery'].'</span>';
    $strHtmlNewPictures = $strHtmlSpanNewItem.$cfg['locale']['newPictures'].'</span>';
    $strNewPicture = $strHtmlSpanNewItem.$cfg['locale']['newPicture'].'</span>';
  }

  $arrSubGalleryFilenames = spgm_CreateGalleryArray($strGalleryId, true);
  $_max = count($arrSubGalleryFilenames);

  if ($iGalleryDepth == 1 && $_max > 0) {
    print '<table class="'.CLASS_TABLE_GALLISTING_GRID.'">'."\n";
    print '<tr>'."\n";
  }

  for ($i=0; $i<$_max; $i++) {
    $strGalleryName = $arrSubGalleryFilenames[$i]; //*
    $strPathToSubGallery = $strPathToSuperGallery.$strGalleryName; //*
    $strPathToGalleryTitle = $strPathToGallery.'/'.$strGalleryName.'/'.FILE_GAL_TITLE;
    $strGalleryThumbnailBasename = DIR_GAL.$strPathToSuperGallery.PREF_THUMB.$strGalleryName;
    $strHtmlGalleryName = '';
    if (spgm_CheckPerms($strPathToGalleryTitle)) {
      $arrTitle = file($strPathToGalleryTitle);
      $strHtmlGalleryName = $arrTitle[0];
    } else {
      $strHtmlGalleryName = ereg_replace('_', ' ', $strGalleryName);
    }
    $arrPictureFilenames = spgm_CreatePictureArray($strPathToSubGallery, '', false); // no filter is provided to get all the pictures
    $arrGalleryInfo = spgm_GetGalleryInfo($strPathToSubGallery, $arrPictureFilenames);
    $iPictureNumber = $arrGalleryInfo[0];
    $iNewPictureNumber = $arrGalleryInfo[1];
    $strRandomPictureFilename = $arrGalleryInfo[2];

    // should never happen
    if ($iPictureNumber < 0 || $iNewPictureNumber < 0)
      spgm_Error('Error while generating gallery ' + ERRMSG_INVALID_NUMBER_OF_PICTURES);

    else {
      if ($cfg['conf']['thumbnailsPerPage'] > 0) $strUrlParamPage = '&amp;'.PARAM_NAME_PAGE.'=1';
      if ($iPictureNumber == 0) $strHtmlPictureNumber = '';
      else {
        if ($iPictureNumber > 1) $strHtmlPictureNumber = '&nbsp;&nbsp;['.$iPictureNumber.' '.$cfg['locale']['pictures'];
        else $strHtmlPictureNumber = '&nbsp;&nbsp;['.$iPictureNumber.' '.$cfg['locale']['picture'];
        $bAllPicturesNew = ($iPictureNumber == $iNewPictureNumber);
        if ($bAllPicturesNew)
          $strHtmlPictureNumber = $strHtmlNewGallery.' '.$strHtmlPictureNumber;
        if ($iNewPictureNumber>0  && !$bAllPicturesNew) {
          $strHtmlPictureNumber .= ' - '.$iNewPictureNumber.' <a href="'.$cfg['global']['documentSelf'].'?'.PARAM_NAME_GALID.'='.$strPathToSubGallery;

          $strHtmlPictureNumber .= '&amp;'.PARAM_NAME_FILTER.'=';
          if ($cfg['global']['propagateFilters']) {
            $strHtmlPictureNumber .= ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags);
          }
          if (! strstr($strFilterFlags, PARAM_VALUE_FILTER_NEW) ) $strHtmlPictureNumber .= PARAM_VALUE_FILTER_NEW;

          $strHtmlPictureNumber .=  $cfg['global']['URLExtraParams'].'">';
          if ($iNewPictureNumber == 1) $strHtmlPictureNumber .= $strNewPicture.'</a>';
          else $strHtmlPictureNumber .= $strHtmlNewPictures.'</a>';
        }
        $strHtmlPictureNumber .= ']';
      }

      if ($iGalleryDepth <= 1) {
        if (
            ($i % $cfg['conf']['galleryListingCols'] == 0)
            && ($i != 0)
        )
        print '      </tr>'."\n".'      <tr>'."\n";
        print '  <td class="'.CLASS_TD_GALLISTING_CELL.'">'."\n";
      }

      print '    <table class="'.CLASS_TABLE_GALITEM.'">'."\n";
      print '      <tr>'."\n";

      // display the gallery icon
      $iRowSpan = ($cfg['conf']['galleryCaptionPos'] == BOTTOM) ? 1 : 2;
      print '        <td rowspan="'.$iRowSpan.'" valign="top" class="'.CLASS_TD_GALITEM_ICON.'">'."\n";
      if ($strHtmlOffset != '') print '    '.$strHtmlOffset."\n";
      print '          <a href="'.$cfg['global']['documentSelf'].'?'.PARAM_NAME_GALID.'='.$strPathToSubGallery;
      if ($cfg['global']['propagateFilters']) print '&amp;'.PARAM_NAME_FILTER.'='.str_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', str_replace(PARAM_VALUE_FILTER_NEW, '', $strFilterFlags));
      print $cfg['global']['URLExtraParams'].'" class="'.CLASS_TD_GALITEM_TITLE.'">';
      // no '\n' above to prevent trailing whitespaces within the link

      // TODO: clean up the following part

      $bGalleryThumbnailFound = false;
      $iSupportedExtensionNumber = count($cfg['global']['supportedExtensions']);
      for ($j=0; $j<$iSupportedExtensionNumber; $j++) {
        $strGalleryThumbnailFilename = $strGalleryThumbnailBasename.$cfg['global']['supportedExtensions'][$j];
        if ( spgm_CheckPerms($strGalleryThumbnailFilename) ) {
          $arrPictureSize = getimagesize($strGalleryThumbnailFilename);
          print '<img src="'.$strGalleryThumbnailFilename.'" width="'.$arrPictureSize[0].'"';
          print ' height="'.$arrPictureSize[1].'"';
          print ' alt="" class="'.CLASS_IMG_GALICON.'" />';
          $bGalleryThumbnailFound = true;
          break;
        }
      }

      if (! $bGalleryThumbnailFound) {
        if ($strRandomPictureFilename != '') {
          $strGalleryThumbnailFilename = DIR_GAL.$strPathToSubGallery.'/'.PREF_THUMB.$strRandomPictureFilename;
          $arrPictureSize = getimagesize($strGalleryThumbnailFilename);
          if ($cfg['conf']['galleryIconHeight'] != ORIGINAL_SIZE)
            $strHtmlHeight = 'height="'.$cfg['conf']['galleryIconHeight'].'"';
          else {
            if ($cfg['conf']['galleryIconWidth'] != ORIGINAL_SIZE) {
              $iHeight = (int)$arrPictureSize[1]*($cfg['conf']['galleryIconWidth']/$arrPictureSize[0]);
              $strHtmlHeight = 'height="'.$iHeight.'"';
            }
            else $strHtmlHeight = 'height="'.$arrPictureSize[1].'"';
          }

          if ($cfg['conf']['galleryIconWidth'] != ORIGINAL_SIZE)
            $strHtmlWidth = 'width="'.$cfg['conf']['galleryIconWidth'].'"';
          else {
            if ($cfg['conf']['galleryIconHeight'] != ORIGINAL_SIZE) {
              $iWidth = (int)$arrPictureSize[0]*($cfg['conf']['galleryIconHeight']/$arrPictureSize[1]);
              $strHtmlWidth = 'width="'.$iWidth.'"';
            }
            else $strHtmlWidth = 'width="'.$arrPictureSize[0].'"';
          }

          print '<img src="'.$strGalleryThumbnailFilename.'" '.$strHtmlHeight.' '.$strHtmlWidth;
          print ' alt="" class="'.CLASS_IMG_GALICON.'" />';
        }
        else {
          if ($cfg['conf']['galleryIconType'] == GALICON_NONE) {
            $fnameGalleryIcon = $cfg['theme']['gallerySmallIcon'];
          } else {
            $fnameGalleryIcon = $cfg['theme']['galleryBigIcon'];
          }

          ($fnameGalleryIcon != '') ? print $fnameGalleryIcon : print '&raquo;';
        }
      }

      print '</a>'."\n";
      print '        </td>'."\n";

      if ($cfg['conf']['galleryCaptionPos'] == BOTTOM)
        print '      </tr>'."\n".'      <tr>'."\n";

      // display the gallery title
      print '        <td class="'.CLASS_TD_GALITEM_TITLE.'">'."\n";
      print '          <a href="'.$cfg['global']['documentSelf'].'?'.PARAM_NAME_GALID.'='.$strPathToSubGallery;
      if ($cfg['global']['propagateFilters']) print '&amp;'.PARAM_NAME_FILTER.'='.str_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', str_replace(PARAM_VALUE_FILTER_NEW, '', $strFilterFlags));
      print $cfg['global']['URLExtraParams'].'" class="'.CLASS_TD_GALITEM_TITLE.'">'.$strHtmlGalleryName.'</a> '.$strHtmlPictureNumber.' '."\n";
      print '        </td>'."\n";
      print '      </tr>'."\n";

      // display the gallery caption
      print '      <tr>'."\n";
      print '        <td class="'.CLASS_TD_GALITEM_CAPTION.'">'."\n";
      $strPathToGalleryCaption = $strPathToGallery.'/'.$strGalleryName.'/'.FILE_GAL_CAPTION;
      if (spgm_CheckPerms($strPathToGalleryCaption)) { // check perms
        print '        ';
        include($strPathToGalleryCaption);
      }
      print '        </td>'."\n";
      print '      </tr>'."\n";
      print '    </table>'."\n";
    }

    // TODO check this: one test ?
    if ($cfg['conf']['subGalleryLevel'] == 0) spgm_DisplayGalleryHierarchy($strPathToSubGallery, $iGalleryDepth+1, $strFilterFlags);
    else if ($iGalleryDepth < $cfg['conf']['subGalleryLevel'] - 1) spgm_DisplayGalleryHierarchy($strPathToSubGallery, $iGalleryDepth+1, $strFilterFlags);

    if ($iGalleryDepth <= 1)
        print '  </td>'."\n";

  } // endfor

  if ($iGalleryDepth == 1 && $_max > 0) {
    print ' </tr>'."\n";
    print '</table>'."\n";
  }
}

################################################################################
function spgm_DisplayPicture($strGalleryId, $iPictureId, $strFilterFlags) {

  global $cfg;

  $arrPictureFilenames = spgm_CreatePictureArray($strGalleryId, $strFilterFlags, true);
  $iPictureNumber = count($arrPictureFilenames);
  $strPathToPictures = DIR_GAL.$strGalleryId.'/';
  $strPictureFilename = $arrPictureFilenames[$iPictureId];
  $_strFileExtension = strrchr($strPictureFilename, '.');
  $strPictureBasename = substr($strPictureFilename, 0, -strlen($_strFileExtension));
  $strPictureURL = $strPathToPictures.$strPictureFilename;
  $strCaptionURL = $strPictureURL.EXT_PIC_CAPTION; // DEPRECATED
  $strGalleryName = ereg_replace('_', ' ', $strGalleryId);
  $strGalleryName = ereg_replace('/', ' &raquo; ', $strGalleryName);
  $bSlideshowMode = strstr($strFilterFlags, PARAM_VALUE_FILTER_SLIDESHOW) != FALSE;

  if ($cfg['conf']['thumbnailsPerPage'] != 0) {
    $iPageNumber = $iPictureNumber / $cfg['conf']['thumbnailsPerPage'];
    if ($iPageNumber > (int)($iPictureNumber / $cfg['conf']['thumbnailsPerPage']))
      $iPageNumber = (int)++$iPageNumber;
  }

  spgm_Trace(
    '<p>function spgm_DisplayPicture</p>'."\n"
    .'strGalleryId: '.$strGalleryId.'<br />'."\n"
    .'strPictureFilename: '.$strPictureFilename.'<br />'."\n"
    .'strPathToPictures: '.$strPathToPictures.'<br />'."\n"
    .'strPictureURL: '.$strPictureURL.'<br />'."\n"
  );


  if (($iPictureId < 0) || ($iPictureId > $iPictureNumber-1) || $iPictureId == '')
    spgm_Error(ERRMSG_UNKNOWN_PICTURE);

  if (! spgm_IsGallery($strGalleryId) )
    spgm_Error(ERRMSG_UNKNOWN_GALLERY);


  if ( spgm_IsPicture($strPictureFilename, $strGalleryId) ) {
    $arrPictureDim = getimagesize($strPictureURL);
    $iPreviousPictureId = $iPictureId - 1;
    $iNextPictureId = $iPictureId + 1;

    // always display the gallery header
    //spgm_DisplayGalleryNavibar($strGalleryId, $strFilterFlags, $iPictureId, $arrPictureFilenames);

    // thumbnails are only displayed if wanted
    if ( ! strstr($strFilterFlags, PARAM_VALUE_FILTER_NOTHUMBS)
           && ! $bSlideshowMode  ) {
      spgm_DisplayThumbnails($strGalleryId, $arrPictureFilenames, $iPictureId, '', $strFilterFlags);
    }

    // Prepare layout for stuff left
    print '<br /><br />'."\n";
    print '<table cellspacing="0" class="'.CLASS_TABLE_PICTURE.'">'."\n";


    ///Previous and Next Links at top.   BMS 4/30/06
    print '<div><table width="100%"><tr><td width="33%" align="left">';
    if ($iPreviousPictureId >= 0)
		print '    <a href="'.$cfg['global']['documentSelf'].'?'.PARAM_NAME_GALID.'='.$strGalleryId.'&amp;'.PARAM_NAME_PICID.'='.$iPreviousPictureId.'&amp;'.PARAM_NAME_FILTER.'='.ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags).$cfg['global']['URLExtraParams'].'#pic">Previous</a> ';
	print '</td><td align="center" class="recordnum">';

//	$cfg['locale']['pictureNaviBar'] = ereg_replace(PATTERN_CURRENT_PIC, "$iNextPictureId", $cfg['locale']['pictureNaviBar']);
//	$cfg['locale']['pictureNaviBar'] = ereg_replace(PATTERN_NB_PICS, "$iPictureNumber", $cfg['locale']['pictureNaviBar']);
//	print ' '.$cfg['locale']['pictureNaviBar'].' ';

	print '</td><td width="33%" align="left">';
	if ($iNextPictureId < $iPictureNumber)
		print '<a href="'.$cfg['global']['documentSelf'].'?'.PARAM_NAME_GALID.'='.$strGalleryId.'&amp;'.PARAM_NAME_PICID.'='.$iNextPictureId.'&amp;'.PARAM_NAME_FILTER.'='.ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags).$cfg['global']['URLExtraParams'].'#pic">Next</a>'."\n";
	print '</td></tr></table></div>';



    // Client side zoom buttons
    if (count($cfg['conf']['zoomFactors']) > 0) {
      print '</tr>'."\n".'<tr>'."\n".'  <td class="'.CLASS_TD_ZOOM_FACTORS.'">'."\n";
      for ($i=0; $i<count($cfg['conf']['zoomFactors']); $i++) {
        $iHeight = (int)($arrPictureDim[1]*$cfg['conf']['zoomFactors'][$i]/100);
        $iWidth = (int)($arrPictureDim[0]*$cfg['conf']['zoomFactors'][$i]/100);
        print '<input type="button" class="'.CLASS_BUTTON_ZOOM_FACTORS.'" value=" '.$cfg['conf']['zoomFactors'][$i].'% " ';
        print 'onClick="document.getElementById('."'".ID_PICTURE."'".').setAttribute('."'".'height'."'".', '.$iHeight.'); ';
        print 'document.getElementById('."'".ID_PICTURE."'".').setAttribute('."'".'width'."'".', '.$iWidth.'); ';
        print 'document.getElementById('."'".ID_PICTURE_NAVI."'".').scrollIntoView();">'."\n";
      }
      print "\n".'  </td>'."\n".'</tr>'."\n";
    }

    // EXIF data
    if ( count($cfg['conf']['exifInfo']) > 0 ) {
      if ( extension_loaded('exif') ) { // ... where available
        print '<tr><td>'."\n";
        $strExifData = spgm_LoadExif($strPictureURL);
        print '[<span onmouseover="return overlib(\''.$strExifData.'\', CAPTION, \''.$cfg['locale']['exifHeading'].' '.$strPictureFilename.'\', STICKY);" onmouseout="return nd();" style="color: #2e408d; font-weight: bold; font-size: 9pt;">Exif</span>]';
        print '</td></tr>'."\n";
      }
    }

    // Load pictures if slideshow mode is enabled
    if ( $bSlideshowMode ) {
      print '<script language="Javascript">'."\n";
      $iPictureNumber = count( $arrPictureFilenames );
      $_dim = array();
      $_strPicturePath = '';
      for ($i=0; $i<$iPictureNumber; $i++) {
        $_strPicturePath = $strPathToPictures.$arrPictureFilenames[$i];
        $_dim = getimagesize($_strPicturePath);
        $_strPictureCaption = '';
	if ( isset($cfg['captions'][$arrPictureFilenames[$i]]) ) {
          $_strPictureCaption = $cfg['captions'][$arrPictureFilenames[$i]];
        }
        print '  addPicture(\''.$_strPicturePath.'\', \''.addslashes($_strPictureCaption).'\', '.$_dim[0].', '.$_dim[1].');'."\n";
      }
      print '</script>'."\n";
    }


    // Eventually display the picture
    print '<tr>'."\n";
    print '  <td class="'.CLASS_TD_PICTURE_PIC.'">'."\n";

    // Overlib hidden span for EXIF data
    print '  <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>'."\n";

    // if drop shadows are enabled, draw the beginning of the table
    if ($cfg['conf']['enableDropShadows']) {
      print '  <table class="'.CLASS_TABLE_SHADOWS.'">'."\n";
      print '    <tr>'."\n";
      print '      <td class="'.CLASS_TD_SHADOWS_MAIN.'">'."\n";
    }

    if (! ($iNextPictureId < $iPictureNumber) ) $iNextPictureId = 0; // to link to the appropriate next pic
    if ( ! $bSlideshowMode ) {
      print '      <a href="'.$cfg['global']['documentSelf'].'?';
      print PARAM_NAME_GALID.'='.$strGalleryId.'&amp;';
      print PARAM_NAME_PICID.'='.$iNextPictureId.'&amp;';
      print PARAM_NAME_FILTER.'='.ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags).$cfg['global']['URLExtraParams'].'#pic">';
    }

    print '<img id="'.ID_PICTURE.'" src="'.$strPictureURL.'" width="'.$arrPictureDim[0].'" height="'.$arrPictureDim[1].'" alt="'.$strPictureURL;
    print '" class="'.CLASS_IMG_PICTURE.'" align="center" />';
    if ( ! $bSlideshowMode ) {
      print '</a>'."\n";
    }

    // if drop shadows are enabled, draw the end of the table
    if ($cfg['conf']['enableDropShadows']) {
      print '      </td>'."\n";
      print '      <td class="'.CLASS_TD_SHADOWS_RIGHT.'">&nbsp;</td>'."\n";
      print '    </tr>'."\n";
      print '    <tr>'."\n";
      print '      <td class="'.CLASS_TD_SHADOWS_BOTTOM.'">&nbsp;</td>'."\n";
      print '      <td class="'.CLASS_TD_SHADOWS_BOTTOMRIGHT.'">&nbsp;</td>'."\n";
      print '    </tr>'."\n";
      print '  </table>'."\n";
    }


    print '  </td>'."\n";
    print '</tr>'."\n";

    // display the picture's filename if needed
    if ($cfg['conf']['filenameWithPictures'] == true) {
      print '<tr>'."\n";
      print '  <td class="'.CLASS_TD_PICTURE_FILENAME.'">'."\n";
      print $strPictureBasename.'<br />'."\n";
      print '  </td>'."\n";
      print '</tr>'."\n";
    }

    // display the caption
    print '<tr>'."\n";
    print '  <td class="'.CLASS_TD_PICTURE_CAPTION.'">'."\n";
    if ( isset($cfg['captions'][$strPictureFilename]) ) {
      print $cfg['captions'][$strPictureFilename];
    }


// don't like their links BMS 4/30/06

//	// display the previous/next arrow section if we are not in slideshow mode
//	if ( ! $bSlideshowMode ) {
//	  print ' <tr>'."\n";
//	  print '   <td class="'.CLASS_TD_PICTURE_NAVI.'"><a name="pic" id="'.ID_PICTURE_NAVI.'"></a>'."\n";
//
//	  if ($iPreviousPictureId >= 0)
//		print '    <a href="'.$cfg['global']['documentSelf'].'?'.PARAM_NAME_GALID.'='.$strGalleryId.'&amp;'.PARAM_NAME_PICID.'='.$iPreviousPictureId.'&amp;'.PARAM_NAME_FILTER.'='.ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags).$cfg['global']['URLExtraParams'].'#pic">'.$cfg['theme']['previousPictureIcon'].'</a> ';
//
//	  //multi-language support
//	  $cfg['locale']['pictureNaviBar'] = ereg_replace(PATTERN_CURRENT_PIC, "$iNextPictureId", $cfg['locale']['pictureNaviBar']);
//	  $cfg['locale']['pictureNaviBar'] = ereg_replace(PATTERN_NB_PICS, "$iPictureNumber", $cfg['locale']['pictureNaviBar']);
//	  print ' '.$cfg['locale']['pictureNaviBar'].' ';
//
//	  if ($iNextPictureId < $iPictureNumber)
//		print '<a href="'.$cfg['global']['documentSelf'].'?'.PARAM_NAME_GALID.'='.$strGalleryId.'&amp;'.PARAM_NAME_PICID.'='.$iNextPictureId.'&amp;'.PARAM_NAME_FILTER.'='.ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags).$cfg['global']['URLExtraParams'].'#pic">'.$cfg['theme']['nextPictureIcon'].'</a>'."\n";
//	  print '  </td>'."\n".' </tr>'."\n";
//	}


    print '  </td>'."\n";
    print '</tr>'."\n";
    print '</table>'."\n";

    print '<div><table width="100%"><tr><td width="33%" align="left">';
    if ($iPreviousPictureId >= 0)
		print '    <a href="'.$cfg['global']['documentSelf'].'?'.PARAM_NAME_GALID.'='.$strGalleryId.'&amp;'.PARAM_NAME_PICID.'='.$iPreviousPictureId.'&amp;'.PARAM_NAME_FILTER.'='.ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags).$cfg['global']['URLExtraParams'].'#pic">Previous</a> ';
	print '</td><td align="center" class="recordnum">';

	$cfg['locale']['pictureNaviBar'] = ereg_replace(PATTERN_CURRENT_PIC, "$iNextPictureId", $cfg['locale']['pictureNaviBar']);
	$cfg['locale']['pictureNaviBar'] = ereg_replace(PATTERN_NB_PICS, "$iPictureNumber", $cfg['locale']['pictureNaviBar']);
	print ' '.$cfg['locale']['pictureNaviBar'].' ';

	print '</td><td width="33%" align="left">';
	if ($iNextPictureId < $iPictureNumber)
		print '<a href="'.$cfg['global']['documentSelf'].'?'.PARAM_NAME_GALID.'='.$strGalleryId.'&amp;'.PARAM_NAME_PICID.'='.$iNextPictureId.'&amp;'.PARAM_NAME_FILTER.'='.ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags).$cfg['global']['URLExtraParams'].'#pic">Next</a>'."\n";
	print '</td></tr></table></div>';



    if ( $bSlideshowMode ) {
      print '<script language="Javascript">runSlideShow();</script>'."\n";
    }

  }
  else
    spgm_Error(ERRMSG_UNKNOWN_PICTURE);

}

################################################################################
function spgm_DisplayGallery($strGalleryId, $iPageIndex, $strFilterFlags) {

  spgm_Trace(
    '<p>function spgm_DisplayGallery</p>'."\n"
    .'strGalleryId: '.$strGalleryId.'<br />'."\n"
    .'iPageIndex: '.$iPageIndex.'<br />'."\n"
    .'strFilterFlags: '.$strFilterFlags.'<br />'."\n"
  );


  if (! spgm_IsGallery($strGalleryId) )
    spgm_Error(ERRMSG_UNKNOWN_GALLERY);
  else {
    $arrPictureFilenames = spgm_CreatePictureArray($strGalleryId, $strFilterFlags, true);
    if ($iPageIndex == '') $iPageIndex = 1;

    //commented out BMS 9/19/05.  Not using sub-galleries, and don't want the tree at the top.

    //spgm_DisplayGalleryNavibar($strGalleryId, $strFilterFlags, '', $arrPictureFilenames);
    // display sub-galleries in a hierarchical manner
    //spgm_DisplayGalleryHierarchy($strGalleryId, 1, $strFilterFlags);

    if (count($arrPictureFilenames) > 0)
      spgm_DisplayThumbnails($strGalleryId, $arrPictureFilenames, '', $iPageIndex, $strFilterFlags);
    // extra vertical padding before displaying the subgalleries
    //print '<br />'."\n\n";
  }
}


################################################################################
function spgm_DisplayThumbnails($strGalleryId, $arrPictureFilenames, $iPictureId, $iPageIndex, $strFilterFlags) {

  global $cfg;

  $strPathToPictures = DIR_GAL.$strGalleryId.'/';
  $iPictureNumber = count($arrPictureFilenames);
  $iPageNumber = $iPictureNumber / $cfg['conf']['thumbnailsPerPage'];
  if ($iPageNumber > (int)($iPictureNumber / $cfg['conf']['thumbnailsPerPage'])) $iPageNumber = (int)++$iPageNumber;
  if (! isset($iPageIndex) ) {
    $iPictureOffsetStart = 0;
    $iPageFrom = 1;
  } else {
    if (($iPageIndex == '') || ($iPageIndex < 1) || ($iPageIndex > $iPageNumber)) $iPageIndex = 1;
  }

  if ($iPictureId == '') $iPictureId = -1; // so picture information are not highlighted
  else $iPageIndex = ((int)($iPictureId / $cfg['conf']['thumbnailsPerPage'])) + 1;

  $iPictureOffsetStart = ($iPageIndex-1)*$cfg['conf']['thumbnailsPerPage'];
  $iPictureOffsetStop = $iPictureOffsetStart + $cfg['conf']['thumbnailsPerPage'];
  if ($iPictureOffsetStop > $iPictureNumber) $iPictureOffsetStop = $iPictureNumber;
  $iPageFrom = $iPageIndex;

  spgm_Trace(
    '<p>function spgm_DisplayThumbnails</p>'."\n"
    .'strPathToPictures: '.$strPathToPictures.'<br />'."\n"
    .'iPictureNumber: '.$iPictureNumber.'<br />'."\n"
    .'iPictureId: '.$iPictureId.'<br />'."\n"
    .'iPictureOffsetStart: '.$iPictureOffsetStart.'<br />'."\n"
    .'iPictureOffsetStop: '.$iPictureOffsetStop.'<br />'."\n"
    .'iPageFrom: '.$iPageFrom.'<br />'."\n"
    .'iPageNumber: '.$iPageNumber.'<br />'."\n"
    .'iPageIndex: '.$iPageIndex.'<br />'."\n"
  );



  print '<table cellpadding="3" cellspacing="0" class="'.CLASS_TABLE_THUMBNAILS.'" width="100%">'."\n";
  print '<tr>'."\n";

  $iItemCounter = 0;

  for ($i = $iPictureOffsetStart; $i < $iPictureOffsetStop; $i++) {
    $strPictureFilename = $arrPictureFilenames[$i];
    $_strFileExtension = strrchr($strPictureFilename, '.');
    $strPictureBasename = substr($strPictureFilename, 0, -strlen($_strFileExtension));
    $strPictureURL = $strPathToPictures.$strPictureFilename;
    $strThumbnailFilename = PREF_THUMB.$arrPictureFilenames[$i];
    if ( defined('DIR_THUMBS') ) {
      $strThumbnailFilename = DIR_THUMBS.PREF_THUMB.$arrPictureFilenames[$i];
    }
    $strThumbnailURL = $strPathToPictures.$strThumbnailFilename;
    $arrThumbnailDim = getimagesize($strThumbnailURL);
    $iCurrentPictureIndex = $i + 1; // index that is displayed
    $strClassThumbnailThumb = CLASS_TD_THUMBNAILS_THUMB;
    $strClassImgThumbnail = CLASS_IMG_THUMBNAIL;
    if ($i == $iPictureId) {
      $strClassThumbnailThumb = CLASS_TD_THUMBNAILS_THUMB_SELECTED;
      $strClassImgThumbnail = CLASS_IMG_THUMBNAIL_SELECTED;
    }


    // new line
    if ( ($iItemCounter++ % $cfg['conf']['thumbnailsPerRow']) == 0)
      if ($iItemCounter > 1) print '</tr>'."\n".'<tr>'."\n"; // test for HTML 4.01 compatibility

    // TD opening for XHTML compliance when MODE_TRACE is on
    // TODO: valign=top does not work when new pictures reside amongst old ones
    print '  <td valign="top" class="'.$strClassThumbnailThumb.'">'."\n";
    // ...

    if ( spgm_IsNew($strPictureURL) && ! strstr($strFilterFlags, PARAM_VALUE_FILTER_NEW) ) {
      if ($cfg['theme']['newItemIcon'] != '' ) {
        $strHtmlNew = $cfg['theme']['newItemIcon'].'<br />'."\n";
      } else {
        $strHtmlNew = '<center><span style="color: #ffd600">'.$cfg['locale']['filterNew'];
        $strHtmlNew .= '</span></center>'."\n";
      }
    }
    else $strHtmlNew = '';

    $arrPictureDim = getimagesize($strPictureURL);

    // ...
    print '  '.$strHtmlNew."\n";

    // if drop shadows are enabled, draw the beginning of the table
    if ($cfg['conf']['enableDropShadows']) {
      print '  <table class="'.CLASS_TABLE_SHADOWS.'">'."\n";
      print '    <tr>'."\n";
      print '      <td class="'.CLASS_TD_SHADOWS_MAIN.'">'."\n";
    }

    if ($cfg['conf']['popupPictures']) {
      if ( ! strstr($strFilterFlags, PARAM_VALUE_FILTER_NOTHUMBS) ) {
        $strFilterFlags .= PARAM_VALUE_FILTER_NOTHUMBS;
      }

      $iWidth = $cfg['conf']['popupWidth'];
      $iHeight = $cfg['conf']['popupHeight'];
      $strURL = $cfg['global']['documentSelf'].'?'.PARAM_NAME_GALID.'='.$strGalleryId.'&amp;'.PARAM_NAME_PICID.'='.$i.'&amp;'.PARAM_NAME_FILTER.'='.ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags).$cfg['global']['URLExtraParams'].'#pic';
;

      $strJustPicture = 'false';

      if ($cfg['conf']['popupFitPicture'] == true) {
        $iWidth = $arrPictureDim[0];
        $iHeight = $arrPictureDim[1];
        $strURL = $strPictureURL;
        $strJustPicture = 'true';
      }

      print '    <a href="#?"';
      print ' onclick="popupPicture(\''.$strURL.'\', '.$iWidth.', '.$iHeight.', '.$strJustPicture.');">';

    } else {


//  Modified by BMS 4/30/06 to make the links change pictures in other frame

//      print '    <a href="'.$cfg['global']['documentSelf'].'?';
//      print PARAM_NAME_GALID.'='.$strGalleryId;
//      print '&amp;'.PARAM_NAME_PICID.'='.$i.'&amp;';
//      print PARAM_NAME_FILTER.'='.ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags).$cfg['global']['URLExtraParams'].'#pic">';

      print '    <a href="pgCurrPicFrame.php?';
      print PARAM_NAME_GALID.'='.$strGalleryId;
      print '&amp;'.PARAM_NAME_PICID.'='.$i.'&amp;';
      print PARAM_NAME_FILTER.'='.ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags).$cfg['global']['URLExtraParams'].'#pic"';
      print ' target="Main" >';



    }

    print '<img src="'.$strThumbnailURL.'" width="'.$arrThumbnailDim[0].'"';
    print ' height="'.$arrThumbnailDim[1].'" alt="'.$strThumbnailURL;
    print '" class="'.$strClassImgThumbnail.'" /></a>'."\n";

    // if drop shadows are enabled, draw the end of the table
    if ($cfg['conf']['enableDropShadows']) {
      print '      </td>'."\n";
      print '      <td class="'.CLASS_TD_SHADOWS_RIGHT.'">&nbsp;</td>'."\n";
      print '    </tr>'."\n";
      print '    <tr>'."\n";
      print '      <td class="'.CLASS_TD_SHADOWS_BOTTOM.'">&nbsp;</td>'."\n";
      print '      <td class="'.CLASS_TD_SHADOWS_BOTTOMRIGHT.'">&nbsp;</td>'."\n";
      print '    </tr>'."\n";
      print '  </table>'."\n";
    }

    print '<br />'."\n";

    // display picture extra information if wanted
    if ($cfg['conf']['filenameWithThumbnails'] == true) {
      print $strPictureBasename.'<br />';
    }
    if ($cfg['conf']['pictureInfoedThumbnails'] == true) {
      $picsize = (int) (filesize($strPictureURL) / 1024);
      print '  [ '.$arrPictureDim[0].'x'.$arrPictureDim[1].' - '.$picsize.' KB ]'."\n";
   }

    // display caption along with the thumbnail
    if ($cfg['conf']['captionedThumbnails'] == true) {
      if ( isset($cfg['captions'][PREF_THUMB.$strPictureFilename]) ) {
        print '    <div class="'.CLASS_DIV_THUMBNAILS_CAPTION.'">';
        print $cfg['captions'][PREF_THUMB.$strPictureFilename];
        print '</div>'."\n";
      } else if ($cfg['conf']['pictureCaptionedThumbnails']) {
        if ( isset($cfg['captions'][$strPictureFilename]) ) {
          print "\n".'  <div class="'.CLASS_DIV_THUMBNAILS_CAPTION.'">';
          print $cfg['captions'][$strPictureFilename];
          print '</div>'."\n";
        }
      }
    }

    print '  </td>'."\n";
  }

  // navi bar generation
  // commented out BMS 4/30/06.  Don't want the navbar in my thumbnails.

//  if ($iPictureNumber > 0) {
//    print '</tr>'."\n";
//    print '<tr>'."\n";
//    print '  <td colspan="'.$cfg['conf']['thumbnailsPerRow'].'" class="'.CLASS_TD_THUMBNAILS_NAVI.'">';
//    // display "thumbnail navi" if all the thumbs are not displayed on the same page
//    spgm_DisplayThumbnailNavibar($iPageIndex, $iPageNumber, $strGalleryId, $strFilterFlags);

    // toggles
//    $galleryInfo = spgm_GetGalleryInfo($strGalleryId, $arrPictureFilenames);
//    spgm_DisplayFilterToggles($strGalleryId, $strFilterFlags, $galleryInfo);
//  }

  // for HTML 4.01 compatibility ...
  // if there are no thumbnails, then format the <td> markup correctly
  if ($iItemCounter == 0) print '  <td>'."\n";

  print '  </td>'."\n";
  print '</tr>'."\n";
  print '</table>'."\n";

}


################################################################################
function spgm_DisplayPicture_bms($strGalleryId, $iPictureId, $strFilterFlags) {

  global $cfg;

  $arrPictureFilenames = spgm_CreatePictureArray($strGalleryId, $strFilterFlags, true);
  $iPictureNumber = count($arrPictureFilenames);
  $strPathToPictures = DIR_GAL.$strGalleryId.'/';
  $strPictureFilename = $arrPictureFilenames[$iPictureId];
  $_strFileExtension = strrchr($strPictureFilename, '.');
  $strPictureBasename = substr($strPictureFilename, 0, -strlen($_strFileExtension));
  $strPictureURL = $strPathToPictures.$strPictureFilename;
  $strCaptionURL = $strPictureURL.EXT_PIC_CAPTION; // DEPRECATED
  $strGalleryName = ereg_replace('_', ' ', $strGalleryId);
  $strGalleryName = ereg_replace('/', ' &raquo; ', $strGalleryName);
  $bSlideshowMode = strstr($strFilterFlags, PARAM_VALUE_FILTER_SLIDESHOW) != FALSE;

  if ($cfg['conf']['thumbnailsPerPage'] != 0) {
    $iPageNumber = $iPictureNumber / $cfg['conf']['thumbnailsPerPage'];
    if ($iPageNumber > (int)($iPictureNumber / $cfg['conf']['thumbnailsPerPage']))
      $iPageNumber = (int)++$iPageNumber;
  }

  spgm_Trace(
    '<p>function spgm_DisplayPicture</p>'."\n"
    .'strGalleryId: '.$strGalleryId.'<br />'."\n"
    .'strPictureFilename: '.$strPictureFilename.'<br />'."\n"
    .'strPathToPictures: '.$strPathToPictures.'<br />'."\n"
    .'strPictureURL: '.$strPictureURL.'<br />'."\n"
    .'$iPictureId: '.$iPictureId.'<br />'."\n"
    .'$iPictureNumber: '.$iPictureNumber.'<br />'."\n"
    .'caption: '.$cfg['captions'][$strPictureFilename].'<br />'."\n"
  );


//  if (($iPictureId < 0) || ($iPictureId > $iPictureNumber-1) || $iPictureId == '')
    //spgm_Error(ERRMSG_UNKNOWN_PICTURE);

  if (! spgm_IsGallery($strGalleryId) )
    spgm_Error(ERRMSG_UNKNOWN_GALLERY);


  if ( spgm_IsPicture($strPictureFilename, $strGalleryId) ) {
    $arrPictureDim = getimagesize($strPictureURL);
    $iPreviousPictureId = $iPictureId - 1;
    $iNextPictureId = $iPictureId + 1;
  }

  print '<br /><br />'."\n";

  ///Previous and Next Links at top.   BMS 4/30/06
  print '<div><table width="100%"><tr><td width="33%" align="left">';
  if ($iPreviousPictureId >= 0)
    print '    <a href="'.$cfg['global']['documentSelf'].'?'.PARAM_NAME_GALID.'='.$strGalleryId.'&amp;'.PARAM_NAME_PICID.'='.$iPreviousPictureId.'&amp;'.PARAM_NAME_FILTER.'='.ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags).$cfg['global']['URLExtraParams'].'#pic">Previous</a> ';
  print '</td><td align="center" class="recordnum">';

  //	$cfg['locale']['pictureNaviBar'] = ereg_replace(PATTERN_CURRENT_PIC, "$iNextPictureId", $cfg['locale']['pictureNaviBar']);
  //	$cfg['locale']['pictureNaviBar'] = ereg_replace(PATTERN_NB_PICS, "$iPictureNumber", $cfg['locale']['pictureNaviBar']);
  //	print ' '.$cfg['locale']['pictureNaviBar'].' ';

  print '</td><td width="33%" align="right">';
  if ($iNextPictureId < $iPictureNumber)
    print '<a href="'.$cfg['global']['documentSelf'].'?'.PARAM_NAME_GALID.'='.$strGalleryId.'&amp;'.PARAM_NAME_PICID.'='.$iNextPictureId.'&amp;'.PARAM_NAME_FILTER.'='.ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags).$cfg['global']['URLExtraParams'].'#pic">Next</a>'."\n";
  print '</td></tr></table></div>';


  //display the picture
  print '<div style="text-align: center;">';
  if ($iNextPictureId < $iPictureNumber)
    print '    <a href="'.$cfg['global']['documentSelf'].'?'.PARAM_NAME_GALID.'='.$strGalleryId.'&amp;'.PARAM_NAME_PICID.'='.$iNextPictureId.'&amp;'.PARAM_NAME_FILTER.'='.ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags).$cfg['global']['URLExtraParams'].'#pic">';
  else
    print '    <a href="'.$cfg['global']['documentSelf'].'?'.PARAM_NAME_GALID.'='.$strGalleryId.'&amp;'.PARAM_NAME_PICID.'=0&amp;'.PARAM_NAME_FILTER.'='.ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags).$cfg['global']['URLExtraParams'].'#pic">';
  print '<img id="'.ID_PICTURE.'" src="'.$strPictureURL.'" width="'.$arrPictureDim[0].'" height="'.$arrPictureDim[1].'" alt="'.$strPictureURL;
  print '" class="'.CLASS_IMG_PICTURE.'" /></a></div>';

  // display the caption
  print '<div class="caption"><br/>';
  if ( isset($cfg['captions'][$strPictureFilename]) )
    print $cfg['captions'][$strPictureFilename];
  print '</div>';

  print '<br /><br /><br />';

  print '<div><table width="100%"><tr><td width="33%" align="left">';
  if ($iPreviousPictureId >= 0)
    print '    <a href="'.$cfg['global']['documentSelf'].'?'.PARAM_NAME_GALID.'='.$strGalleryId.'&amp;'.PARAM_NAME_PICID.'='.$iPreviousPictureId.'&amp;'.PARAM_NAME_FILTER.'='.ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags).$cfg['global']['URLExtraParams'].'#pic">Previous</a> ';
  print '</td><td align="center" class="recordnum">';

  $cfg['locale']['pictureNaviBar'] = ereg_replace(PATTERN_CURRENT_PIC, "$iNextPictureId", $cfg['locale']['pictureNaviBar']);
  $cfg['locale']['pictureNaviBar'] = ereg_replace(PATTERN_NB_PICS, "$iPictureNumber", $cfg['locale']['pictureNaviBar']);
  print ' '.$cfg['locale']['pictureNaviBar'].' ';

  print '</td><td width="33%" align="right">';
  if ($iNextPictureId < $iPictureNumber)
    print '<a href="'.$cfg['global']['documentSelf'].'?'.PARAM_NAME_GALID.'='.$strGalleryId.'&amp;'.PARAM_NAME_PICID.'='.$iNextPictureId.'&amp;'.PARAM_NAME_FILTER.'='.ereg_replace(PARAM_VALUE_FILTER_SLIDESHOW, '', $strFilterFlags).$cfg['global']['URLExtraParams'].'#pic">Next</a>'."\n";
  print '</td></tr></table></div>';

}



?>