@extends('backend.layouts.master')
@section('title')
    User List ~ Admin Panel
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
                                <li><a href="{{ route('admin.users.index') }}">All Users</a></li>
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
                                <h4 class="header-title">Users List</h4>
                                <p class="float-right mb-2">
                                    <a class="btn btn-primary text-white" href="{{ route('admin.users.create') }}">Create New Users</a>
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
                                            @foreach ($users as $users)
                                               <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $users->name }}</td>
                                                <td>{{ $users->email }}</td>
                                
                                                <td>
                                                @foreach ($users->roles as $role)
                                                    <span class="badge badge-info mr-1">
                                                        {{ $role->name  }}
                                                    </span>    
                                                 @endforeach
                                                </td>
                                               
                                                <td>
                                                <a class="btn btn-success text-white" href="{{ route('admin.users.edit', $users->id) }}">Edit</a>

                                                    <a class="btn btn-danger text-white" href="{{ route('admin.users.destroy', $users->id) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $users->id }}').submit();">
                                                        Delete
                                                    </a>

                                                    <form id="delete-form-{{ $users->id }}" action="{{ route('admin.users.destroy', $users->id) }}" method="POST" style="display: none;">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
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

