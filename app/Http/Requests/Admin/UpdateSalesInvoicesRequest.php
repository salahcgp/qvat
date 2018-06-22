<?php
namespace App\Http\Requests\Admin;

use App\SalesInvoice;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSalesInvoicesRequest extends FormRequest
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
        return SalesInvoice::updateValidation($this);
    }
}
