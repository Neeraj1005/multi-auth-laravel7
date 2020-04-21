@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                <form action="{{route('media.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="filename">upload an image</label>
                            <input type="file" name="filename" class="form-control-file @error('filename') is-invalid @enderror" id="filename">
                            @error('filename')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">upload</button>
                    </form>
                    @foreach ($media as $media)
                <img src="{{asset('medialibrary/'.$media->path)}}" alt="" width="40px">

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
