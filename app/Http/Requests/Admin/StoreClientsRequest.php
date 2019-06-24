<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientsRequest extends FormRequest
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
        return [
            'client_name' => 'required',
            'client_address' => 'required',
            'client_gstin' => 'min:15|max:15|required',
            'payment_status' => 'max:2147483647|required|numeric',
            'start_date' => 'nullable|date_format:'.config('app.date_format'),
        ];
    }
}
