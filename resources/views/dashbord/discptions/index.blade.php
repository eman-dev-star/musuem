@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">

            <h1>discrptions</h1>

            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>dashboard</a></li>
                <li class="{{route('discriptions.index')}}">discrptions</li>

            </ol>
        </section>


        <section class="content">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title" style="margin-bottom: 15px"><small></small></h3>

                <div class="row">
                      <div class="col-md-4">

                         <a href="{{route('discriptions.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>add</a>

                    </div>
                </div>

            </div>
            <!-- /.box-header -->
             <div class="box-body">

                 <table class="table table-hover">
                  <thead>
                <tr>
                  <th style="width: 10px">#</th>
                 <th>sculpture name</th>
                 <th>discrption</th>
                 <th>lang</th>

                 <th>video</th>
                 <th>audio</th>
                 <td>action</td>
                </tr>
                  </thead>
              <tbody>
                @foreach($discrptions as $index=>$discrption)
                <tr>
                  <td>{{$index+1}}</td>
                  <td>{{$discrption->sculpture_name}}</td>
                  <td>{{$discrption->discrption_name}}</td>
                  <td>{{$discrption->lang_name}}</td>
                  <td>
                      <a href="{{asset('uploads/video/'.$discrption->discrption_video)}}" target="_blank">
                    <video width="100" height="100" autoplay>
                        <source src="{{asset('uploads/video/'.$discrption->discrption_video)}}" type="video/mp4">
                     </video>
                      </a>
                  </td>
                  <td>

                     <audio width="100" height="100" controls>
                        <source src="{{asset('uploads/audio/'. $discrption->discrption_audio)}}">
                     </audio>
                  </td>
                  <td>
                      <a href="{{route('discriptions.edit',$discrption->discrption_id)}}" class="btn btn-success btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i>
                       edit</a>
                       <a href="{{route('discriptions.show',$discrption->discrption_id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>

                        add language</a>

                      <form  action="{{route('discriptions.destroy',$discrption->discrption_id )}}" method="post" style="display: inline-block;">
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

