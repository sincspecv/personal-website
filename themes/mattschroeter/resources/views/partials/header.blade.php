<header class="banner">
  <div class="container">
    <div class="navbar">
      <div class="navbar-brand">
        <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
      </div>
      <div class="nav-primary navbar-menu">
        @if (has_nav_menu('primary_navigation'))
          <nav class="navbar-end">
            {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'navbar-menu', 'container' => false, 'after' => '</div>', 'walker' => new \App\Navigation\Navwalker()]) !!}
          </nav>
        @endif
      </div>
    </div>
  </div>
</header>
