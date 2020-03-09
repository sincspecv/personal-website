<section class="section fifty-fifty">
  <div class="container">
    @foreach($fields->rows as $row)
    <div class="columns is-variable is-vcentered is-6 row">
      <div class="column is-half-tablet is-full-mobile row__image">
        <figure class="row__image-container image">
          <img src="{{ $row->image->sizes->large }}" srcset="{{ wp_get_attachment_image_srcset( $row->image->id ) }}" alt="{!! esc_attr( $row->image->alt ) !!}" />
        </figure>
      </div>
      <div class="column is-half-tablet is-full-mobile row__content">
        <article class="row__content-container">
          {!! $row->text !!}
        </article>
      </div>
    </div>
    @endforeach
  </div>
</section>
