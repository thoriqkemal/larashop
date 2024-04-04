@extends('layouts.global')

@section('title') Edit Category @endsection

@section('content')

@if(session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<div class="col-md-8">
    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3"
        action="{{ route('categories.update', [$category->id]) }}" method="POST">

        @csrf

        <input type="hidden" name="_method" value="PUT">

        <label>Category name</label>
        <input type="text" class="form-control {{$errors->first('name') ? 'is-invalid' : ''}}" name="name" value="{{old('name') ? old('name') : $category->name}}">
        <div class="invalid-feedback">
            {{$errors->first('name')}}
        </div>
        <br>

        <label>Category slug</label>
        <input type="text" class="form-control {{$errors->first('slug') ? 'is-invalid' : ''}}" name="slug" value="{{old('slug') ? old('slug') : $category->slug}}">
        <div class="invalid-feedback">
            {{$errors->first('slug')}}
        </div>
        <br>

        <label>Category image</label><br>
        @if ($category->image)
        <span>Current image</span><br>
        <img src="{{asset('storage/' . $category->image)}}" width="120px">
        <br><br>
        @endif
        <input type="file" class="form-control {{$errors->first('image') ? 'is-invalid' : ''}}" name="image">
        <small class="text-muted">Kosongkan juka tidak ingin mengubah gambar</small>
        <div class="invalid-feedback">
            {{$errors->first('image')}}
        </div>
        <br><br>

        <input type="submit" class="btn btn-primary" value="Update">
    </form>
</div>

@endsection
