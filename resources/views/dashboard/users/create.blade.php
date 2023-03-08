<x-base-layout>
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Create Users</span>
                <span class="text-muted mt-1 fw-semibold fs-7">Create users with all types</span>
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
            <form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Name</label>
                    <input name="name" value="{{old('name')}}" type="text" class="form-control form-control-solid" placeholder="Enter name"/>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">E-mail</label>
                    <input name="email" value="{{old('email')}}" type="email" class="form-control form-control-solid" placeholder="Enter email"/>
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Mobile</label>
                    <input name="mobile" value="{{old('mobile')}}" type="numeric" class="form-control form-control-solid" placeholder="Enter mobile"/>
                </div>  
                <div class="mb-5">
                    <label for="exampleFormControlInput1" class="required form-label">Password</label>
                    <input name="password" type="password" class="form-control form-control-solid" placeholder="Enter password"/>
                </div>
                <div class="mb-5">
                    <label for="exampleFormControlInput1" class="required form-label">Password</label>
                    <input name="password_confirmation" type="password" class="form-control form-control-solid" placeholder="Enter password confirmation"/>
                </div>
                <div class="mb-5">
                    <label for="exampleFormControlInput1" class="required form-label">Type</label>
                    <select onchange="yesnoCheck(this);" name="type" class="form-control">
                        @foreach($types as $key => $type)
                            <option value="{{$key}}">{{$type}}</option>
                        @endforeach
                    </select>
                </div> 
                <div style="display: none;" class="mb-5" id="salon">
                    <label for="exampleFormControlInput1" class="required form-label">Salon</label>
                    <select name="salon_id" class="form-control">
                        @foreach($salons as $salon)
                            <option value="{{$salon->id}}">{{$salon->name}}</option>
                        @endforeach
                    </select>
                </div> 
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
        let salonType = "<?php echo \App\Utility\UserTypes::TYPE_SALON ?>";
        function yesnoCheck(that) {
            if (that.value == salonType) {
                document.getElementById("salon").style.display = "block";
            } else {
                document.getElementById("salon").style.display = "none";
            }
        }
    </script>
@endsection

</x-base-layout>

