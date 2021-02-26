<!-- main menu-->
<!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
<div data-active-color="white" data-background-color="man-of-steel" data-image="{{asset('app-assets/img/sidebar-bg/01.jpg')}}" class="app-sidebar">
    <!-- main menu header-->
    <!-- Sidebar Header starts-->
    <div class="sidebar-header">
        <div class="logo clearfix"><a href="{{url('admin/dashboard')}}" class="logo-text float-left">
                <div class="logo-img"><img src="{{asset('images/Image3.png')}}" style="height: 40px"/></div>
                <span class="text align-middle">AlFajr</span></a>
            <a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"></a>
            <a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-x"></i></a>
        </div>
    </div>
    <!-- Sidebar Header Ends-->
    <!-- / main menu header-->
    <!-- main menu content-->
    <div class="sidebar-content">
        <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" data-scroll-to-active="true" class="navigation navigation-main">

                <li class=" nav-item">
                    <a href="{{url('admin/dashboard')}}"><i class="ft-life-buoy"></i><span data-i18n="" class="menu-title">Dashboard</span></a>
                </li>

                <li class=" nav-item">
                    <a href="{{url('admin/campus')}}"><i class="ft-cloud"></i><span data-i18n="" class="menu-title">Campus</span></a>
                </li>

                @if(Session::get('campus_id'))

                    @if(Auth::user()->can_access('admission'))
                        <li class="has-sub nav-item">
                            <a href="#"><i class="ft-user"></i><span data-i18n="" class="menu-title">Admissions</span></a>
                            <ul class="menu-content">
                                <li><a href="{{route('admin.student.create')}}" class="menu-item">Add Student</a>
                                </li>
                                <li><a href="{{route('admin.student.index')}}" class="menu-item">View Students</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    @if(Auth::user()->can_access('staff'))
                        <li class=" nav-item">
                            <a href="{{route('admin.staff.index')}}"><i class="ft-user-check"></i><span data-i18n="" class="menu-title">Staff</span></a>
                        </li>
                    @endif
                    @if(Auth::user()->can_access('classes'))
                        <li class="has-sub nav-item">
                            <a href="#"><i class="fa fa-building"></i><span data-i18n="" class="menu-title">Class Management</span></a>
                            <ul class="menu-content">
                                <li><a href="{{route('admin.classes.index')}}" class="menu-item">Classes</a>
                                </li>
                                <li><a href="{{route('admin.group.index')}}" class="menu-item">Groups</a>
                                </li>
                                <li><a href="{{route('admin.section.index')}}" class="menu-item">Sections</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    @if(Auth::user()->can_access('fee'))
                        <li class="has-sub nav-item">
                            <a href="#"><i class="ft-life-buoy"></i><span data-i18n="" class="menu-title">Fee</span></a>
                            <ul class="menu-content">
                                <li><a href="{{route('admin.fee.index')}}" class="menu-item">Fee Schedule</a>
                                </li>
                                <li><a href="{{route('admin.fee_group.index')}}" class="menu-item">Fee Discount</a>
                                </li>
                            </ul>
                        </li>
                    @endif

                        <li class=" nav-item">
                            <a href="{{url('admin/attendance')}}"><i class="ft-edit"></i><span data-i18n="" class="menu-title">Attendance</span></a>
                        </li>
                        <li class=" nav-item">
                            <a href="{{url('admin/subject')}}"><i class="ft-book"></i><span data-i18n="" class="menu-title">Subjects</span></a>
                        </li>
                        <li class=" nav-item">
                            <a href="{{url('admin/exam')}}"><i class="ft-paperclip"></i><span data-i18n="" class="menu-title">Exams</span></a>
                        </li>
                    @if(Auth::user()->role==0)
                        <li class="has-sub nav-item">
                            <a href="#"><i class="ft-settings"></i><span data-i18n="" class="menu-title">Settings</span></a>
                            <ul class="menu-content">
                                <li><a href="{{url('admin/setting/website')}}" class="menu-item">Website Settings</a>
                                </li>
                                <li><a href="{{url('admin/setting/admin-panel')}}" class="menu-item">AdminPanel
                                                                                                     Settings</a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-sub nav-item">
                            <a href="#"><i class="ft-paperclip"></i><span data-i18n="" class="menu-title">Reports</span></a>
                            <ul class="menu-content">
                                <li><a href="{{url('admin/student_fee')}}" class="menu-item">Student Fee</a>
                                </li>
                                <li><a href="{{url('admin/class_fee')}}" class="menu-item">Class Fee</a>
                                </li>
                                <li><a href="{{url('admin/branch_fee')}}" class="menu-item">Branch Fee</a>
                                </li>
                                <li><a href="{{route('admin.student.enrollment')}}" class="menu-item">Student Enrollment</a>
                                </li>
                            </ul>
                        </li>
                            <li class="has-sub nav-item">
                                    <a href="#"><i class="ft-paperclip"></i><span data-i18n="" class="menu-title">Expenses</span></a>
                                <ul class="menu-content">
                                    <li><a href="{{url('admin/expense/create')}}" class="menu-item">Add Expense</a>
                                    </li>
                                    <li><a href="{{url('admin/expense')}}" class="menu-item">All Expenses</a>
                                    </li>


                                </ul>
                            </li>

                    <li class="has-sub nav-item">
                        <a href="#"><i class="ft-paperclip"></i><span data-i18n="" class="menu-title">Challans</span></a>
                        <ul class="menu-content">
                            <li><a href="{{url('admin/challan/')}}" class="menu-item">Generate Single Fee</a>
                            </li>
                            <li><a href="{{url('admin/challan/all')}}" class="menu-item">Generate All Fee</a>
                            </li>
                            <li><a href="{{url('admin/challan/fee2')}}" class="menu-item">Fee2</a>
                            </li>

                        </ul>
                    </li>
                        @endif
                @endif
            </ul>
        </div>
    </div>
    <!-- main menu content-->
    <div class="sidebar-background"></div>
    <!-- main menu footer-->
    <!-- include includes/menu-footer-->
    <!-- main menu footer-->
</div>
<!-- / main menu-->
