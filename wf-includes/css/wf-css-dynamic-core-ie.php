<?php
header("Content-type: text/css");

$wf_grid_sitewidth = $_GET['w'];
$container_p = $_GET['p'];
$wf_grid_columns = $_GET['c'];
$wf_grid_columnwidth = $_GET['cw'];
?>
/* -------------------------------------------------------------- 
   
   ie.css
   
   Contains every hack for Internet Explorer,
   so that our core files stay sweet and nimble.
   
-------------------------------------------------------------- */

/* Make sure the layout is centered in IE5 */

<?php
switch ($container_p) {

	case 'left' :
		$wf_site_position .= "left";
	break;
	
	case 'right' :
		$wf_site_position .= "right";
	break;
	
	default :
		// If in doubt make it centered
		$wf_site_position .= "center";
	break;

}

//TODO: Check and dubug this inserting other CSS to correct alignment
?>

body { text-align: <?php echo $wf_site_position; ?>; }
.container { text-align: left; }

<?php

// Setup the main columns

echo '* html .column, ';
echo "\n";

for ($wf_grid_columnlimit=1; $wf_grid_columnlimit<=$wf_grid_columns; $wf_grid_columnlimit++)
	{
		$wf_grid_maincols = "* html div.span-".$wf_grid_columnlimit;

	
	if ($wf_grid_columnlimit==$wf_grid_columns) {
		//Last one
		$wf_grid_maincols .= ' { display:inline; overflow-x: hidden; }';
	} else {
		$wf_grid_maincols .= ", ";
	}
	
	echo $wf_grid_maincols;
	echo "\n";
	
	}
?>

/* Elements
-------------------------------------------------------------- */

/* Fixes incorrect styling of legend in IE6. */
* html legend { margin:0px -8px 16px 0; padding:0; }

/* Fixes incorrect placement of ol numbers in IE6/7. */
ol { margin-left:2em; }

/* Fixes wrong line-height on sup/sub in IE. */
sup { vertical-align:text-top; }
sub { vertical-align:text-bottom; }

/* Fixes IE7 missing wrapping of code elements. */
html>body p code { *white-space: normal; } 

/* IE 6&7 has problems with setting proper <hr> margins. */
hr  { margin:-8px auto 11px; }

/* Explicitly set interpolation, allowing dynamically resized images to not look horrible */
img { -ms-interpolation-mode:bicubic; }

/* Clearing 
-------------------------------------------------------------- */

/* Makes clearfix actually work in IE */ 
.clearfix, .container { display:inline-block; }
* html .clearfix,
* html .container { height:1%; }

/* Forms 
-------------------------------------------------------------- */

/* Fixes padding on fieldset */
fieldset { padding-top:0; }

/* Makes classic textareas in IE 6 resemble other browsers */
textarea { overflow:auto; }

/* Fixes rule that IE 6 ignores */
input.text, input.title, textarea { background-color:#fff; border:1px solid #bbb; }
input.text:focus, input.title:focus { border-color:#666; }
input.text, input.title, textarea, select { margin:0.5em 0; }
input.checkbox, input.radio { position:relative; top:.25em; }

/* Fixes alignment of inline form elements */ 
form.inline div, form.inline p { vertical-align:middle; }
form.inline label { position:relative;top:-0.25em; }
form.inline input.checkbox, form.inline input.radio,
form.inline input.button, form.inline button { 
  margin:0.5em 0; 
}
button, input.button { position:relative;top:0.25em; }