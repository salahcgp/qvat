<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FilterByTeam;

/**
 * Class Team
 *
 * @package App
 * @property string $name
*/
class Team extends Model
{
    use FilterByTeam;

    
    protected $fillable = ['name'];
    

    public static function storeValidation($request)
    {
        return [
            'name' => 'max:191|required'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'name' => 'max:191|required'
        ];
    }

    

    
    
    
}
