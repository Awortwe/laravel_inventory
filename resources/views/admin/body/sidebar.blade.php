<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>

        <li>
            <a href="index.html" class="waves-effect">
                <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                <span>Dashboard</span>
            </a>
        </li>


        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-mail-send-line"></i>
                <span>Manage Suppliers</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('suppliers.index') }}">All Suppliers</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-mail-send-line"></i>
                <span>Manage Customers</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('customers.index') }}">All Customers</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-mail-send-line"></i>
                <span>Email</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="email-inbox.html">Inbox</a></li>
                <li><a href="email-read.html">Read Email</a></li>
            </ul>
        </li>
    </ul>
</div>