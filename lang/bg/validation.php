<?php

declare(strict_types=1);

return [
    'accepted' => 'Трябва да приемете :attribute.',
    'accepted_if' => 'Полето :attribute трябва да е прието, когато :other е :value.',
    'active_url' => 'Полето :attribute не е валиден URL адрес.',
    'after' => 'Полето :attribute трябва да бъде дата след :date.',
    'after_or_equal' => 'Полето :attribute трябва да бъде дата след или равна на :date.',
    'alpha' => 'Полето :attribute трябва да съдържа само букви.',
    'alpha_dash' => 'Полето :attribute трябва да съдържа само букви, цифри, долна черта и тире.',
    'alpha_num' => 'Полето :attribute трябва да съдържа само букви и цифри.',
    'array' => 'Полето :attribute трябва да бъде масив.',
    'ascii' => ':Attribute-те трябва да съдържат само еднобайтови буквено-цифрови знаци и символи.',
    'before' => 'Полето :attribute трябва да бъде дата преди :date.',
    'before_or_equal' => 'Полето :attribute трябва да бъде дата преди или равна на :date.',
    'between' => [
        'array' => 'Полето :attribute трябва да има между :min - :max елемента.',
        'file' => 'Полето :attribute трябва да бъде между :min и :max килобайта.',
        'numeric' => 'Полето :attribute трябва да бъде между :min и :max.',
        'string' => 'Полето :attribute трябва да бъде между :min и :max знака.',
    ],
    'boolean' => 'Полето :attribute трябва да съдържа Да или Не',
    'can' => 'Полето :attribute съдържа неразрешена стойност.',
    'confirmed' => 'Полето :attribute не е потвърдено.',
    'current_password' => 'Паролата е неправилна.',
    'date' => 'Полето :attribute не е валидна дата.',
    'date_equals' => ':Attribute трябва да бъде дата, еднаква с :date.',
    'date_format' => 'Полето :attribute не е във формат :format.',
    'decimal' => ':Attribute-те трябва да имат :decimal знака след десетичната запетая.',
    'declined' => ':Attribute-те трябва да бъдат отхвърлени.',
    'declined_if' => ':Attribute трябва да се отклони, когато :other е :value.',
    'different' => 'Полетата :attribute и :other трябва да са различни.',
    'digits' => 'Полето :attribute трябва да има :digits цифри.',
    'digits_between' => 'Полето :attribute трябва да има между :min и :max цифри.',
    'dimensions' => 'Невалидни размери за снимка :attribute.',
    'distinct' => 'Данните в полето :attribute се дублират.',
    'doesnt_end_with' => ':Attribute-те може да не завършват с едно от следните: :values.',
    'doesnt_start_with' => ':Attribute-те може да не започват с едно от следните: :values.',
    'email' => 'Полето :attribute е в невалиден формат.',
    'ends_with' => ':Attribute трябва да завършва с една от следните стойности: :values.',
    'enum' => 'Избраните :attribute са невалидни.',
    'exists' => 'Избранато поле :attribute вече съществува.',
    'extensions' => 'Полето :attribute трябва да има едно от следните разширения: :values.',
    'file' => 'Полето :attribute трябва да бъде файл.',
    'filled' => 'Полето :attribute е задължително.',
    'gt' => [
        'array' => ':Attribute трябва да разполага с повече от :value елемента.',
        'file' => ':Attribute трябва да бъде по-голяма от :value килобайта.',
        'numeric' => ':Attribute трябва да бъде по-голяма от :value.',
        'string' => ':Attribute трябва да бъде по-голяма от :value знака.',
    ],
    'gte' => [
        'array' => ':Attribute трябва да разполага с :value елемента или повече.',
        'file' => ':Attribute трябва да бъде по-голяма от или равна на :value килобайта.',
        'numeric' => ':Attribute трябва да бъде по-голяма от или равна на :value.',
        'string' => ':Attribute трябва да бъде по-голяма от или равна на :value знака.',
    ],
    'hex_color' => 'Полето :attribute трябва да е с валиден шестнадесетичен цвят.',
    'image' => 'Полето :attribute трябва да бъде изображение.',
    'in' => 'Избраното поле :attribute е невалидно.',
    'in_array' => 'Полето :attribute не съществува в :other.',
    'integer' => 'Полето :attribute трябва да бъде цяло число.',
    'ip' => 'Полето :attribute трябва да бъде IP адрес.',
    'ipv4' => 'Полето :attribute трябва да бъде IPv4 адрес.',
    'ipv6' => 'Полето :attribute трябва да бъде IPv6 адрес.',
    'json' => 'Полето :attribute трябва да бъде JSON низ.',
    'lowercase' => ':Attribute трябва да са малки букви.',
    'lt' => [
        'array' => ':Attribute трябва да разполага с по-малко от :value елемента.',
        'file' => ':Attribute трябва да бъде по-малка от :value килобайта.',
        'numeric' => ':Attribute трябва да бъде по-малка от :value.',
        'string' => ':Attribute трябва да бъде по-малка от :value знака.',
    ],
    'lte' => [
        'array' => ':Attribute не трябва да разполага с повече от :value елемента.',
        'file' => ':Attribute трябва да бъде по-малка от или равна на :value килобайта.',
        'numeric' => ':Attribute трябва да бъде по-малка от или равна на :value.',
        'string' => ':Attribute трябва да бъде по-малка от или равна на :value знака.',
    ],
    'mac_address' => ':Attribute трябва да е валиден MAC адрес.',
    'max' => [
        'array' => 'Полето :attribute трябва да има по-малко от :max елемента.',
        'file' => 'Полето :attribute трябва да бъде по-малко от :max килобайта.',
        'numeric' => 'Полето :attribute трябва да бъде по-малко от :max.',
        'string' => 'Полето :attribute трябва да бъде по-малко от :max знака.',
    ],
    'max_digits' => ':Attribute-те не трябва да имат повече от :max цифри.',
    'mimes' => 'Полето :attribute трябва да бъде файл от тип: :values.',
    'mimetypes' => 'Полето :attribute трябва да бъде файл от тип: :values.',
    'min' => [
        'array' => 'Полето :attribute трябва има минимум :min елемента.',
        'file' => 'Полето :attribute трябва да бъде минимум :min килобайта.',
        'numeric' => 'Полето :attribute трябва да бъде минимум :min.',
        'string' => 'Полето :attribute трябва да бъде минимум :min знака.',
    ],
    'min_digits' => ':Attribute-те трябва да имат поне :min цифри.',
    'missing' => 'Полето :attribute трябва да липсва.',
    'missing_if' => 'Полето :attribute трябва да липсва, когато :other е :value.',
    'missing_unless' => 'Полето :attribute трябва да липсва, освен ако :other не е :value.',
    'missing_with' => 'Полето :attribute трябва да липсва, когато :values присъства.',
    'missing_with_all' => 'Полето :attribute трябва да липсва, когато има :values.',
    'multiple_of' => 'Числото :attribute трябва да бъде кратно на :value',
    'not_in' => 'Избраното поле :attribute е невалидно.',
    'not_regex' => 'Форматът на :attribute е невалиден.',
    'numeric' => 'Полето :attribute трябва да бъде число.',
    'password' => [
        'letters' => ':Attribute-те трябва да съдържат поне една буква.',
        'mixed' => ':Attribute-те трябва да съдържат поне една главна и една малка буква.',
        'numbers' => ':Attribute-те трябва да съдържат поне едно число.',
        'symbols' => ':Attribute-те трябва да съдържат поне един символ.',
        'uncompromised' => 'Дадените :attribute се появиха при изтичане на данни. Моля, изберете различни :attribute.',
    ],
    'present' => 'Полето :attribute трябва да съествува.',
    'present_if' => 'Полето :attribute трябва да присъства, когато :other е :value.',
    'present_unless' => 'Полето :attribute трябва да присъства, освен ако :other не е :value.',
    'present_with' => 'Полето :attribute трябва да присъства, когато присъства :values.',
    'present_with_all' => 'Полето :attribute трябва да присъства, когато има :values.',
    'prohibited' => 'Поле :attribute е забранено.',
    'prohibited_if' => 'Полето :attribute е забранено, когато :other е равно на :value.',
    'prohibited_unless' => 'Полето :attribute е забранено, освен ако :other не е в :values.',
    'prohibits' => 'Полето :attribute изключва наличието на :other.',
    'regex' => 'Полето :attribute е в невалиден формат.',
    'required' => 'Полето :attribute е задължително.',
    'required_array_keys' => 'Полето :attribute трябва да съдържа записи за: :values.',
    'required_if' => 'Полето :attribute се изисква, когато :other е :value.',
    'required_if_accepted' => 'Полето :attribute е задължително, когато се приема :other.',
    'required_unless' => 'Полето :attribute се изисква, освен ако :other не е в :values.',
    'required_with' => 'Полето :attribute се изисква, когато :values има стойност.',
    'required_with_all' => 'Полето :attribute е задължително, когато :values имат стойност.',
    'required_without' => 'Полето :attribute се изисква, когато :values няма стойност.',
    'required_without_all' => 'Полето :attribute се изисква, когато никое от полетата :values няма стойност.',
    'same' => 'Полетата :attribute и :other трябва да съвпадат.',
    'size' => [
        'array' => 'Полето :attribute трябва да има :size елемента.',
        'file' => 'Полето :attribute трябва да бъде :size килобайта.',
        'numeric' => 'Полето :attribute трябва да бъде :size.',
        'string' => 'Полето :attribute трябва да бъде :size знака.',
    ],
    'starts_with' => ':Attribute трябва да започва с едно от следните: :values.',
    'string' => 'Полето :attribute трябва да бъде знаков низ.',
    'timezone' => 'Полето :attribute трябва да съдържа валидна часова зона.',
    'ulid' => ':Attribute трябва да е валиден ULID.',
    'unique' => 'Полето :attribute вече съществува.',
    'uploaded' => 'Неуспешно качване на :attribute.',
    'uppercase' => ':Attribute трябва да са главни букви.',
    'url' => 'Полето :attribute е в невалиден формат.',
    'uuid' => ':Attribute трябва да бъде валиден UUID.',
    'attributes' => [
        'address' => 'адрес',
        'affiliate_url' => 'URL адрес на партньор',
        'age' => 'възраст',
        'amount' => 'количество',
        'area' => '■ площ',
        'available' => 'достъпен',
        'birthday' => 'рожден ден',
        'body' => 'тяло',
        'city' => 'град',
        'content' => 'съдържание',
        'country' => 'държава',
        'created_at' => 'създаден в',
        'creator' => 'създател',
        'currency' => 'валута',
        'current_password' => 'Настояща парола',
        'customer' => 'клиент',
        'date' => 'дата',
        'date_of_birth' => 'дата на раждане',
        'day' => 'ден',
        'deleted_at' => 'изтрит на',
        'description' => 'описание',
        'district' => 'окръг',
        'duration' => 'продължителност',
        'email' => 'e-mail',
        'excerpt' => 'откъс',
        'filter' => 'филтър',
        'first_name' => 'име',
        'gender' => 'пол',
        'group' => 'група',
        'hour' => 'час',
        'image' => 'образ',
        'is_subscribed' => 'е абониран',
        'items' => 'елементи',
        'last_name' => 'фамилия',
        'lesson' => 'урок',
        'line_address_1' => 'адрес на линия 1',
        'line_address_2' => 'адрес на линия 2',
        'message' => 'съобщение',
        'middle_name' => 'презиме',
        'minute' => 'минута',
        'mobile' => 'gsm',
        'month' => 'месец',
        'name' => 'име',
        'national_code' => 'национален код',
        'number' => 'номер',
        'password' => 'парола',
        'password_confirmation' => 'Потвърждение на парола',
        'phone' => 'телефон',
        'photo' => 'снимка',
        'postal_code' => 'пощенски код',
        'preview' => 'предварителен преглед',
        'price' => 'цена',
        'product_id' => 'идентификация на продукта',
        'product_uid' => 'UID на продукта',
        'product_uuid' => 'UUID на продукта',
        'promo_code' => 'промо код',
        'province' => 'провинция',
        'quantity' => 'количество',
        'recaptcha_response_field' => 'рекапча',
        'remember' => 'помня',
        'restored_at' => 'възстановен при',
        'result_text_under_image' => 'текст на резултата под изображението',
        'role' => 'роля',
        'second' => 'секунда',
        'sex' => 'пол',
        'shipment' => 'пратка',
        'short_text' => 'кратък текст',
        'size' => 'размер',
        'state' => 'състояние',
        'street' => 'улица',
        'student' => 'студент',
        'subject' => 'заглавие',
        'teacher' => 'учител',
        'terms' => 'условия',
        'test_description' => 'описание на теста',
        'test_locale' => 'тест локал',
        'test_name' => 'име на теста',
        'text' => 'текст',
        'time' => 'време',
        'title' => 'заглавие',
        'updated_at' => 'актуализиран на',
        'user' => 'потребител',
        'username' => 'потребител',
        'year' => 'година',
    ],
];
