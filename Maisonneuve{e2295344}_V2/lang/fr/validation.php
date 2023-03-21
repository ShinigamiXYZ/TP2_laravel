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

    'accepted' => "L'attribut :attribute doit être accepté.",
    'accepted_if' => "L'attribut :attribute doit être accepté lorsque :other est :value.",
    'active_url' => "L'attribut :attribute n'est pas une URL valide.",
    'after' => "L'attribut :attribute doit être une date après :date.",
    'after_or_equal' => "L'attribut :attribute doit être une date après ou égale à :date.",
    'alpha' => "L'attribut :attribute ne doit contenir que des lettres.",
    'alpha_dash' => "L'attribut :attribute ne doit contenir que des lettres, des chiffres, des tirets et des underscores.",
    'alpha_num' => "L'attribut :attribute ne doit contenir que des lettres et des chiffres.",
    'array' => "L'attribut :attribute doit être un tableau.",
    'ascii' => "L'attribut :attribute ne doit contenir que des caractères alphanumériques et des symboles à un seul octet.",
    'before' => "L'attribut :attribute doit être une date avant :date.",
    'before_or_equal' => "L'attribut :attribute doit être une date avant ou égale à :date.",
    'between' => [
        'array' => "L'attribut :attribute doit avoir entre :min et :max éléments.",
        'file' => "L'attribut :attribute doit être entre :min et :max kilo-octets.",
        'numeric' => "L'attribut :attribute doit être entre :min et :max.",
        'string' => "L'attribut :attribute doit être entre :min et :max caractères.",
    ],
    'boolean' => "Le champ :attribute doit être vrai ou faux.",
    'confirmed' => "La confirmation de l'attribut :attribute ne correspond pas.",
    'current_password' => 'Le mot de passe est incorrect.',
    'date' => "L'attribut :attribute n'est pas une date valide.",
    'date_equals' => "L'attribut :attribute doit être une date égale à :date.",
    'date_format' => "L'attribut :attribute ne correspond pas au format :format.",
    'decimal' => "L'attribut :attribute doit avoir :decimal décimales.",
    'declined' => "L'attribut :attribute doit être refusé.",
    'declined_if' => "L'attribut :attribute doit être refusé lorsque :other est :value.",
    'different' => "Les attributs :attribute et :other doivent être différents.",
    'digits' => "L'attribut :attribute doit avoir :digits chiffres.",
    'digits_between' => "L'attribut :attribute doit être entre :min et :max chiffres.",
    'dimensions' => "L'attribut :attribute a des dimensions d'image invalides.",
    'distinct' => "Le champ :attribute a une valeur en double.",
    'doesnt_end_with' => "L'attribut :attribute ne doit pas se terminer par l'un des éléments suivants : :values.",


   'doesnt_start_with' => "L'attribut :attribute ne doit pas commencer par l'un des éléments suivants : :values.",
