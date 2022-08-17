<?php

return [
    /** backend/auth/login.blade.php */
    'login_box_message' => 'Sign in to start your session',
    'email' => 'E-Mail Address',
    'password' => 'Password',
    'login' => 'Login',
    /** backend/partials/commons/_navbar.blade.php */
    'welcome' => 'Welcome',
    'logout' => 'Logout',
    /** backend/partials/commons/_sidbar.blade.php */
    'dashboard' => 'Dashboard',
    /** backend/partials/commons/_bottom.blade.php */
    /** backend/partials/commons/_content_header.blade.php */
    'waybill_range_error' => 'You can track only 10 waybill numbers per time.',
    'waybill.required' => 'Waybill cannot be blank.',

    // Rate Form
    'locFrom.required' => 'Please select location.',
    'locTo.required' => 'Please select location.',
    'grossweight.required' => 'The gross weight cannot be blank.',
    'grossweight.numeric' => 'The gross weight must be number.',
    'grossweight.gt' => 'The gross weight must be greater than :gt.',
    'width.required' => 'The width cannot be blank.',
    'width.numeric' => 'The width must be number.',
    'width.gt' => 'The width must be greater than :gt.',
    'height.required' => 'The height cannot be blank.',
    'height.numeric' => 'The height must be number.',
    'height.gt' => 'The height must be greater than :gt.',
    'length.required' => 'The length cannot be blank.',
    'length.numeric' => 'The length must be number.',
    'length.gt' => 'The length must be greater than :gt.',
    'currency.required' => 'The currency cannot be blank.',
    'pieces.required' => 'The quantity cannot be blank.',
    'pieces.numeric' => 'The quantity must be number.',
    'pieces.gt' => 'The quantity must be greater than :gt',

    // Branch
    'branch_name' => 'Branch Name',
    'state_or_division' => 'State or Region',
    'township' => 'Township',
    'search' => 'Search',
    'name' => 'Name',
    'branch_code' => 'Branch Code',
    'address' => 'Address',
    'phone_no' => 'Phone Number',
    'no_branch' => 'There is no branch to display.',
    'search...' => 'search...',
    'select_state_or_division' => 'Select State/Region',
    'select_township' => 'Select Township',

    // Rate
    'calculate_rate' => 'Calculate Rate',
    'location_from' => 'Location From',
    'location_to' => 'Location To',
    'gross_weight' => 'Gross Weight',
    'actual_weight' => 'Actual Weight',
    'currency' => 'Currency',
    'calculate_rate_btn' => 'Calculate Rate',
    'width' => 'Width',
    'length' => 'Length',
    'height' => 'Height',
    'calculate_rate_error' => 'Cannot calculate rate',
    'remote_areas' => 'Remote Areas',
    'pieces' => 'Quantity',

    // Tracking
    'waybill_tracking' => 'Waybill Tracking',
    'enter_waybill_number' => 'Enter Waybill Number',
    'separated_by_comma' => 'Search multiple waybills, separated by ",".eg.,TRACK12345,TRACK67890',
    'separated_by_dash' => 'Search range waybills, spreated by "-". eg.,TRACK12345-TRACK12349',

    'read_more' => 'Read more',
    'back_btn' => 'Back',

   // OMS
    'oms' => [
        // Login
        'login' => 'Login',
        'phone_number' => 'Phone Number',
        'password' => 'Password',
        'forgot_password' => 'Forgot your password?',
        'register_here' => 'Register Here..',
        'cannot_connect_to_oms' => 'Cannot connect to OMS.',
        // Register
        'register' => 'Register',
        'name' => 'Name',
        'address' => 'Address',
        'confirm_password' => 'Confirm Password',
        'login_here' => 'Login Here..',
        // Logout
        'logout' => 'Logout',
    ],

    // OMS Login Request 
    'phone_number.required' => 'The phone number cannot be blank.',
    'phone_number.numeric' => 'The phone number must be number.',
    'password.required' => 'The password cannot be blank.',
    'password.min' => 'The password must be minimum :min characters.',

    // OMS Register Request
    'name.required' => 'The name cannot be blank.',
    'name.max' => 'The name must be maximum 255 characters.',
    'address.required' => 'The address cannot be blank.',
    'password.confirmed' => 'The password does not match.',

    // OMS OTP
    'otp.required' => 'The otp cannot be blank.',
    'otp.numeric' => 'The otp must be number.',

    // Pickup Form
    'pickup_list' => 'Pickup List',
    'online_pickup_form' => 'Online Pickup Form',
    'create_pickup' => 'Create Pickup',
    'source' => 'Source',
    'destination' => 'Destination',
    'not_required_in_international' => 'Not required in International',
    'select_one' => 'Select One',
    'remote_source' => 'Remote Source',
    'remote_destination' => 'Remote Destination',
    'shipping_info' => 'Shipping Info',
    'domestic_or_international' => 'Domestic/International',
    'comapny_name' => 'Company Name',
    'shipper' => 'Shipper',
    'contact_name' => 'Contact Name',
    'phone' => 'Phone',
    'document_type' => 'Document Type',
    'document' => 'Document',
    'parcel' => 'Parcel',
    'pick_ready_time' => 'Pick Ready Time',
    'pick_ready_date' => 'Pick Ready Date',
    'remark' => 'Remark',
    'save' => 'Save',

    // Pickup Create Request
    'source.required' => 'Please select the source.',
    'source.gt' => 'Please select the source.',
    'domesticOrInternational.required' => 'Please select domestic or international.',
    'domesticOrInternational.gt' => 'Please select domestic or international.',
    'shipper.required' => 'The shipper cannot be blank.',
    'shipper.max' => 'The shipper must be maximum 255 characters.',
    'type.required' => 'Please select one type.',
    'pickTime.required' => 'The pickup ready time cannot be blank.',
    'pickDate.required' => 'The pickup ready date cannot be blank.',

    // Pickup Success Message
    'pickup_create_success' => 'Your pick up is created!',
    'your_pickup_code' => 'Your pick up code',

    // Pickup Error Message
    'cannot_get_pickup_list' => 'Cannot get pickup list.',
    'cannot_create_pickup' => 'Cannot create pickup.',

    // Pickup List
    'total' => 'Total',
    'no' => 'No',
    'code' => 'Code',
    'from' => 'From',
    'to' => 'To',
    'status' => 'Status',
    'created_at' => 'Created At',

    // Complain Form
    'complain' => [
        'complain_form' => 'Complain Form',
        'name' => 'Enter Your Name',
        'email' => 'Enter Your Email',
        'message' => 'Enter Your Message',
        'send' => 'Send'
    ],

    // Complain Form Request
    'email.required' => 'The email cannot be blank.',
    'email.email' => 'The email format is invalid.',
    'email.max' => 'The email must be 255 characters.',
    'message.required' => 'The message cannot be blank.',

     // Complain Form Success 
    'complain_form_sent' => 'Your compalin form has been sent.',

    'there_is_no_post_to_display' => 'There is no post to display.'
];
