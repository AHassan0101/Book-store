<?php

namespace Modules\Admin\Entities;

use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Model;

class BookImage extends Model
{
    use ImageUpload;

    const UPLOAD_DIRECTORY = 'books-uploads/';

    protected $fillable = [];
}
