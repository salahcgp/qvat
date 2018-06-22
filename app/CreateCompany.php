<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FilterByUser;

/**
 * Class CreateCompany
 *
 * @package App
 * @property string $company_name
 * @property text $billing_address
 * @property text $shipping_address
 * @property string $mobile
 * @property string $phone
 * @property string $email
 * @property string $trn
 * @property string $created_by
 * @property string $created_by_team
*/
class CreateCompany extends Model
{
    use SoftDeletes, FilterByUser;

    
    protected $fillable = ['company_name', 'billing_address', 'shipping_address', 'mobile', 'phone', 'email', 'trn', 'created_by_id', 'created_by_team_id'];
    

    public static function storeValidation($request)
    {
        return [
            'company_name' => 'max:191|required|unique:create_companies,company_name',
            'billing_address' => 'max:65535|required',
            'shipping_address' => 'max:65535|nullable',
            'mobile' => 'max:191|required',
            'phone' => 'max:191|nullable',
            'email' => 'email|max:191|nullable',
            'trn' => 'max:191|required',
            'created_by_id' => 'integer|exists:users,id|max:4294967295|nullable',
            'created_by_team_id' => 'integer|exists:teams,id|max:4294967295|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'company_name' => 'max:191|required|unique:create_companies,company_name,'.$request->route('create_company'),
            'billing_address' => 'max:65535|required',
            'shipping_address' => 'max:65535|nullable',
            'mobile' => 'max:191|required',
            'phone' => 'max:191|nullable',
            'email' => 'email|max:191|nullable',
            'trn' => 'max:191|required',
            'created_by_id' => 'integer|exists:users,id|max:4294967295|nullable',
            'created_by_team_id' => 'integer|exists:teams,id|max:4294967295|nullable'
        ];
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
