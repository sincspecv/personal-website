<section class="section fifty-fifty-form">
  <div class="container">
    <div class="columns is-variable is-6 row">
      <div class="column is-half-tablet is-full-mobile row__content">
        <article class="row__content-container">
          {!! $fields->text !!}
        </article>
      </div>
      <div class="column is-half-tablet is-full-mobile row__form">
        {!! do_shortcode('[fluentform id="' . $fields->form . '"]') !!}
      </div>
    </div>
  </div>
</section>
