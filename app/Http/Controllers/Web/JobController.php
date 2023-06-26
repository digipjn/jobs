<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Job\StoreRequest;
use App\Models\Job;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class JobController
 * @package App\Http\Controllers\Web
 */
class JobController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('jobs::index');
    }

    /**
     * Created resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('jobs::create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        return view('jobs::show', [
            'id' => $id,
        ]);
    }
}
