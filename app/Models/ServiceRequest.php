<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'req_no',
        'account_no',
        'status',
        'techinician_id',
        'concern',
        'causes_of_request',
        'findings',
        'action_taking',
        'date_accomp',
        'date_assigned',
        'priority',
    ];



    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function technician()
    {
        return $this->belongsTo(User::class, 'techinician_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->req_no = date('Y-m') . '-' . str_pad($model->getMaxReqNo() + 1, 5, '0', STR_PAD_LEFT);
        });
    }

    protected function getMaxReqNo()
    {
        return static::max('req_no') ? intval(substr(static::max('req_no'), 8)) : 0;
    }



}
