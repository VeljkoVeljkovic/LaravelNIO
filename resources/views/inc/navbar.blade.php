<nav class="navbar navbar-expand-sm bg-dark navbar-dark transparent">
    <a class="navbar-brand" href="#">NIO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-expanded="false">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav mr-auto"><!-- mr-auto redja levo -->
      <li class="nav-item <?php // if($tip=='moje') echo 'active'; ?>">
        <a class="nav-link" href="/pozivi">Poziv</a>
      </li>
     <li class="nav-item <?php // if($tip=='sve') echo 'active'; ?>">
        <a class="nav-link" href="">Obavestenja</a>
      </li>
      <li class="nav-item <?php // if($tip=='sve1') echo 'active'; ?>">
        <a class="nav-link" href="">Obavestenja</a>
      </li>
      <li class="nav-item <?php // if($tip=='dodavanje') echo 'active'; ?>">
        <a class="nav-link" href="">Obavestenja</a>
      </li>

    </ul>

    <ul class="navbar-nav ml-auto text-center"> <!-- ml-auto redja desno -->
        <li class="nav-item">
          <a class="nav-link" href="">log out</a>
        </li>
    </ul>
    </div>
</nav>
