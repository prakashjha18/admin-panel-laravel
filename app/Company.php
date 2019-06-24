<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Company
 *
 * @package App
 * @property string $company_name
 * @property text $company_address
 * @property string $gst_in
 * @property string $company_email
 * @property string $company_mobileno
*/
class Company extends Model
{
    use SoftDeletes;

    protected $fillable = ['company_name', 'company_address', 'gst_in', 'company_email', 'company_mobileno'];
    protected $hidden = [];
    
    
    
}
