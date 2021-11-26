<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSongRequest extends FormRequest
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
			'title' => 'required',
			'artist' => 'required|in:Iwan Fals,Afgan|min:3',
			'album' => 'sometimes|required|alpha_num',
			'person.*.name' => 'alpha_num',
		];

		if ($this->has('album') && !empty($this->input('album'))) {
			$rules['track_no'] = 'required|integer|min:0';
		}

		return $rules;
	}

	public function messages()
	{
		return [
			'title.required' => 'Isi dengan judul lagu populer bro...',
			'album.required' => 'Album dari lagu ini mesti diisi ya',
			'track_no.required' => 'Nomor Tracknya diisi ya',
			'person.*.name.alpha_num' => 'Nama Personil mesti valid',
		];
	}
}
