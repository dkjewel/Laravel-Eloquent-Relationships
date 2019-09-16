<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img style="margin-left: 50px">
        <span class="brand-text font-weight-light">Laravel Eloquent</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item mt-5" >
                    <a href="{{route('user.index')}}" class="nav-link">
                        <i class="nav-icon fa  fa-user"></i>
                        <p>
                           Manage User
                        </p>
                    </a>
                </li>


                <li class="nav-item mt-3" >
                    <a href="{{route('phone.index')}}" class="nav-link">
                        <i class="nav-icon fa  fa-phone"></i>
                        <p>
                           Manage Phone
                        </p>
                    </a>
                </li>


                <li class="nav-item mt-3" >
                    <a href="{{route('post.index')}}" class="nav-link">
                        <i class="nav-icon fa  fa-list"></i>
                        <p>
                           Manage Post
                        </p>
                    </a>
                </li>

            </ul>
        </nav>

    </div>

</aside>
