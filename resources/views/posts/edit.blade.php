@extends('layouts.layout')
@section('title', 'Create Post')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Create Post</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;">Post</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:;">Create</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-6 col-xxl-12">
                @include('common.message')
            </div>
            <div class="col-xl-6 col-xxl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('post.update', $post) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Post Title *</label>
                                        <input type="text" class="form-control" name="title" value="{{ $post->title }}" placeholder="Ex: Sr. Software Engineer">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Description *</label>
                                    <textarea class="form-control" id="ckeditor" name="description" rows="10" cols="60">{{ $post->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ $post->is_active == 1 ? 'checked' : 'checked'}} >
                                        <label class="form-check-label">
                                            Is Active
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection