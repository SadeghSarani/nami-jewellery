
<!-- Start Sidebar -->
<div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 sticky-sidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

    <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;"><div class="profile-sidebar dt-sl">
            <div class="dt-sl dt-sn mb-3">
                <div class="profile-sidebar-header dt-sl">
                    <div class="profile-avatar float-right">
                        <img data-src="" alt="" src="" class="animated fadeIn lazyLoadXT-completed">
                    </div>
                    <div class="profile-header-content mr-3 mt-2 float-right">
                        <span class="d-block profile-username">{{$user->name}}</span>
                        <span class="d-block profile-phone">{{$user->phone}}</span>
                    </div>
                    <div title="صفر تومان" class="profile-point mt-3 mb-2 dt-sl">
                        <span class="value-profile-point">موجودی کیف پول:</span>
                        <div class="float-left label-profile-point"><strong class="">0</strong>  تومان</div>
                    </div>

                    <div class="profile-link mt-2 dt-sl">
                        <div class="row">
                            <div class="col-6 text-center">
                                <a href="">
                                    <i class="bi bi-arrow-counterclockwise"></i>
                                    <span class="d-block">تغییر رمز</span>
                                </a>
                            </div>
                            <div class="col-6 text-center">
                                <a href="{{route('userLogout')}}">
                                    <i class="bi bi-arrow-bar-left"></i>
                                    <span class="d-block"> خروج از حساب</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dt-sl dt-sn mb-3">
                <div class="profile-menu-section dt-sl">
                    <div class="label-profile-menu mt-2 mb-2">
                        <span>حساب کاربری شما</span>
                    </div>
                    <div class="profile-menu">
                        <ul>
                            <li>
                                <a href="{{route('userProfilePage')}}">
                                    <i class="bi bi-person-badge"></i>
                                    پروفایل
                                </a>
                            </li>
                            <li>
                                <a href="{{route('orderUser')}}">
                                    <i class="bi bi-basket3"></i>
                                    همه سفارش ها

                                </a>
                            </li>
                            <li>
                                <a href="{{route('userEditProfilePage')}}">
                                    <i class="bi bi-person-vcard-fill"></i>
                                    اطلاعات شخصی
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div></div></div>
<!-- End Sidebar -->
