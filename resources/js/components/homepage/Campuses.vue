<template>
	<div id="campuses" class="content" data-scrollview="true">
			<!-- begin container -->
			<div class="container">
				<h2 class="content-title">All Campuses</h2>
				<p class="content-desc">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur eros dolor,<br />
					sed bibendum turpis luctus eget
				</p>
				<!-- begin row -->
				<div class="row">
					<!-- begin col-4 -->
					<div v-for="(item, index) in campus" class="col-lg-4 col-md-6">
						<div class="service">
							<div class="icon bg-green" data-animation="true" data-animation-type="animate__bounceIn"><i class="fa fa-school"></i></div>
							<div class="info">
								<h4 class="title">{{item.campus}}</h4>
								<h6>Campus Administrator</h6>
								<p class="desc">{{item.name}}</p>
							</div>
						</div>
					</div>
					<!-- end col-4 -->
					
					<!-- end col-4 -->
				</div>
				<!-- end row -->
			</div>
			<!-- end container -->
		</div>
</template>