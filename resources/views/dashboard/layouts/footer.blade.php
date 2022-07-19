<div class="footer bg-white py-3 d-flex flex-lg-column" id="kt_footer">
    <!--begin::Container-->
    <div class="container d-flex align-items-center justify-content-between">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted font-weight-bold mr-2">{{ date('Y') }}©</span>
            <a href="{{ url('/') }}" target="_blank" class="text-dark-75 text-hover-primary">{{ $setting->site_name }}</a>
        </div>
        <!--end::Copyright-->
        <!--begin::Nav-->
        <div class="nav nav-dark order-1 order-md-2">
            <a href="{{ route('aboutUs') }}" target="_blank" class="nav-link pr-3 pl-0">About</a>
            <a href="{{ route('contact') }}" target="_blank" class="nav-link pl-3 pr-0">Contact</a>
        </div>
        <!--end::Nav-->
    </div>
    <!--end::Container-->
</div>
