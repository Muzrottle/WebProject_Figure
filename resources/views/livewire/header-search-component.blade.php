<!-- Search -->
<li class="dropdown search dropdown-slide">
    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
            class="tf-ion-ios-search-strong"></i> Search</a>
    <ul class="dropdown-menu search-dropdown">
        <li>
            <form action="{{ route('product.search') }}"><input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search..."></form>
        </li>
    </ul>
</li><!-- / Search -->