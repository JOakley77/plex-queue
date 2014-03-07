<nav class="top-bar" data-topbar data-options="is_hover:false;sticky_on: large">
	<ul class="title-area">
		<li class="name">
			<h1><a href="#">@yield('title')</a></h1>
		</li>
		<li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
	</ul>

	<section class="top-bar-section">
		<ul class="right">
			<li class="active"><a href="#">Home</a></li>
			<li class="has-form">
				<a href="/getPlexData" class="button btn-refresh-plex">Refresh Plex</a>
			</li>
			<li class="has-form">
				<a href="http://foundation.zurb.com/docs" class="button">Add Queue Item</a>
			</li>
		</ul>
	</section>
</nav>