@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">

            <h1>places</h1>


            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>dashboard</a></li>

                <li><a href="{{ route('languages.index') }}"><i class="fa fa-dashboard"></i>places</a></li>
                <li class="active">Edit</li>
            </ol>
        </section>

        <section class="content">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    @include('partials._error')
                    <form action="{{ route('places.update', $place[0]->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>city</label>
                            <select name="city_id" class="form-control" id="city_id">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->city_id }}"
                                        @if ($place[0]->city_id == $city->city_id) selected="selected" @endif>
                                        {{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>lang</label>
                            <select name="lang_id" class="form-control"
                                onchange="getPlace({{ $place[0]->id }},this.value)">
                                <option value="">Please select language</option>

                                @foreach ($languages as $lang)
                                    <option value="{{ $lang->id }}"
                                        @if ($place[0]->lang_id == $lang->id) selected="selected" @endif>{{ $lang->language }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>name</label>
                            <div id="place_name">

                                <input type="text" class="form-control" name="name" value="{{ $place[0]->place_name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>image</label>
                            <input type="file" class="form-control image" name="image">
                        </div>
                        <div class="form-group">
                            <img src="{{ asset('uploads/places/' . $place[0]->image) }}" width="100px"
                                class="img-thubnail img-preview">
                        </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Edit</button>
                </div>



                </form>
            </div>
            <!--end of box-body-->
    </div>
    <!--end of box-primary-->
    </section><!-- end of content -->

    </div><!-- end of content wrapper -->
@endsection

<script>
    function getPlace(place_id, lang_id) {
        $.ajax({

            type: 'GET',
            url: "/place_lang/" + lang_id + "/" + place_id,

            dataType: 'json',

            success: function(data) {

                $("#place_name").html(data);
                $("#city_name").html(data);

            }


        });

    }
</script>
