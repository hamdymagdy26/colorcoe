@section('styles')
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
@endsection

<x-base-layout>
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Update Medias</span>
                <span class="text-muted mt-1 fw-semibold fs-7">Update medias with all types</span>
            </h3>
            <a href="{{route('medias.index')}}" class="btn btn-info create">List Medias</a>

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
            <form method="post" action="{{route('medias.update', ['media' => $media->id])}}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Title AR</label>
                    <input name="title_ar" value="{{$media->title_ar}}" type="text" class="form-control form-control-solid" placeholder="Enter Title ar"/>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Title EN</label>
                    <input name="title_en" value="{{$media->title_en}}" type="text" class="form-control form-control-solid" placeholder="Enter Title en"/>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Location AR</label>
                    <input name="location_ar" value="{{$media->location_ar}}" type="text" class="form-control form-control-solid" placeholder="Enter Location ar"/>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Location EN</label>
                    <input name="location_en" value="{{$media->location_en}}" type="text" class="form-control form-control-solid" placeholder="Enter Location en"/>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Scope AR</label>
                    <input name="scope_ar" value="{{$media->scope_ar}}" type="text" class="form-control form-control-solid" placeholder="Enter Scope ar"/>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Scope EN</label>
                    <input name="scope_en" value="{{$media->scope_en}}" type="text" class="form-control form-control-solid" placeholder="Enter Scope en"/>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Client</label>
                    <input name="client" value="{{$media->client}}" type="text" class="form-control form-control-solid" placeholder="Enter Client"/>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Media Date</label>
                    <input name="date" value="{{$media->date}}" type="number" class="form-control form-control-solid" placeholder="Enter Scope en"/>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Content AR</label>
                    <textarea name="content_ar" class="form-control" id="editor">{{$media->content_ar}}</textarea>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Content EN</label>
                    <textarea name="content_en" class="form-control" id="editor1">{{$media->content_en}}</textarea>
                </div>
                
                <input type="submit" class="btn btn-success" value="Submit">
            </form>
        </div>
    </div>

@section('scripts')
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
</script>
@endsection
    
</x-base-layout>
