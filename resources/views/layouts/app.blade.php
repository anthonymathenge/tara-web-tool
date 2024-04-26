<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="/css/show.css">
    <link rel="stylesheet" href="/css/forms.css">

    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
    
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Tara Tool</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="{{ route('assets.store') }}">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Asset Creation</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{ route('assets.store') }}">Asset Creation</a></li>
        </ul>
      </li>
      <li>
            <a href="{{ route('damage.index', ['id' => $asset->id]) }}">
                <i class='bx bx-pie-chart-alt-2'></i>
                <span class="link_name">Show</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="{{ route('damage.index', ['id' => $asset->id]) }}">Show</a></li>
            </ul>
         </li>
      <li>
        <div class="iocn-link">
        <a href="{{ route('threat.index', ['id' => $asset->id]) }}">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Threat</span>
          </a>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="{{ route('threat.index', ['id' => $asset->id])  }}">Threat</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="{{ route('tara.index' , ['id' => $asset->id]) }}">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Tara</span>
          </a>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="{{ route('tara.index', ['id' => $asset->id]) }}">Tara</a></li>
        </ul>
      </li>
        
      <li>
        <a href="{{ route('main.index', ['id' => $asset->id]) }}">
          <i class='bx bx-line-chart' ></i>
          <span class="link_name">main</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{ route('main.index' , ['id' => $asset->id]) }}">main</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Plugins</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Plugins</a></li>
          <li><a href="#">UI Face</a></li>
          <li><a href="#">Pigments</a></li>
          <li><a href="#">Box Icons</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-compass' ></i>
          <span class="link_name">Explore</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Explore</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-history'></i>
          <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">History</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
      <div class="profile-content">
        <!--<img src="image/profile.jpg" alt="profileImg">-->
      </div>
      <div class="name-job">
        <div class="profile_name">{{ Auth::user()->name }}</div>
      </div>
      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
         <i class='bx bx-log-out'></i>
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
    </div>
  </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text">{{ $asset->name }}</span>

        @yield('content')
    </div>
</section>
    @yield('scripts')

  <script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
  </script>
</body>
</html>


