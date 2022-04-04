@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">

            <h1>discptions</h1>


            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>dashboard</a></li>

                <li><a href="{{route('discriptions.index')}}"><i class="fa fa-dashboard"></i>discptions</a></li>
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
                <form action="{{route('discriptions.addlang',$discription->id)}}" method="post">
                  @csrf
                  @method('POST')
                  <div class="form-group">
                    <label>Discription</label>
                    <select name="discription_id" class="form-control" id="discription_id">
                        @foreach ($discriptions as $dd)
                            <option value="{{ $dd->discription_id }}"
                                @if ($discription->id == $dd->discription_id) selected="selected" @endif>
                                {{ $dd->text }}</option>
                        @endforeach
                    </select>
                </div>
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
                    <label>name</label>
                    <input type="text" class="form-control" name="text" value="{{$discription->text}}">
                  </div>

                  <div class="form-group">
                    <label>audio</label>

                        <input type="file" class="form-control" name="audio">

                  </div>

                  <div class="form-group">
                    <label>video</label>

                        <input type="file" class="form-control" name="video">

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

<script>
    function getDiscrption(discrption_id, lang_id) {
        $.ajax({

            type: 'GET',
            url: "/discrption_lang/" + lang_id + "/" + discrption_id,

            //    url:"/place_lang/"+lang_id+"/"+place_id"/"+city_id,

            //    data:{lang_id:lang_id, city_id:city_id},
            dataType: 'json',

            success: function(data) {
                alert(data);
                //    $('#city_id').html(data);
                // $.each(data,function(index,city){
                //     $('#city_id').append('<option value="'+city.id+'">'+city.name+'</option>');
                // })
                // document.getElementById("allplace").style.display === "none";
                // document.getElementById("allcity").style.display === "none";

                $("#discrption_name").html(data);

            }


        });

    }
</script>
