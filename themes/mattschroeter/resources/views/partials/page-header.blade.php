<div class="section page-title">
  <div class="container">
    <div class="columns">
      <div class="column is-full">
        <h1>{!! App::title() !!}</h1>
        @if( get_post_type() == 'post' && is_single() && !is_search() )
          <div class="post-meta">
            <span class="post-meta__author">By {!! get_the_author_meta( 'first_name' ) !!} {!! get_the_author_meta( 'last_name' ) !!}</span> | <span class="post-meta__date"><i class="fal fa-clock" aria-hidden="true"></i> {!! get_the_date() !!}</span>
          </div>
        @endif
      </div>
    </div>
  </div>
</div>
