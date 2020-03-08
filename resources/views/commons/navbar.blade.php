<nav>
  <div class="nav-outer">
    <div class="nav-container">
      <div class="nav-title">
          <h2>Today is {{ date('20y/m/d') }}</h2>
      </div>
      <div class="nav-humberger-btn-container">
          <button class="nav-humberger-btn">
              <i class="fas fa-bars"></i>
          </button>
      </div>
      
      <div class="nav-menu">
          <ul>
              <li class="nav-menu-list"><a href="" id="open-note"><i class="fas fa-pencil-alt"></i> create_note</a></li>
              <li class="nav-menu-list"><a href="" id="private-note"><i class="fas fa-sign-in-alt"></i> log_in</a></li>
          </ul>
          
      </div>
      <ul>
        @foreach($genres as $genre)
          <li><a href="{{ route('notes.create', ['id' => $genre->id, ]) }}">{{ $genre->genre }}</a></li>
        @endforeach
      </ul>
    </div>
  </div>
</nav>