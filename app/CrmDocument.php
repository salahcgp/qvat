<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FilterByUser;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * Class CrmDocument
 *
 * @package App
 * @property string $customer
 * @property string $name
 * @property text $description
 * @property string $file
 * @property string $created_by
 * @property string $created_by_team
*/
class CrmDocument extends Model implements HasMedia
{
    use FilterByUser, HasMediaTrait;

    
    protected $fillable = ['name', 'description', 'customer_id', 'created_by_id', 'created_by_team_id'];
    protected $appends = ['file', 'file_link'];
    protected $with = ['media'];
    

    public static function storeValidation($request)
    {
        return [
            'customer_id' => 'integer|exists:crm_customers,id|max:4294967295|required',
            'name' => 'max:191|nullable',
            'description' => 'max:65535|nullable',
            'file' => 'file|required',
            'created_by_id' => 'integer|exists:users,id|max:4294967295|nullable',
            'created_by_team_id' => 'integer|exists:teams,id|max:4294967295|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'customer_id' => 'integer|exists:crm_customers,id|max:4294967295|required',
            'name' => 'max:191|nullable',
            'description' => 'max:65535|nullable',
            'file' => 'nullable',
            'created_by_id' => 'integer|exists:users,id|max:4294967295|nullable',
            'created_by_team_id' => 'integer|exists:teams,id|max:4294967295|nullable'
        ];
    }

    

    public function getFileAttribute()
    {
        return $this->getFirstMedia('file');
    }

    /**
     * @return string
     */
    public function getFileLinkAttribute()
    {
        $file = $this->getFirstMedia('file');
        if (! $file) {
            return null;
        }

        return '<a href="' . $file->getUrl() . '" target="_blank">' . $file->file_name . '</a>';
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
