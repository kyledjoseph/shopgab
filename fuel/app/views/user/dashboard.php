
		<ul class="nav nav-tabs">
			<li class="active"><?= Html::anchor('/', 'My Quests') ?></li>
			<li><?= Html::anchor('friends', 'Friends') ?></li>
		</ul>


		<div class="row">
			<div class="span9">
				<!-- <select>
					<option disabled selected>Sort By Recent Updates</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
				<select class="select-all">
					<option disabled selected>All</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select> -->
				<button href="#questModal" class="btn btn-success pull-right" data-toggle="modal">Start a new quest!</button>
			</div>
		</div>
		
		<div class="row">
			<div class="span9">
				
				<?php $i = 1; foreach ($quests as $quest): ?>

				<?php if ($i == 1): ?>
				<div class="row">
				<?php endif; ?>

					<div class="span3">
						<div class="dashboard-box highlight">
							<a href="<?= Uri::create($quest->url()) ?>">
								<img class="full-size" src="<?= $quest->default_thumb_url() ?>">
								<h3><?= $quest->name() ?></h3>
							</a>
							<!-- <div class="btn-group">
								<button class="btn dropdown-toggle" data-toggle="dropdown">
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Option 1</a></li>
									<li><a href="#">Option 2</a></li>
									<li><a href="#">Option 3</a></li>
								</ul>
							</div> 
							<a href="#"><img class="lock" src="/assets/img/notification-lock.png" /></a>
							<a href="#"><img class="friends inactive" src="/assets/img/notification-friends.png" /></a>
							<a href="#"><img class="basket inactive" src="/assets/img/notification-basket.png" /></a>
							<a href="#"><img class="chat inactive" src="/assets/img/notification-chat.png" /></a>
							-->
						</div>
					</div>

				<?php $i++ ?>
				<?php if ($i == 4): ?></div><?php $i = 1; endif; ?>

				<?php endforeach; ?>
				<?php if ($i != 1): ?></div><?php endif; ?>

			</div>
		

			<div class="span3">
				<div class="box">
					<h4>Help A Friend</h4>
						<div class="friend-box">
							<div class="image">
								<img src="//placehold.it/50x50" />
							</div>
							<div class="text">
								<h5>Jane Smith</h5>
								<span class="product">Fridge</span>
								(3 days)
							</div>
						</div>
						
						<div class="friend-box">
							<div class="image">
								<img src="//placehold.it/50x50" />
							</div>
							<div class="text">
								<h5>Ashley Thomas</h5>
								<span class="product">Carseat</span>
								(3 days)
							</div>
						</div>
					
						<div class="friend-box">
							<div class="image">
								<img src="//placehold.it/50x50" />
							</div>
							<div class="text">
								<h5>Jane Smith</h5>
								<span class="product">Fridge</span>
								(3 days)
							</div>
						</div>
				</div>
			</div>
		</div>

