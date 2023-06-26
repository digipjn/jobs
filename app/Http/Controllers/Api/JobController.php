<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Job\StoreRequest;
use App\Http\Requests\Api\Job\UpdateRequest;
use App\Http\Resources\JobListingResource;
use App\Http\Resources\JobResource;
use App\Models\Job;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class JobController
 * @package App\Http\Controllers\Api
 */
class JobController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return JobListingResource::collection(
            Job::paginate(20)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
    {
        $job = new Job();
        $job->fill($request->processed());
        $job->save();
        return response()->json($job->refresh());
    }

    /**
     * Display the specified resource.
     *
     * @param Job $job
     * @return JsonResponse
     */
    public function show(Job $job): JsonResponse
    {
        $resource = new JobResource($job);
        return response()->json($resource);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Job $job
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, Job $job): JsonResponse
    {
        $job->fill($request->processed());
        $job->save();
        return response()->json($job->refresh());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Job $job
     * @return JsonResponse
     */
    public function destroy(Job $job): JsonResponse
    {
        $job->delete();
        return $this->respondSuccess();
    }
}
