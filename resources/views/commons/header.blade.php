<header>
  <div class="header-outer">
    <div class="header-container">
      <div class="header-title">
          <h1><img src="{{ secure_asset('https://storage-hal2.s3.ap-northeast-1.amazonaws.com/photos/header_image.0.png') }}" class="header-logo">Free_note</h1>
      </div>
      <div class="humberger-btn-container open">
          <button class="humberger-btn">
              <i class="fas fa-bars"></i>
          </button>
      </div>
      <div class="humberger-btn-container close">
          <button class="humberger-btn">
              <i class="fas fa-window-close"></i>
          </button>
      </div>
      @if(!Auth::check())
      <div class="header-menu">
          <ul>
              <li class="menu-list"><a href="{{ route('signup.post') }}" id="open-note"><i class="fas fa-user-plus"></i> sign_up</a></li>
              <li class="menu-list"><a href="{{ route('auth.login') }}" id="private-note"><i class="fas fa-sign-in-alt"></i> log_in</a></li>
          </ul>
      </div>
      @else
      <div class="header-menu">
          <ul>
              <li class="menu-list"><a href="{{ route('notes.index') }}" id="open-note"><i class="fas fa-book-open"></i> public_note</a></li>
              <li class="menu-list"><a href="{{ route('my-page') }}" id="private-note"><i class="fas fa-user"></i> my_page</a></li>
              <li class="menu-list"><a href="{{ route('logout.get') }}" id=""><i class="fas fa-door-open"></i> log_out</a></li>
          </ul>
      </div>
      
      @endif
    </div>
  </div>
</header>