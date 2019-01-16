<?
unset ($BROWSER_AGENT);
unset ($BROWSER_VER);
unset ($BROWSER_PLATFORM);

function browser_get_agent () {
    global $BROWSER_AGENT;
    return $BROWSER_AGENT;
}
function browser_get_platform() {
    global $BROWSER_PLATFORM;
    return $BROWSER_PLATFORM;
}
function browser_is_mac() {
    if (browser_get_platform()=='Mac') {
        return true;
    } else {
        return false;
    }
}
function browser_is_ie() {
    if (browser_get_agent()=='IE') {
        return true;
    } else {
        return false;
    }
}
if (ereg( 'MSIE ([0-9].[0-9]{1,2})',$HTTP_USER_AGENT,$log_version)) {
    $BROWSER_VER=$log_version[1];
    $BROWSER_AGENT='IE';
} elseif (ereg( 'Opera ([0-9].[0-9]{1,2})',$HTTP_USER_AGENT,$log_version))
{
    $BROWSER_VER=$log_version[1];
    $BROWSER_AGENT='OPERA';
} elseif (ereg(
'Mozilla/([0-9].[0-9]{1,2})',$HTTP_USER_AGENT,$log_version)) {
    $BROWSER_VER=$log_version[1];
    $BROWSER_AGENT='MOZILLA';
} else {
    $BROWSER_VER=0;
    $BROWSER_AGENT='OTHER';
}
if (strstr($HTTP_USER_AGENT,'Win')) {
    $BROWSER_PLATFORM='Win';
} else if (strstr($HTTP_USER_AGENT,'Mac')) {
    $BROWSER_PLATFORM='Mac';
} else if (strstr($HTTP_USER_AGENT,'Linux')) {
    $BROWSER_PLATFORM='Linux';
} else if (strstr($HTTP_USER_AGENT,'Unix')) {
    $BROWSER_PLATFORM='Unix';
} else {
    $BROWSER_PLATFORM='Other';
}
if (browser_is_ie()) {
	$style="IE";
} else {
	$style="NS";
}
if (browser_is_mac()) {
	$style.="MAC";
} else {
	$style.="PC";
}
$style.=".css";
?>