<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ToolCategory extends Model
{
    use HasFactory;

    protected $table = 'tool_categories';
    protected $fillable = [
        'name', 'description',
    ];

    public function tools():HasMany
    {
        return $this->hasMany(Tool::class);
    }

}
