<?php

namespace App\Enums;

enum BlogPostStatus: string {

    case STATUS_PUBLISHED = 'published';
    case STATUS_UNPUBLISHED = 'unpublished';
    case STATUS_PREVIEW = 'preview';
}
