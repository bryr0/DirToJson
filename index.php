<?php 

function dirs($path){
	$elements=[];
	
	if (!is_dir($path) ) {
		echo "no is a directory";
		die;
	}
	
	if(!is_readable($path)) {
		$p=explode("/",$path);
		$elements[$p[count($p)-2]]="no access";
		return $elements;
	}

	$dir= scandir($path."/");

	foreach ($dir as $key => $value) {
		if ($value==".." || $value==".") {
			continue;
		}

		if (is_dir($path.$value)) {

			$pdir=trim( str_replace($path," ",$value) ) ;
			$sub=dirs($path.$value."/");
			$elements[$pdir]=$sub;
			
		}else{
			$elements[]=$path.$value;
		}
	}
	return $elements;
}

echo "<pre>";
$path="C:/Users/Bryro/AppData/Local/";
print_r(dirs($path));

?>