'email' => "L'attribut :attribute doit être une adresse e-mail valide.",
'ends_with' => "L'attribut :attribute doit se terminer par l'un des éléments suivants : :values.",
'enum' => "L'attribut :attribute sélectionné est invalide.",
'exists' => "L'attribut :attribute sélectionné est invalide.",
'file' => "L'attribut :attribute doit être un fichier.",
'filled' => "Le champ :attribute doit avoir une valeur.",
'gt' => [
    'array' => "L'attribut :attribute doit avoir plus de :value éléments.",
    'file' => "L'attribut :attribute doit être supérieur à :value kilo-octets.",
    'numeric' => "L'attribut :attribute doit être supérieur à :value.",
    'string' => "L'attribut :attribute doit être supérieur à :value caractères.",
],
'gte' => [
    'array' => "L'attribut :attribute doit avoir :value éléments ou plus.",
    'file' => "L'attribut :attribute doit être supérieur ou égal à :value kilo-octets.",
    'numeric' => "L'attribut :attribute doit être supérieur ou égal à :value.",
    'string' => "L'attribut :attribute doit être supérieur ou égal à :value caractères.",
],
'image' => "L'attribut :attribute doit être une image.",
'in' => "L'attribut :attribute sélectionné est invalide.",
'in_array' => "Le champ :attribute n'existe pas dans :other.",
'integer' => "L'attribut :attribute doit être un entier.",
'ip' => "L'attribut :attribute doit être une adresse IP valide.",
'ipv4' => "L'attribut :attribute doit être une adresse IPv4 valide.",
'ipv6' => "L'attribut :attribute doit être une adresse IPv6 valide.",
'json' => "L'attribut :attribute doit être une chaîne JSON valide.",
'lowercase' => "L'attribut :attribute doit être en minuscules.",
'lt' => [
    'array' => "L'attribut :attribute doit avoir moins de :value éléments.",
    'file' => "L'attribut :attribute doit être inférieur à :value kilo-octets.",
    'numeric' => "L'attribut :attribute doit être inférieur à :value.",
    'string' => "L'attribut :attribute doit être inférieur à :value caractères.",
],
'lte' => [
    'array' => "L'attribut :attribute ne doit pas avoir plus de :value éléments.",
    'file' => "L'attribut :attribute doit être inférieur ou égal à :value kilo-octets.",
    'numeric' => "L'attribut :attribute doit être inférieur ou égal à :value.",
    'string' => "L'attribut :attribute doit être inférieur ou égal à :value caractères.",
],
'mac_address' => "L'attribut :attribute doit être une adresse MAC valide.",
'max' => [
   
    'array' => "L'attribut :attribute ne doit pas avoir plus de :max éléments.",
    'file' => "L'attribut :attribute ne doit pas dépasser :max kilo-octets.",
    'numeric' => "L'attribut :attribute ne doit pas être supérieur à :max.",
    'string' => "L'attribut :attribute ne doit pas dépasser :max caractères.",
],
'max_digits' => "L'attribut :attribute ne doit pas avoir plus de :max chiffres.",
'mimes' => "L'attribut :attribute doit être un fichier de type : :values.",
'mimetypes' => "L'attribut :attribute doit être un fichier de type : :values.",
'min' => [
    'array' => "L'attribut :attribute doit avoir au moins :min éléments.",
    'file' => "L'attribut :attribute doit être d'au moins :min kilo-octets.",
    'numeric' => "L'attribut :attribute doit être au moins :min.",
    'string' => "L'attribut :attribute doit avoir au moins :min caractères.",
],
'min_digits' => "L'attribut :attribute doit avoir au moins :min chiffres.",
'missing' => "Le champ :attribute doit être manquant.",
'missing_if' => "Le champ :attribute doit être manquant lorsque :other est :value.",
'missing_unless' => "Le champ :attribute doit être manquant sauf si :other est :value.",
'missing_with' => "Le champ :attribute doit être manquant lorsque :values est présent.",
'missing_with_all' => "Le champ :attribute doit être manquant lorsque :values sont présents.",
'multiple_of' => "L'attribut :attribute doit être un multiple de :value.",
'not_in' => "L'attribut :attribute sélectionné est invalide.",
'not_regex' => "Le format de l'attribut :attribute est invalide.",
'numeric' => "L'attribut :attribute doit être un nombre.",
'password' => [
    'letters' => "L'attribut :attribute doit contenir au moins une lettre.",
    'mixed' => "L'attribut :attribute doit contenir au moins une lettre majuscule et une lettre minuscule.",
    'numbers' => "L'attribut :attribute doit contenir au moins un chiffre.",
    'symbols' => "L'attribut :attribute doit contenir au moins un symbole.",
    'uncompromised' => "L'attribut :attribute donné a été divulgué lors d'une fuite de données. Veuillez choisir un autre :attribute.",
],
'present' => "Le champ :attribute doit être présent.",
'prohibited' => "Le champ :attribute est interdit.",
'prohibited_if' => "Le champ :attribute est interdit lorsque :other est :value.",
'prohibited_unless' => "Le champ :attribute est interdit sauf si :other est dans :values.",
'prohibits' => "Le champ :attribute interdit la présence de :other.",
'regex' => "Le format de l'attribut :attribute est invalide.",
'required' => "Le champ :attribute est requis.",
'required_array_keys' => "Le champ :attribute doit contenir des entrées pour : :values.",
'required_if' => "Le champ :attribute est requis lorsque :other est :value.",



'required_if_accepted' => "Le champ :attribute est requis lorsque :other est accepté.",
'required_unless' => "Le champ :attribute est requis sauf si :other est dans :values.",
'required_with' => "Le champ :attribute est requis lorsque :values est présent.",
'required_with_all' => "Le champ :attribute est requis lorsque :values sont présents.",
'required_without' => "Le champ :attribute est requis lorsque :values n'est pas présent.",
'required_without_all' => "Le champ :attribute est requis lorsqu'aucune des :values n'est présente.",
'same' => "L'attribut :attribute et :other doivent correspondre.",
'size' => [
'array' => "L'attribut :attribute doit contenir :size éléments.",
'file' => "L'attribut :attribute doit être de :size kilo-octets.",
'numeric' => "L'attribut :attribute doit être :size.",
'string' => "L'attribut :attribute doit être de :size caractères.",
],
'starts_with' => "L'attribut :attribute doit commencer par l'un des éléments suivants : :values.",
'string' => "L'attribut :attribute doit être une chaîne de caractères.",
'timezone' => "L'attribut :attribute doit être un fuseau horaire valide.",
'unique' => "L'attribut :attribute a déjà été pris.",
'uploaded' => "L'attribut :attribute n'a pas pu être téléchargé.",
'uppercase' => "L'attribut :attribute doit être en majuscules.",
'url' => "L'attribut :attribute doit être une URL valide.",
'ulid' => "L'attribut :attribute doit être un ULID valide.",
'uuid' => "L'attribut :attribute doit être un UUID valide.",

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
