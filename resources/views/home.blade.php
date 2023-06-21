@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form action="{{ route('uploader') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" id="file">
                <button type="submit">Upload</button>
            </form>

        </div>
    </div>
</div>
@endsection
