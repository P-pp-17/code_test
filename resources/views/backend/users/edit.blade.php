@extends('layouts.backend')
@section('title', 'Edit '. $user->name)
@section('content')
@include('backend.partials.commons._content_header', ['title' => 'Edit '. $user->name])
<section class="content">
    <div class="card">
        <form action="{{ route('backend.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group col-md-6">
                    <div class="mb-0 alert alert-warning">
                        <i class="fas fa-exclamation-triangle"></i>
                        &nbsp;Attributes marked as <span class="text-danger">*</span> are required.
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Post Name" value="{{ old('name') ?? $user->name }}" required>
                    @error('name')
                    <span id="name-error" class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="phone">Phone <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone"
                        name="phone" placeholder="Enter User's Phone" value="{{ old('phone', $user->phone) }}" required>
                    @error('phone')
                    <span id="phone-error" class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" placeholder="Enter User's Email" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                    <span id="email-error" class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                
                <div class="form-group col-md-6">
                    <label for="image">User Photo <span class="text-danger">*</span></label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image', '') }}">
                    <input type="hidden" name="hidden_image" value="{{ $user->image }}" required>
                    
                    <img src="{{ asset('images/user_images/'.$user->image)}}" class="img-thumbnail" width="75" />

                    @error('image')
                    <span id="attached-files-error" class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="field_wrapper form-group col-md-6">
                    <div class="mb-3 float-right">
                        <a href="javascript:void(0);" class="add_button" title="Add field">
                            <button type="button" class="btn btn-success">Add New Address</button>
                        </a>
                    </div>
                   
                    <div class="mt-5">
                        <label for="address">User's Detail Address <span class="text-danger">*</span></label>

                        <?php $count = 1; ?>
                        @foreach($userAddresses as $userAddress)
                            @if($count > 1)
                                <label for="address">User Detail Address<span class="text-danger">*</span></label>
                                <div class="mb-3 float-right">
                                    <a href="javascript:void(0);" data-toggle="popover" data-content="Remove"
                                    class="remove text-danger mx-2" data-id="{{ $userAddress->id }}"
                                    data-remove-content="{{ $userAddress->address }}" data-type="user-addresses">
                                    <span class="text-danger">Remove Address</span>
                                    </a>
                                </div>
                            @endif

                            <input type="hidden" name="id[]" value="{{ $userAddress->id }}">
                    
                            <input type="text" name="address[]" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Enter User Address" value="{{ old('address', $userAddress->address) }}" required />
                            @error('address')
                            <span id="address-error" class="error invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                            <br>

                            <input type="text" name="address_phone[]" class="form-control @error('address_phone') is-invalid @enderror" id="address_phone" placeholder="Enter User Address Phone" value="{{ old('address_phone', $userAddress->phone) }}" required />
                            @error('address_phone')
                            <span id="address_phone-error" class="error invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                            <br>

                            <select name="type[]" id="type" class="form-control js-select-2 @error('type') is-invalid @enderror"  data-selected="{{ old('type', 0) }}">
                                <!-- <option value="0">Select Address Type</option> -->
                                <option value="Home" @if($userAddress->type == "Home") selected @endif>Home</option>
                                <option value="Office" @if($userAddress->type == "Office") selected @endif>Office</option>
                                <option value="Other" @if($userAddress->type == "Other") selected @endif>Other</option>
                            </select>
                            @error('type')
                            <span id="type-error" class="error invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                            <br>

                            <input type="text" name="lat[]" class="form-control @error('lat') is-invalid @enderror" id="lat" placeholder="Enter User Address Lat" value="{{ old('lat', $userAddress->lat) }}" />
                            @error('lat')
                            <span id="lat-error" class="error invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                            <br>

                            <input type="text" name="lng[]" class="form-control @error('lng') is-invalid @enderror" id="lng" placeholder="Enter User Address Lng" value="{{ old('lng', $userAddress->lng) }}" />
                            @error('lng')
                            <span id="lng-error" class="error invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                            <br>

                            <input type="text" name="loc_name[]" class="form-control @error('loc_name') is-invalid @enderror" id="loc_name" placeholder="Enter User Address Location Name" value="{{ old('loc_name', $userAddress->loc_name) }}" />
                            @error('loc_name')
                            <span id="loc_name-error" class="error invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                            <br>
                            <?php $count++; ?>
                        @endforeach
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="is-active">
                        Testing Status
                        <span class="text-danger">*</span>
                    </label>
                    <div class="form-inline">
                        <div class="icheck-primary mr-2">
                            <input type="radio" id="yes" name="testing_status" value="1" @if($user->testing_status == 1) checked @endif />
                            <label for="yes">Yes</label>
                        </div>
                        <div class="icheck-primary mr-2">
                            <input type="radio" id="no" name="testing_status" value="0" @if($user->testing_status == 0) checked @endif/>
                            <label for="no">No</label>
                        </div>
                    </div>
                </div>
                
                <div class="form-group col-md-6">
                    <label for="is-active">
                        Active
                        <span class="text-danger">*</span>
                    </label>
                    <div class="form-inline">
                        <div class="icheck-primary mr-2">
                            <input type="radio" id="active_yes" name="is_active" value="1" @if($user->is_active == 1) checked @endif />
                            <label for="active_yes">Yes</label>
                        </div>
                        <div class="icheck-primary mr-2">
                            <input type="radio" id="active_no" name="is_active" value="0" @if($user->is_active == 0) checked @endif/>
                            <label for="active_no">No</label>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="card-footer">
                <div class="col-md-6 px-0 d-flex justify-content-between">
                    <a href="{{ route('backend.users.index') }}" class="btn btn-flat btn-primary">
                        <i class="fas fa-chevron-left"></i>
                        <span>Back</span>
                    </a>
                    <button type="submit" class="btn btn-flat btn-success">Save</button>
                </div>
            </div>
        </form>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
    var maxField = 50; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div>'+
                        '<div class="mb-3 float-right remove_button">'+
                            '<a href="javascript:void(0);" class="" title="Remove Address">'+
                                '<button type="button" class="btn btn-danger">Remove Address</button>'+
                            '</a>'+
                        '</div>'+
                        '<div class="mt-5">'+
                            '<label for="address">User Detail Address<span class="text-danger">*</span></label>'+
                            '<input type="text" name="address[]" class="form-control @error("address") is-invalid @enderror" id="address" placeholder="Enter User Address" value="{{ old('address', '') }}"/>'+
                                '@error("address")'+
                                    '<span id="address-error" class="error invalid-feedback">'+
                                        '{{ $message }}'+
                                    '</span>'+
                                '@enderror'+
                                '<br>'+

                            '<input type="text" name="address_phone[]" class="form-control @error("address_phone") is-invalid @enderror" id="address_phone" placeholder="Enter User Address Phone" value="{{ old('address_phone', '') }}"/>'+
                                '@error("address_phone")'+
                                    '<span id="address_phone-error" class="error invalid-feedback">'+
                                        '{{ $message }}'+
                                    '</span>'+
                                '@enderror'+
                                '<br>'+

                            '<select name="type[]" id="type" class="form-control js-select-2 @error('type') is-invalid @enderror"  data-selected="{{ old('type', 0) }}">'+
                                '<option value="0">Select Address Type</option>'+
                                '<option value="Home">Home</option>'+
                                '<option value="Office">Office</option>'+
                                '<option value="Other">Other</option>'+
                            '</select>'+
                                '@error('type')'+
                                    '<span id="type-error" class="error invalid-feedback">'+
                                        '{{ $message }}'+
                                    '</span>'+
                                '@enderror'+
                                '<br>'+

                            '<input type="text" name="lat[]" class="form-control @error("lat") is-invalid @enderror" id="lat" placeholder="Enter User Address Lat" value="{{ old('lat', '') }}"/>'+
                                '@error("lat")'+
                                    '<span id="lat-error" class="error invalid-feedback">'+
                                        '{{ $message }}'+
                                    '</span>'+
                                '@enderror'+
                                '<br>'+

                            '<input type="text" name="lng[]" class="form-control @error('lng') is-invalid @enderror" id="lng" placeholder="Enter User Address Lng" value="{{ old('lng', '') }}"/>'+
                                '@error('lng')'+
                                    '<span id="lng-error" class="error invalid-feedback">'+
                                        '{{ $message }}'+
                                    '</span>'+
                                '@enderror'+
                                '<br>'+

                            

                            '<input type="text" name="loc_name[]" class="form-control @error('loc_name') is-invalid @enderror" id="loc_name" placeholder="Enter User Address Location Name" value="{{ old('loc_name', '') }}"/>'+
                                '@error('loc_name')'+
                                    '<span id="loc_name-error" class="error invalid-feedback">'+
                                        '{{ $message }}'+
                                    '</span>'
                                '@enderror'
                                '<br>'+

                            

                        '</div>'+
                    '</div>';

                    //<a href="javascript:void(0);" class="remove_button"><img src="remove-icon.png"/></a></div>
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

</script>
@endsection
