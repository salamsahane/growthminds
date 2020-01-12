// Validation errors messages for Parsley
// Load this after Parsley

Parsley.addMessages('fr', {
    defaultMessage: "Cette valeur semble non valide.",
    type: {
        email: "Adresse email valide.",
        url: "Cette valeur n'est pas une URL valide.",
        number: "Cette valeur doit être un nombre.",
        integer: "Cette valeur doit être un entier.",
        digits: "Cette valeur doit être numérique.",
        alphanum: "Cette valeur doit être alphanumérique."
    },
    notblank: "Cette valeur ne peut pas être vide.",
    required: "Ce champ est requis.",
    pattern: "Cette valeur semble non valide.",
    min: "Cette valeur ne doit pas être inférieure à %s.",
    max: "Cette valeur ne doit pas excéder %s.",
    range: "Cette valeur doit être comprise entre %s et %s.",
    minlength: "Trop courte ! Minimum %s caractères.",
    maxlength: "Trop longue ! Maximum %s caractères.",
    length: "Ce champ doit contenir entre %s et %s caractères.",
    mincheck: "Vous devez sélectionner au moins %s choix.",
    maxcheck: "Vous devez sélectionner %s choix maximum.",
    check: "Vous devez sélectionner entre %s et %s choix.",
    equalto: "Cette valeur devrait être identique."
});

Parsley.setLocale('fr');