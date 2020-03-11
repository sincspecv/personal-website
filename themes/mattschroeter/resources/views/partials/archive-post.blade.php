<a href="{!! get_permalink() !!}" class="column is-one-third-desktop is-half-tablet is-full-mobile archive-post" aria-label="{!! the_title() !!}">
  <div class="box">
    @if(has_post_thumbnail())
      <div class="featured-image">
        <figure>
          @php(the_post_thumbnail('large'))
        </figure>
      </div>
    @endif
    <article class="post-content">
        <h2 class="post-content__title">{!! the_title() !!}</h2>
        <span class="post-content__date"><i class="fal fa-clock" aria-hidden="true"></i> {!! get_the_date() !!}</span>
        {!! wpautop($post->fields->excerpt) !!}
      </article>
  </div>
</a>
