<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class GramaNiladariDivision extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'grama_niladari_divisions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'divisional_secretariat_id',
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function divisional_secretariat()
    {
        return $this->belongsTo(DivisionalSecretariat::class, 'divisional_secretariat_id');
    }
}
