@section('styles')
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
@endsection

<x-base-layout>
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Create Testimonials</span>
                <span class="text-muted mt-1 fw-semibold fs-7">Create testimonials with all types</span>
            </h3>
            <a href="{{route('testimonials.index')}}" class="btn btn-info create">List Testimonials</a>

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
            <form method="post" action="{{route('testimonials.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Title AR</label>
                    <input name="title_ar" value="{{old('title_ar')}}" type="text" class="form-control form-control-solid" placeholder="Enter Title ar"/>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Title EN</label>
                    <input name="title_en" value="{{old('title_en')}}" type="text" class="form-control form-control-solid" placeholder="Enter Title en"/>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Source AR</label>
                    <input name="source_ar" value="{{old('source_ar')}}" type="text" class="form-control form-control-solid" placeholder="Enter Source ar"/>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Source EN</label>
                    <input name="source_en" value="{{old('source_en')}}" type="text" class="form-control form-control-solid" placeholder="Enter Source en"/>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Content AR</label>
                    <textarea name="content_ar" class="form-control" id="editor"></textarea>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Content EN</label>
                    <textarea name="content_en" class="form-control" id="editor1"></textarea>
                </div>

                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Author</label>
                    <input name="author" value="{{old('author')}}" type="text" class="form-control form-control-solid" placeholder="Enter Source en"/>
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

