<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $rules = [
            'name'        => 'required',
            'price'       => 'required',
            'description' => 'required',
            'category'    => 'required',
        ];

        $images = $this->file( 'images' );

        if ( !empty( $images ) )
        {
            foreach ( $images as $key => $image ) // add individual rules to each image
            {
                $rules[ sprintf( 'images.%d', $key ) ] = 'image';
            }
        }

        return $rules;
    }
}
