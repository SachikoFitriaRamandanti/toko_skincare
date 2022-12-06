<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="/">Toko Skincare Wardah</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ ($title === "Home") ? 'active' : '' }}" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === "Produk") ? 'active' : '' }}" href="/skincare">Skincare</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === "Transaksi") ? 'active' : '' }}" href="/pesan">Transaksi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === "Pembeli") ? 'active' : '' }}" href="/pembeli">Pembeli</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === "Pegawai") ? 'active' : '' }}" href="/pegawai">Pegawai</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
              </ul>
    </div>
  </div>
</nav>
