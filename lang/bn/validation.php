<?php

declare(strict_types=1);

return [
    'accepted'             => ':Attribute গ্রহণ করা আবশ্যক।',
    'accepted_if'          => ':Attribute অবশ্যই গ্রহণ করতে হবে যখন :other সমান :value হয়।',
    'active_url'           => 'এই :attribute একটি বৈধ URL নয়।',
    'after'                => ':Date অবশ্যই :attribute এর পরের একটি তারিখ হতে হবে।',
    'after_or_equal'       => ':Attribute টি অবশ্যই :date এর সাথে মিল অথবা এর পরের একটি তারিখ হতে হবে।',
    'alpha'                => ':Attribute শুধুমাত্র অক্ষর থাকতে পারে।',
    'alpha_dash'           => ':Attribute শুধুমাত্র অক্ষর, সংখ্যা, এবং ড্যাশ থাকতে পারে।',
    'alpha_num'            => ':Attribute শুধুমাত্র বর্ণ ও সংখ্যা থাকতে পারে।',
    'array'                => ':Attribute একটি অ্যারে হতে হবে।',
    'ascii'                => ':Attribute টিতে শুধুমাত্র একক-বাইট বর্ণসংখ্যার অক্ষর এবং প্রতীক থাকতে হবে।',
    'before'               => ':Date অবশ্যই :attribute এর আগের একটি তারিখ হতে হবে।',
    'before_or_equal'      => ':Attribute টি অবশ্যই :date এর সাথে মিল অথবা এর আগের একটি তারিখ হতে হবে।',
    'between'              => [
        'array'   => ':Min এবং :max আইটেম :attribute মধ্যে হতে হবে।',
        'file'    => ':Min এবং :max কিলোবাইট :attribute মধ্যে হতে হবে।',
        'numeric' => ':Min এবং :max :attribute মধ্যে হতে হবে।',
        'string'  => ':Min এবং :max অক্ষর :attribute মধ্যে হতে হবে।',
    ],
    'boolean'              => ':Attribute স্থানে  সত্য বা মিথ্যা হতে হবে।',
    'can'                  => ':Attribute ক্ষেত্রটিতে একটি অননুমোদিত মান রয়েছে।',
    'confirmed'            => ':Attribute ক্ষেত্রটি নিশ্চিতকরণ এর সাথে মিলছে না।',
    'current_password'     => 'বর্তমান পাসওয়ার্ড।',
    'date'                 => ':Attribute একটি বৈধ তারিখ নয়।',
    'date_equals'          => 'এই :attribute সমান তারিখ হতে হবে :date।',
    'date_format'          => ':Attribute, :format এর সাথে বিন্যাস মিলছে না।',
    'decimal'              => ':Attribute-এর অবশ্যই :decimal দশমিক স্থান থাকতে হবে।',
    'declined'             => ':Attribute অবশ্যই প্রত্যাখ্যান করতে হবে।',
    'declined_if'          => ':Attribute অবশ্যই প্রত্যাখ্যান করতে হবে যখন :value হবে :other।',
    'different'            => ':Attribute এবং :other আলাদা হতে হবে।',
    'digits'               => ':Attribute :digits অবশ্যই একটি সংখ্যার ডিজিট হতে হবে।',
    'digits_between'       => ':Attribute অবশ্যই :min এবং :max ডিজিট এর মধ্যে হতে হবে।',
    'dimensions'           => ':Attribute অবৈধ ইমেজ মাত্রা রয়েছে।',
    'distinct'             => ':Attribute এর স্থানে একটি নকল মান আছে।',
    'doesnt_end_with'      => ':Attribute নিম্নলিখিত: :values এর একটি দিয়ে শেষ নাও হতে পারে।',
    'doesnt_start_with'    => ':Attribute :values এর একটি দিয়ে শুরু হতে পারে না।',
    'email'                => ':Attribute একটি বৈধ ইমেইল ঠিকানা হতে হবে।',
    'ends_with'            => ':Attribute নিম্নলিখিত এক সঙ্গে শেষ করতে হবে: :values।',
    'enum'                 => 'নির্বাচিত :attribute অবৈধ।',
    'exists'               => 'নির্বাচিত :attribute টি অবৈধ।',
    'extensions'           => ':attribute ক্ষেত্রে নিম্নলিখিত এক্সটেনশনগুলির মধ্যে একটি থাকতে হবে: :values.',
    'file'                 => ':Attribute একটি ফাইল হতে হবে।',
    'filled'               => ':Attribute স্থানটি পূরণ করতে হবে।',
    'gt'                   => [
        'array'   => ':Attribute এ অবশ্যই :value আইটেমের থেকে বেশি থাকতে হবে।',
        'file'    => ':Attribute অবশ্যই :value কিলোবাইটের চেয়ে বেশি হতে হবে।',
        'numeric' => ':Attribute অবশ্যই :value-এর থেকে বড় হতে হবে৷',
        'string'  => ':Attribute অবশ্যই :value অক্ষরের চেয়ে বড় হতে হবে।',
    ],
    'gte'                  => [
        'array'   => ':Attribute-এর অবশ্যই :value আইটেম বা তার বেশি থাকতে হবে।',
        'file'    => ':Attribute অবশ্যই :value কিলোবাইটের থেকে বড় বা সমান হতে হবে।',
        'numeric' => ':Attribute অবশ্যই :value এর চেয়ে বড় বা সমান হতে হবে।',
        'string'  => ':Attribute অবশ্যই :value অক্ষরের চেয়ে বড় বা সমান হতে হবে।',
    ],
    'hex_color'            => ':attribute ক্ষেত্রটি অবশ্যই একটি বৈধ হেক্সাডেসিমেল রঙ হতে হবে৷',
    'image'                => ':Attribute একটি ইমেজ হতে হবে।',
    'in'                   => 'নির্বাচিত :attribute টি অবৈধ।',
    'in_array'             => ':Attribute উপাদানটি :other এ খুঁজে পাওয়া যায়নি।',
    'integer'              => ':Attribute একটি পূর্ণসংখ্যা হতে হবে।',
    'ip'                   => ':Attribute একটি বৈধ  IP address হতে হবে।',
    'ipv4'                 => ':Attribute টি একটি বৈধ IPv4 address হতে হবে।',
    'ipv6'                 => ':Attribute টি একটি বৈধ IPv6 address হতে হবে।',
    'json'                 => ':Attribute একটি বৈধ JSON স্ট্রিং হতে হবে।',
    'lowercase'            => ':Attribute অবশ্যই ছোট হাতের হতে হবে।',
    'lt'                   => [
        'array'   => ':Attribute এর থেকে কম :value আইটেম থাকতে হবে।',
        'file'    => ':Attribute অবশ্যই :value কিলোবাইটের চেয়ে কম হতে হবে।',
        'numeric' => ':Attribute অবশ্যই :value এর চেয়ে কম হতে হবে।',
        'string'  => ':Attribute অবশ্যই :value অক্ষরের চেয়ে কম হতে হবে।',
    ],
    'lte'                  => [
        'array'   => ':Attribute এ অবশ্যই :value আইটেমের বেশি থাকা উচিত নয়৷',
        'file'    => ':Attribute অবশ্যই :value কিলোবাইটের থেকে কম বা সমান হতে হবে।',
        'numeric' => ':Attribute অবশ্যই :value এর থেকে কম বা সমান হতে হবে।',
        'string'  => ':Attribute অবশ্যই :value অক্ষরের চেয়ে কম বা সমান হতে হবে।',
    ],
    'mac_address'          => ':Attribute একটি বৈধ MAC ঠিকানা হতে হবে।',
    'max'                  => [
        'array'   => ':Attribute এর মান :max টি উপাদানের চেয়ে বড় হতে পারেনা।',
        'file'    => ':Attribute এর মান :max কিলোবাইট এর চেয়ে বড় হতে পারেনা।',
        'numeric' => ':Attribute এর মান :max এর চেয়ে বড় হতে পারেনা।',
        'string'  => ':Attribute এর মান :max অক্ষর এর চেয়ে বড় হতে পারেনা।',
    ],
    'max_digits'           => 'এই :attribute এ :max ডিজিট এর বেশি হতে পারবে না।',
    'mimes'                => ':Attribute এর একটি ফাইল হতে হবে: :values।',
    'mimetypes'            => ':Attribute এর একটি ফাইল হতে হবে: :values।',
    'min'                  => [
        'array'   => ':Attribute অবশ্যই :min উপাদানের চেয়ে ছোট হতে হবে।',
        'file'    => ':Attribute অবশ্যই :min কিলোবাইট এর চেয়ে ছোট হতে হবে।',
        'numeric' => ':Attribute অবশ্যই :min এর চেয়ে ছোট হতে হবে।',
        'string'  => ':Attribute অবশ্যই :min অক্ষর এর চেয়ে ছোট হতে হবে।',
    ],
    'min_digits'           => 'এই :attribute এ সর্বোনিম্ন :min ডিজিট হতে হবে।',
    'missing'              => ':Attributeটি ক্ষেত্র অবশ্যই অনুপস্থিত।',
    'missing_if'           => ':Other :value হলে :attribute ফিল্ডটি অবশ্যই অনুপস্থিত থাকবে।',
    'missing_unless'       => ':Other :value না হলে :attribute ফিল্ডটি অবশ্যই অনুপস্থিত থাকবে।',
    'missing_with'         => ':Values উপস্থিত থাকলে :attribute ক্ষেত্রটি অবশ্যই অনুপস্থিত থাকবে৷',
    'missing_with_all'     => ':Valuesটি উপস্থিত থাকলে :attribute ক্ষেত্রটি অবশ্যই অনুপস্থিত থাকবে৷',
    'multiple_of'          => 'এই :attribute একটি একাধিক :value হতে হবে।',
    'not_in'               => 'নির্বাচিত :attribute অবৈধ।',
    'not_regex'            => ':Attribute বিন্যাস অবৈধ।',
    'numeric'              => ':Attribute একটি সংখ্যা হতে হবে।',
    'password'             => [
        'letters'       => ':Attribute -এ অন্তত একটি অক্ষর থাকতে হবে।',
        'mixed'         => ':Attribute -এ অন্তত একটি বড় হাতের এবং একটি ছোট হাতের অক্ষর থাকতে হবে।',
        'numbers'       => ':Attribute -এ অন্তত একটি নম্বর থাকতে হবে।',
        'symbols'       => ':Attribute -এ অন্তত একটি প্রতীক থাকতে হবে।',
        'uncompromised' => 'প্রদত্ত :attribute একটি ডেটা ফাঁসের মধ্যে পাওয়া গেছে। অনুগ্রহ করে একটি ভিন্ন :attribute চয়ন করুন।',
    ],
    'present'              => ':Attribute ক্ষেত্র উপস্থিত থাকা আবশ্যক।',
    'present_if'           => ':attribute অবশ্যই উপস্থিত থাকতে হবে যখন :other :value হয়।',
    'present_unless'       => ':attribute অবশ্যই উপস্থিত থাকতে হবে যদি না :other :value হয়।',
    'present_with'         => ':attribute অবশ্যই উপস্থিত থাকতে হবে যদি :values থাকে।',
    'present_with_all'     => ':attribute অবশ্যই উপস্থিত থাকতে হবে যদি :values গুলো থাকে।',
    'prohibited'           => 'এই :attribute ক্ষেত্রের নিষিদ্ধ।',
    'prohibited_if'        => 'এই :attribute ক্ষেত্র নিষিদ্ধ করা হয়, যখন :other হয় :value।',
    'prohibited_unless'    => 'এই :attribute ক্ষেত্র নিষিদ্ধ করা হয়, যদি না, :other হয় :values।',
    'prohibits'            => ':Attribute ক্ষেত্রটি :other উপস্থিত হতে নিষেধ করে৷',
    'regex'                => ':Attribute বিন্যাস অবৈধ।',
    'required'             => ':Attribute স্থানটি পূরণ করা বাধ্যতামূলক।',
    'required_array_keys'  => ':Attribute ফিল্ডে অবশ্যই :values এর জন্য এন্ট্রি থাকতে হবে।',
    'required_if'          => ':Attribute স্থানটি পূরণ করা বাধ্যতামূলক যেখানে :other হল :value।',
    'required_if_accepted' => ':Attribute ক্ষেত্রটি প্রয়োজন হয় যখন :other গৃহীত হয়।',
    'required_unless'      => ':Attribute স্থানটি পূরণ করা বাধ্যতামূলক যদি না :other, :values তে উপস্থিত থাকে।',
    'required_with'        => ':Attribute স্থানটি পূরণ করা বাধ্যতামূলক যখন  :values উপস্থিত।',
    'required_with_all'    => ':Attribute স্থানটি পূরণ করা বাধ্যতামূলক যখন :values উপস্থিত।',
    'required_without'     => ':Attribute স্থানটি পূরণ করা বাধ্যতামূলক যখন :values অনুপস্থিত।',
    'required_without_all' => ':Attribute স্থানটি পূরণ করা বাধ্যতামূলক যখন সকল :values অনুপস্থিত।',
    'same'                 => ':Attribute এবং :other অবশ্যই মিলতে হবে।',
    'size'                 => [
        'array'   => ':Attribute অবশ্যই :size আইটেম হতে হবে।',
        'file'    => ':Attribute অবশ্যই :size কিলোবাইট হতে হবে।',
        'numeric' => ':Attribute অবশ্যই :size হতে হবে।',
        'string'  => ':Attribute অবশ্যই :size অক্ষর হতে হবে।',
    ],
    'starts_with'          => 'এই :attribute নিম্নলিখিত এক সঙ্গে শুরু হবে: :values।',
    'string'               => ':Attribute একটি স্ট্রিং হতে হবে।',
    'timezone'             => ':Attribute একটি বৈধ সময় অঞ্চল হতে হবে।',
    'ulid'                 => 'এই :attribute অবশ্যই একটি বৈধ ULID হতে হবে৷',
    'unique'               => ':Attribute ইতিমধ্যেই নেওয়া হয়েছে।',
    'uploaded'             => ':Attribute আপলোড করতে ব্যর্থ হয়েছে।',
    'uppercase'            => 'এই :attribute অবশ্যই বড় হাতের হতে হবে।',
    'url'                  => 'এই :attribute একটি বৈধ URL হতে হবে।',
    'uuid'                 => 'এই :attribute একটি বৈধ UUID হতে হবে।',
    'attributes'           => [
        'address'                  => 'ঠিকানা',
        'affiliate_url'            => 'অধিভুক্ত URL',
        'age'                      => 'বয়স',
        'amount'                   => 'পরিমাণ',
        'area'                     => 'এলাকা',
        'available'                => 'উপলব্ধ',
        'birthday'                 => 'জন্মদিন',
        'body'                     => 'বডি',
        'city'                     => 'জেলা',
        'content'                  => 'কনটেন্ট',
        'country'                  => 'দেশ',
        'created_at'               => 'এ নির্মিত',
        'creator'                  => 'সৃষ্টিকর্তা',
        'currency'                 => 'মুদ্রা',
        'current_password'         => 'বর্তমান পাসওয়ার্ড',
        'customer'                 => 'ক্রেতা',
        'date'                     => 'তারিখ',
        'date_of_birth'            => 'জন্ম তারিখ',
        'day'                      => 'দিন',
        'deleted_at'               => 'এ মুছে ফেলা হয়েছে',
        'description'              => 'বর্ণনা',
        'district'                 => 'জেলা',
        'duration'                 => 'সময়কাল',
        'email'                    => 'ই-মেইল',
        'excerpt'                  => 'উদ্ধৃতি',
        'filter'                   => 'ছাঁকনি',
        'first_name'               => 'নাম (প্রথম অংশ)',
        'gender'                   => 'লিঙ্গ',
        'group'                    => 'দল',
        'hour'                     => 'ঘন্টা',
        'image'                    => 'ইমেজ',
        'is_subscribed'            => 'সাবস্ক্রাইব করা হয়',
        'items'                    => 'আইটেম',
        'last_name'                => 'নাম (শেষ অংশ)',
        'lesson'                   => 'পাঠ',
        'line_address_1'           => 'লাইন ঠিকানা 1',
        'line_address_2'           => 'লাইন ঠিকানা 2',
        'message'                  => 'বার্তা',
        'middle_name'              => 'মধ্য নাম',
        'minute'                   => 'মিনিট',
        'mobile'                   => 'মোবাইল',
        'month'                    => 'মাস',
        'name'                     => 'নাম',
        'national_code'            => 'জাতীয় কোড',
        'number'                   => 'সংখ্যা',
        'password'                 => 'পাসওয়ার্ড',
        'password_confirmation'    => 'পাসওয়ার্ড যাচাইকরণ',
        'phone'                    => 'ফোন',
        'photo'                    => 'ছবি',
        'postal_code'              => 'পোস্ট অফিসের নাম্বার',
        'preview'                  => 'পূর্বরূপ',
        'price'                    => 'মূল্য',
        'product_id'               => 'পণ্য আইডি',
        'product_uid'              => 'পণ্য UID',
        'product_uuid'             => 'পণ্য UUID',
        'promo_code'               => 'প্রচার কোড',
        'province'                 => 'প্রদেশ',
        'quantity'                 => 'পরিমাণ',
        'recaptcha_response_field' => 'recaptcha প্রতিক্রিয়া ক্ষেত্র',
        'remember'                 => 'মনে রাখবেন',
        'restored_at'              => 'এ পুনরুদ্ধার করা হয়েছে',
        'result_text_under_image'  => 'ছবির নিচে ফলাফল পাঠ্য',
        'role'                     => 'ভূমিকা',
        'second'                   => 'দ্বিতীয়',
        'sex'                      => 'লিঙ্গ',
        'shipment'                 => 'জাহাজে প্রেরিত কাজ',
        'short_text'               => 'সংক্ষিপ্ত লেখা',
        'size'                     => 'আকার',
        'state'                    => 'অবস্থা',
        'street'                   => 'রাস্তা',
        'student'                  => 'ছাত্র',
        'subject'                  => 'বিষয়',
        'teacher'                  => 'শিক্ষক',
        'terms'                    => 'শর্তসমূহ',
        'test_description'         => 'পরীক্ষার বিবরণী',
        'test_locale'              => 'পরীক্ষা লোকেল',
        'test_name'                => 'পরীক্ষার নাম',
        'text'                     => 'পাঠ্য',
        'time'                     => 'সময়',
        'title'                    => 'টাইটেল',
        'updated_at'               => 'এ আপডেট',
        'user'                     => 'ব্যবহারকারী',
        'username'                 => 'ইউজারনেম',
        'year'                     => 'বছর',
    ],
];
