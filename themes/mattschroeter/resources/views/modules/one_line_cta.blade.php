<section class="section one-line-cta">
  <div class="container">
    <div class="columns">
      <div class="column is-three-quarters-desktop is-two-thirds-tablet is-full-mobile">
        <span class="h2">{!! esc_attr($fields->text) !!}</span>
      </div>
      <div class="column is-one-quarter-desktop is-two-thirds-tablet is-full-mobile">
        <a href="{{ $fields->link->url }}" target="{{ $fields->link->target }}" class="button is-primary is-medium">{!! esc_attr($fields->link->title) !!}</a>
      </div>
    </div>
  </div>
</section>
