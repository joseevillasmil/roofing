<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['address', 'name', 'spouse_name', 'birthday', 'telephone',
                            'email', 'loss_date', 'loss_type', 'loss_roof', 'languaje', 'mortage',
                            'mortage_name', 'floors', 'separated_structures', 'interior_damage',
                            'interior_damage_detail', 'previous_claim', 'previous_claim_status',
                            'previous_claim_date', 'claim_number', 'adjuster', 'aditional'];
    protected $dates = ['created_at', 'updated_at', 'birthday', 'loss_date'];
    protected $casts = ['images' => 'array', 'coords' => 'array'];
}
