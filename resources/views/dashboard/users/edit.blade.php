<x-base-layout>
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Update Users</span>
                <span class="text-muted mt-1 fw-semibold fs-7">Update users with all types</span>
            </h3>
            <a href="{{route('users.index')}}" class="btn btn-info create">List Users</a>

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
            <form method="post" action="{{route('users.update', ['user' => $user->id])}}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Name</label>
                    <input name="name" value="{{$user->name}}" type="text" class="form-control form-control-solid" placeholder="Enter name"/>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">E-mail</label>
                    <input name="email" value="{{$user->email}}" type="email" class="form-control form-control-solid" placeholder="Enter email"/>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Mobile</label>
                    <input name="mobile" value="{{$user->mobile}}" type="numeric" class="form-control form-control-solid" placeholder="Enter mobile"/>
                </div>  
                <div class="mb-5">
                    <label for="exampleFormControlInput1" class="required form-label">Type</label>
                    <select onchange="yesnoCheck(this);" name="type" class="form-control">
                        @foreach($types as $key => $type)
                            <option value="{{$key}}" @if($user->type == $key) selected @endif>{{$type}}</option>
                        @endforeach
                    </select>
                </div> 

                @if ($user->type == \App\Utility\UserTypes::TYPE_SALON)
                <div id="salon" style="display: block;" class="mb-5">
                    <label for="exampleFormControlInput1" class="required form-label">Salon</label>
                    <select name="salon_id" class="form-control">
                        @foreach($salons as $key => $singleSalon)
                            <option value="{{$singleSalon->id}}" @if($salon->id == $singleSalon->id) selected @endif>{{$singleSalon->name}}</option>
                        @endforeach
                    </select>
                </div> 
                @endif

                <div class="mb-5">
                    <label for="exampleFormControlInput1" class="required form-label">Image</label>
                    <input name="image" type="file" class="form-control">
                    @if ($user->image)
                    <img alt="Pic" src="{{asset($user->image)}}" class="img-thumbnail" width="60" />
                    @endif
                </div>

                <input type="submit" class="btn btn-success" value="Submit">
            </form>
        </div>
    </div>

@section('scripts')
    <script>
        let salonType = "<?php echo \App\Utility\UserTypes::TYPE_SALON ?>";
        function yesnoCheck(that) {
            if (that.value != salonType) {
                document.getElementById("salon").style.display = "none";
            } else {
                document.getElementById("salon").style.display = "block";
            }
        }
    </script>
@endsection

</x-base-layout>
