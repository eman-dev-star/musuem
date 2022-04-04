@extends('layouts.admin')
@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>places</h1>

            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>dashboard</a></li>
                <li class="{{route('places.index')}}">places</li>

            </ol>
        </section>


        <section class="content">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title" style="margin-bottom: 15px"><small></small></h3>

                <div class="row">
                      <div class="col-md-4">


                         <a href="{{route('places.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>add</a>

                    </div>
                </div>

            </div>
            <!-- /.box-header -->
             <div class="box-body">

                 <table class="table table-hover">
                  <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>city name</th>
                 <th>place name</th>
                 <th>lang</th>
                 <th>image</th>
                 <td>action</td>
                </tr>
                  </thead>
              <tbody>
                @foreach($places as $index=>$city)
                <tr>
                  <td>{{$index+1}}</td>
                  <td>{{$city->city_name}}</td>
                  <td>{{$city->place_name}}</td>
                  <td>{{$city->lang_name}}</td>
                  <td>
                    <img src="{{asset('uploads/places/'.$city->image)}}" width="100px" class="img-thubnail img-preview">
                  </td>
                  <td>
                      <a href="{{route('places.edit',$city->id)}}" class="btn btn-success btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i>
                       edit</a>
                       <a href="{{route('places.show',$city->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>

                        add language</a>

                      <form  action="{{route('places.destroy',$city->id)}}" method="post" style="display: inline-block;">
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
