<?php

declare(strict_types=1);

return [
    'accepted'             => ':Attribute musí být přijat.',
    'accepted_if'          => ':Attribute musí být přijato, když :other je :value.',
    'active_url'           => ':Attribute není platnou URL adresou.',
    'after'                => ':Attribute musí být datum po :date.',
    'after_or_equal'       => ':Attribute musí být datum :date nebo pozdější.',
    'alpha'                => ':Attribute může obsahovat pouze písmena.',
    'alpha_dash'           => ':Attribute může obsahovat pouze písmena, číslice, pomlčky a podtržítka. České znaky (á, é, í, ó, ú, ů, ž, š, č, ř, ď, ť, ň) nejsou podporovány.',
    'alpha_num'            => ':Attribute může obsahovat pouze písmena a číslice.',
    'array'                => ':Attribute musí být pole.',
    'ascii'                => 'Číslo :attribute musí obsahovat pouze jednobajtové alfanumerické znaky a symboly.',
    'before'               => ':Attribute musí být datum před :date.',
    'before_or_equal'      => 'Datum :attribute musí být před nebo rovno :date.',
    'between'              => [
        'array'   => ':Attribute musí obsahovat nejméně :min a nesmí obsahovat více než :max prvků.',
        'file'    => ':Attribute musí být větší než :min a menší než :max Kilobytů.',
        'numeric' => ':Attribute musí být hodnota mezi :min a :max.',
        'string'  => ':Attribute musí být delší než :min a kratší než :max znaků.',
    ],
    'boolean'              => ':Attribute musí být true nebo false',
    'can'                  => 'Pole :attribute obsahuje neautorizovanou hodnotu.',
    'confirmed'            => ':Attribute nesouhlasí.',
    'contains'             => 'The :attribute field is missing a required value.',
    'current_password'     => 'Současné heslo není spravné.',
    'date'                 => ':Attribute musí být platné datum.',
    'date_equals'          => ':Attribute musí být datum shodné s :date.',
    'date_format'          => ':Attribute není platný formát data podle :format.',
    'decimal'              => ':Attribute musí mít :decimal desetinných míst.',
    'declined'             => ':Attribute musí být odmítnuto.',
    'declined_if'          => ':Attribute musí být odmítnuto, když :other je :value.',
    'different'            => ':Attribute a :other se musí lišit.',
    'digits'               => ':Attribute musí být :digits pozic dlouhé.',
    'digits_between'       => ':Attribute musí být dlouhé nejméně :min a nejvíce :max pozic.',
    'dimensions'           => ':Attribute má neplatné rozměry.',
    'distinct'             => ':Attribute má duplicitní hodnotu.',
    'doesnt_end_with'      => ':Attribute nemusí končit jedním z následujících: :values.',
    'doesnt_start_with'    => 'Číslo :attribute nemusí začínat jedním z následujících: :values.',
    'email'                => ':Attribute není platný formát.',
    'ends_with'            => ':Attribute musí končit jednou z následujících hodnot: :values',
    'enum'                 => 'Vybraná :attribute je neplatná.',
    'exists'               => 'Zvolená hodnota pro :attribute není platná.',
    'extensions'           => 'Pole :attribute musí mít jednu z následujících přípon: :values.',
    'file'                 => ':Attribute musí být soubor.',
    'filled'               => ':Attribute musí být vyplněno.',
    'gt'                   => [
        'array'   => 'Pole :attribute musí mít více prvků než :value.',
        'file'    => 'Velikost souboru :attribute musí být větší než :value kB.',
        'numeric' => ':Attribute musí být větší než :value.',
        'string'  => 'Počet znaků :attribute musí být větší :value.',
    ],
    'gte'                  => [
        'array'   => 'Pole :attribute musí mít :value prvků nebo více.',
        'file'    => 'Velikost souboru :attribute musí být větší nebo rovno :value kB.',
        'numeric' => ':Attribute musí být větší nebo rovno :value.',
        'string'  => 'Počet znaků :attribute musí být větší nebo rovno :value.',
    ],
    'hex_color'            => 'Pole :attribute musí mít platnou hexadecimální barvu.',
    'image'                => ':Attribute musí být obrázek.',
    'in'                   => 'Zvolená hodnota pro :attribute je neplatná.',
    'in_array'             => ':Attribute není obsažen v :other.',
    'integer'              => ':Attribute musí být celé číslo.',
    'ip'                   => ':Attribute musí být platnou IP adresou.',
    'ipv4'                 => ':Attribute musí být platná IPv4 adresa.',
    'ipv6'                 => ':Attribute musí být platná IPv6 adresa.',
    'json'                 => ':Attribute musí být platný JSON řetězec.',
    'list'                 => 'Pole :attribute musí být seznam.',
    'lowercase'            => ':Attribute musí být malá písmena.',
    'lt'                   => [
        'array'   => ':Attribute by měl obsahovat méně než :value položek.',
        'file'    => 'Velikost souboru :attribute musí být menší než :value kB.',
        'numeric' => ':Attribute musí být menší než :value.',
        'string'  => ':Attribute musí obsahovat méně než :value znaků.',
    ],
    'lte'                  => [
        'array'   => ':Attribute by měl obsahovat maximálně :value položek.',
        'file'    => 'Velikost souboru :attribute musí být menší než :value kB.',
        'numeric' => ':Attribute musí být menší nebo rovno než :value.',
        'string'  => ':Attribute nesmí být delší než :value znaků.',
    ],
    'mac_address'          => ':Attribute musí být platná adresa MAC.',
    'max'                  => [
        'array'   => ':Attribute nemůže obsahovat více než :max prvků.',
        'file'    => 'Velikost souboru :attribute musí být menší než :max kB.',
        'numeric' => ':Attribute nemůže být větší než :max.',
        'string'  => ':Attribute nemůže být delší než :max znaků.',
    ],
    'max_digits'           => 'Číslo :attribute nesmí mít více než :max číslic.',
    'mimes'                => ':Attribute musí být jeden z následujících datových typů :values.',
    'mimetypes'            => ':Attribute musí být jeden z následujících datových typů :values.',
    'min'                  => [
        'array'   => ':Attribute musí obsahovat více než :min prvků.',
        'file'    => ':Attribute musí být větší než :min kB.',
        'numeric' => ':Attribute musí být větší než :min.',
        'string'  => ':Attribute musí být delší než :min znaků.',
    ],
    'min_digits'           => 'Číslo :attribute musí mít alespoň :min číslic.',
    'missing'              => 'Pole :attribute musí chybět.',
    'missing_if'           => 'Pole :attribute musí chybět, když :other je :value.',
    'missing_unless'       => 'Pole :attribute musí chybět, pokud :other není :value.',
    'missing_with'         => 'Pokud je přítomno :values, pole :attribute musí chybět.',
    'missing_with_all'     => 'Pokud je přítomno :values, pole :attribute musí chybět.',
    'multiple_of'          => ':Attribute musí být násobkem :value',
    'not_in'               => 'Zvolená hodnota pro :attribute je neplatná.',
    'not_regex'            => ':Attribute musí být regulární výraz.',
    'numeric'              => ':Attribute musí být číslo.',
    'password'             => [
        'letters'       => ':Attribute musí obsahovat alespoň jedno písmeno.',
        'mixed'         => 'Číslo :attribute musí obsahovat alespoň jedno velké a jedno malé písmeno.',
        'numbers'       => ':Attribute musí obsahovat alespoň jedno číslo.',
        'symbols'       => ':Attribute musí obsahovat alespoň jeden symbol.',
        'uncompromised' => 'Daných :attribute se objevilo v úniku dat. Vyberte prosím jiných :attribute.',
    ],
    'present'              => ':Attribute musí být vyplněno.',
    'present_if'           => 'Pole :attribute musí být přítomno, když :other je :value.',
    'present_unless'       => 'Pole :attribute musí být přítomno, pokud :other není :value.',
    'present_with'         => 'Pole :attribute musí být přítomno, pokud je přítomno :values.',
    'present_with_all'     => 'Pole :attribute musí být přítomno, pokud je přítomno :values.',
    'prohibited'           => 'Pole :attribute je zakázáno.',
    'prohibited_if'        => 'Pole :attribute je zakázáno, když je :other :value.',
    'prohibited_unless'    => 'Pole :attribute je zakázáno, pokud není rok :other v roce :values.',
    'prohibits'            => 'Pole :attribute zakazuje přítomnost :other.',
    'regex'                => ':Attribute nemá správný formát.',
    'required'             => ':Attribute musí být vyplněno.',
    'required_array_keys'  => 'Pole :attribute musí obsahovat položky pro: :values.',
    'required_if'          => ':Attribute musí být vyplněno pokud :other je :value.',
    'required_if_accepted' => 'Pole :attribute je povinné, pokud je přijato :other.',
    'required_if_declined' => 'The :attribute field is required when :other is declined.',
    'required_unless'      => ':Attribute musí být vyplněno dokud :other je v :values.',
    'required_with'        => ':Attribute musí být vyplněno pokud :values je vyplněno.',
    'required_with_all'    => ':Attribute musí být vyplněno pokud :values je zvoleno.',
    'required_without'     => ':Attribute musí být vyplněno pokud :values není vyplněno.',
    'required_without_all' => ':Attribute musí být vyplněno pokud není žádné z :values zvoleno.',
    'same'                 => ':Attribute a :other se musí shodovat.',
    'size'                 => [
        'array'   => ':Attribute musí obsahovat právě :size prvků.',
        'file'    => ':Attribute musí mít přesně :size Kilobytů.',
        'numeric' => ':Attribute musí být přesně :size.',
        'string'  => ':Attribute musí být přesně :size znaků dlouhý.',
    ],
    'starts_with'          => ':Attribute musí začínat jednou z následujících hodnot: :values',
    'string'               => ':Attribute musí být řetězec znaků.',
    'timezone'             => ':Attribute musí být platná časová zóna.',
    'ulid'                 => ':Attribute musí být platný ULID.',
    'unique'               => ':Attribute musí být unikátní.',
    'uploaded'             => 'Nahrávání :attribute se nezdařilo.',
    'uppercase'            => ':Attribute musí být velká písmena.',
    'url'                  => 'Formát :attribute je neplatný.',
    'uuid'                 => ':Attribute musí být validní UUID.',
];