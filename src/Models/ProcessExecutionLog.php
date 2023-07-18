<?php

namespace FerdinandosCo\ProcessExecutionLog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProcessExecutionLog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'class_type',
        'class_name',
        'status',
        'details',
        'parent_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'parent_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(ProcessExecutionLog::class, 'parent_id', 'id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(ProcessExecutionLog::class, 'parent_id', 'id')->where('model_id', $this->model_id);
    }
    
    public function siblings(): HasMany
    {
        if($this->parent_id !== null) {
            return $this->hasMany(ProcessExecutionLog::class, 'parent_id', 'parent_id')->where('id', '!=', $this->id);
        } else {
            return $this->hasMany(ProcessExecutionLog::class, 'parent_id', 'id')->where('id', '=', 0);
        }
    }
    
}
