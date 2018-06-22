<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FilterByUser;

/**
 * Class CrmNote
 *
 * @package App
 * @property string $customer
 * @property text $note
 * @property string $created_by
 * @property string $created_by_team
*/
class CrmNote extends Model
{
    use FilterByUser;

    
    protected $fillable = ['note', 'customer_id', 'created_by_id', 'created_by_team_id'];
    

    public static function storeValidation($request)
    {
        return [
            'customer_id' => 'integer|exists:crm_customers,id|max:4294967295|required',
            'note' => 'max:65535|nullable',
            'created_by_id' => 'integer|exists:users,id|max:4294967295|nullable',
            'created_by_team_id' => 'integer|exists:teams,id|max:4294967295|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'customer_id' => 'integer|exists:crm_customers,id|max:4294967295|required',
            'note' => 'max:65535|nullable',
            'created_by_id' => 'integer|exists:users,id|max:4294967295|nullable',
            'created_by_team_id' => 'integer|exists:teams,id|max:4294967295|nullable'
        ];
    }

    

    
    
    public function customer()
    {
        return $this->belongsTo(CrmCustomer::class, 'customer_id');
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
