@extends('backend.layouts.master')
@section('title','Users')
@section('content')
<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active">Users</li>
    </ol>
    <h1 class="page-header">Users</h1>
    <div class="row">
        <div class="col-12">
            <div class="panel panel-inverse">

                <div class="panel-heading">
                    <h4 class="panel-title">Users List</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
                    </div>
                </div>

                <div class="panel-body">
                    <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th class="text-nowrap">Image</th>
                                <th class="text-nowrap">Name</th>
                                <th class="text-nowrap">Email</th>
                                <th class="text-nowrap">Mobile</th>
                                <th class="text-nowrap">Address</th>
                                <th class="text-nowrap">Status</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr class="odd gradeX">
                                <td>{{$loop->iteration}}</td>
                                <td><img src="@if($row->image) {{asset($row->image)}} @else {{asset('defaults/avatar/avatar.png')}} @endif" alt="image" style="width:60px"></td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->mobile}}</td>
                                <td>{{$row->address}}</td>
                                <td>
                                    @if(Cache::has('user-is-online-' . $row->id))
                                    <span class="text-success">Online</span>
                                    @else
                                    <span class="text-secondary">Offline</span>
                                    @endif
                                    <br>
                                    {{ \Carbon\Carbon::parse($row->last_seen)->diffForHumans() }}
                                </td>
                                <td>
                                  
                                    @php
                                    $check1 = App\Models\AdPayment::where('user_id',$row->id)->count();
                                    
                                    $check2 = App\Models\SponseredAd::where('user_id',$row->id)->count();
                                    @endphp

                                    @if( $check1 > 0 || $check1 > 0)
                                    <button type="button" class="btn btn-warning btn-xs delcheck"><i class="fa fa-trash"></i> Delete</button>
                                    @else
                                    <a id="delete" href="{{route('users.destroy',$row->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                                    @endif
                                   
                                    
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
