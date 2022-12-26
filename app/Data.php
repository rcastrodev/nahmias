<?php

namespace App;

use App\Company;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = ['company_id', 'description', 'address', 'email', 'phone1', 'phone2', 'phone3','logo_header', 'logo_footer', 'youtube', 'facebook', 'instagram', 'mercado_pago'];

    public function company()
    {
        return $this->belongsTo (Company::class);
    }
}
