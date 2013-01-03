<div id="header" class="<?php print $secondary_menu ? 'with-secondary-menu': 'without-secondary-menu'; ?>"><div class="section clearfix">

			<?php if ($logo): ?>
				<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
					<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
				</a>
			<?php endif; ?>

			<?php print render($page['header']); ?>

			<?php if ($main_menu): ?>
			  <div id="main-menu" class="navigation">
				<?php print theme('links__system_main_menu', array(
				  'links' => $main_menu,
				  'attributes' => array(
					'id' => 'main-menu-links',
					'class' => array('links', 'clearfix'),
				  ),
				  'heading' => array(
					'text' => t('Main menu'),
					'level' => 'h2',
					'class' => array('element-invisible'),
				  ),
				)); ?>
			  </div> <!-- /#main-menu -->
			<?php endif; ?>
			
			<?php if($is_front) { ?>
			<div class="seperatorbordertop"></div>
			<div class="seperatorborderbottom"></div>
			
			<div class="main_slaider">
				<ul id="main_slider">
					<?php
					global $base_path;
					$slaider_view_nodes = views_get_view_result('slaideris');
					foreach ($slaider_view_nodes as $slaider_view_node) {
						$slaider_node_data = node_load($slaider_view_node->nid);
						print '<li>';
							print '<div class="slaider_item">';
								print '<div class="left_side">';
									print '<h2 class="normal">'.$slaider_node_data->title.'</h2>';
									if(isset($slaider_node_data->field_boldintas_pavadinimas['und'])) { print '<h2 class="bold">'.$slaider_node_data->field_boldintas_pavadinimas['und'][0]['value'].'</h2>'; }
									if(isset($slaider_node_data->field_turinys_slaiderio['und'])) { print $slaider_node_data->field_turinys_slaiderio['und'][0]['safe_value']; }
								print '</div>';
								
								print '<div class="right_side">';
									print '<div class="slaider_img_container">';
										print '<div class="image_padding">';
											if (isset($slaider_node_data->field_video['und'])) {
												
												$json = json_decode(file_get_contents('http://gdata.youtube.com/feeds/api/videos/'.$slaider_node_data->field_video['und'][0]['value'].'?v=2&alt=jsonc'));
												echo '<img width="480" height="270" src="' . $json->data->thumbnail->sqDefault . '">';
												print '<a class="fancy_box" href="http://www.youtube.com/watch?v='.$slaider_node_data->field_video['und'][0]['value'].'">';
												print '</a>';
											} else {
												print '<img src="'.$base_path.'sites/default/files/images/slaider/'.$slaider_node_data->field_atvaizdas_slaider['und'][0]['filename'].'" width="480" height="270" alt="" />';
											}
										print '</div>';
									print '</div>';
								print '</div>';
							print '</div>';
						print '</li>';
					}
					?>
				</ul>
			</div>
			
			<?php } ?>
		</div></div> <!-- /.section, /#header -->