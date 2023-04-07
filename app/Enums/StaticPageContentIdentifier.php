<?php

namespace App\Enums;

enum StaticPageContentIdentifier: string {

    case IDENTIFIER_IMPRINT_ADDRESS = 'imprintAddress';
    case IDENTIFIER_IMPRINT_PHONE = 'imprintPhone';
    case IDENTIFIER_IMPRINT_EMAIL = 'imprintEmail';
}
