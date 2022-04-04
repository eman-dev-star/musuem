@extends('layouts.admin')
@section('content')
@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>places</h1>


            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>dashboard</a></li>

                <li><a href="{{route('languages.index')}}"><i class="fa fa-dashboard"></i>places</a></li>
                <li class="active">add</li>
              </ol>
        </section>

        <section class="content">
          <!-- general form elements -->
           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">add</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                @include('partials._error')
                <form action="{{route('places.addlang',$place->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('POST')
                  <div class="form-group">
                    <label>place</label>
                    <select name="place_id" class="form-control" id="place_id">
                        @foreach ($places as $pp)
                            <option value="{{ $pp->place_id }}"
                                @if ($place->id == $pp->place_id) selected="selected" @endif>
                                {{ $pp->name }}</option>
                        @endforeach
                    </select>
                </div>
                  <div class="form-group">
                    <label>lang</label>
                    <select name="lang_id" class="form-control">
                       <option value="">Please select language</option>

                       @foreach($languages as $lang)
                       <option value="{{$lang->id}}">{{$lang->language}}</option>
                       @endforeach
                    </select>
                     </div>


                <div class="form-group">
                  <label>name</label>
                  <input type="text" class="form-control" name="name" value="{{old('name')}}">
                </div>
                 <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>add</button>
              </div>



        </form>
        </div><!--end of box-body-->
         </div><!--end of box-primary-->
        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
