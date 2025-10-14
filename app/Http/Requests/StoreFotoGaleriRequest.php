<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFotoGaleriRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // sementara ijinkan semua. kedepannya akan diisi oleh user-user apa aja yang diijinkan untuk melakukan ini
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    
    
    // peraturan yang normalnya ada di controller
    public function rules(): array
    {
        // dd($this->all());
        return [
            'caption' => ['string', 'max:255', 'nullable'],
            'cropped_image_data' => ['required', 'string'],
        ];
    }
    

    // pesan custom
    public function messages(): array
    {
        return [
            // 'caption.required' => 'Caption atau deskripsi foto wajib diisi.',
            'cropped_image_data.required' => 'Data gambar tidak ditemukan. Silakan pilih dan potong gambar kembali.',
        ];
    }
}
