<div class="social-media">
  @foreach($social_media as $account)
    <div class="social-icon">
      <a href="{{ $account->link }}" target="_blank" aria-label="My {{ $account->network }} account."><i class="fab fa-{{ $account->network }}" aria-label="{{ $account->network }}"></i></a>
    </div>
  @endforeach
</div>
