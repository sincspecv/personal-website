<section class="section partners">
  <div class="container">
    <div class="columns is-multiline partners__text">
      <div class="column is-full">
        <h2>{!! esc_attr($fields->heading) !!}</h2>
      </div>
      <div class="column is-full">
        {!! $fields->subtext !!}
      </div>
    </div>
    <div class="columns is-multiline is-vcentered partners__images">
      @foreach($fields->partners as $partner)
        <div class="column is-one-third-tablet is-full-mobile">
          <img src="{{ $partner->image->sizes->large }}" alt="{{ $partner->image->alt }}" srcset="{!! wp_get_attachment_image_srcset($partner->image->ID) !!}" />
        </div>
      @endforeach
    </div>
  </div>
</section>
