<?php 
	function date_lt($date) {
	$months_en = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
	$months_lt = array('sausio', 'vasario', 'kovo', 'balandžio', 'gegužės', 'birželio', 'liepos', 'rugpjučio', 'rugsėjo', 'spalio', 'lapkricio', 'gruodžio');
	return str_replace($months_en, $months_lt, $date);
}
?>
<div id="main-wrapper" class="clearfix">
			<div id="main" class="clearfix">
				<div class="global_teaset_slogan">
					<?php
						global $site_slogan;
						print '<h2>'.$site_slogan.'</h2>';
					?>
				</div>
				<?php if ($page['sidebar_first']): ?>
					<div id="sidebar-first" class="column sidebar"><div class="section">
						<?php print render($page['sidebar_first']); ?>
					</div></div> <!-- /.section, /#sidebar-first -->
				<?php endif; ?>

				<div id="content" class="column"><div class="section">
				    <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
						<a id="main-content"></a>
						
						<?php print render($title_prefix); ?>
						<?php if($is_front) { } else {?>
							<?php if ($title): ?>
								<h1 class="title" id="page-title">
									<?php print $title; ?>
								</h1>
							<?php endif; ?>
						<?php } ?>
						
						<?php print render($title_suffix); ?>
						
						<?php if ($tabs): ?>
							<div class="tabs">
								<?php print render($tabs); ?>
							</div>
						<?php endif; ?>
						
						<?php print render($page['help']); ?>
						
						<?php if ($action_links): ?>
							<ul class="action-links">
								<?php print render($action_links); ?>
							</ul>
						<?php endif; ?>
						<?php
						global $base_path;
						if($is_front) {
						?>
							<style type="text/css">
								.global_teaset_slogan {
									display: none;
								}
							  </style>
							  <div class="page_slug">
								<?php
									global $url_alias;
									$url_alias = drupal_get_path_alias($_GET['q']);
							
								?>
								<?php if(isset($node->field_puslapio_sukis['und'])) {
									print '<h2>'.$node->field_puslapio_sukis['und'][0]['value'].'</h2>';
								} else {
									global $site_slogan;
									print '<h2>'.$site_slogan.'</h2>';
								}
								?>
								
							  </div>
						
						<?php
							
							print '<div class="front_page_blocks">';
								$front_blocks = views_get_view_result('titulinio_blokai');
								$counter = 1;
								foreach ($front_blocks as $front_block) {
									$block_node = node_load($front_block->nid);
									if($counter == 4) { 
										print '<div class="block_separator"></div>';
										$counter = 1; 
									}
									print '<div class="front_block_'.$counter.' block_item">';
										print '<div class="block_padding">';
											print '<img width="22" height="22" src="'.$base_path.'sites/default/files/images/icons/'.$block_node->field_ikona['und'][0]['filename'].'" alt="" style="float:left;" />';
											print '<h3 class="block_heading">'.$block_node->title.'</h3>';
											print '<div class="block_data">';
												print $block_node->field_turinys_front_block['und'][0]['safe_value'];
											print '</div>';
											print '<div class="button_container">';
												 print '<a href="'.$block_node->field_nukreipimo_adresas['und'][0]['value'].'">';
													print 'Daugiau';
												print '</a>';
											print '</div>';
										print '</div>';
									print '</div>';
										
									$counter++;
								}
							print '</div>';
						} 
						?>
						
						<?php print render($page['content']); ?>
						
						<?php print $feed_icons; ?>
					
				</div></div> <!-- /.section, /#content -->

				<?php if ($page['sidebar_second']): ?>
				  <div id="sidebar-second" class="column sidebar"><div class="section">
					<?php print render($page['sidebar_second']); ?>
				  </div></div> <!-- /.section, /#sidebar-second -->
				<?php endif; ?>
				
				<div class="bottom_blocks">
						<div class="footer_blocks" style="padding: 0 5px;">
							<div class="f_padding">
								<h2>Naujienos</h2>
								<div class="n_block_data">
									<?php	
										global $base_path;
										$news_block_nodes = views_get_view_result('naujienos');
										foreach($news_block_nodes as $news_block_node) {
											$node_info = node_load($news_block_node->nid);
											print '<div class="date">'; 
												echo '<p class="day">' . date( 'd',$node_info->created) . '</p>';
												echo '<p class="mounth">' . t(date_lt(date( 'F',$node_info->created))) . '</p>';
											print '</div>';
											print '<div class="n_content">';
												print $node_info->field_trumpas_aprasymas['und'][0]['safe_value'];
											print '</div>';
											print '<div class="read_more_n">';
												print l(t('Plačiau'), 'node/' . $node_info->vid, array('attributes' => array('class' => array(t('node-readmore-link')))));
											print '</div>';
										}
										print '<div class="n_archive">';
											print '<a href="'.$base_path.'naujienos">DAUGIAU</a>';
										print '</div>';
									?>
									</div>
							</div>
						</div>
					
						<div class="footer_blocks" style="padding: 0 20px;">
							<div class="f_padding">
								<h2>Užklausa</h2>
								<?php print render($page['triptych_middle']); ?>
							</div>
						</div>
						<div class="footer_blocks" style="padding: 0 5px;">
							<div class="f_padding">
								<h2>Kontaktai</h2>
								<?php print render($page['triptych_last']); ?>
							</div>
						</div>
					</div>
		</div></div> <!-- /#main, /#main-wrapper -->