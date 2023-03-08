@section('styles')
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
@endsection

<x-base-layout>
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Create Settings</span>
                <span class="text-muted mt-1 fw-semibold fs-7">Create settings with all types</span>
            </h3>

        </div>

        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-3">
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                   {{ $error }} <br>
                @endforeach
            </div>
            @endif
        <!--begin::Table container-->
            <form method="post" action="{{route('settings.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Footer Information Ar</label>
                    <input name="footer_info_ar" value="{{$settings->footer_info_ar ?? old('footer_info_ar')}}" type="text" class="form-control form-control-solid" placeholder="Enter Footer Information"/>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Footer Information En</label>
                    <input name="footer_info_en" value="{{$settings->footer_info_en ?? old('footer_info_en')}}" type="text" class="form-control form-control-solid" placeholder="Enter Footer Information"/>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Address AR</label>
                    <input name="address_ar" value="{{$settings->address_ar ?? old('address_ar')}}" type="text" class="form-control form-control-solid" placeholder="Enter Address ar"/>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Address EN</label>
                    <input name="address_en" value="{{$settings->address_en ?? old('address_en')}}" type="text" class="form-control form-control-solid" placeholder="Enter Address en"/>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Email</label>
                    <input name="email" value="{{$settings->email ?? old('email')}}" type="email" class="form-control form-control-solid" placeholder="Enter Email"/>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Mobile</label>
                    <input name="phone" value="{{$settings->phone ?? old('phone')}}" type="number" class="form-control form-control-solid" placeholder="Enter Mobile"/>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Years Of Experience</label>
                    <input name="testomnials_no" value="{{$settings->testomnials_no ?? old('testomnials_no')}}" type="number" class="form-control form-control-solid"/>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Clients Count</label>
                    <input name="clients_no" value="{{$settings->clients_no ?? old('clients_no')}}" type="number" class="form-control form-control-solid"/>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Projects Count</label>
                    <input name="projects_no" value="{{$settings->projects_no ?? old('projects_no')}}" type="number" class="form-control form-control-solid"/>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Who are we AR</label>
                    <textarea name="who_are_we_ar" class="form-control" id="editor">
                        {{$settings->who_are_we_ar ?? old('who_are_we_ar')}}
                    </textarea>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Who are we EN</label>
                    <textarea name="who_are_we_en" class="form-control" id="editor1">
                        {{$settings->who_are_we_en ?? old('who_are_we_en')}}
                    </textarea>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Vision AR</label>
                    <textarea name="vision_ar" class="form-control" id="editor2">
                        {{$settings->vision_ar ?? old('vision_ar')}}
                    </textarea>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Vision EN</label>
                    <textarea name="vision_en" class="form-control" id="editor3">
                        {{$settings->vision_en ?? old('vision_en')}}
                    </textarea>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Mission AR</label>
                    <textarea name="mission_ar" class="form-control" id="editor4">
                        {{$settings->mission_ar ?? old('mission_ar')}}
                    </textarea>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Mission EN</label>
                    <textarea name="mission_en" class="form-control" id="editor5">
                        {{$settings->mission_en ?? old('mission_en')}}
                    </textarea>
                </div>

                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">About Us AR</label>
                    <textarea name="about_us_ar" class="form-control" id="editor6">
                        {{$settings->about_us_ar ?? old('about_us_ar')}}
                    </textarea>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">About Us EN</label>
                    <textarea name="about_us_en" class="form-control" id="editor7">
                        {{$settings->about_us_en ?? old('about_us_en')}}
                    </textarea>
                </div>

                <div class="mb-5">
                    <label for="exampleFormControlInput1" class="required form-label">File</label>
                    <input name="profile" type="file" class="form-control">
                </div>

                <input type="submit" class="btn btn-success" value="Submit">
            </form>
        </div>
    </div>

@section('scripts')

<script type="text/javascript">

    $(document).ready(function() {

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ))
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor1' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
    .create( document.querySelector( '#editor2' ) )
    .catch( error => {
        console.error( error );
        } );

    ClassicEditor
    .create( document.querySelector( '#editor3' ) )
    .catch( error => {
        console.error( error );
    } );
    ClassicEditor
    .create( document.querySelector( '#editor4' ) )
    .catch( error => {
        console.error( error );
    } );
    ClassicEditor
        .create( document.querySelector( '#editor5' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#editor6' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#editor7' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection

</x-base-layout>

