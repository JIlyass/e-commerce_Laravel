    <section class="sidebar">
      <div class="nav-header">
        <p class="logo">Profile</p>
        <i class="bx bx-menu btn-menu"></i>
      </div>
      <ul class="nav-links">
        <li>
          <i class="bx bx-search search-btn"></i>
          <input type="text" placeholder="search..." />
          <span class="tooltip">Search</span>
        </li>
        <li>
          <a href="{{route('home.index')}}">
            <i class="bx bx-home-alt-2"></i>
            <span class="title">Web site</span>
          </a>
          <span class="tooltip">Web site</span>
        </li>
        <li>
          <a href="{{route('dashboard.produits.listesProduits')}}">
            {{-- <i class="bx bx-phone-call"></i> --}}
            <i class='bx bxl-product-hunt'></i>
            <span class="title">Produits</span>
          </a>
          <span class="tooltip">Produits</span>
        </li>
        <li>
          <a href="{{route('dashboard.design.index') }}">
            <i class='bx bxs-paint'></i>
            <span class="title">Design de site </span>
          </a>
          <span class="tooltip">Design </span>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-bookmark"></i>
            <span class="title">Bookmarks</span>
          </a>
          <span class="tooltip">Bookmarks</span>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-wallet-alt"></i>
            <span class="title">Wallet</span>
          </a>
          <span class="tooltip">Wallet</span>
        </li>
        <li>
          <a href="#">
            <i class="bx bxs-devices"></i>
            <span class="title">Devices</span>
          </a>
          <span class="tooltip">Devices</span>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-cog"></i>
            <span class="title">Setting</span>
          </a>
          <span class="tooltip">Setting</span>
        </li>
        <li>
          
           <a href="#" onclick="f1.submit()"> </a>
           <span>Logout</span>
            
             <form name="f1" hidden class="dropdown-item" action="{{route('auth.logout')}}" method="POST">
             @csrf
             @method('delete')
             <input type="submit" value="Sign out">
             </form>
             <span class="tooltip">Logout</span>
           
     
           
        </li>
      </ul>
      <div class="theme-wrapper">
        <i class="bx bxs-moon theme-icon"></i>
        <p>Dark Theme</p>
        <div class="theme-btn">
          <span class="theme-ball"></span>
        </div>
      </div>
      
    </section>
    {{-- <section class="home">
      <p>Home Content Here</p>
    </section> --}}


