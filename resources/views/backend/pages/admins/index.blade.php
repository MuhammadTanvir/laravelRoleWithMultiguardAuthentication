@extends('backend.layouts.master')
@section('title')
    Admins List ~ Admin Panel
@endsection
@section('admin-content')
<div class="main-content">
            <!-- header area start -->
             @include('backend.layouts.partials.header')

             <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('admin.admins.index') }}">All Users</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        @include('backend.layouts.partials.logout')
                    </div>
                </div>
            </div>
           
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Admins List</h4>
                                <p class="float-right mb-2">
                                @if(Auth::guard('admin')->user()->can('admin.create'))  
                                    <a class="btn btn-primary text-white" href="{{ route('admin.admins.create') }}">Create New Admins</a>
                                @endif    
                                </p>
                                <div class="clearfix"></div>
                                <div class="data-tables">
                                 @include('backend.layouts.partials.messages')
                                    <table id="dataTable" class="text-center">
                                        <thead class="bg-light text-capitalize">
                                             <tr>
                                                <th width="5%">Sl</th>
                                                <th width="10%">Name</th>
                                                <th width="10%">Email</th>
                                                <th width="60%">Roles</th>
                                                <th width="25%">Action</th>
                                            </tr>  
                                                
                                        </thead>
                                        <tbody>
                                            @foreach ($admins as $admin)
                                               <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $admin->name }}</td>
                                                <td>{{ $admin->email }}</td>
                                
                                                <td>
                                                @foreach ($admin->roles as $role)
                                                    <span class="badge badge-info mr-1">
                                                        {{ $role->name  }}
                                                    </span>    
                                                 @endforeach
                                                </td>
                                               
                                                <td>
                                                @if(Auth::guard('admin')->user()->can('role.edit'))    
                                                <a class="btn btn-success text-white" href="{{ route('admin.admins.edit', $admin->id) }}">Edit</a>
                                                @endif

                                                @if(Auth::guard('admin')->user()->can('role.delete'))   

                                                    <a class="btn btn-danger text-white" href="{{ route('admin.admins.destroy', $admin->id) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit();">
                                                        Delete
                                                    </a>
                                                 

                                                    <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST" style="display: none;">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
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
            </div>
        </div>
@endsection

