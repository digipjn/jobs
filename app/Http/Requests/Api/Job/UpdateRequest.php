<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\Job;

use App\Http\Requests\Api\Request;
use Illuminate\Database\Schema\Builder;

/**
 * Class UpdateRequest
 * @package App\Http\Requests\Api\Job
 */
class UpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => sprintf('bail|required|string|max:%d', Builder::$defaultStringLength),
            'description' => 'bail|required|string',
        ];
    }
}
