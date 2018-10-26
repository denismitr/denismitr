<?php

namespace App\Http\Requests;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends CreateProjectRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $project = Project::findOrFail($this->_id);

        return array_merge(parent::rules(), [
            'name' => ['required', Rule::unique('projects', 'name')->ignore($project->id), 'min:2'],
            'picture' => 'nullable|file|mimes:jpeg,png'
        ]);
    }
}
