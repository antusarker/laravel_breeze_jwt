@extends('layouts.layout')
@section('title', 'All Posts')
@section('content')
<?php
  $baseUrl = URL::to('/');
?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                @include('common.message')
            </div>
        </div>

        <div class="row page-titles mx-0">
            <div class="col-sm-12 p-md-0">
                <div class="welcome-text">
                    <h4>All Posts</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-lg-12 col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Detail</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alldata as $key=>$data)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{!! $data->description !!}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-xs btn-warning dropdown-toggle" data-toggle="dropdown">Action</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('post.edit',$data->id)}}">Edit</a>
                                                <a class="dropdown-item text-danger" href="#"
                                                onclick="if(confirm('Are you sure you want to delete this Data?')) {
                                                    event.preventDefault();
                                                    document.getElementById('delete-post-{{ $data->id }}').submit();
                                                }">
                                                Delete
                                                </a>

                                                <form id="delete-post-{{ $data->id }}" action="{{ route('post.destroy', $data->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
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