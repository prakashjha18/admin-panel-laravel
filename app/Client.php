<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Client
 *
 * @package App
 * @property string $client_name
 * @property text $client_address
 * @property string $client_gstin
 * @property string $client_emailid
 * @property string $client_mobileno
 * @property integer $payment_status
 * @property string $upload_file
 * @property string $start_date
*/
class Client extends Model
{
    use SoftDeletes;

    protected $fillable = ['client_name', 'client_address', 'client_gstin', 'client_emailid', 'client_mobileno', 'payment_status', 'upload_file', 'start_date'];
    protected $hidden = [];
    
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPaymentStatusAttribute($input)
    {
        $this->attributes['payment_status'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setStartDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['start_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['start_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getStartDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }
    public function purchases(){
        return $this->hasMany('App\purchases');
    }
    public function sales(){
        return $this->hasMany('App\sales');
    }
}
