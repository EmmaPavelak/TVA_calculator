<?php

return [
    'required' => 'Le champ :attribute est obligatoire.',
    'email' => "L'adresse e-mail doit être valide.",
    'numeric' => 'Le champ :attribute doit être un nombre.',
    'min' => [
        'numeric' => 'Le champ :attribute doit être supérieur ou égal à :min.',
        'string' => 'Le champ :attribute doit contenir au moins :min caractères.',
    ],
    'max' => [
        'string' => 'Le champ :attribute ne doit pas dépasser :max caractères.',
    ],
    'gt' => [
    'numeric' => 'Le champ :attribute doit être strictement supérieur à :value.',
    'file' => 'Le champ :attribute doit être supérieur à :value kilobytes.',
    'string' => 'Le champ :attribute doit contenir plus de :value caractères.',
    'array' => 'Le champ :attribute doit contenir plus de :value éléments.',
    ],
    'in' => 'Le champ :attribute doit être l\'une des valeurs suivantes : :values.',

    'attributes' => [
        'amount' => 'montant',
        'selected_price_type' => 'type de prix',
        'selected_rate' => 'taux de TVA',
    ],
  
];
