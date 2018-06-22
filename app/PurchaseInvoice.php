<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FilterByUser;

/**
 * Class PurchaseInvoice
 *
 * @package App
 * @property string $company
 * @property integer $invoice_no
 * @property string $invoice_date
 * @property string $customer
 * @property integer $quantity
 * @property decimal $price
 * @property decimal $vat
 * @property decimal $discount
 * @property decimal $amount_before_vat
 * @property decimal $transaction_total
 * @property string $created_by
 * @property string $created_by_team
*/
class PurchaseInvoice extends Model
{
    use SoftDeletes, FilterByUser;

    
    protected $fillable = ['invoice_no', 'invoice_date', 'quantity', 'price', 'vat', 'discount', 'amount_before_vat', 'transaction_total', 'company_id', 'customer_id', 'created_by_id', 'created_by_team_id'];
    

    public static function storeValidation($request)
    {
        return [
            'company_id' => 'integer|exists:create_companies,id|max:4294967295|required',
            'invoice_no' => 'integer|max:4294967295|required',
            'invoice_date' => 'date_format:' . config('app.date_format') . '|max:191|required',
            'customer_id' => 'integer|exists:suppliers,id|max:4294967295|required',
            'quantity' => 'integer|max:4294967295|required',
            'price' => 'numeric|required',
            'vat' => 'numeric|required',
            'discount' => 'numeric|nullable',
            'amount_before_vat' => 'numeric|required',
            'transaction_total' => 'numeric|required',
            'created_by_id' => 'integer|exists:users,id|max:4294967295|nullable',
            'created_by_team_id' => 'integer|exists:teams,id|max:4294967295|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'company_id' => 'integer|exists:create_companies,id|max:4294967295|required',
            'invoice_no' => 'integer|max:4294967295|required',
            'invoice_date' => 'date_format:' . config('app.date_format') . '|max:191|required',
            'customer_id' => 'integer|exists:suppliers,id|max:4294967295|required',
            'quantity' => 'integer|max:4294967295|required',
            'price' => 'numeric|required',
            'vat' => 'numeric|required',
            'discount' => 'numeric|nullable',
            'amount_before_vat' => 'numeric|required',
            'transaction_total' => 'numeric|required',
            'created_by_id' => 'integer|exists:users,id|max:4294967295|nullable',
            'created_by_team_id' => 'integer|exists:teams,id|max:4294967295|nullable'
        ];
    }

    

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setInvoiceDateAttribute($input)
    {
        if ($input) {
            $this->attributes['invoice_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        }
    }

    /**
     * Get attribute from date format
     * @param $output
     *
     * @return string
     */
    public function getInvoiceDateAttribute($output)
    {
        if ($output) {
            return Carbon::createFromFormat('Y-m-d', $output)->format(config('app.date_format'));
        }
    }
    
    public function company()
    {
        return $this->belongsTo(CreateCompany::class, 'company_id')->withTrashed();
    }
    
    public function customer()
    {
        return $this->belongsTo(Supplier::class, 'customer_id')->withTrashed();
    }
    
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
    
    public function created_by_team()
    {
        return $this->belongsTo(Team::class, 'created_by_team_id');
    }
    
    
}
