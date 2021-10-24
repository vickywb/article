<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link {{ Request::is('author') ? 'active' : '' }}" aria-current="page" href="{{ route('author.index') }}">
        <span data-feather="home"></span>
        Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('author/posts') ? 'active' : '' }}" href="{{ route('author.posts.index') }}">
        <span data-feather="file-text"></span>
       My Articles
        </a>
    </li>
     <li class="nav-item">
        <a class="nav-link  {{ Request::is('author/postcategories') ? 'active' : '' }}" href="{{ route('author.postcategories.index') }}">
        <span data-feather="menu"></span>
        Categories
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
        <span data-feather="users"></span>
        Customers
        </a>
    </li>
    </ul>
  </div>
</nav>