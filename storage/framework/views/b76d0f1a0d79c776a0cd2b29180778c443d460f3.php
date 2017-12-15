<?php $__env->startSection('content'); ?>
<?php if (!empty($sub_menu)) { ?>
	<div class="menu-drop" style="height: 40px;">
		<nav class="navbar">
			<ul class="navbar-nav">
				<?php $__currentLoopData = $sub_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<li <?php echo e($sub->id == $id ? 'class=active' : ''); ?>>
						<a href="<?php echo e(route('desktop.category', ['slug' => $sub->slug])); ?>">
							<?php echo e($sub->name); ?>

						</a>
					</li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</ul>
		</nav>
	</div>
<?php } ?>
<div class="w-content">
	<div class="content">
		<div class="primary">
			<?php echo $__env->make('front_end._partial.slider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			
			<?php if(isset($ads)): ?>
				<?php if(isset($ads[7])): ?>
					<?php $__currentLoopData = $ads[7]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<div class="adv ad7">
							<?php if($ad->type == 1): ?>
							<img alt="" src="<?php echo e(asset($ad->images)); ?>" onclick="window.open('<?php echo e(url('/adv/'.$ad->id)); ?>', '_blank')" />
							<?php elseif($ad->type == 2): ?>
							<?php echo $ad->iframe; ?>

		                    <?php elseif($ad->type == 3): ?>
		                    <embed src="<?php echo e(asset($ad->images)); ?>" class="ad7"></embed>
							<?php endif; ?>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				<?php else: ?>
				<!-- <div class="adv ad7">
					<img alt="" src="<?php echo e(asset('images/no-adv.jpg')); ?>"/>
				</div> -->
				<style>
					.page-live{
						margin-top: 20px;
					}
				</style>
				<?php endif; ?>
            <?php endif; ?>

			<div class="page-live">
				<div class="row">
					<?php $stop = 4;?>
					<?php if(isset($postFixed)): ?>
						<?php if(count($postFixed)): ?>
							<?php $__currentLoopData = $postFixed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<?php $post = (object)$post; ?>
			            	<div class="item-article">
								<a href="<?php echo e(url($post->slug.'-'.$post->id).'.html'); ?>">
									<img class="img-responsive" src="<?php echo e(asset($post->images)); ?>" alt="<?php echo e($post->name); ?>"/>
								</a>
								<span class="time">
									<i aria-hidden="true" class="fa fa-clock-o">
									</i>
									<?php
									echo \App\Http\Controllers\FrontEnd\LivingSubstanceController::timeago(date($post->created_at));
									?>
								</span>
								<a href="<?php echo e(url($post->slug.'-'.$post->id).'.html'); ?>">
									<?php echo e($post->name); ?>

								</a>
								<p>
									<?php echo e(Illuminate\Support\Str::words($post->description, 20, '...')); ?>

								</p>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
							<?php $stop = $stop - count($postFixed); ?>
		            	<?php endif; ?>
	            	<?php endif; ?>

					<?php $i = 0; ?>
					<?php $__currentLoopData = $post_fulls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<?php $i ++; ?>
					<div class="item-article">
						<a href="<?php echo e(url($key->slug.'-'.$key->id).'.html'); ?>">
							<img class="img-responsive" src="<?php echo e(asset($key->images)); ?>" alt="<?php echo e($key->name); ?>"/>
						</a>
						<span class="time">
							<i aria-hidden="true" class="fa fa-clock-o">
							</i>
							<?php
							echo \App\Http\Controllers\FrontEnd\LivingSubstanceController::timeago(date($key->created_at));
							?>
						</span>
						<a href="<?php echo e(url($key->slug.'-'.$key->id).'.html'); ?>">
							<?php echo e($key->name); ?>

						</a>
						<p>
							<?php echo e(Illuminate\Support\Str::words($key->description, 20, '...')); ?>

						</p>
					</div>
					<?php if($i == $stop): ?>
						<?php break; ?>
					<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				</div>
				
				<?php if(isset($ads)): ?>
					<?php if(isset($ads[10])): ?>
					<div class="row">
						<?php $__currentLoopData = $ads[10]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<div class="adv ad10">
								<?php if($ad->type == 1): ?>
								<img alt="" src="<?php echo e(asset($ad->images)); ?>" onclick="window.open('<?php echo e(url('/adv/'.$ad->id)); ?>', '_blank')" />
								<?php elseif($ad->type == 2): ?>
								<?php echo $ad->iframe; ?>

			                    <?php elseif($ad->type == 3): ?>
			                    <embed src="<?php echo e(asset($ad->images)); ?>" class="ad10"></embed>
								<?php endif; ?>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
					</div>
					<?php else: ?>
					<!-- <div class="row">
						<div class="adv ad10">
							<img alt="" src="<?php echo e(asset('images/no-adv.jpg')); ?>"/>
						</div>
					</div> -->
					<?php endif; ?>
	            <?php endif; ?>

				<?php if(count($post_fulls) > $stop): ?>
		            <div class="row" style="margin-top: 10px;">
						<?php for($i = $stop; $i < count($post_fulls); $i ++): ?>
						<div class="item-article">
							<a href="<?php echo e(url($post_fulls[$i]->slug.'-'.$post_fulls[$i]->id).'.html'); ?>">
								<img class="img-responsive" src="<?php echo e(asset($post_fulls[$i]->images)); ?>" alt="<?php echo e($post_fulls[$i]->name); ?>"/>
							</a>
							<span class="time">
								<i aria-hidden="true" class="fa fa-clock-o">
								</i>
								<?php
								echo \App\Http\Controllers\FrontEnd\LivingSubstanceController::timeago(date($post_fulls[$i]->created_at));
								?>
							</span>
							<a href="<?php echo e(url($post_fulls[$i]->slug.'-'.$post_fulls[$i]->id).'.html'); ?>">
								<?php echo e($post_fulls[$i]->name); ?>

							</a>
							<p>
								<?php echo e(Illuminate\Support\Str::words($post_fulls[$i]->description, 20, '...')); ?>

							</p>
						</div>
						<?php endfor; ?>
					</div>
				<?php endif; ?>

				<div class="row">
					<div class="pagination phantrang">
						<?php echo $__env->make('vendor.pagination', ['data' => $post_fulls], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="sidebar">

			<?php if(isset($ads)): ?>
				<?php if(isset($ads[8])): ?>
					<?php $__currentLoopData = $ads[8]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<div class="adv ad8">
							<?php if($ad->type == 1): ?>
							<img alt="" src="<?php echo e(asset($ad->images)); ?>" onclick="window.open('<?php echo e(url('/adv/'.$ad->id)); ?>', '_blank')" />
							<?php elseif($ad->type == 2): ?>
							<?php echo $ad->iframe; ?>		
		                    <?php elseif($ad->type == 3): ?>
		                    <embed src="<?php echo e(asset($ad->images)); ?>" class="ad8"></embed>
							<?php endif; ?>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				<?php else: ?>
				<!-- <div class="adv ad8">
					<img alt="" src="<?php echo e(asset('images/no-adv.jpg')); ?>"/>
				</div> -->
				<?php endif; ?>
            <?php endif; ?>

			<?php echo $__env->make('front_end._partial.side_bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			
			<?php if(isset($ads)): ?>
				<?php if(isset($ads[9])): ?>
					<?php $__currentLoopData = $ads[9]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<div class="adv ad9">
							<?php if($ad->type == 1): ?>
							<img alt="" src="<?php echo e(asset($ad->images)); ?>" onclick="window.open('<?php echo e(url('/adv/'.$ad->id)); ?>', '_blank')" />
							<?php elseif($ad->type == 2): ?>
							<?php echo $ad->iframe; ?>

		                    <?php elseif($ad->type == 3): ?>
		                    <embed src="<?php echo e(asset($ad->images)); ?>" class="ad9"></embed>
							<?php endif; ?>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				<?php else: ?>
				<!-- <div class="adv ad9">
					<img alt="" src="<?php echo e(asset('images/no-adv.jpg')); ?>"/>
				</div> -->
				<?php endif; ?>
            <?php endif; ?>

			<?php if(isset($boxs)): ?>
		        <?php if(isset($boxs[1])): ?>
		            <?php echo $__env->make('front_end._partial.info-box', ['boxs' => $boxs[1]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		        <?php endif; ?>
		    <?php endif; ?>
		    
			<?php if(isset($videos)): ?>
				<?php if(count($videos) > 0): ?>
			        <div class="video">
			            <div class="title">
			                <span class="arrow-left">
			                </span>
			                <h3>
			                    Video
			                </h3>
			            </div>
			            
			            <div class="text">
			                <iframe allowfullscreen="" frameborder="0" height="165" src="https://www.youtube.com/embed/<?php echo e($videos[0]['url']); ?>" width="100%">
			                </iframe>
			                <a href="<?php echo e(url($videos[0]['slug'].'-'.$videos[0]['id'].'.html')); ?>">
			                    <?php echo e($videos[0]['name']); ?>

			                </a>
			                <ul>
			                <?php if (count($videos)>1) {
			                    for ($i=1; $i < count($videos); $i++) { ?>
			                         <li>
			                            <a href="<?php echo e(url($videos[$i]['slug'].'-'.$videos[$i]['id'].'.html')); ?>">
			                               <?php echo e($videos[$i]['name']); ?>

			                            </a>
			                        </li>
			                   <?php 
			                   }
			                    }
			                 ?>
			                </ul>
			            </div>
			        </div>
		        <?php endif; ?>
		    <?php endif; ?>

		    <?php if(isset($boxs)): ?>
		        <?php if(isset($boxs[2])): ?>
		            <?php echo $__env->make('front_end._partial.info-box', ['boxs' => $boxs[2]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		        <?php endif; ?>
		    <?php endif; ?>
			<?php echo $__env->make('front_end._partial.care', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>
	<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.desktop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>