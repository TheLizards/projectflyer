@extends('layout')

@section('content')

    <div class="row">
        <div class="col-md-4">
            <h1>{{$flyer->street}}</h1>
            <h2>{{$flyer->price}}</h2>

            <div class="description">
                <p>{!! $flyer->description !!}</p>
            </div>
        </div>

        <div class="col-md-8 gallery">
            @foreach($flyer->photos->chunk(4) as $set)
                <div class="row">
                    @foreach($set as $photo)
                        <div class="col-md-3 gallery_image">
                            <form method="POST" action="/photos/{{$photo->id}}">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit">Delete</button>
                            </form>

                            <a data-lity href="/{{$photo->path}}" >
                                <img src="/{{$photo->thumbnail_path}}">
                            </a>

                        </div>
                    @endforeach
                </div>
            @endforeach

            <hr>

            @if($user && $user->owns($flyer))
                <form id="addPhotosForm" action="{{route('store_photo_path', [$flyer->zip, $flyer->street])}}" method="POST" class="dropzone">
                    {{csrf_field()}}
                </form>
                @endif
        </div>

    </div>

@stop

@section('scripts.footer')
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.js"></script>--}}
    <script>
        Dropzone.options.addPhotosForm = {
            paramName: 'photo',
            maxFilesize: 3,
            acceptedFiles: '.jpg, .jpeg, .png, .bmp'
        };
    </script>

@stop