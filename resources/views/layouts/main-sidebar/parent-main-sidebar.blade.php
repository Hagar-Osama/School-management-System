<div class="scrollbar side-menu-bg">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="{{route('parents.dashboard')}}">
                <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('main-sidebar.Dashboard')}}</span>
                </div>
                <div class="clearfix"></div>
            </a>

        </li>
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components </li>
        <!-- menu item Elements-->


        <!-- الابناء-->
        <li>
            <a href="{{route('children.index')}}"><i class="fas fa-book-open"></i><span class="right-nav-text">الابناء</span></a>
        </li>
        <!-- تقرير الحضور والغياب-->
        <li>
            <a href=""><i class="fas fa-book-open"></i><span class="right-nav-text">تقرير الحضور والغياب</span></a>
        </li>
        <!-- تقرير المالية-->
        <li>
            <a href=""><i class="fas fa-book-open"></i><span class="right-nav-text">تقرير المالية</span></a>
        </li>



        <!-- Settings-->
        <li>
            <a href="{{route('parentStudentProfile.index')}}"><i class="fas fa-id-card-alt"></i><span class="right-nav-text">الملف الشخصي</span></a>
        </li>

    </ul>
</div>
