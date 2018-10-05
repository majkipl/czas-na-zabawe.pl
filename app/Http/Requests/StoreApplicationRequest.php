<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
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
        $rules =  [
            'firstname' => 'bail|required|string|min:3|max:128',
            'lastname' => 'bail|required|string|min:3|max:128',
            'birthday' => 'bail|required|date_format:d-m-Y|before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
            'email' => 'bail|required|email:rfc,dns|unique:applications,email',
            'product' => 'bail|required|string|min:3|max:128',
            'shop' => 'bail|required|string|min:3|max:128',
            'whence' => 'bail|required|numeric|exists:whences,id',
            'img_receipt' => 'bail|required|file|mimes:jpeg,jpg,png|max:4096',
            'legal_1' => 'bail|required',
            'legal_2' => 'bail|required',
            'legal_3' => 'bail|required',
            'legal_4' => 'bail',
        ];

        if ($this->input('i_want') !== null) {
            $rules['title'] = 'bail|required|string|max:128';
            $rules['message'] = 'bail|required|string|max:500';
            $rules['img_tip'] = 'bail|required_without:video_url|file|mimes:jpeg,jpg,png|max:4096';
            $rules['video_url'] = [
                'bail',
                'required_without:img_tip',
                'nullable',
                'regex:/^(https?:\/\/)?(www\.)?(youtube\.com|vimeo\.com)\/(watch\?v=|video\/)?([a-zA-Z0-9_-]{11}|[0-9]{5,11})$/',
            ];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'required' => 'Pole jest wymagane.',
            'string' => 'Wprowadź wartość tekstową.',
            'min' => 'Pole wymaga minimum :min znaków.',
            'max' => 'Pole wymaga maksymalnie :max znaków.',
            'date_format' => 'Niewłaściwy format daty. Oczekiwany format: DD-MM-YYYY.',
            'before_or_equal' => 'Musisz mieć co najmniej 18 lat, aby się zarejestrować.',
            'regex' => 'Błędny format wprowadzonych danych.',
            'email' => 'Błędny format wprowadzonych danych.',
            'unique' => 'Adres e-mail jest już zajęty.',
            'number' => 'Wybierz prawidłową wartość.',
            'exists' => 'Wybierz prawidłową wartość.',
            'file' => 'Pole wymaga pliku.',
            'mimes' => 'Dopuszczalne typy plików jpeg,jpg,png.',
            'img_receipt.max' => 'Plik nie może być większy niż 4MB.',
            'img_tip.max' => 'Plik nie może być większy niż 4MB.',
            'img_tip.required_without' => 'Pole obrazu jest wymagane, jeśli pole URL wideo jest puste.',
            'video_url.required_without' => 'Pole URL wideo jest wymagane, jeśli pole obrazu nie jest wypełnione.',
            'video_url.regex' => 'Nieprawidłowy format adresu URL. Akceptowane są tylko linki z YouTube lub Vimeo.',
        ];
    }
}
