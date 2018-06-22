<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FilterByUser;

/**
 * Class CrmCustomer
 *
 * @package App
 * @property string $first_name
 * @property string $last_name
 * @property string $crm_status
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $skype
 * @property string $website
 * @property text $description
 * @property string $created_by
 * @property string $created_by_team
*/
class CrmCustomer extends Model
{
    use FilterByUser;

    
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address', 'skype', 'website', 'description', 'crm_status_id', 'created_by_id', 'created_by_team_id'];
    

    public static function storeValidation($request)
    {
        return [
            'first_name' => 'max:191|required',
            'last_name' => 'max:191|nullable',
            'crm_status_id' => 'integer|exists:crm_statuses,id|max:4294967295|required',
            'email' => 'email|max:191|nullable',
            'phone' => 'max:191|nullable',
            'address' => 'max:191|nullable',
            'skype' => 'max:191|nullable',
            'website' => 'max:191|nullable',
            'description' => 'max:65535|nullable',
            'created_by_id' => 'integer|exists:users,id|max:4294967295|nullable',
            'created_by_team_id' => 'integer|exists:teams,id|max:4294967295|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'first_name' => 'max:191|required',
            'last_name' => 'max:191|nullable',
            'crm_status_id' => 'integer|exists:crm_statuses,id|max:4294967295|required',
            'email' => 'email|max:191|nullable',
            'phone' => 'max:191|nullable',
            'address' => 'max:191|nullable',
            'skype' => 'max:191|nullable',
            'website' => 'max:191|nullable',
            'description' => 'max:65535|nullable',
            'created_by_id' => 'integer|exists:users,id|max:4294967295|nullable',
            'created_by_team_id' => 'integer|exists:teams,id|max:4294967295|nullable'
        ];
    }

    

    
    
    public function crm_status()
    {
        return $this->belongsTo(CrmStatus::class, 'crm_status_id');
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
