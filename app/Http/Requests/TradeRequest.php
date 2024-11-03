<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TradeRequest extends FormRequest
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

    public function messages()
    {
        return [

            'trade_date.required' => 'Please select a date.',
            'event_id.required' => 'Please select an event.',
            'team_one_id.required' => 'Please select a team.',
            'team_two_id.required' => 'Please select a team.',
            'team_one_score.required' => 'Score is required.',
            'team_two_score.required' => 'Score is required.',
            'result.required' => 'Please select a result.',
            'reward.required' => 'Reward is required.',
            'user_id.required' => 'Please select a client.',

        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'trade_date' => 'required',
            'event_id' => 'required',
            'team_one_id' => 'required',
            'team_two_id' => 'required',
            'team_one_score' => 'required',
            'team_two_score' => 'required',
            'result' => 'required',
            'reward' => 'required',
            'user_id' => 'required',

        ];
    }
}
