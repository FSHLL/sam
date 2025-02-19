<?php

namespace App\Http\Controllers\Api;

use App\Actions\Deployment\RollbackDeploymentAction;
use App\Actions\Deployment\StoreDeploymentAction;
use App\Http\Controllers\Controller;
use App\Models\Deployment;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Response;

class ProjectDeploymentsController extends Controller
{
    public function index(Project $project): JsonResponse
    {
        return Response::json($project->deployments()->latest()->paginate());
    }

    public function store(Project $project, StoreDeploymentAction $storeDeployAction): JsonResponse
    {
        return Response::json(
            $storeDeployAction->handle($project),
            HttpResponse::HTTP_CREATED
        );
    }

    public function show(Deployment $deployment): JsonResponse
    {
        return Response::json($deployment);
    }

    public function rollback(Project $project, Deployment $deployment, RollbackDeploymentAction $rollbackDeploymentAction): JsonResponse
    {
        return Response::json($rollbackDeploymentAction->handle($deployment));
    }
}
