<!--begin::Global Config(global config for global JS scripts)-->
<script>
    var KTAppSettings = {
        "breakpoints": {
            "sm": 576,
            "md": 768,
            "lg": 992,
            "xl": 1200,
            "xxl": 1400
        },
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3699FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#E4E6EF",
                    "dark": "#181C32"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1F0FF",
                    "secondary": "#EBEDF3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#3F4254",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#EBEDF3",
                "gray-300": "#E4E6EF",
                "gray-400": "#D1D3E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#7E8299",
                "gray-700": "#5E6278",
                "gray-800": "#3F4254",
                "gray-900": "#181C32"
            }
        },
        "font-family": "Poppins"
    };

</script>
<!--end::Global Config-->

<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{asset('backend')}}/assets/plugins/global/plugins.bundle.js"></script>
<script src="{{asset('backend')}}/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="{{asset('backend')}}/assets/js/scripts.bundle.js"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="{{asset('backend')}}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('backend')}}/assets/js/pages/widgets.js"></script>


<!--begin::Page Vendors(used by this page)-->
<script src="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="{{asset('backend')}}/assets/js/pages/crud/datatables/basic/paginations.js"></script>
<script src="{{asset('backend')}}/assets/js/pages/custom/profile/profile.js"></script>

<script src="{{asset('backend')}}/assets/js/pages/crud/forms/editors/summernote.js"></script>
<script src="{{ asset('backend') }}/assets/js/pages/crud/forms/widgets/select2.js"></script>
<script src="{{asset('backend')}}/assets/js/pages/crud/file-upload/dropzonejs.js"></script>
<script src="{{asset('backend')}}/assets/js/pages/crud/forms/widgets/tagify.js"></script>

<!--end::Page Scripts-->

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Sweetalert -->
<script src="{{asset('defaults/sweetalert/sweetalert2@9.js')}}"></script>
<script src="{{asset('defaults/sweetalert/sweetalertjs.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('defaults/toastr/toastr.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    @if(Session::has('message'))
    var type = "{{Session::get('alert-type','info')}}"

    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif

</script>
<script>
        $(".myselect2").select2({

        });
    </script>



@yield('customjs')
