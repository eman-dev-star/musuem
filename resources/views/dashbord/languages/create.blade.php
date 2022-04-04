@extends('layouts.admin')
@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>languages</h1>

            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>dashboard</a></li>

                <li><a href="{{route('languages.index')}}"><i class="fa fa-dashboard"></i>@lang('site.languages')</a></li>
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
                <form action="{{route('languages.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('POST')
                <div class="form-group">
                  <label>language</label>
                  <input type="text" class="form-control" name="language" value="{{old('language')}}">
                </div>
                <div class="form-group">
                    <label>code</label>
                    <input type="text" class="form-control" name="code" value="{{old('code')}}">
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
