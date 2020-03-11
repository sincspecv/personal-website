@if(!empty($intro_text))
  <div class="section page-title with-intro">
    <div class="container">
      <div class="columns">
        <div class="column is-full">
          <h1>{!! App::title() !!}</h1>
          @if( get_post_type() == 'post' )
            <div class="post-meta">
              <span class="post-meta__author">By {!! esc_attr( $post->post_author ) !!}</span> | <span class="post-meta__date"><i class="fal fa-clock" aria-hidden="true"></i> {!! $post->post_date !!}</span>
            </div>
          @endif
        </div>
      </div>
      <div class="columns intro-text">
        <div class="column is-full">
          <h2>{!! esc_attr($subtitle) !!}</h2>
          {!! $intro_text !!}
        </div>
      </div>
    </div>
  </div>
@else
  <div class="section page-title">
    <div class="container">
      <div class="columns">
        <div class="column is-full">
          @php the_title('<h1>', '</h1>') @endphp
          @if( get_post_type() == 'post' )
            <div class="post-meta">
              <span class="post-meta__author">By {!! get_the_author_meta( 'first_name' ) !!} {!! get_the_author_meta( 'last_name' ) !!}</span> | <span class="post-meta__date"><i class="fal fa-clock" aria-hidden="true"></i> {!! get_the_date() !!}</span>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endif
