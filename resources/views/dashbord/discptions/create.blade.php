@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">

            <h1>discriptions</h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>dashboard</a></li>

                <li><a href="{{route('discriptions.index')}}"><i class="fa fa-dashboard"></i>sculptures</a></li>
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
                <form action="{{route('discriptions.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('POST')
                  {{-- <input name="discription_id" type="text" value="{{$this->id}}"> --}}
                  <div class="form-group">
                    <label>lang</label>
                    <select name="lang_id" class="form-control">
                       <option value="">please selecet your lang</option>

                       @foreach($languages as $lang)
                       <option value="{{$lang->id}}">{{$lang->language}}</option>
                       @endforeach
                    </select>
                     </div>
                     <div class="form-group">
                        <label>sclupture</label>
                        <select name="sculpture_id" class="form-control">
                           <option value="">please selecet your sclupture</option>

                           @foreach($sculptures as $sculpture)
                           <option value="{{$sculpture->sculpture_id}}">{{$sculpture->name}}</option>
                           @endforeach
                        </select>
                         </div>


                <div class="form-group">
                  <label>name</label>
                  <input type="text" class="form-control" name="text" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label>audio</label>

                        <input type="file" class="form-control image" name="audio">

                  </div>

                  <div class="form-group">
                    <label>video</label>

                        <input type="file" class="form-control image" name="video">

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
