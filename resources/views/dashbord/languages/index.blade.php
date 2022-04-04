@extends('layouts.admin')
@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>languages</h1>

            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>dashboard</a></li>
                <li class="{{route('languages.index')}}">languages</li>

            </ol>
        </section>


        <section class="content">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title" style="margin-bottom: 15px">languages<small></small></h3>

                <div class="row">
                      <div class="col-md-4">

                         <a href="{{route('languages.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>add</a>

                    </div>
                </div>

            </div>
            <!-- /.box-header -->
             <div class="box-body">
                 <table class="table table-hover">
                  <thead>
                <tr>
                  <th style="width: 10px">#</th>
                 <th>language</th>
                 <th>code</th>

                  <td>action</td>
                </tr>
                  </thead>
              <tbody>
                @foreach($languages as $index=>$lang)
                <tr>
                  <td>{{$index+1}}</td>
                  <td>{{$lang->language}}</td>
                  <td>{{$lang->code}}</td>


                  <td>

                      <a href="{{route('languages.edit',$lang->id)}}" class="btn btn-success btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i>
                       edit</a>

                      <form  action="{{route('languages.destroy',$lang->id)}}" method="post" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> delete</button>
                    </form>


                  </td>
                </tr>
                @endforeach
            </tbody>

              </table>


              </div>

              <!-- box-body -->

          </div>
          <!-- box -->



        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
