<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedTransactionAsset extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_request_id',
        'asset_id',
        'qty',
        'unit_price',
        'unit_cost_lbc',
        'total_price_amount',
        'total_cost_lbc',
    ];

    public function asset(){
        return $this->belongsTo(Asset::class, 'asset_id');
    }



}
