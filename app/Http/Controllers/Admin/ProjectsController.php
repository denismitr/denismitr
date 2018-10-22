<?php

namespace App\Http\Controllers\Admin;

use App\Events\CriticalErrorOccurred;
use App\Exceptions\ImageOptimizationError;
use App\Helpers\Image;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(15);

        return view('admin.projects.index', ['projects' => $projects]);
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(CreateProjectRequest $request, Image $image)
    {
        try {
            $image->fromRequest($request, 'picture')
                ->resize(100)
                ->encode()
                ->save();

            $filename = $request->file('picture')->store('projects', 'public');
        } catch (\Throwable $t) {
            CriticalErrorOccurred::dispatch($t);

            return back()->withErrors([
                'picture' => [$t->getMessage()]
            ])->withInput();
        }

        try {
            Project::create($this->getData($request, $filename));
        } catch (\Throwable $t) {
            CriticalErrorOccurred::dispatch($t);

            session()->flash('error', $t->getMessage());

            return back()->withInput();
        }

        session()->flash('success', "Project {$request->name} created.");

        return redirect()->route('admin.projects.index');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', ['project' => $project]);
    }

    /**
     * @param UpdateProjectRequest $request
     * @param Project $project
     * @param Image $image
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProjectRequest $request, Project $project, Image $image)
    {
        try {
            if ($request->hasFile('picture')) {
                $image->fromRequest($request, 'picture')
                    ->resize(100)
                    ->encode()
                    ->save();

                $filename = $request->file('picture')->store('projects', 'public');
                Storage::disk('public')->delete($project->picture);
            }

            $project->update(
                $this->getData($request, $filename ?? null)
            );
        } catch (\Throwable $t) {
            CriticalErrorOccurred::dispatch($t);

            session()->flash('error', $t->getMessage());

            return back()->withInput();
        }

        session()->flash('success', "Project {$request->name} updated.");

        return redirect()->route('admin.projects.index');
    }

    /**
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function confirm(Project $project)
    {
        return view('admin.projects.confirm', ['project' => $project]);
    }

    /**
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Project $project)
    {
        $project->delete();

        session()->flash('success', "Project {$project->name} deleted.");

        return redirect()->route('admin.projects.index');
    }

    /**
     * @param Request $request
     * @param null|string $filename
     * @return array
     */
    protected function getData(Request $request, ?string $filename): array
    {
        $data = [
            "name" => $request->name,
            "description_ru" => $request->description_ru,
            "description_en" => $request->description_en,
            "url" => $request->url,
            "color" => $request->color,
            "priority" => $request->priority,
        ];

        if ($filename) {
            $data = array_merge($data, ['picture' => $filename]);
        }

        return $data;
    }
}
