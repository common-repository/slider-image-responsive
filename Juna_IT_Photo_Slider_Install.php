<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
	global $wpdb;

	$table_name  = $wpdb->prefix . "juna_it_slider_manager";
	$table_name1 = $wpdb->prefix . "juna_it_photo_manager";
	$table_name2 = $wpdb->prefix . "juna_it_pslider_font_family";
	$table_name3 = $wpdb->prefix . "juna_it_pslider_effects";
	$table_name4 = $wpdb->prefix . "juna_it_pslider_efta";
	$table_name5 = $wpdb->prefix . "juna_it_pslider_effect8";

	$sql='CREATE TABLE IF NOT EXISTS ' .$table_name.' (
		id INTEGER(10) UNSIGNED AUTO_INCREMENT,
		JIT_PSlider_Name VARCHAR(255) NOT NULL,
		JIT_PSlider_Type VARCHAR(255) NOT NULL,
		JIT_PSlider_Count VARCHAR(255) NOT NULL,
		PRIMARY KEY (id))';
	$sql1='CREATE TABLE IF NOT EXISTS ' .$table_name1.' (
		id INTEGER(10) UNSIGNED AUTO_INCREMENT,
		photo_title VARCHAR(255) NOT NULL, 
		photo_url LONGTEXT NOT NULL,
		photo_link VARCHAR(255) NOT NULL,
		open_NT VARCHAR(255) NOT NULL,
		slider_id INTEGER(10) NOT NULL,
		PRIMARY KEY (id))';
	$sql2 = 'CREATE TABLE IF NOT EXISTS ' .$table_name2 . '(
		id INTEGER(10) UNSIGNED AUTO_INCREMENT,
		Font_family VARCHAR(255) NOT NULL,
		PRIMARY KEY  (id) )';
	$sql3 = 'CREATE TABLE IF NOT EXISTS ' .$table_name3 . '(
		id INTEGER(10) UNSIGNED AUTO_INCREMENT,
		JIT_PSlider_EN VARCHAR(255) NOT NULL,
		JIT_PSlider_ET VARCHAR(255) NOT NULL,
		JIT_PSlider_AutoPlay VARCHAR(255) NOT NULL,
		JIT_PSlider_SD VARCHAR(255) NOT NULL,
		JIT_PSlider_APS VARCHAR(255) NOT NULL,
		JIT_PSlider_CS VARCHAR(255) NOT NULL,
		JIT_PSlider_PT VARCHAR(255) NOT NULL,
		JIT_PSlider_SS VARCHAR(255) NOT NULL,
		JIT_PSlider_AS VARCHAR(255) NOT NULL,
		JIT_PSlider_SSC VARCHAR(255) NOT NULL,
		JIT_PSlider_SBC VARCHAR(255) NOT NULL,
		JIT_PSlider_CW VARCHAR(255) NOT NULL,
		JIT_PSlider_CH VARCHAR(255) NOT NULL,
		JIT_PSlider_SW VARCHAR(255) NOT NULL,
		JIT_PSlider_SH VARCHAR(255) NOT NULL,
		JIT_PSlider_CBW VARCHAR(255) NOT NULL,
		JIT_PSlider_CBS VARCHAR(255) NOT NULL,
		JIT_PSlider_CBC VARCHAR(255) NOT NULL,
		JIT_PSlider_CBR VARCHAR(255) NOT NULL,
		JIT_PSlider_SC VARCHAR(255) NOT NULL,
		JIT_PSlider_IR VARCHAR(255) NOT NULL,
		JIT_PSlider_ShowTitle VARCHAR(255) NOT NULL,
		JIT_PSlider_TC VARCHAR(255) NOT NULL,
		JIT_PSlider_TFS VARCHAR(255) NOT NULL,
		JIT_PSlider_TBC VARCHAR(255) NOT NULL,
		JIT_PSlider_TFF VARCHAR(255) NOT NULL,
		JIT_PSlider_TO VARCHAR(255) NOT NULL,
		JIT_PSlider_TTA VARCHAR(255) NOT NULL,
		JIT_PSlider_TPFT VARCHAR(255) NOT NULL,
		JIT_PSlider_ShowNav VARCHAR(255) NOT NULL,
		JIT_PSlider_NC VARCHAR(255) NOT NULL,
		JIT_PSlider_NBR VARCHAR(255) NOT NULL,
		JIT_PSlider_NHC VARCHAR(255) NOT NULL,
		JIT_PSlider_NP VARCHAR(255) NOT NULL,
		JIT_PSlider_NCC VARCHAR(255) NOT NULL,
		JIT_PSlider_NPFL VARCHAR(255) NOT NULL,
		JIT_PSlider_NBC VARCHAR(255) NOT NULL,
		JIT_PSlider_NS VARCHAR(255) NOT NULL,		
		JIT_PSlider_ShowArr VARCHAR(255) NOT NULL,
		JIT_PSlider_Hidden_E1I VARCHAR(255) NOT NULL,
		JIT_PSlider_AFS VARCHAR(255) NOT NULL,
		JIT_PSlider_AC VARCHAR(255) NOT NULL,
		JIT_PSlider_APFT VARCHAR(255) NOT NULL,
		JIT_PSlider_LI VARCHAR(255) NOT NULL,
		JIT_PSlider_Deg VARCHAR(255) NOT NULL,
		JIT_PSlider_AHC VARCHAR(255) NOT NULL,
		JIT_PSlider_TBrW VARCHAR(255) NOT NULL,
		JIT_PSlider_TBrS VARCHAR(255) NOT NULL,
		JIT_PSlider_TBrC VARCHAR(255) NOT NULL,
		JIT_PSlider_TBrR VARCHAR(255) NOT NULL,
		PRIMARY KEY (id))';
	$sql4 = 'CREATE TABLE IF NOT EXISTS ' .$table_name4 . '(
		id INTEGER(10) UNSIGNED AUTO_INCREMENT,
		JIT_PSlider_EN VARCHAR(255) NOT NULL,
		JIT_PSlider_ET VARCHAR(255) NOT NULL,
		PRIMARY KEY  (id) )';
	$sql5 = 'CREATE TABLE IF NOT EXISTS ' .$table_name5 . '(
		id INTEGER(10) UNSIGNED AUTO_INCREMENT,
		JIT_PSlider_EN VARCHAR(255) NOT NULL,
		JIT_PSlider_ET VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_ST VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_TC VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_TFS VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_TTSC VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_TFF VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_SBgC VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_SBW VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_SBS VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_SBC VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_SBR VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_SBSC VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_SIW VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_SIH VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_SIBW VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_SIBS VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_SIBC VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_SIBR VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_SSI VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_SIS VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_SIC VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_SIBgC VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_SIO VARCHAR(255) NOT NULL,
		JIT_PSlider_E8I VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_STNBgC VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_STNBW VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_STNBS VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_STNBC VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_STNBR VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_STNBSC VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_STNIW VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_STNIH VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_STNIBC VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_STNIBCC VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_STNIBHC VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_STNIO VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_STNIS VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_STNIC VARCHAR(255) NOT NULL,
		JIT_PSlider_E8_1I VARCHAR(255) NOT NULL,
		JIT_PSlider_PC_STNICH VARCHAR(255) NOT NULL,
		PRIMARY KEY (id))';

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
	dbDelta($sql1);
	dbDelta($sql2);
	dbDelta($sql3);
	dbDelta($sql4);
	dbDelta($sql5);

	$Psfamily = array('Abadi MT Condensed Light','Aharoni','Aldhabi','Andalus','Angsana New',' AngsanaUPC','Aparajita','Arabic Typesetting','Arial',
		'Arial Black','Batang','BatangChe','Browallia New','BrowalliaUPC','Calibri','Calibri Light','Calisto MT','Cambria','Candara','Century Gothic',
		'Comic Sans MS','Consolas','Constantia','Copperplate Gothic','Copperplate Gothic Light','Corbel','Cordia New','CordiaUPC','Courier New',
		'DaunPenh','David','DFKai-SB','DilleniaUPC','DokChampa','Dotum','DotumChe','Ebrima','Estrangelo Edessa','EucrosiaUPC','Euphemia','FangSong',
		'Franklin Gothic Medium','FrankRuehl','FreesiaUPC','Gabriola','Gadugi','Gautami','Georgia','Gisha','Gulim','GulimChe','Gungsuh','GungsuhChe',
		'Impact','IrisUPC','Iskoola Pota','JasmineUPC','KaiTi','Kalinga','Kartika','Khmer UI','KodchiangUPC','Kokila','Lao UI','Latha','Leelawadee',
		'Levenim MT','LilyUPC','Lucida Console','Lucida Handwriting Italic','Lucida Sans Unicode','Malgun Gothic','Mangal','Manny ITC','Marlett',
		'Meiryo','Meiryo UI','Microsoft Himalaya','Microsoft JhengHei','Microsoft JhengHei UI','Microsoft New Tai Lue','Microsoft PhagsPa',
		'Microsoft Sans Serif','Microsoft Tai Le','Microsoft Uighur','Microsoft YaHei','Microsoft YaHei UI','Microsoft Yi Baiti','MingLiU_HKSCS',
		'MingLiU_HKSCS-ExtB','Miriam','Mongolian Baiti','MoolBoran','MS UI Gothic','MV Boli','Myanmar Text','Narkisim','Nirmala UI','News Gothic MT',
		'NSimSun','Nyala','Palatino Linotype','Plantagenet Cherokee','Raavi','Rod','Sakkal Majalla','Segoe Print','Segoe Script','Segoe UI Symbol',
		'Shonar Bangla','Shruti','SimHei','SimKai','Simplified Arabic','SimSun','SimSun-ExtB','Sylfaen','Tahoma','Times New Roman','Traditional Arabic',
		'Trebuchet MS','Tunga','Utsaah','Vani','Vijaya');

	$Juna_IT_PSlider_Count_Fonts=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id>%d",0));
	if(count($Juna_IT_PSlider_Count_Fonts)==0)
	{
		for($i=0;$i<count($Psfamily);$i++)
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Font_family) VALUES (%d, %s)", '', $Psfamily[$i]));
		}
	}
	$JIT_PSlider_PS=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id>%d",0));
	if(count($JIT_PSlider_PS)==0)
	{
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name (id, JIT_PSlider_Name, JIT_PSlider_Type, JIT_PSlider_Count) VALUES (%d, %s, %s, %s)", '', 'Beautiful Views', 'Juna-IT Slider', '12'));
	}
	$JIT_PSlider_PSP=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE id>%d",0));
	if(count($JIT_PSlider_PSP)==0)
	{
		$JIT_PSlider_PSC=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id>%d",0));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, photo_title, photo_url, photo_link, open_NT, slider_id) VALUES (%d, %s, %s, %s, %s, %s)", '', 'Picture-1', plugins_url('/Images/Demo Images/demo-1.jpg',__FILE__), '', 'No', $JIT_PSlider_PSC[0]->id));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, photo_title, photo_url, photo_link, open_NT, slider_id) VALUES (%d, %s, %s, %s, %s, %s)", '', 'Picture-2', plugins_url('/Images/Demo Images/demo-2.jpg',__FILE__), '', 'No', $JIT_PSlider_PSC[0]->id));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, photo_title, photo_url, photo_link, open_NT, slider_id) VALUES (%d, %s, %s, %s, %s, %s)", '', 'Picture-3', plugins_url('/Images/Demo Images/demo-3.jpg',__FILE__), '', 'No', $JIT_PSlider_PSC[0]->id));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, photo_title, photo_url, photo_link, open_NT, slider_id) VALUES (%d, %s, %s, %s, %s, %s)", '', 'Picture-4', plugins_url('/Images/Demo Images/demo-4.jpg',__FILE__), '', 'No', $JIT_PSlider_PSC[0]->id));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, photo_title, photo_url, photo_link, open_NT, slider_id) VALUES (%d, %s, %s, %s, %s, %s)", '', 'Picture-5', plugins_url('/Images/Demo Images/demo-5.jpg',__FILE__), '', 'No', $JIT_PSlider_PSC[0]->id));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, photo_title, photo_url, photo_link, open_NT, slider_id) VALUES (%d, %s, %s, %s, %s, %s)", '', 'Picture-6', plugins_url('/Images/Demo Images/demo-6.jpg',__FILE__), '', 'No', $JIT_PSlider_PSC[0]->id));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, photo_title, photo_url, photo_link, open_NT, slider_id) VALUES (%d, %s, %s, %s, %s, %s)", '', 'Picture-7', plugins_url('/Images/Demo Images/demo-7.jpg',__FILE__), '', 'No', $JIT_PSlider_PSC[0]->id));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, photo_title, photo_url, photo_link, open_NT, slider_id) VALUES (%d, %s, %s, %s, %s, %s)", '', 'Picture-8', plugins_url('/Images/Demo Images/demo-8.jpg',__FILE__), '', 'No', $JIT_PSlider_PSC[0]->id));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, photo_title, photo_url, photo_link, open_NT, slider_id) VALUES (%d, %s, %s, %s, %s, %s)", '', 'Picture-9', plugins_url('/Images/Demo Images/demo-9.jpg',__FILE__), '', 'No', $JIT_PSlider_PSC[0]->id));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, photo_title, photo_url, photo_link, open_NT, slider_id) VALUES (%d, %s, %s, %s, %s, %s)", '','Picture-10', plugins_url('/Images/Demo Images/demo-10.jpg',__FILE__), '', 'No', $JIT_PSlider_PSC[0]->id));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, photo_title, photo_url, photo_link, open_NT, slider_id) VALUES (%d, %s, %s, %s, %s, %s)", '','Picture-11', plugins_url('/Images/Demo Images/demo-11.jpg',__FILE__), '', 'No', $JIT_PSlider_PSC[0]->id));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, photo_title, photo_url, photo_link, open_NT, slider_id) VALUES (%d, %s, %s, %s, %s, %s)", '','Picture-12', plugins_url('/Images/Demo Images/demo-12.jpg',__FILE__), '', 'No', $JIT_PSlider_PSC[0]->id));
	}

	$JIT_PSlider_PSEf=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id>%d",0));
	if(count($JIT_PSlider_PSEf)<8)
	{
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name4 WHERE id>%d", 0));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, JIT_PSlider_EN, JIT_PSlider_ET) VALUES (%d, %s, %s)", '', 'Juna-IT Slider', 'Juna Slider'));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, JIT_PSlider_EN, JIT_PSlider_ET) VALUES (%d, %s, %s)", '', 'Full Width Version', 'Full Width Slider'));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, JIT_PSlider_EN, JIT_PSlider_ET) VALUES (%d, %s, %s)", '', 'Different Size Version', 'Different Size Slider'));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, JIT_PSlider_EN, JIT_PSlider_ET) VALUES (%d, %s, %s)", '', 'Vertical Thumbnail', 'Vertical Thumbnail'));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, JIT_PSlider_EN, JIT_PSlider_ET) VALUES (%d, %s, %s)", '', 'Horizontal Thumbnail', 'Horizontal Thumbnail'));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, JIT_PSlider_EN, JIT_PSlider_ET) VALUES (%d, %s, %s)", '', 'Thumbnail Slider', 'Thumbnail Slider'));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, JIT_PSlider_EN, JIT_PSlider_ET) VALUES (%d, %s, %s)", '', '3D Slider', '3D Slider'));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, JIT_PSlider_EN, JIT_PSlider_ET) VALUES (%d, %s, %s)", '', 'Photo Carousel', 'Photo Carousel'));
	}

	$JIT_PSlider_PSE=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE id>%d",0));
	if(count($JIT_PSlider_PSE)<7)
	{
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name3 WHERE id>%d", 0));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, JIT_PSlider_EN, JIT_PSlider_ET, JIT_PSlider_AutoPlay, JIT_PSlider_SD, JIT_PSlider_APS, JIT_PSlider_CS, JIT_PSlider_PT, JIT_PSlider_SS, JIT_PSlider_AS, JIT_PSlider_SSC, JIT_PSlider_SBC, JIT_PSlider_CW, JIT_PSlider_CH, JIT_PSlider_SW, JIT_PSlider_SH, JIT_PSlider_CBW, JIT_PSlider_CBS, JIT_PSlider_CBC, JIT_PSlider_CBR, JIT_PSlider_SC, JIT_PSlider_IR, JIT_PSlider_ShowTitle, JIT_PSlider_TC, JIT_PSlider_TFS, JIT_PSlider_TBC, JIT_PSlider_TFF, JIT_PSlider_TO, JIT_PSlider_TTA, JIT_PSlider_TPFT, JIT_PSlider_ShowNav, JIT_PSlider_NC, JIT_PSlider_NBR, JIT_PSlider_NHC, JIT_PSlider_NP, JIT_PSlider_NCC, JIT_PSlider_NPFL, JIT_PSlider_NBC, JIT_PSlider_NS, JIT_PSlider_ShowArr, JIT_PSlider_Hidden_E1I, JIT_PSlider_AFS, JIT_PSlider_AC, JIT_PSlider_APFT, JIT_PSlider_LI, JIT_PSlider_Deg, JIT_PSlider_AHC, JIT_PSlider_TBrW, JIT_PSlider_TBrS, JIT_PSlider_TBrC, JIT_PSlider_TBrR) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', 'Juna-IT Slider', 'Juna Slider', 'true', '600', '1', '800', '1500', '15', '1', '#ffffff', '#ffffff', '640px', '400px', '650', '300px', '0px', 'solid', '#ffffff', '1%', '2', '0%', 'Yes', '#ffffff', '32px', '#dd8500', 'Arial', '0.65', 'center', '2%', 'Yes', '#dd8500', '7px', '#ddad63', 'bottom', '#dd9933', '35%', '#dd8500', '10px', 'Yes', '8', '48px', '#ddb373', '9%', plugins_url('/Images/loading_1.gif',__FILE__), '70deg', '#dd9933', '2px', 'solid', '#dd8500', '2%'));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, JIT_PSlider_EN, JIT_PSlider_ET, JIT_PSlider_AutoPlay, JIT_PSlider_SD, JIT_PSlider_APS, JIT_PSlider_CS, JIT_PSlider_PT, JIT_PSlider_SS, JIT_PSlider_AS, JIT_PSlider_SSC, JIT_PSlider_SBC, JIT_PSlider_CW, JIT_PSlider_CH, JIT_PSlider_SW, JIT_PSlider_SH, JIT_PSlider_CBW, JIT_PSlider_CBS, JIT_PSlider_CBC, JIT_PSlider_CBR, JIT_PSlider_SC, JIT_PSlider_IR, JIT_PSlider_ShowTitle, JIT_PSlider_TC, JIT_PSlider_TFS, JIT_PSlider_TBC, JIT_PSlider_TFF, JIT_PSlider_TO, JIT_PSlider_TTA, JIT_PSlider_TPFT, JIT_PSlider_ShowNav, JIT_PSlider_NC, JIT_PSlider_NBR, JIT_PSlider_NHC, JIT_PSlider_NP, JIT_PSlider_NCC, JIT_PSlider_NPFL, JIT_PSlider_NBC, JIT_PSlider_NS, JIT_PSlider_ShowArr, JIT_PSlider_Hidden_E1I, JIT_PSlider_AFS, JIT_PSlider_AC, JIT_PSlider_APFT, JIT_PSlider_LI, JIT_PSlider_Deg, JIT_PSlider_AHC, JIT_PSlider_TBrW, JIT_PSlider_TBrS, JIT_PSlider_TBrC, JIT_PSlider_TBrR) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', 'Full Width Version', 'Full Width Slider', 'true', '5100', '1', '2000', '2000', '5', '2', '#ffffff', '#dd9933', '690px', '400px', '650', '300px', '3px', 'none', '#ffffff', '0%', '2', '0%', 'Yes', '#ffffff', '27px', '#dd8500', 'Arial', '0.6', 'left', '68%', 'Yes', '#dd8500', '10px', '#ddb57a', 'bottom', '#dd9933', '40%', '#dd8500', '10px', 'Yes', '8', '40px', '#dd8500', '45%',  plugins_url('/Images/loading_1.gif',__FILE__), '70deg', '#dd9933', '2px', 'solid', '#dd8500', '2%'));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, JIT_PSlider_EN, JIT_PSlider_ET, JIT_PSlider_AutoPlay, JIT_PSlider_SD, JIT_PSlider_APS, JIT_PSlider_CS, JIT_PSlider_PT, JIT_PSlider_SS, JIT_PSlider_AS, JIT_PSlider_SSC, JIT_PSlider_SBC, JIT_PSlider_CW, JIT_PSlider_CH, JIT_PSlider_SW, JIT_PSlider_SH, JIT_PSlider_CBW, JIT_PSlider_CBS, JIT_PSlider_CBC, JIT_PSlider_CBR, JIT_PSlider_SC, JIT_PSlider_IR, JIT_PSlider_ShowTitle, JIT_PSlider_TC, JIT_PSlider_TFS, JIT_PSlider_TBC, JIT_PSlider_TFF, JIT_PSlider_TO, JIT_PSlider_TTA, JIT_PSlider_TPFT, JIT_PSlider_ShowNav, JIT_PSlider_NC, JIT_PSlider_NBR, JIT_PSlider_NHC, JIT_PSlider_NP, JIT_PSlider_NCC, JIT_PSlider_NPFL, JIT_PSlider_NBC, JIT_PSlider_NS, JIT_PSlider_ShowArr, JIT_PSlider_Hidden_E1I, JIT_PSlider_AFS, JIT_PSlider_AC, JIT_PSlider_APFT, JIT_PSlider_LI, JIT_PSlider_Deg, JIT_PSlider_AHC, JIT_PSlider_TBrW, JIT_PSlider_TBrS, JIT_PSlider_TBrC, JIT_PSlider_TBrR) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', 'Different Size Version', 'Different Size Slider', 'true', '600', '1', '800', '1300', '0', '1', '#ffffff', '#ffffff', '690px', '400px', '650', '300px', '0px', 'solid', '#ffffff', '1%', '2', '0%', 'Yes', '#ffffff', '39px', '#dd8500', 'Arial', '0.6', 'center', '7%', 'Yes', '#dd8500', '10px', '#ddb06c', 'bottom', '#dd9933', '33%', '#dd8500', '10px', 'Yes', '2', '39px', '#ddb373', '9%',  plugins_url('/Images/loading_1.gif',__FILE__), '70deg', '#dd9933', '2px', 'solid', '#dd8500', '2%'));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, JIT_PSlider_EN, JIT_PSlider_ET, JIT_PSlider_AutoPlay, JIT_PSlider_SD, JIT_PSlider_APS, JIT_PSlider_CS, JIT_PSlider_PT, JIT_PSlider_SS, JIT_PSlider_AS, JIT_PSlider_SSC, JIT_PSlider_SBC, JIT_PSlider_CW, JIT_PSlider_CH, JIT_PSlider_SW, JIT_PSlider_SH, JIT_PSlider_CBW, JIT_PSlider_CBS, JIT_PSlider_CBC, JIT_PSlider_CBR, JIT_PSlider_SC, JIT_PSlider_IR, JIT_PSlider_ShowTitle, JIT_PSlider_TC, JIT_PSlider_TFS, JIT_PSlider_TBC, JIT_PSlider_TFF, JIT_PSlider_TO, JIT_PSlider_TTA, JIT_PSlider_TPFT, JIT_PSlider_ShowNav, JIT_PSlider_NC, JIT_PSlider_NBR, JIT_PSlider_NHC, JIT_PSlider_NP, JIT_PSlider_NCC, JIT_PSlider_NPFL, JIT_PSlider_NBC, JIT_PSlider_NS, JIT_PSlider_ShowArr, JIT_PSlider_Hidden_E1I, JIT_PSlider_AFS, JIT_PSlider_AC, JIT_PSlider_APFT, JIT_PSlider_LI, JIT_PSlider_Deg, JIT_PSlider_AHC, JIT_PSlider_TBrW, JIT_PSlider_TBrS, JIT_PSlider_TBrC, JIT_PSlider_TBrR) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', 'Vertical Thumbnail', 'Vertical Thumbnail', 'true', '600', '1', '5000', '400', '15', '1', '#ffa350', '#dd8500', '890px', '400px', '650', '300px', '6px', 'solid', '#dd8500', '1%', '2', '0%', 'Yes', '#ffffff', '39px', '#dd8500', 'Arial', '0.6', 'center', '12%', 'Yes', '#dd9933', '0px', '#c47c00', 'bottom', '#ffffff', '35%', '#dd9933', '10px', 'Yes', '8', '39px', '#dd8500', '13%',  plugins_url('/Images/loading_1.gif',__FILE__), '70deg', '#dd9933', '2px', 'solid', '#dd8500', '2%'));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, JIT_PSlider_EN, JIT_PSlider_ET, JIT_PSlider_AutoPlay, JIT_PSlider_SD, JIT_PSlider_APS, JIT_PSlider_CS, JIT_PSlider_PT, JIT_PSlider_SS, JIT_PSlider_AS, JIT_PSlider_SSC, JIT_PSlider_SBC, JIT_PSlider_CW, JIT_PSlider_CH, JIT_PSlider_SW, JIT_PSlider_SH, JIT_PSlider_CBW, JIT_PSlider_CBS, JIT_PSlider_CBC, JIT_PSlider_CBR, JIT_PSlider_SC, JIT_PSlider_IR, JIT_PSlider_ShowTitle, JIT_PSlider_TC, JIT_PSlider_TFS, JIT_PSlider_TBC, JIT_PSlider_TFF, JIT_PSlider_TO, JIT_PSlider_TTA, JIT_PSlider_TPFT, JIT_PSlider_ShowNav, JIT_PSlider_NC, JIT_PSlider_NBR, JIT_PSlider_NHC, JIT_PSlider_NP, JIT_PSlider_NCC, JIT_PSlider_NPFL, JIT_PSlider_NBC, JIT_PSlider_NS, JIT_PSlider_ShowArr, JIT_PSlider_Hidden_E1I, JIT_PSlider_AFS, JIT_PSlider_AC, JIT_PSlider_APFT, JIT_PSlider_LI, JIT_PSlider_Deg, JIT_PSlider_AHC, JIT_PSlider_TBrW, JIT_PSlider_TBrS, JIT_PSlider_TBrC, JIT_PSlider_TBrR) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', 'Horizontal Thumbnail', 'Horizontal Thumbnail', 'true', '600', '2', '5000', '400', '15', '1', '#ffa350', '#dd8500', '600px', '400px', '650', '300px', '0px', 'solid', '#dd9933', '1%', '2', '0%', 'Yes', '#ffffff', '35px', '#dd8500', 'Arial', '0.6', 'center', '6%', 'Yes', '#dd9933', '4px', '#c47c00', 'bottom', '#ffffff', '35%', '#dd9933', '10px', 'Yes', '3', '39px', '#dd9933', '33%',  plugins_url('/Images/loading_1.gif',__FILE__), '70deg', '#dd9933', '2px', 'solid', '#dd8500', '2%'));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, JIT_PSlider_EN, JIT_PSlider_ET, JIT_PSlider_AutoPlay, JIT_PSlider_SD, JIT_PSlider_APS, JIT_PSlider_CS, JIT_PSlider_PT, JIT_PSlider_SS, JIT_PSlider_AS, JIT_PSlider_SSC, JIT_PSlider_SBC, JIT_PSlider_CW, JIT_PSlider_CH, JIT_PSlider_SW, JIT_PSlider_SH, JIT_PSlider_CBW, JIT_PSlider_CBS, JIT_PSlider_CBC, JIT_PSlider_CBR, JIT_PSlider_SC, JIT_PSlider_IR, JIT_PSlider_ShowTitle, JIT_PSlider_TC, JIT_PSlider_TFS, JIT_PSlider_TBC, JIT_PSlider_TFF, JIT_PSlider_TO, JIT_PSlider_TTA, JIT_PSlider_TPFT, JIT_PSlider_ShowNav, JIT_PSlider_NC, JIT_PSlider_NBR, JIT_PSlider_NHC, JIT_PSlider_NP, JIT_PSlider_NCC, JIT_PSlider_NPFL, JIT_PSlider_NBC, JIT_PSlider_NS, JIT_PSlider_ShowArr, JIT_PSlider_Hidden_E1I, JIT_PSlider_AFS, JIT_PSlider_AC, JIT_PSlider_APFT, JIT_PSlider_LI, JIT_PSlider_Deg, JIT_PSlider_AHC, JIT_PSlider_TBrW, JIT_PSlider_TBrS, JIT_PSlider_TBrC, JIT_PSlider_TBrR) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', 'Thumbnail Slider', 'Thumbnail Slider', 'true', '600', '1', '600', '400', '4', '2', '#ffa350', '#dd8500', '600px', '400px', '650', '300px', '1px', 'solid', '#dd8500', '1%', '2', '0%', 'Yes', '#ffffff', '35px', '#dd8500', 'Arial', '0.5', 'left', '5%', 'Yes', '#000000', '7px', '#dd8500', 'bottom', '#dd8500', '35%', '#dd9933', '10px', 'Yes', '18', '39px', '#dd9933', '40%',  plugins_url('/Images/loading_1.gif',__FILE__), '70deg', '#dd9933', '2px', 'solid', '#dd8500', '2%'));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, JIT_PSlider_EN, JIT_PSlider_ET, JIT_PSlider_AutoPlay, JIT_PSlider_SD, JIT_PSlider_APS, JIT_PSlider_CS, JIT_PSlider_PT, JIT_PSlider_SS, JIT_PSlider_AS, JIT_PSlider_SSC, JIT_PSlider_SBC, JIT_PSlider_CW, JIT_PSlider_CH, JIT_PSlider_SW, JIT_PSlider_SH, JIT_PSlider_CBW, JIT_PSlider_CBS, JIT_PSlider_CBC, JIT_PSlider_CBR, JIT_PSlider_SC, JIT_PSlider_IR, JIT_PSlider_ShowTitle, JIT_PSlider_TC, JIT_PSlider_TFS, JIT_PSlider_TBC, JIT_PSlider_TFF, JIT_PSlider_TO, JIT_PSlider_TTA, JIT_PSlider_TPFT, JIT_PSlider_ShowNav, JIT_PSlider_NC, JIT_PSlider_NBR, JIT_PSlider_NHC, JIT_PSlider_NP, JIT_PSlider_NCC, JIT_PSlider_NPFL, JIT_PSlider_NBC, JIT_PSlider_NS, JIT_PSlider_ShowArr, JIT_PSlider_Hidden_E1I, JIT_PSlider_AFS, JIT_PSlider_AC, JIT_PSlider_APFT, JIT_PSlider_LI, JIT_PSlider_Deg, JIT_PSlider_AHC, JIT_PSlider_TBrW, JIT_PSlider_TBrS, JIT_PSlider_TBrC, JIT_PSlider_TBrR) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', '3D Slider', '3D Slider', 'true', '2400', '1', '800', '1500', '15', '1', '#dd8500', '#ffffff', '640px', '400px', '380', '233px', '0px', 'solid', '#000000', '2%', '2', '0%', 'No', '#ffffff', '18px', '#dd8500', 'Arial', '0.7', 'center', '2%', 'Yes', '#dd8500', '7px', '#ddad63', 'bottom', '#dd9933', '35%', '#dd8500', '10px', 'Yes', '5', '28px', '#dd8500', '9%',  plugins_url('/Images/loading_1.gif',__FILE__), '70deg', '#dd9933', '2px', 'solid', '#dd8500', '2%'));
	}

	$JIT_PSlider_PSE8=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE id>%d",0));
	if(count($JIT_PSlider_PSE8)==0)
	{
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name5 (id, JIT_PSlider_EN, JIT_PSlider_ET, JIT_PSlider_PC_ST, JIT_PSlider_PC_TC, JIT_PSlider_PC_TFS, JIT_PSlider_PC_TTSC, JIT_PSlider_PC_TFF, JIT_PSlider_PC_SBgC, JIT_PSlider_PC_SBW, JIT_PSlider_PC_SBS, JIT_PSlider_PC_SBC, JIT_PSlider_PC_SBR, JIT_PSlider_PC_SBSC, JIT_PSlider_PC_SIW, JIT_PSlider_PC_SIH, JIT_PSlider_PC_SIBW, JIT_PSlider_PC_SIBS, JIT_PSlider_PC_SIBC, JIT_PSlider_PC_SIBR, JIT_PSlider_PC_SSI, JIT_PSlider_PC_SIS, JIT_PSlider_PC_SIC, JIT_PSlider_PC_SIBgC, JIT_PSlider_PC_SIO, JIT_PSlider_E8I, JIT_PSlider_PC_STNBgC, JIT_PSlider_PC_STNBW, JIT_PSlider_PC_STNBS, JIT_PSlider_PC_STNBC, JIT_PSlider_PC_STNBR, JIT_PSlider_PC_STNBSC, JIT_PSlider_PC_STNIW, JIT_PSlider_PC_STNIH, JIT_PSlider_PC_STNIBC, JIT_PSlider_PC_STNIBCC, JIT_PSlider_PC_STNIBHC, JIT_PSlider_PC_STNIO, JIT_PSlider_PC_STNIS, JIT_PSlider_PC_STNIC, JIT_PSlider_E8_1I, JIT_PSlider_PC_STNICH) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', 'Photo Carousel', 'Photo Carousel', 'Yes', '#ffffff', '17px', '#ffffff', 'Arial', '#000000', '2px', 'solid', '#dd8500', '0px', '#dd8500', '417px', '327px', '0px', 'solid', '#ffffff', '0%', 'Yes', '26px', '#ffffff', '#dd8500', '1', '3', '#dd8500', '4px', 'solid', '#000000', '0px', '#000000', '70px', '70px', '#000000', '#000000', '#dd8500', '0.6', '20px', '#000000', '5', '74px'));
	}
?>