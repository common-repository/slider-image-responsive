<?php
	class  Juna_Photo_Slider extends WP_Widget
	{
		function __construct()
 	  	{
 			$params=array('name'=>'Juna Photo Slider','description'=>'This is the widget of Juna IT Photo Slider plugin');
			parent::__construct('Juna_Photo_Slider','',$params);
 	  	}
 	  	function form($instance)
 		{
 			$JIT_PSlider_Name=$instance['JIT_PSlider_id'];
		   	?>
		   	<div>			  
			   	<p>
			   		Slider Name:
			   		<select name="<?php echo $this->get_field_name('JIT_PSlider_id'); ?>" class="widefat" > 
				   		<?php
				   			global $wpdb;
				   			$table_name  =  $wpdb->prefix . "juna_it_slider_manager";
				   			$slider_name=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id>%d",0));

				   			foreach ($slider_name as $slider_title)
				   			{
				   				?><option value="<?php echo $slider_title->id;?>"><?php echo $slider_title->JIT_PSlider_Name;?></option><?php 
				   			}
				   		?>			   		
			   		</select>
			   	</p>		   
		   	</div>
		   	<?php
 		}
 		function widget($args,$instance)
 		{
 			extract($args);
 			$JIT_PSlider_Name=empty($instance['JIT_PSlider_id']) ? '' : $instance['JIT_PSlider_id'];
 			global $wpdb;

			$table_name  =  $wpdb->prefix . "juna_it_slider_manager";
			$table_name1 =  $wpdb->prefix . "juna_it_photo_manager";
			$table_name3 =  $wpdb->prefix . "juna_it_pslider_effects";
			$table_name4 =  $wpdb->prefix . "juna_it_pslider_efta";
			$table_name5 =  $wpdb->prefix . "juna_it_pslider_effect8";

			$JIT_PSlider_SN=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id=%d",$JIT_PSlider_Name));
			$JIT_PSlider_IWP=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE slider_id=%s order by id",$JIT_PSlider_Name));
			$JIT_PSldier_E=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE JIT_PSlider_EN=%s",$JIT_PSlider_SN[0]->JIT_PSlider_Type));

			if($JIT_PSldier_E[0]->JIT_PSlider_ET=='Juna Slider' || $JIT_PSldier_E[0]->JIT_PSlider_ET=='Full Width Slider' || $JIT_PSldier_E[0]->JIT_PSlider_ET=='Different Size Slider' || $JIT_PSldier_E[0]->JIT_PSlider_ET=='Vertical Thumbnail' || $JIT_PSldier_E[0]->JIT_PSlider_ET=='Horizontal Thumbnail' || $JIT_PSldier_E[0]->JIT_PSlider_ET=='Thumbnail Slider' || $JIT_PSldier_E[0]->JIT_PSlider_ET=='3D Slider')
			{
				$JIT_PSlider_PFS=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE JIT_PSlider_EN=%s",$JIT_PSlider_SN[0]->JIT_PSlider_Type));
			}
			else if($JIT_PSldier_E[0]->JIT_PSlider_ET=='Photo Carousel')
			{
				$JIT_PSlider_PFS=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE JIT_PSlider_EN=%s",$JIT_PSlider_SN[0]->JIT_PSlider_Type));
			}

			if($JIT_PSlider_PFS[0]->JIT_PSlider_Hidden_E1I==1)
 		 	{
 		 		$JIT_PSlider_Left_Icon='junaiticons-arrow-circle-o-left';
 		 		$JIT_PSlider_Right_Icon='junaiticons-arrow-circle-o-right';
 		 	}
 		 	else if($JIT_PSlider_PFS[0]->JIT_PSlider_Hidden_E1I==2)
 		 	{
 		 		$JIT_PSlider_Left_Icon='junaiticons-arrow-left';
				$JIT_PSlider_Right_Icon='junaiticons-arrow-right';
 		 	}
 		 	else if($JIT_PSlider_PFS[0]->JIT_PSlider_Hidden_E1I==3)
 		 	{
 		 		$JIT_PSlider_Left_Icon='junaiticons-chevron-left';
				$JIT_PSlider_Right_Icon='junaiticons-chevron-right';
 		 	}
 		 	else if($JIT_PSlider_PFS[0]->JIT_PSlider_Hidden_E1I==4)
 		 	{
 		 		$JIT_PSlider_Left_Icon='junaiticons-toggle-left';
				$JIT_PSlider_Right_Icon='junaiticons-toggle-right';
 		 	}
 		 	else if($JIT_PSlider_PFS[0]->JIT_PSlider_Hidden_E1I==5)
 		 	{
 		 		$JIT_PSlider_Left_Icon='junaiticons-chevron-circle-left';
				$JIT_PSlider_Right_Icon='junaiticons-chevron-circle-right';
 		 	}
 		 	else if($JIT_PSlider_PFS[0]->JIT_PSlider_Hidden_E1I==6)
 		 	{
 		 		$JIT_PSlider_Left_Icon='junaiticons-arrow-circle-left';
				$JIT_PSlider_Right_Icon='junaiticons-arrow-circle-right';
 		 	}
 		 	else if($JIT_PSlider_PFS[0]->JIT_PSlider_Hidden_E1I==7)
 		 	{
 		 		$JIT_PSlider_Left_Icon='junaiticons-angle-double-left';
				$JIT_PSlider_Right_Icon='junaiticons-angle-double-right';
 		 	}
 		 	else if($JIT_PSlider_PFS[0]->JIT_PSlider_Hidden_E1I==8)
 		 	{
 		 		$JIT_PSlider_Left_Icon='junaiticons-caret-left';
				$JIT_PSlider_Right_Icon='junaiticons-caret-right';
 		 	}
 		 	else if($JIT_PSlider_PFS[0]->JIT_PSlider_Hidden_E1I==9)
 		 	{
 		 		$JIT_PSlider_Left_Icon='junaiticons-mail-reply';
				$JIT_PSlider_Right_Icon='junaiticons-mail-forward';
 		 	}

 		 	if($JIT_PSlider_PFS[0]->JIT_PSlider_E8I==1)
 		 	{
 		 		$JIT_PSlider_E8I_Left='junaiticons-arrow-circle-o-left';
 		 		$JIT_PSlider_E8I_Right='junaiticons-arrow-circle-o-right';
 		 	}
 		 	else if($JIT_PSlider_PFS[0]->JIT_PSlider_E8I==2)
 		 	{
 		 		$JIT_PSlider_E8I_Left='junaiticons-arrow-left';
				$JIT_PSlider_E8I_Right='junaiticons-arrow-right';
 		 	}
 		 	else if($JIT_PSlider_PFS[0]->JIT_PSlider_E8I==3)
 		 	{
 		 		$JIT_PSlider_E8I_Left='junaiticons-chevron-left';
				$JIT_PSlider_E8I_Right='junaiticons-chevron-right';
 		 	}
 		 	else if($JIT_PSlider_PFS[0]->JIT_PSlider_E8I==4)
 		 	{
 		 		$JIT_PSlider_E8I_Left='junaiticons-toggle-left';
				$JIT_PSlider_E8I_Right='junaiticons-toggle-right';
 		 	}
 		 	else if($JIT_PSlider_PFS[0]->JIT_PSlider_E8I==5)
 		 	{
 		 		$JIT_PSlider_E8I_Left='junaiticons-chevron-circle-left';
				$JIT_PSlider_E8I_Right='junaiticons-chevron-circle-right';
 		 	}
 		 	else if($JIT_PSlider_PFS[0]->JIT_PSlider_E8I==6)
 		 	{
 		 		$JIT_PSlider_E8I_Left='junaiticons-arrow-circle-left';
				$JIT_PSlider_E8I_Right='junaiticons-arrow-circle-right';
 		 	}
 		 	else if($JIT_PSlider_PFS[0]->JIT_PSlider_E8I==7)
 		 	{
 		 		$JIT_PSlider_E8I_Left='junaiticons-angle-double-left';
				$JIT_PSlider_E8I_Right='junaiticons-angle-double-right';
 		 	}
 		 	else if($JIT_PSlider_PFS[0]->JIT_PSlider_E8I==8)
 		 	{
 		 		$JIT_PSlider_E8I_Left='junaiticons-caret-left';
				$JIT_PSlider_E8I_Right='junaiticons-caret-right';
 		 	}
 		 	else if($JIT_PSlider_PFS[0]->JIT_PSlider_E8I==9)
 		 	{
 		 		$JIT_PSlider_E8I_Left='junaiticons-mail-reply';
				$JIT_PSlider_E8I_Right='junaiticons-mail-forward';
 		 	}

 		 	if($JIT_PSlider_PFS[0]->JIT_PSlider_E8_1I==1)
 		 	{
 		 		$JIT_PSlider_E8_1I_Left='junaiticons-arrow-circle-o-left';
 		 		$JIT_PSlider_E8_1I_Right='junaiticons-arrow-circle-o-right';
 		 	}
 		 	else if($JIT_PSlider_PFS[0]->JIT_PSlider_E8_1I==2)
 		 	{
 		 		$JIT_PSlider_E8_1I_Left='junaiticons-arrow-left';
				$JIT_PSlider_E8_1I_Right='junaiticons-arrow-right';
 		 	}
 		 	else if($JIT_PSlider_PFS[0]->JIT_PSlider_E8_1I==3)
 		 	{
 		 		$JIT_PSlider_E8_1I_Left='junaiticons-chevron-left';
				$JIT_PSlider_E8_1I_Right='junaiticons-chevron-right';
 		 	}
 		 	else if($JIT_PSlider_PFS[0]->JIT_PSlider_E8_1I==4)
 		 	{
 		 		$JIT_PSlider_E8_1I_Left='junaiticons-toggle-left';
				$JIT_PSlider_E8_1I_Right='junaiticons-toggle-right';
 		 	}
 		 	else if($JIT_PSlider_PFS[0]->JIT_PSlider_E8_1I==5)
 		 	{
 		 		$JIT_PSlider_E8_1I_Left='junaiticons-chevron-circle-left';
				$JIT_PSlider_E8_1I_Right='junaiticons-chevron-circle-right';
 		 	}
 		 	else if($JIT_PSlider_PFS[0]->JIT_PSlider_E8_1I==6)
 		 	{
 		 		$JIT_PSlider_E8_1I_Left='junaiticons-arrow-circle-left';
				$JIT_PSlider_E8_1I_Right='junaiticons-arrow-circle-right';
 		 	}
 		 	else if($JIT_PSlider_PFS[0]->JIT_PSlider_E8_1I==7)
 		 	{
 		 		$JIT_PSlider_E8_1I_Left='junaiticons-angle-double-left';
				$JIT_PSlider_E8_1I_Right='junaiticons-angle-double-right';
 		 	}
 		 	else if($JIT_PSlider_PFS[0]->JIT_PSlider_E8_1I==8)
 		 	{
 		 		$JIT_PSlider_E8_1I_Left='junaiticons-caret-left';
				$JIT_PSlider_E8_1I_Right='junaiticons-caret-right';
 		 	}
 		 	else if($JIT_PSlider_PFS[0]->JIT_PSlider_E8_1I==9)
 		 	{
 		 		$JIT_PSlider_E8_1I_Left='junaiticons-mail-reply';
				$JIT_PSlider_E8_1I_Right='junaiticons-mail-forward';
 		 	}
 			
 			if($JIT_PSldier_E[0]->JIT_PSlider_ET=='Juna Slider') {?>	
				<style type="text/css">
 					.JIT_PSlider_Nav
 					{
 						left: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NPFL;?> !important;
 						<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NP;?>:16px;
 					}
 					.JIT_PSlider_Nav div:hover, .JIT_PSlider_Nav .av:hover 
 					{ 
 						background-color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NHC;?> !important; 
 					}
					.JIT_PSlider_Nav .av 
					{ 
						background-color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NCC;?> !important; 
					}
					.JIT_PSlider_Nav .dn, .JIT_PSlider_Nav .dn:hover 
					{ 
						background-color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NCC;?> !important; 
					}
					.JIT_PSlider_LIS,.JIT_PSlider_RIS
					{
						color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_AC;?> !important;
						font-size: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_AFS;?> !important;
						top: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_APFT;?> !important;
					}
 				</style>

 				<div class="JIT_PSlider_Slider_Div" style="height:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CH;?>;">
 					<input type="text" style="display: none;" id="JIT_PSlider_SD" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_SD;?>">
 					<input type="text" style="display: none;" id="JIT_PSlider_ET" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_ET;?>">
 					<input type="text" style="display: none;" id="JIT_PSlider_AutoPlay" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_AutoPlay;?>">
 					<input type="text" style="display: none;" id="JIT_PSlider_CS" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CS;?>">
 					<input type="text" style="display: none;" id="JIT_PSlider_PT" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PT;?>">
 					<input type="text" style="display: none;" id="JIT_PSlider_SS" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_SS;?>">
 					<input type="text" style="display: none;" id="JIT_PSlider_AS" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_AS;?>">
 					<input type="text" style="display: none;" id="JIT_PSlider_CW" value="<?php echo explode('px',$JIT_PSlider_PFS[0]->JIT_PSlider_CW)[0];?>">

	 				<div class="JIT_PSlider_Main_Div" id="JIT_PSlider_Glob_<?php echo $JIT_PSlider_Name;?>" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CW;?>; height: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CH;?>; overflow: hidden;/* visibility: hidden;*/  ">
	 					<div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
				            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
				            <div style="position:absolute;display:block;background:url('<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_LI;?>') no-repeat center center; background-size: 64px 64px; top:0px;left:0px;width:100%;height:100%;"></div>
				        </div>
				        <div data-u="slides" style="border:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBW;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBS;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBC;?>; border-radius:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBR;?>; cursor: default; position: relative; width: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CW;?>; height:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CH;?>; overflow: hidden;">
					        <?php if($JIT_PSlider_PFS[0]->JIT_PSlider_ShowTitle=='Yes'){?>
					        	<div data-u="thumbnavigator"  style="position:absolute;<?php if($JIT_PSlider_PFS[0]->JIT_PSlider_TPFT=='100%'){echo 'bottom:0%';}else{ echo 'top:'.$JIT_PSlider_PFS[0]->JIT_PSlider_TPFT;}?>;left:0px;width:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CW;?>;z-index: 999999999;background-color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TBC;?>;color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TC;?>;opacity:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TO;?>;font-size:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFS;?>;font-family:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFF;?>;text-align:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TTA;?>;height:100px;line-height: 41px;">
						            <div style="position: absolute; top: 0; left: 0; width: 100%; height:100%; background-color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TBC;?>; opacity:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TO;?>;"></div>
						            <div data-u="slides" style="cursor: auto;">
						                <div data-u="prototype" class="JIT_PSlider_P">
						                    <div data-u="thumbnailtemplate" class="JIT_PSlider_T"></div>
						                </div>
						            </div>
						        </div>
					        <?php }?>
					        <?php if($JIT_PSlider_PFS[0]->JIT_PSlider_ShowNav=='Yes'){?>
						        <div data-u="navigator" class="JIT_PSlider_Nav">
						            <div data-u="prototype" style="border-radius:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NBR;?>;width:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NS;?>;height:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NS;?>;background-color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NC;?>;border:1px solid <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NBC;?>;"></div>
						        </div>
					        <?php }?>
					        <?php if($JIT_PSlider_PFS[0]->JIT_PSlider_ShowArr=='Yes'){?>
						        <span data-u="arrowleft" class="JIT_PSlider_LIS" style="left:8px;" data-autocenter="2">
						        	<i class="junaiticons-style <?php echo $JIT_PSlider_Left_Icon;?>" style="float:left"></i>
						        </span>
						        <span data-u="arrowright" class="JIT_PSlider_RIS" style="right:8px;" data-autocenter="2">
						        	<i class="junaiticons-style <?php echo $JIT_PSlider_Right_Icon;?>" style="float:right"></i>
						        </span>
						    <?php }?>
					        <?php 
						        for($j=0;$j<count($JIT_PSlider_IWP);$j++){?>
						        	<div data-p="112.50" style="display: none;">
						                <img data-u="image" src="<?php echo $JIT_PSlider_IWP[$j]->photo_url;?>"/>
						                <?php if($JIT_PSlider_PFS[0]->JIT_PSlider_ShowTitle=='Yes'){
						                	$u = explode(')*^*(', $JIT_PSlider_IWP[$j]->photo_title);
											$y = implode('"', $u);
											$t = explode(")*&*(", $y);
											$Photo_Title = implode("'", $t);
						                	?>
						                	<?php if($JIT_PSlider_IWP[$j]->photo_link!=''){?>
						                		<div data-u="thumb"><a href="<?php echo $JIT_PSlider_IWP[$j]->photo_link;?>" target="<?php if($JIT_PSlider_IWP[$j]->open_NT=='Yes'){echo '_blank';}?>"><?php echo $Photo_Title;?></a></div>
						                	<?php }else{?>
						                		<div data-u="thumb"><?php echo $Photo_Title;?></div>
						                <?php }}?>
						            </div>
							<?php }?>
				        </div>
	 				</div>
 				</div> 				
			<?php
			}
			else if($JIT_PSldier_E[0]->JIT_PSlider_ET=='Full Width Slider')
			{
				?>
				<style type="text/css">
					.JIT_PSlider_FWS_Nav 
					{
					    position: absolute;
					    <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NP;?>:16px;
					    left:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NPFL;?>;
					    z-index: 999999999;
					}
					.JIT_PSlider_FWS_Nav div, .JIT_PSlider_FWS_Nav div:hover, .JIT_PSlider_FWS_Nav .av 
					{
					    position: absolute;
					    /* size of bullet elment */
					    width: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NS;?> !important;
					    height: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NS;?> !important;
					    overflow: hidden;
					    cursor: pointer;
					    background-color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NC;?>;
					    border:1px solid <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NBC;?> !important;
					    border-radius: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NBR;?> !important;
					}
					.JIT_PSlider_FWS_Nav div:hover, .JIT_PSlider_FWS_Nav .av:hover 
					{ 
						background-color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NHC;?>; 
					}
					.JIT_PSlider_FWS_Nav .av 
					{ 
						background-color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NCC;?>;  
					}
					.JIT_PSlider_FWS_Nav .dn, .JIT_PSlider_FWS_Nav .dn:hover 
					{ 
						background-color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NCC;?>; 
					}
					.JIT_PSlider_FWS_LI, .JIT_PSlider_FWS_RI {
					    display: block;
					    position: absolute;
					    cursor: pointer;
					    overflow: hidden;
					    font-size: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_AFS;?>;
					    color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_AC;?>;
					    top: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_APFT;?> !important;
					    z-index: 999999999;
					}
					.JIT_PSlider_FWS_Slides
					{
						background-color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_SSC;?>;
						border:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBW;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBS;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBC;?>;
						border-radius:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBR;?>;
						cursor: default; 
						position: relative; 
						top: 0px; 
						left: 0px; 
						width: 1300px; 
						height: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_SH;?>; 
						overflow: hidden;
					}
					.JIT_PSlider_FWS_Main_Div
					{
						background-color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_SBC;?>;
						position: relative; 
						margin: 0 auto; 
						top: 0px; 
						left: 0px; 
						width: 1300px; 
						height: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_SH;?>; 
						overflow: hidden;
						/* visibility: hidden;*/
					}
					.JIT_PSlider_FWST
					{
						position: absolute; 
						top: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TPFT;?>; 
						padding: 10px !important;
						background-color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TBC;?>; 
						font-size: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFS;?>; 
						font-family: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFF;?>;
						color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TC;?>; 
						opacity: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TO;?>; 
						line-height: 30px; 
						<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TTA;?>:0; 
						z-index: 99999999999;
					}
				</style>
				<div class="JIT_PSlider_FWS_Div">
					<input type="text" style="display: none;" id="JIT_PSlider_ET1" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_ET;?>">
					<input type="text" style="display: none;" id="JIT_PSlider_AP" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_AutoPlay;?>">
					<input type="text" style="display: none;" id="JIT_PSlider_APS" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_APS;?>">
					<input type="text" style="display: none;" id="JIT_PSlider_FWS_CS" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CS;?>">
					<input type="text" style="display: none;" id="JIT_PSlider_FWS_PT" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PT;?>">
					<input type="text" style="display: none;" id="JIT_PSlider_FWS_SS" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_SS;?>">
					<input type="text" style="display: none;" id="JIT_PSlider_FWS_AS" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_AS;?>">
					<input type="text" style="display: none;" id="JIT_PSlider_SW" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_SW;?>">
					<input type="text" style="display: none;" id="JIT_PSlider_SC" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_SC;?>">

					<div class="JIT_PSlider_FWS_Main_Div" id="JIT_PSlider_FWS_Glob_<?php echo $JIT_PSlider_Name;?>">
				        <!-- Loading Screen -->
				        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
				            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
				            <div style="position:absolute;display:block;background:url('<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_LI;?>') no-repeat center center; background-size: 64px 64px; top:0px;left:0px;width:100%;height:100%;"></div>
				        </div>
				        <div data-u="slides" class="JIT_PSlider_FWS_Slides">
				        	<?php for($j=0;$j<count($JIT_PSlider_IWP);$j++){?>
					        	<div data-p="225.00" style="display: none;">
					        		<img data-u="image" style="border-radius: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_IR;?>" src="<?php echo $JIT_PSlider_IWP[$j]->photo_url;?>"/>
					        		<?php if($JIT_PSlider_PFS[0]->JIT_PSlider_ShowTitle=='Yes'){
					        			$u = explode(')*^*(', $JIT_PSlider_IWP[$j]->photo_title);
										$y = implode('"', $u);
										$t = explode(")*&*(", $y);
										$Photo_Title = implode("'", $t);
					        			?>
					                	<?php if($JIT_PSlider_IWP[$j]->photo_link!=''){?>
					                		<div data-u="caption" data-t="<?php echo(rand(0,16));?>" class="JIT_PSlider_FWST"><a href="<?php echo $JIT_PSlider_IWP[$j]->photo_link;?>" target="<?php if($JIT_PSlider_IWP[$j]->open_NT=='Yes'){echo '_blank';}?>"><?php echo $Photo_Title;?></a></div>
					                	<?php }else{?>
					                		<div data-u="caption" data-t="<?php echo $j;?>" class="JIT_PSlider_FWST"><?php echo $Photo_Title;?></div>
					                <?php }}?>
					        	</div>
					        <?php }?>
				        </div>
				        <?php if($JIT_PSlider_PFS[0]->JIT_PSlider_ShowNav=='Yes'){?>
					        <!-- Bullet Navigator -->
					        <div data-u="navigator" class="JIT_PSlider_FWS_Nav">
					            <!-- bullet navigator item prototype -->
					            <div data-u="prototype"></div>
					        </div>
					    <?php }?>  
				        <?php if($JIT_PSlider_PFS[0]->JIT_PSlider_ShowArr=='Yes'){?>
				        	<!-- Arrow Navigator -->
					        <span data-u="arrowleft" class="JIT_PSlider_FWS_LI" style="left:12px;" data-autocenter="2">
					        	<i class="junaiticons-style <?php echo $JIT_PSlider_Left_Icon;?>" style="float:left"></i>
					        </span>
					        <span data-u="arrowright" class="JIT_PSlider_FWS_RI" style="right:12px;" data-autocenter="2">
					        	<i class="junaiticons-style <?php echo $JIT_PSlider_Right_Icon;?>" style="float:right"></i>
					        </span>
					    <?php }?>
				    </div>
				</div>
				<?php
			}
			else if($JIT_PSldier_E[0]->JIT_PSlider_ET=='Different Size Slider')
			{
				?>
				    <style>
				    	.JIT_PSlider_DSS_Nav 
						{
						    position: absolute;
						    <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NP;?>:16px;
						    left:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NPFL;?>;
						    z-index: 999999999;
						}
						.JIT_PSlider_DSS_Nav div, .JIT_PSlider_DSS_Nav div:hover, .JIT_PSlider_DSS_Nav .av 
						{
						    position: absolute;
						    /* size of bullet elment */
						    width: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NS;?> !important;
						    height: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NS;?> !important;
						    overflow: hidden;
						    cursor: pointer;
						    background-color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NC;?>;
						    border:1px solid <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NBC;?> !important;
						    border-radius: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NBR;?> !important;
						}
						.JIT_PSlider_DSS_Nav div:hover, .JIT_PSlider_DSS_Nav .av:hover 
						{ 
							background-color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NHC;?>; 
						}
						.JIT_PSlider_DSS_Nav .av 
						{ 
							background-color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NCC;?>;  
						}
						.JIT_PSlider_DSS_Nav .dn, .JIT_PSlider_DSS_Nav .dn:hover 
						{ 
							background-color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NCC;?>; 
						}
				        .JIT_PSlider_Caption
				        {
				        	position:absolute;				        	
				        	left:0px;
				        	width:100%;
				        	z-index: 999999999;				        	
				        }
				        .JIT_PSlider_DSS_LI, .JIT_PSlider_DSS_RI 
				        {
						    display: block;
						    position: absolute;
						    cursor: pointer;
						    overflow: hidden;
						    font-size: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_AFS;?>;
						    color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_AC;?>;
						    top: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_APFT;?> !important;
						    z-index: 999999999;
						}
				    </style>
				    <div class="JIT_VGallery_DSS" style="background-color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_SBC;?>;border:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBW;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBS;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBC;?>;">
				    <input type="text" style="display: none;" id="JIT_PSlider_ET2" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_ET;?>">
				    <input type="text" style="display: none;" id="JIT_PSlider_DSS_AP" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_AutoPlay;?>">
				    <input type="text" style="display: none;" id="JIT_PSlider_DSS_CS" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CS;?>">
					<input type="text" style="display: none;" id="JIT_PSlider_DSS_PT" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PT;?>">
					<input type="text" style="display: none;" id="JIT_PSlider_DSS_SS" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_SS;?>">
					<input type="text" style="display: none;" id="JIT_PSlider_DSS_AS" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_AS;?>">
					<input type="text" style="display: none;" id="JIT_PSlider_DSS_CW" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CW;?>">
				    	
				    	<div class="JIT_PSlider_DSS_Main_Div" id="JIT_PSlider_DSS_Main_Div_<?php echo $JIT_PSlider_Name;?>" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CW;?>; height: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CH;?>; overflow: hidden; visibility: hidden;">
					        <!-- Loading Screen -->
					        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
					            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
					            <div style="position:absolute;display:block;background:url('<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_LI;?>') no-repeat center center;background-size:64px 64px;top:0px;left:0px;width:100%;height:100%;"></div>
					        </div>
					        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CW;?>; height: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CH;?>; overflow: hidden;">
				            	<?php for($j=0;$j<count($JIT_PSlider_IWP);$j++){?>
						         	<div style="display: none;">
						               	<img style="border-radius:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_IR;?>" data-u="image" src="<?php echo $JIT_PSlider_IWP[$j]->photo_url;?>" />
						               	<!-- <div data-u='caption'></div> -->
						                <?php if($JIT_PSlider_PFS[0]->JIT_PSlider_ShowTitle=='Yes'){
						                	$u = explode(')*^*(', $JIT_PSlider_IWP[$j]->photo_title);
											$y = implode('"', $u);
											$t = explode(")*&*(", $y);
											$Photo_Title = implode("'", $t);
						                	?>
						                	<?php if($JIT_PSlider_IWP[$j]->photo_link!=''){?>
						                		<div data-u="caption" class="JIT_PSlider_Caption" style="<?php if($JIT_PSlider_PFS[0]->JIT_PSlider_TPFT=='100%'){echo 'bottom:0%';}else{ echo 'top:'.$JIT_PSlider_PFS[0]->JIT_PSlider_TPFT;}?>;background-color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TBC;?>; color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TC;?>; opacity:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TO;?>;	font-size:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFS;?>; font-family:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFF;?>; text-align:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TTA;?>;"><a href="<?php echo $JIT_PSlider_IWP[$j]->photo_link;?>" target="<?php if($JIT_PSlider_IWP[$j]->open_NT=='Yes'){echo '_blank';}?>"><?php echo $Photo_Title;?></a></div>
						                	<?php }else{?>
						                		<div data-u="caption" class="JIT_PSlider_Caption" style="<?php if($JIT_PSlider_PFS[0]->JIT_PSlider_TPFT=='100%'){echo 'bottom:0%';}else{ echo 'top:'.$JIT_PSlider_PFS[0]->JIT_PSlider_TPFT;}?>;background-color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TBC;?>; color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TC;?>; opacity:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TO;?>;	font-size:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFS;?>; font-family:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFF;?>; text-align:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TTA;?>;"><?php echo $Photo_Title;?></div>
						                <?php }}?>
						            </div>
						       	<?php }?>
					        </div>

					        <?php if($JIT_PSlider_PFS[0]->JIT_PSlider_ShowNav=='Yes'){?>
						        <!-- Bullet Navigator -->
						        <div data-u="navigator" class="JIT_PSlider_DSS_Nav">
						            <!-- bullet navigator item prototype -->
						            <div data-u="prototype"></div>
						        </div>
						    <?php }?>
						    <?php if($JIT_PSlider_PFS[0]->JIT_PSlider_ShowArr=='Yes'){?>
					        	<!-- Arrow Navigator -->
						        <span data-u="arrowleft" class="JIT_PSlider_DSS_LI" style="left:13px;" data-autocenter="2">
						        	<i class="junaiticons-style <?php echo $JIT_PSlider_Left_Icon;?>" style="float:left"></i>
						        </span>
						        <span data-u="arrowright" class="JIT_PSlider_DSS_RI" style="right:13px;" data-autocenter="2">
						        	<i class="junaiticons-style <?php echo $JIT_PSlider_Right_Icon;?>" style="float:right"></i>
						        </span>
						    <?php }?>					       
					    </div>
				    </div>
				<?php
			}
			else if($JIT_PSldier_E[0]->JIT_PSlider_ET=='Vertical Thumbnail')
			{
				?>
				    <style>
				        .JIT_PSlider_VerThumbNav .p {
				            position: absolute;
				            top: 0 ;
				            left: 0;
				            width: 99px;
				            height: 66px;
				        }
				        .JIT_PSlider_VerThumbNav .t {
				            position: absolute;
				            top: 0;
				            left: 0;
				            width: 100%;
				            height: 100%;
				            border: none;
				            border-radius: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NBR;?>;
				        }
				        .JIT_PSlider_VerThumbNav .w {
				            position: absolute;
				            top: 0px;
				            left: 0px;
				            width: 100%;
				            height: 100%;
				        }
				        .JIT_PSlider_VerThumbNav .c {
				            position: absolute;
				            top: 0px;
				            left: 0px;
				            width: 95px;
				            height: 62px;
				            border: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NBC;?> 2px solid;
				            box-sizing: content-box;
				            background: url('<?php echo plugins_url('/Images/t01.png',__FILE__);?>') -800px -800px no-repeat;
				            _background: none;
				            border-radius: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NBR;?>;
				        }
				        .JIT_PSlider_VerThumbNav .pav .c {
				            top: 2px;
				            _top: 0px;
				            left: 2px;
				            _left: 0px;
				            width: 95px;
				            height: 62px;
				            border: #000 0px solid;
				            _border: #fff 2px solid;
				            background-position: 50% 50%;
				        }
				        .JIT_PSlider_VerThumbNav .p:hover .c {
				            top: 0px;
				            left: 0px;
				            width: 97px;
				            height: 64px;
				            border: #fff 1px solid;
				            background-position: 50% 50%;
				        }
				        .JIT_PSlider_VerThumbNav .p.pdn .c {
				            background-position: 50% 50%;
				            width: 95px;
				            height: 62px;
				            border: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NBC;?> 2px solid;
				        }
				        * html .JIT_PSlider_VerThumbNav .c, * html .JIT_PSlider_VerThumbNav .pdn .c, * html .JIT_PSlider_VerThumbNav .pav .c {
				            /* ie quirks mode adjust */
				            width /**/: 99px;
				            height /**/: 66px;
				        }
				        .JIT_PSlider_VTSCaption
				        {
				        	position:absolute;				        	
				        	left:0px;
				        	width:100%;
				        	z-index: 999999999;	
				        	padding: 2px;	        	
				        }
				        .JIT_PSlider_VTS_LI, .JIT_PSlider_VTS_RI 
				        {
						    display: block;
						    position: absolute;
						    cursor: pointer;
						    overflow: hidden;
						    font-size: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_AFS;?>;
						    color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_AC;?>;
						    top: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_APFT;?> !important;
						    z-index: 999999999;
						}						
				    </style>				  
					<?php
			        	$JITCWidth=explode('px',$JIT_PSlider_PFS[0]->JIT_PSlider_CW);
			        	$JITCWidth[0]=$JITCWidth[0]-240;
			        	$JITCWidthNewReal=implode('px', $JITCWidth);
				    ?>
				    <div class="JIT_PSlider_VTS" id="JIT_PSlider_VTS_<?php echo $JIT_PSlider_Name;?>" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CW;?>; height: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CH;?>; overflow: hidden; visibility: hidden; background-color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_SBC;?>;">
			        <input type="text" style="display: none;" id="JIT_PSlider_ET3"     value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_ET;?>">
				    <input type="text" style="display: none;" id="JIT_PSlider_VTS_AP"  value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_AutoPlay;?>">
				    <input type="text" style="display: none;" id="JIT_PSlider_VTS_APS" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_APS;?>">
				    <input type="text" style="display: none;" id="JIT_PSlider_VTS_CS"  value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CS;?>">
					<input type="text" style="display: none;" id="JIT_PSlider_VTS_PT"  value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PT;?>">
					<input type="text" style="display: none;" id="JIT_PSlider_VTS_SS"  value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_SS;?>">
					<input type="text" style="display: none;" id="JIT_PSlider_VTS_AS"  value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_AS;?>">
					<input type="text" style="display: none;" id="JIT_PSlider_VTS_CW"  value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CW;?>">
				        <!-- Loading Screen -->				        
				        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
				            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
				            <div style="position:absolute;display:block;background:url('<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_LI;?>') no-repeat center center; background-size:64px 64px;top:0px;left:0px;width:100%;height:100%;"></div>
				        </div>

				        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 240px; width: <?php echo $JITCWidthNewReal;?>; height: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CH;?>; overflow: hidden;">
				        	<?php for($j=0;$j<count($JIT_PSlider_IWP);$j++){?>
					            <div data-p="150.00" style="display: none; ">
					                <img data-u="image" src="<?php echo $JIT_PSlider_IWP[$j]->photo_url;?>" style="border:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBW;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBS;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBC;?>; border-radius:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_IR;?>"/>
					                <img data-u="thumb" src="<?php echo $JIT_PSlider_IWP[$j]->photo_url;?>"/>
					                <?php if($JIT_PSlider_PFS[0]->JIT_PSlider_ShowTitle=='Yes'){
						                	$u = explode(')*^*(', $JIT_PSlider_IWP[$j]->photo_title);
											$y = implode('"', $u);
											$t = explode(")*&*(", $y);
											$Photo_Title = implode("'", $t);
						                	?>
						                	<?php if($JIT_PSlider_IWP[$j]->photo_link!=''){?>
						                		<div data-u="caption" class="JIT_PSlider_VTSCaption" style="<?php if($JIT_PSlider_PFS[0]->JIT_PSlider_TPFT=='100%'){echo 'bottom:0%';}else{ echo 'top:'.$JIT_PSlider_PFS[0]->JIT_PSlider_TPFT;}?>;background-color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TBC;?>; color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TC;?>; opacity:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TO;?>;	font-size:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFS;?>; font-family:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFF;?>; text-align:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TTA;?>;line-height: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFS;?>;"><a href="<?php echo $JIT_PSlider_IWP[$j]->photo_link;?>" target="<?php if($JIT_PSlider_IWP[$j]->open_NT=='Yes'){echo '_blank';}?>"><?php echo $Photo_Title;?></a></div>
						                	<?php }else{?>
						                		<div data-u="caption" class="JIT_PSlider_VTSCaption" style="<?php if($JIT_PSlider_PFS[0]->JIT_PSlider_TPFT=='100%'){echo 'bottom:0%';}else{ echo 'top:'.$JIT_PSlider_PFS[0]->JIT_PSlider_TPFT;}?>;background-color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TBC;?>; color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TC;?>; opacity:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TO;?>;	font-size:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFS;?>; font-family:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFF;?>; text-align:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TTA;?>;line-height: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFS;?>;"><?php echo $Photo_Title;?></div>
						                <?php }}?>
					            </div>
				            <?php }?>
				        </div>
				        <!-- Thumbnail Navigator -->
				            
				        <div data-u="thumbnavigator" class="JIT_PSlider_VerThumbNav" style="position:absolute;left:0px;top:0px;width:240px;height:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CH;?>;" data-autocenter="2">
				            <!-- Thumbnail Item Skin Begin -->
				            <div data-u="slides" style="cursor: default;">
				                <div data-u="prototype" class="p" >
				                    <div class="w">
				                        <div data-u="thumbnailtemplate" class="t"></div>
				                    </div>
				                    <div class="c"></div>
				                </div>
				            </div>
				            <!-- Thumbnail Item Skin End -->
				        </div>
				        <!-- Arrow Navigator -->
				        <?php if($JIT_PSlider_PFS[0]->JIT_PSlider_ShowArr=='Yes'){?>
				        	<!-- Arrow Navigator -->
					        <span data-u="arrowleft" class="JIT_PSlider_VTS_LI" style="left:248px;" data-autocenter="2">
					        	<i class="junaiticons-style <?php echo $JIT_PSlider_Left_Icon;?>" style="float:left"></i>
					        </span>
					        <span data-u="arrowright" class="JIT_PSlider_VTS_RI" style="right:8px;" data-autocenter="2">
					        	<i class="junaiticons-style <?php echo $JIT_PSlider_Right_Icon;?>" style="float:right"></i>
					        </span>
					    <?php }?>	
				    </div>
				<?php	
			}
			else if($JIT_PSldier_E[0]->JIT_PSlider_ET=='Horizontal Thumbnail')
			{
				?>
				    <style>
				        .JIT_PSlider_HorThumbNav .p {
				            position: absolute;
				            top: 0;
				            left: 0;
				            width: 102px;
				            height: 72px;
				        }				        
				        .JIT_PSlider_HorThumbNav .t {
				            position: absolute;
				            top: 0;
				            left: 0;
				            width: 100%;
				            height: 100%;
				            border: none;
				            border-radius: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NBR;?>;
				        }				        
				        .JIT_PSlider_HorThumbNav .w {
				            position: absolute;
				            top: 0px;
				            left: 0px;
				            width: 100%;
				            height: 100%;
				        }				        
				        .JIT_PSlider_HorThumbNav .c {
				            position: absolute;
				            top: 0px;
				            left: 0px;
				            width: 98px;
				            height: 68px;
				            border: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NBC;?> 2px solid;
				            box-sizing: content-box;
				            background: url('<?php echo plugins_url('/Images/t01.png',__FILE__);?>') -800px -800px no-repeat;
				            _background: none;
				            border-radius: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NBR;?>;
				        }				        
				        .JIT_PSlider_HorThumbNav .pav .c {
				            top: 2px;
				            _top: 0px;
				            left: 2px;
				            _left: 0px;
				            width: 98px;
				            height: 68px;
				            border: #000 0px solid;
				            _border: #fff 2px solid;
				            background-position: 50% 50%;
				        }				        
				        .JIT_PSlider_HorThumbNav .p:hover .c {
				            top: 0px;
				            left: 0px;
				            width: 100px;
				            height: 70px;
				            border: #fff 1px solid;
				            background-position: 50% 50%;
				        }				        
				        .JIT_PSlider_HorThumbNav .p.pdn .c {
				            background-position: 50% 50%;
				            width: 98px;
				            height: 68px;
				            border: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NBC;?> 2px solid;
				        }				        
				        * html .JIT_PSlider_HorThumbNav .c, * html .JIT_PSlider_HorThumbNav .pdn .c, * html .JIT_PSlider_HorThumbNav .pav .c {
				            /* ie quirks mode adjust */
				            width /**/: 102px;
				            height /**/: 72px;
				        }
				        .JIT_PSlider_HTSCaption
				        {
				        	position:absolute;				        	
				        	left:0px;
				        	width:100%;
				        	z-index: 999999999;	
				        	padding: 2px;	        	
				        }
				        .JIT_PSlider_HTS_LI, .JIT_PSlider_HTS_RI 
				        {
						    display: block;
						    position: absolute;
						    cursor: pointer;
						    overflow: hidden;
						    top: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_APFT;?> !important;
						    z-index: 999999999;
						}
						.JIT_PSlider_HTS_LI:hover, .JIT_PSlider_HTS_RI:hover
						{
							opacity: 0.7;
						}						
				    </style>
				    <?php
				    	$JITHTSCHeight=explode('px',$JIT_PSlider_PFS[0]->JIT_PSlider_CH);
			        	$JITHTSCHeight[0]=$JITHTSCHeight[0]-100;
			        	$JITHTSCHeightNewReal=implode('px', $JITHTSCHeight);
				    ?>
				    <div class="JIT_PSlider_HTS" id="JIT_PSlider_HTS_<?php echo $JIT_PSlider_Name;?>" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CW;?>; height: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CH;?>; overflow: hidden; visibility: hidden; background-color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_SBC;?>;">
				    <input type="text" style="display: none;" id="JIT_PSlider_ET4"     value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_ET;?>">
				    <input type="text" style="display: none;" id="JIT_PSlider_HTS_AP"  value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_AutoPlay;?>">
				    <input type="text" style="display: none;" id="JIT_PSlider_HTS_APS" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_APS;?>">
				    <input type="text" style="display: none;" id="JIT_PSlider_HTS_CS"  value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CS;?>">
					<input type="text" style="display: none;" id="JIT_PSlider_HTS_PT"  value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PT;?>">
					<input type="text" style="display: none;" id="JIT_PSlider_HTS_SS"  value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_SS;?>">
					<input type="text" style="display: none;" id="JIT_PSlider_HTS_AS"  value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_AS;?>">
					<input type="text" style="display: none;" id="JIT_PSlider_HTS_CW"  value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CW;?>">
				        <!-- Loading Screen -->
				        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
				            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
				            <div style="position:absolute;display:block;background:url('<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_LI;?>') no-repeat center center; background-size:64px 64px;top:0px;left:0px;width:100%;height:100%;"></div>
				        </div>
				        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CW;?>; height: <?php echo $JITHTSCHeightNewReal;?>; overflow: hidden;">
				        	<?php for($j=0;$j<count($JIT_PSlider_IWP);$j++){?>
					            <div data-p="114.50" style="display: none; ">
					                <img data-u="image" src="<?php echo $JIT_PSlider_IWP[$j]->photo_url;?>" style="border:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBW;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBS;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBC;?>; border-radius:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_IR;?>"/>
					                <img data-u="thumb" src="<?php echo $JIT_PSlider_IWP[$j]->photo_url;?>"/>
					                <?php if($JIT_PSlider_PFS[0]->JIT_PSlider_ShowTitle=='Yes'){
						                	$u = explode(')*^*(', $JIT_PSlider_IWP[$j]->photo_title);
											$y = implode('"', $u);
											$t = explode(")*&*(", $y);
											$Photo_Title = implode("'", $t);
						                	?>
						                	<?php if($JIT_PSlider_IWP[$j]->photo_link!=''){?>
						                		<div data-u="caption" class="JIT_PSlider_HTSCaption" style="<?php if($JIT_PSlider_PFS[0]->JIT_PSlider_TPFT=='100%'){echo 'bottom:0%';}else{ echo 'top:'.$JIT_PSlider_PFS[0]->JIT_PSlider_TPFT;}?>;background-color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TBC;?>; color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TC;?>; opacity:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TO;?>;	font-size:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFS;?>; font-family:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFF;?>; text-align:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TTA;?>;line-height: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFS;?>;"><a href="<?php echo $JIT_PSlider_IWP[$j]->photo_link;?>" target="<?php if($JIT_PSlider_IWP[$j]->open_NT=='Yes'){echo '_blank';}?>"><?php echo $Photo_Title;?></a></div>
						                	<?php }else{?>
						                		<div data-u="caption" class="JIT_PSlider_HTSCaption" style="<?php if($JIT_PSlider_PFS[0]->JIT_PSlider_TPFT=='100%'){echo 'bottom:0%';}else{ echo 'top:'.$JIT_PSlider_PFS[0]->JIT_PSlider_TPFT;}?>;background-color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TBC;?>; color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TC;?>; opacity:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TO;?>;	font-size:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFS;?>; font-family:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFF;?>; text-align:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TTA;?>;line-height: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFS;?>;"><?php echo $Photo_Title;?></div>
						                <?php }}?>
					            </div>
				            <?php }?>
				        </div>
				        <!-- Thumbnail Navigator -->
				        <div data-u="thumbnavigator" class="JIT_PSlider_HorThumbNav" style="position:absolute;left:0px;bottom:0px;width:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CW;?>;height:100px;" data-autocenter="1">
				            <!-- Thumbnail Item Skin Begin -->
				            <div data-u="slides" style="cursor: default;">
				                <div data-u="prototype" class="p">
				                    <div class="w">
				                        <div data-u="thumbnailtemplate" class="t"></div>
				                    </div>
				                    <div class="c"></div>
				                </div>
				            </div>
				            <!-- Thumbnail Item Skin End -->
				        </div>
				        <?php if($JIT_PSlider_PFS[0]->JIT_PSlider_ShowArr=='Yes'){?>
				        	<!-- Arrow Navigator -->
					        <span data-u="arrowleft" class="JIT_PSlider_HTS_LI" style="left:8px;">
					        	<img src="<?php echo plugins_url('/Images/icon-'. $JIT_PSlider_PFS[0]->JIT_PSlider_Hidden_E1I .'.png',__FILE__);?>">
					        </span>
					        <span data-u="arrowright" class="JIT_PSlider_HTS_RI" style="right:8px;">
					        <img src="<?php echo plugins_url('/Images/icon-'. $JIT_PSlider_PFS[0]->JIT_PSlider_Hidden_E1I .'-'. $JIT_PSlider_PFS[0]->JIT_PSlider_Hidden_E1I .'.png',__FILE__);?>">
					        </span>
					    <?php }?>	
				    </div>
				<?php
			}
			else if($JIT_PSldier_E[0]->JIT_PSlider_ET=='Thumbnail Slider')
			{
				?>
				    <style>
				        .JIT_PSlider_TSNav .p {
				            position: absolute;
				            top: 0;
				            left: 0;
				            width: 62px;
				            height: 32px;
				        }
				        .JIT_PSlider_TSNav .t {
				            position: absolute;
				            top: 0;
				            left: 0;
				            width: 100%;
				            height: 100%;
				            border: none;
				            border-radius: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NBR;?>;				            
				        }
				        .JIT_PSlider_TSNav .w, .JIT_PSlider_TSNav .pav:hover .w {
				            position: absolute;
				            width: 60px;
				            height: 30px;
				            border: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NBC;?> 1px dashed;
				            box-sizing: content-box;
				            border-radius: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NBR;?>;

				        }
				        .JIT_PSlider_TSNav .pdn .w, .JIT_PSlider_TSNav .pav .w {
				            border-style: solid;
				        }
				        .JIT_PSlider_TSNav .c {
				            position: absolute;
				            top: 0;
				            left: 0;
				            width: 62px;
				            height: 32px;
				            background-color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NC;?>;
				            border-radius: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NBR;?>;
				        
				            filter: alpha(opacity=45);
				            opacity: .45;
				            transition: opacity .6s;
				            -moz-transition: opacity .6s;
				            -webkit-transition: opacity .6s;
				            -o-transition: opacity .6s;
				        }
				        .JIT_PSlider_TSNav .p:hover .c, .JIT_PSlider_TSNav .pav .c {
				            filter: alpha(opacity=20);
				            opacity: 0.2;
				            background-color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NCC;?>;
				        }
				        .JIT_PSlider_TSNav .p:hover .c {
				            transition: none;
				            -moz-transition: none;
				            -webkit-transition: none;
				            -o-transition: none;
				            background-color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NCC;?>;

				        }
				        * html .JIT_PSlider_TSNav .w {
				            width /**/: 62px;
				            height /**/: 32px;
				        }
				        .JIT_PSlider_TSCaption
				        {
				        	position:absolute;				        	
				        	left:0px;
				        	width:100%;
				        	z-index: 999999999;	
				        	padding: 2px;	        	
				        }
				        .JIT_PSlider_TS_LI, .JIT_PSlider_TS_RI 
				        {
						    display: block;
						    position: absolute;
						    cursor: pointer;
						    overflow: hidden;
						    top: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_APFT;?> !important;
						    z-index: 999999999;
						}
						.JIT_PSlider_TS_LI:hover, .JIT_PSlider_TS_RI:hover
						{
							opacity: 0.7;
						}					        
				    </style>

				    <div class="JIT_PSlider_TS" id="JIT_PSlider_TS_<?php echo $JIT_PSlider_Name;?>" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CW;?>; height: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CH;?>; overflow: hidden; visibility: hidden;background-color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_SBC;?>; ">
				    <input type="text" style="display: none;" id="JIT_PSlider_ET5"    value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_ET;?>">
				    <input type="text" style="display: none;" id="JIT_PSlider_TS_AP"  value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_AutoPlay;?>">
				    <input type="text" style="display: none;" id="JIT_PSlider_TS_APS" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_APS;?>">
				    <input type="text" style="display: none;" id="JIT_PSlider_TS_CS"  value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CS;?>">
					<input type="text" style="display: none;" id="JIT_PSlider_TS_PT"  value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PT;?>">
					<input type="text" style="display: none;" id="JIT_PSlider_TS_SS"  value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_SS;?>">
					<input type="text" style="display: none;" id="JIT_PSlider_TS_AS"  value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_AS;?>">
					<input type="text" style="display: none;" id="JIT_PSlider_TS_CW"  value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CW;?>">
				        <!-- Loading Screen -->
				        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
				            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
				            <div style="position:absolute;display:block;background:url('<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_LI;?>') no-repeat center center; background-size:64px 64px;top:0px;left:0px;width:100%;height:100%;"></div>
				        </div>
				        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CW;?>; height: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CH;?>; overflow: hidden; border:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBW;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBS;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBC;?>;">
				        	<?php for($j=0;$j<count($JIT_PSlider_IWP);$j++){?>
					            <div data-p="112.50" style="display: none; ">
					                <img data-u="image" src="<?php echo $JIT_PSlider_IWP[$j]->photo_url;?>" style="border:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBW;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBS;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBC;?>; border-radius:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_IR;?>"/>
					                <img data-u="thumb" src="<?php echo $JIT_PSlider_IWP[$j]->photo_url;?>"/>
					                <?php if($JIT_PSlider_PFS[0]->JIT_PSlider_ShowTitle=='Yes'){
						                	$u = explode(')*^*(', $JIT_PSlider_IWP[$j]->photo_title);
											$y = implode('"', $u);
											$t = explode(")*&*(", $y);
											$Photo_Title = implode("'", $t);
						                	?>
						                	<?php if($JIT_PSlider_IWP[$j]->photo_link!=''){?>
						                		<div data-u="caption" class="JIT_PSlider_TSCaption" style="<?php if($JIT_PSlider_PFS[0]->JIT_PSlider_TPFT=='100%'){echo 'bottom:0%';}else{ echo 'top:'.$JIT_PSlider_PFS[0]->JIT_PSlider_TPFT;}?>;background-color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TBC;?>; color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TC;?>; opacity:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TO;?>;	font-size:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFS;?>; font-family:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFF;?>; text-align:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TTA;?>;line-height: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFS;?>;"><a href="<?php echo $JIT_PSlider_IWP[$j]->photo_link;?>" target="<?php if($JIT_PSlider_IWP[$j]->open_NT=='Yes'){echo '_blank';}?>"><?php echo $Photo_Title;?></a></div>
						                	<?php }else{?>
						                		<div data-u="caption" class="JIT_PSlider_TSCaption" style="<?php if($JIT_PSlider_PFS[0]->JIT_PSlider_TPFT=='100%'){echo 'bottom:0%';}else{ echo 'top:'.$JIT_PSlider_PFS[0]->JIT_PSlider_TPFT;}?>;background-color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TBC;?>; color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TC;?>; opacity:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TO;?>;	font-size:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFS;?>; font-family:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFF;?>; text-align:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TTA;?>;line-height: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFS;?>;"><?php echo $Photo_Title;?></div>
						                <?php }}?>
					            </div>
				            <?php }?>
				        </div>
				        <!-- Thumbnail Navigator -->
				        <div u="thumbnavigator" class="JIT_PSlider_TSNav" style="position:absolute;left:0px;<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NP;?>:0px;width:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CW;?>;height:60px;" data-autocenter="1">
				            <div style="position: absolute; top: 0; left: 0; width: 100%; height:100%; background-color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_NHC;?>; filter:alpha(opacity=30.0); opacity:0.3;"></div>
				            <!-- Thumbnail Item Skin Begin -->
				            <div u="slides" style="cursor: default;">
				                <div u="prototype" class="p">
				                    <div class="w">
				                        <div u="thumbnailtemplate" class="t"></div>
				                    </div>
				                    <div class="c"></div>
				                </div>
				            </div>
				            <!-- Thumbnail Item Skin End -->
				        </div>
				        <?php if($JIT_PSlider_PFS[0]->JIT_PSlider_ShowArr=='Yes'){?>
				        	<!-- Arrow Navigator -->
					        <span data-u="arrowleft" class="JIT_PSlider_TS_LI" style="left:8px;">
					        	<img src="<?php echo plugins_url('/Images/icon-'. $JIT_PSlider_PFS[0]->JIT_PSlider_Hidden_E1I .'.png',__FILE__);?>">
					        </span>
					        <span data-u="arrowright" class="JIT_PSlider_TS_RI" style="right:8px;">
					        <img src="<?php echo plugins_url('/Images/icon-'. $JIT_PSlider_PFS[0]->JIT_PSlider_Hidden_E1I .'-'. $JIT_PSlider_PFS[0]->JIT_PSlider_Hidden_E1I .'.png',__FILE__);?>">
					        </span>
					    <?php }?>	
				    </div>
				<?php
			}
			else if($JIT_PSldier_E[0]->JIT_PSlider_ET=='3D Slider')
			{
				$ContHei=explode('px', $JIT_PSlider_PFS[0]->JIT_PSlider_SH)[0]+explode('px', $JIT_PSlider_PFS[0]->JIT_PSlider_AFS)[0]+explode('px', $JIT_PSlider_PFS[0]->JIT_PSlider_TFS)[0]+50;
				$JIT_PSlider_3D_ADMT=explode('px', $JIT_PSlider_PFS[0]->JIT_PSlider_AFS)[0]+10;
				?>
			        <input type="text" style="display: none;" id="JIT_PSlider_3D_AutoPlay" value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_AutoPlay;?>">
			        <input type="text" style="display: none;" id="JIT_PSlider_3D_SD"       value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_SD;?>">
			        <input type="text" style="display: none;" id="JIT_PSlider_3D_Deg"      value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_Deg;?>">
					<input type="text" style="display: none;" id="JIT_PSlider_ET6"         value="<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_ET;?>">
					<style type="text/css">
						.JIT_PSlider_3DAD_<?php echo $JIT_PSlider_Name;?>
						{
							background-color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TBC;?>;
							color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TC;?>;
							font-size: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFS;?>;
							font-family: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TFF;?>;
							opacity: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TO;?>;
							text-align: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TTA;?>;
							border:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TBrW;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TBrS;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TBrC;?>;
							border-radius: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_TBrR;?>;
							display: <?php if($JIT_PSlider_PFS[0]->JIT_PSlider_ShowTitle=='No'){echo 'none' ;}?>;
    						text-shadow: 1px 1px 1px <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_SBC;?>;
    						margin-top: <?php echo $JIT_PSlider_3D_ADMT.'px';?>;
						}
						.JIT_PSlider_3Dwrap_<?php echo $JIT_PSlider_Name;?>
						{
							width: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_SW.'px';?>;
							height: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_SH;?>;
						}
						.JIT_PSlider_3DCont_<?php echo $JIT_PSlider_Name;?>
						{
							height: <?php echo $ContHei.'px';?>;
						}
						.JIT_PSlider_3DAI_<?php echo $JIT_PSlider_Name;?>
						{
							border:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBW;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBS;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBC;?>;
							border-radius: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBR;?>;
						}
						.JIT_PSlider_3DA_<?php echo $JIT_PSlider_Name;?>
						{
   							border-radius: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_CBR;?>;
    						box-shadow: 0px 0px 30px <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_SSC;?>;
						}
						.JIT_PSlider_3DNS_<?php echo $JIT_PSlider_Name;?>
						{
							font-size: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_AFS;?>;
							color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_AC;?>;
							margin-top: 5px;
						}
						.JIT_PSlider_3DNS_<?php echo $JIT_PSlider_Name;?>:hover
						{
							color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_AHC;?>;
						}
						.JIT_PSlider_3DNS_<?php echo $JIT_PSlider_Name;?>:active
						{
							color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_AC;?>;
						}
					</style>
					<section class="JIT_PSlider_3DCont JIT_PSlider_3DCont_<?php echo $JIT_PSlider_Name;?>">
						<div class="JIT_PSlider_3Dwrap JIT_PSlider_3Dwrap_<?php echo $JIT_PSlider_Name;?>">
			            	<?php for($j=0;$j<count($JIT_PSlider_IWP);$j++){
		            			$u = explode(')*^*(', $JIT_PSlider_IWP[$j]->photo_title);
								$y = implode('"', $u);
								$t = explode(")*&*(", $y);
								$Photo_Title = implode("'", $t);
								?>
									<a class="JIT_PSlider_3DA_<?php echo $JIT_PSlider_Name;?>" href="<?php if($JIT_PSlider_IWP[$j]->photo_link!=''){ echo $JIT_PSlider_IWP[$j]->photo_link; }?>" target="<?php if($JIT_PSlider_IWP[$j]->open_NT=='Yes'){echo '_blank';}?>">
										<img class="JIT_PSlider_3DAI_<?php echo $JIT_PSlider_Name;?>" src="<?php echo $JIT_PSlider_IWP[$j]->photo_url;?>" alt="image<?php echo $j;?>">
										<div class="JIT_PSlider_3DAD_<?php echo $JIT_PSlider_Name;?>"><?php echo $Photo_Title; ?></div>
									</a>
							<?php }?>
						</div>
						<nav>	
							<span class="JIT_PSlider_3DPrev"><i class="JIT_PSlider_3DNS_<?php echo $JIT_PSlider_Name;?> junaiticons-style <?php echo $JIT_PSlider_Left_Icon;?>"></i></span>
							<span class="JIT_PSlider_3DNext"><i class="JIT_PSlider_3DNS_<?php echo $JIT_PSlider_Name;?> junaiticons-style <?php echo $JIT_PSlider_Right_Icon;?>"></i></span>
						</nav>
					</section>

					<script type="text/javascript">
						jQuery(function(){
							jQuery('.JIT_PSlider_3DCont').gallery();
						});
					</script>
				<?php
			}
			else if($JIT_PSldier_E[0]->JIT_PSlider_ET=='Photo Carousel')
			{
				?>
				<style type="text/css">
					.JIT_PSlider_PC_IW_<?php echo $JIT_PSlider_Name;?>{
						-moz-border-radius: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SBR;?>;
						-webkit-border-radius: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SBR;?>;
						border-radius: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SBR;?>;
						-moz-border: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SBW;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SBS;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SBC;?>;
						-webkit-border: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SBW;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SBS;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SBC;?>;
						border: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SBW;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SBS;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SBC;?>;
						background-color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SBgC;?>;
						box-shadow: 0px 0px 30px <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SBSC;?>;
					}					
					.JIT_PSlider_PC_RGI_<?php echo $JIT_PSlider_Name;?> img{
						width:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SIW;?>;
						height:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SIH;?>;
						border:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SIBW;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SIBS;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SIBC;?>;
						border-radius:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SIBR;?>;
					}
					.JIT_PSlider_PC_RGIN_<?php echo $JIT_PSlider_Name;?> a{
						background-color: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SIBgC;?>;
						opacity:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SIO;?>;
						-moz-border-radius: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SBR;?> 0px 0px <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SBR;?>;
						-webkit-border-radius: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SBR;?> 0px 0px <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SBR;?>;
						border-radius: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SBR;?> 0px 0px <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SBR;?>;
					}
					.JIT_PSlider_PC_RGIN_<?php echo $JIT_PSlider_Name;?> a i{
						color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SIC;?>;
						font-size:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SIS;?>;
					}
					.JIT_PSlider_PC_RGIN_<?php echo $JIT_PSlider_Name;?> a.JIT_PSlider_PC_RGINN_<?php echo $JIT_PSlider_Name;?>{
						-moz-border-radius: 0px <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SBR;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SBR;?> 0px;
						-webkit-border-radius: 0px <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SBR;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SBR;?> 0px;
						border-radius: 0px <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SBR;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_SBR;?> 0px;
					}					
					.JIT_PSlider_PC_RGC_<?php echo $JIT_PSlider_Name;?> p{
						font-size:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_TFS;?>;
						text-shadow:1px 1px 1px <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_TTSC;?>;
						font-family: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_TFF;?>;
						line-height:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_TFS;?>;
						padding:0 15px;
						display: <?php if($JIT_PSlider_PFS[0]->JIT_PSlider_PC_ST=='No'){echo 'none';}?>;
						color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_TC;?>;
					}					
					/* Elastislide Style */
					.JIT_PSlider_PC_ESCW_<?php echo $JIT_PSlider_Name;?>{
						background: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNBgC;?>;
						padding:10px <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNIS;?>;
						-moz-border: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNBW;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNBS;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNBC;?>;
						-webkit-border: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNBW;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNBS;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNBC;?>;
						border: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNBW;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNBS;?> <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNBC;?>;
						-moz-border-radius: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNBR;?>;
						-webkit-border-radius: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNBR;?>;
						border-radius: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNBR;?>;
						-moz-box-shadow:0px 0px 30px <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNBSC;?>;
						-webkit-box-shadow:0px 0px 30px <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNBSC;?>;
						box-shadow:0px 0px 30px <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNBSC;?>;
					}
					.JIT_PSlider_PC_ESC_<?php echo $JIT_PSlider_Name;?>{
						overflow:hidden;
						background:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNBgC;?>;
						height: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNICH;?>;
					}
					.JIT_PSlider_PC_ESC_<?php echo $JIT_PSlider_Name;?> ul li a{
						border-color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNIBC;?>;
						opacity:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNIO;?>;
						height: <?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNICH;?>;
					}
					.JIT_PSlider_PC_ESC_<?php echo $JIT_PSlider_Name;?> ul li.selected a{
						border-color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNIBCC;?>;
						opacity:1.0;
					}
					.JIT_PSlider_PC_ESC_<?php echo $JIT_PSlider_Name;?> ul li a:hover{
						border-color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNIBHC;?>;
						opacity:1.0;
					}
					.JIT_PSlider_PC_ESC_<?php echo $JIT_PSlider_Name;?> ul li a img{
						display:block;
						border:none;
						height:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNIH;?>;
						width:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNIW;?>;
					}
					.JIT_PSlider_PC_ESN_<?php echo $JIT_PSlider_Name;?> span{
						width:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNIS;?>;
						height:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNIS;?>;
						cursor:pointer;
						opacity:1;
						color:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNIC;?>;
						font-size:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNIS;?>;
					}	
					.es-nav span{
						width:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNIS;?>;
						height:<?php echo $JIT_PSlider_PFS[0]->JIT_PSlider_PC_STNIS;?>;
					}				
				</style>
					<noscript>
						<style>
							.es-carousel ul{
								display:block;
							}
						</style>
					</noscript>
					<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">	
						<div class="rg-image-wrapper JIT_PSlider_PC_IW_<?php echo $JIT_PSlider_Name;?>">
							{{if itemsCount > 1}}
								<div class="rg-image-nav JIT_PSlider_PC_RGIN_<?php echo $JIT_PSlider_Name;?>">
									<a href="#" class="rg-image-nav-prev">
										<?php if($JIT_PSlider_PFS[0]->JIT_PSlider_PC_SSI=='Yes'){?>
											<i class="junaiticons-style <?php echo $JIT_PSlider_E8I_Left;?>"></i>
										<?php } ?>
									</a>
									<a href="#" class="rg-image-nav-next JIT_PSlider_PC_RGINN_<?php echo $JIT_PSlider_Name;?>">
										<?php if($JIT_PSlider_PFS[0]->JIT_PSlider_PC_SSI=='Yes'){?>
											<i class="junaiticons-style <?php echo $JIT_PSlider_E8I_Right;?>"></i>
										<?php } ?>
									</a>
								</div>
							{{/if}}
							<div class="rg-image JIT_PSlider_PC_RGI_<?php echo $JIT_PSlider_Name;?>"></div>
							<div class="rg-loading"></div>
							<div class="rg-caption-wrapper">
								<div class="rg-caption JIT_PSlider_PC_RGC_<?php echo $JIT_PSlider_Name;?>" style="display:none;">
									<p></p>
								</div>
							</div>
						</div>
					</script>
					<div id="rg-gallery" class="rg-gallery">
						<div class="rg-thumbs">
							<!-- Elastislide Carousel Thumbnail Viewer -->
							<div class="es-carousel-wrapper JIT_PSlider_PC_ESCW_<?php echo $JIT_PSlider_Name;?>">
								<div class="es-nav JIT_PSlider_PC_ESN_<?php echo $JIT_PSlider_Name;?>">
									<span class="es-nav-prev">
										<i class="junaiticons-style <?php echo $JIT_PSlider_E8_1I_Left;?>"></i>
									</span>
									<span class="es-nav-next">
										<i class="junaiticons-style <?php echo $JIT_PSlider_E8_1I_Right;?>"></i>
									</span>
								</div>
								<div class="es-carousel JIT_PSlider_PC_ESC_<?php echo $JIT_PSlider_Name;?>">
									<ul>
										<?php for($j=0;$j<count($JIT_PSlider_IWP);$j++){
					            			$u = explode(')*^*(', $JIT_PSlider_IWP[$j]->photo_title);
											$y = implode('"', $u);
											$t = explode(")*&*(", $y);
											$Photo_Title = implode("'", $t);
											?>
											<li><a href="#"><img src="<?php echo $JIT_PSlider_IWP[$j]->photo_url;?>"  data-large="<?php echo $JIT_PSlider_IWP[$j]->photo_url;?>"  alt="image<?php echo $j;?>" data-description="<?php echo $Photo_Title; ?>" /></a></li>
										<?php }?>
									</ul>
								</div>
							</div>
							<!-- End Elastislide Carousel Thumbnail Viewer -->
						</div><!-- rg-thumbs -->
					</div><!-- rg-gallery -->
					<script type="text/javascript" src="<?php echo plugins_url('/Scripts/Juna_IT_Photo_Slider_JTMin.js',__FILE__);?>"></script>
					<script type="text/javascript" src="<?php echo plugins_url('/Scripts/Juna_IT_Photo_Slider_JElast.js',__FILE__);?>"></script>
					<script type="text/javascript" src="<?php echo plugins_url('/Scripts/Juna_IT_Photo_Slider_PCG.js',__FILE__);?>"></script>
				<?php
			}
 		}
	}
?>