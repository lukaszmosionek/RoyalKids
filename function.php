<?php


function val($name){
	return ((isset($_POST[$name]))?$_POST[$name]:'');
}
function filelist($folder){
	if ($handle = opendir($folder)) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != ".." && is_file($folder.'/'.$entry)) {

            //echo "$entry\n";
			$arr[] = $entry;
        }
    }

    closedir($handle);
	}
	
	return $arr;
}
function resize_image($file, $new, $w, $h, $crop=FALSE) {
    list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width-($width*abs($r-$w/$h)));
        } else {
            $height = ceil($height-($height*abs($r-$w/$h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w/$h > $r) {
            $newwidth = $h*$r;
            $newheight = $h;
        } else {
            $newheight = $w/$r;
            $newwidth = $w;
        }
    }
    $src = imagecreatefromjpeg($file);
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
	
    //return $dst;
	
	imagejpeg($dst, $new);
}

?>