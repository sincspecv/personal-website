@if(!empty($intro_text))
  <div class="section page-title with-intro">
    <div class="container">
      <div class="columns">
        <div class="column is-full">
          @php the_title('<h1>', '</h1>') @endphp
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
        </div>
      </div>
    </div>
  </div>
@endif
