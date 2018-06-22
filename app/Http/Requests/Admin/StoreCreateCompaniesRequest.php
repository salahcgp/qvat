<?php
namespace App\Http\Requests\Admin;

use App\CreateCompany;
use Illuminate\Foundation\Http\FormRequest;

class StoreCreateCompaniesRequest extends FormRequest
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
        return CreateCompany::storeValidation($this);
    }
}
