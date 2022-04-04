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
                <form action="{{route('discriptions.update',$discrption[0]->discrption_id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  {{-- <input name="discription_id" type="text" value="{{$this->id}}"> --}}
                  <div class="form-group">
                    <label>sclupture name</label>
                    <select name="sculpture_id" class="form-control" id="sculpture_id">
                        @foreach ($sculptures as $sculpture)
                            <option value="{{ $sculpture->sculpture_id }}"
                                @if ($discrption[0]->sculpture_id == $sculpture->sculpture_id) selected="selected" @endif>
                                {{ $sculpture->name }}</option>
                        @endforeach
                    </select>
                </div>
                  <div class="form-group">
                    <label>lang</label>
                    <select name="lang_id" class="form-control"
                        onchange="getDiscrption({{ $discrption[0]->discrption_id }},this.value)">
                        <option value="">Please select language</option>

                        @foreach ($languages as $lang)
                            <option value="{{ $lang->id }}"
                                @if ($discrption[0]->lang_id == $lang->id) selected="selected" @endif>{{ $lang->language }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                  <label>name</label>
                  <div id="discrption_name">

                  <input type="text" class="form-control" name="text" value="{{$discrption[0]->discrption_name}}">
                </div>
                </div>
                <div class="form-group">
                    <label>audio </label>
                    <div id="audio">

                    <audio width="320" height="240" controls>
                        <source src="{{asset('uploads/audio/'. $discrption[0]->discrption_audio)}}">
                     </audio>
                    </div>

                  </div>
                <div class="form-group">
                    <label>video </label>
                    <div id="video">
                    <video width="320" height="240" controls>
                        <source src="{{asset('uploads/video/' . $discrption[0]->discrption_video)}}">
                     </video>
                    </div>
                  </div>


                 <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>edit</button>
              </div>



        </form>
        </div><!--end of box-body-->
         </div><!--end of box-primary-->
        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
<script>
    function getDiscrption(discrption_id, lang_id) {
        $.ajax({

            type: 'GET',
            url: "/discrption_lang/" + lang_id + "/" + discrption_id,

            //    url:"/place_lang/"+lang_id+"/"+place_id"/"+city_id,

            //    data:{lang_id:lang_id, city_id:city_id},
            dataType: 'json',

            success: function(data) {



                //    $('#city_id').html(data);
                // $.each(data,function(index,city){
                //     $('#city_id').append('<option value="'+city.id+'">'+city.name+'</option>');
                // })
                // document.getElementById("allplace").style.display === "none";
                // document.getElementById("allcity").style.display === "none";

                $("#discrption_name").html(data['name']);
                $("#video").html(data['video']);
                $("#audio").html(data['audio']);



            }


        });

    }
</script>
