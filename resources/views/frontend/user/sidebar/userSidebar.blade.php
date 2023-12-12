<div class="card sidebar-menu">
    <div class="card-header">
      <h3 class="h4 card-title">Customer section</h3>
    </div>
    <div class="card-body">
      <ul class="nav nav-pills flex-column">
        <a href="{{ route('userOrders') }}" class="nav-link text-dark fw-normal">
            <i class="fa fa-list"></i> My orders
        </a>
        <a href="customer-wishlist.html" class="nav-link text-dark fw-normal">
            <i class="fa fa-heart"></i> My wishlist
        </a>
        <a href="{{ route('user.profile') }}" class="nav-link text-dark fw-normal">
            <i class="fa fa-user"></i> My account
        </a>
        <a href="{{ route('user.logout') }}" class="nav-link text-dark fw-normal"><i class="fa fa-sign-out-alt"></i> Logout
        </a>
    </ul>
    </div>
  </div>