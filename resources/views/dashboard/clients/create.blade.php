@section('styles')
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
@endsection

<x-base-layout>
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Create Clients</span>
                <span class="text-muted mt-1 fw-semibold fs-7">Create Clients with all types</span>
            </h3>
            <a href="{{route('clients.index')}}" class="btn btn-info create">List Clients</a>

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
            <form method="post" action="{{route('clients.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="exampleFormControlInput1" class="required form-label">Image</label>
                    <input name="image" type="file" class="form-control">
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

