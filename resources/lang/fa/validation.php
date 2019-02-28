<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ' must be accepted.',
    'active_url'           => ' is not a valid URL.',
    'after'                => ' must be a date after :date.',
    'after_or_equal'       => ' must be a date after or equal to :date.',
    'alpha'                => ' may only contain letters.',
    'alpha_dash'           => ' may only contain letters, numbers, dashes and underscores.',
    'alpha_num'            => ' may only contain letters and numbers.',
    'array'                => ' must be an array.',
    'before'               => ' must be a date before :date.',
    'before_or_equal'      => ' must be a date before or equal to :date.',
    'between'              => [
        'numeric' => '   بین :min و :max.',
        'file'    => '  بین :min و :max کیلوبایت.',
        'string'  => '  بین :min و :max کاراکتر.',
        'array'   => '  بین :min و :max آیتم.',
    ],
    'boolean'              => '  باید صحیح یا غلط باشد',
    'confirmed'            => '  عدم مطابقت در رمزهای عبور',
    'date'                 => '  تاریخ معتبر نمیباشد',
    'date_format'          => ' does not match the format :format.',
    'different'            => ' and :other must be different.',
    'digits'               => ' must be :digits digits.',
    'digits_between'       => ' must be between :min and :max digits.',
    'dimensions'           => ' has invalid image dimensions.',
    'distinct'             => ' field has a duplicate value.',
    'email'                => '  باید یک آدرس ایمیل معتبر باشد',
    'exists'               => 'The selected :attribute is invalid.',
    'file'                 => ' باید یک فایل باشد',
    'filled'               => ' field must have a value.',
    'gt'                   => [
        'numeric' => '  باید بزگتر از :value باشد.',
        'file'    => ' must be greater than :value kilobytes.',
        'string'  => '  باید بزگتر از :value کاراکتر باشد.',
        'array'   => ' must have more than :value items.',
    ],
    'gte'                  => [
        'numeric' => '  باید بزرگتر یا مساوی :value باشد.',
        'file'    => ' must be greater than or equal :value kilobytes.',
        'string'  => '  باید بزگتر یا مساوی :value کاراکتر باشد.',
        'array'   => ' must have :value items or more.',
    ],
    'image'                => ' باید یک تصویر باشد',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => ' field does not exist in :other.',
    'integer'              => ' must be an integer.',
    'ip'                   => ' must be a valid IP address.',
    'ipv4'                 => ' must be a valid IPv4 address.',
    'ipv6'                 => ' must be a valid IPv6 address.',
    'json'                 => ' must be a valid JSON string.',
    'lt'                   => [
        'numeric' => '  باید کوچکتر از :value باشد.',
        'file'    => ' must be less than :value kilobytes.',
        'string'  => '  باید کوچکتر از :value کاراکتر باشد.',
        'array'   => ' must have less than :value items.',
    ],
    'lte'                  => [
        'numeric' => '  باید کوچکتر یا مساوی :value باشد.',
        'file'    => ' must be less than or equal :value kilobytes.',
        'string'  => '  باید کوچکتر یا مساوی :value کاراگتر باشد.',
        'array'   => ' must not have more than :value items.',
    ],
    'max'                  => [
        'numeric' => '  نمیتواند بزرگتر از :max  باشد.',
        'file'    => 'may not be greater than :max kilobytes.',
        'string'  => ' : باید کوچکتر از :max کاراکتر باشد.',
        'array'   => ' may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'mimetypes'            => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => '  باید حداقل :min باشد.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => '  باید حداقل :min کاراکتر باشد.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'not_regex'            => 'The :attribute format is invalid.',
    'numeric'              => '  باید یک عدد باشد',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => '  باید وارد شود',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => '  باید یک متن باشد.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => '  قبلا استفاده شده است',
    'uploaded'             => '  خطا در آپلود',
    'url'                  => '  فرمت اشتباه میباشد',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
