@extends('dashboard.layouts.master')
@section('title', 'IC List')
@section('udcontent')

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Add IC</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="javascript:;" class="text-muted">Add IC</a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">Add IC
                                <span class="d-block text-muted pt-2 font-size-sm">Add IC here</span>
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{ route('ic.provider.index') }}" class="btn btn-primary btn-sm font-weight-bolder">
                                < Back</a>
                                    <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12">
                                <form method="GET">
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" placeholder="Email"
                                                id="kt_datatable_search_query" name="search"
                                                value="{{ request()->search ?? '' }}">
                                            <span>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="submit" id="submitBtn" value="Submit" class="btn btn-success">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="card-body">
                                    <!--begin: Datatable-->
                                    <table class="table table-separate table-head-custom table-checkable" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th class="text-nowrap">Name</th>
                                                <th class="text-nowrap">Email</th>
                                                <th class="text-nowrap">Phone</th>
                                                <th class="text-nowrap">Rating</th>
                                                <th class="text-nowrap">Address</th>
                                                <th class="text-nowrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (@$dataIcs as $dataIc)

                                            @php
                                                $starSum = App\Models\IcReview::where('ic_id', $dataIc->id)->sum('rating');

                                                $ratingCount = App\Models\IcReview::where('ic_id', $dataIc->id)->count();

                                                if ($ratingCount != 0) {
                                                $ratingAvg = round($starSum / $ratingCount, 1);
                                                } else {
                                                $ratingAvg = 0;
                                                }
                                            @endphp
                                                <tr>
                                                    <td>{{ @$loop->iteration }}</td>
                                                    <td>{{ @$dataIc->name }}</td>
                                                    <td>{{ @$dataIc->email }}</td>
                                                    <td>{{ @$dataIc->mobile }}</td>
                                                    <td>{{$ratingAvg }}/10</td>
                                                    <td>{{ @$dataIc->address }}</td>
                                                    <td>
                                                        <a href="{{ route('ic.provider.show', $dataIc->id) }}"
                                                            class="btn btn-icon btn-clean btn-sm"><i
                                                                class="la la-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            <!--Row Status -->


                                        </tbody>
                                    </table>

                                    <!--end: Datatable-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>

            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@section('customjs')
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{config('app.google_map_key')}}&libraries=places&callback=initialize&language=en&region=GB"
        async defer></script>
    <script src="/js/mapInput.js"></script>

@endsection

@endsection
