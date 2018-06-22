<?php
namespace App\Http\Requests\Admin;

use App\CrmDocument;
use Illuminate\Foundation\Http\FormRequest;

class StoreCrmDocumentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return CrmDocument::storeValidation($this);
    }
}
