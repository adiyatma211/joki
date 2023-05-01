<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                href="{{route('dashboard')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                    class="hide-menu">Dashboard</span></a></li>
        @can('seller')
        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
            href="{{route('confirmorder')}}" aria-expanded="false"><i class="mdi mdi-calendar-check"></i><span
                class="hide-menu">Order Confirmation</span></a></li>
        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
            href="{{route('mytrans')}}" aria-expanded="false"><i class="mdi mdi-cart"></i><span
                class="hide-menu">Transaction</span></a></li>
        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                href="{{route('product')}}" aria-expanded="false"><i class="mdi mdi-archive"></i><span
                    class="hide-menu">Product</span></a></li>

        @endcan

        @can('admin')

        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                href="{{route('category')}}" aria-expanded="false"><i class="mdi mdi-apps"></i><span
                    class="hide-menu">Category</span></a></li>
        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                href="{{route('user')}}" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span
                    class="hide-menu">Users</span></a></li>
        @endcan

        <li class="text-center p-40 upgrade-btn">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn d-block w-100 btn-danger text-white">Sign Out</button>
            </form>

        </li>
    </ul>



</nav>
