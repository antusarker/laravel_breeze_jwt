@extends('layouts.layout')
@section('title', 'Dashboard')
@section('content')
<?php
  $baseUrl = URL::to('/');
?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">No of Posts </div>
                            <div class="stat-digit">{{$total_posts}}</div>
                        </div>
                        <a href="{{route('post.list')}}">View <i class="mdi mdi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection