<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdfFile extends Model
{
    use HasFactory;

    protected $table = 'pdf_files';

    protected $fillable = [
        'user_id',
        'content',
        'file_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}