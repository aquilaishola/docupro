<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdfFile extends Model
{
    use HasFactory;

    protected $table = 'pdf_files'; // Make sure your DB table is called pdf_files

    // Allow mass assignment on these fields
    protected $fillable = [
        'user_id',
        'content',
        'file_path',
    ];

    // Relation: each PDF belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}