<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdatedRequest;
use App\Models\Category;
use App\Utilities\DataTable;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Lang;
use Session;
use URL;
use View;

/**
 * Class CategoryController
 *
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): ViewContract
    {
        return View::make('category.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Request $request): JsonResponse
    {
        $dataTable = new DataTable(Category::query(), $request);

        $data = $dataTable->setMap(function (Category $category) use ($dataTable) {
            $id = $category->getKey();
            $editLink = URL::route('category.edit', $id);

            return [
                $id,
                '<a href="'.URL::route('category.edit', $category).'">'.$category->getAttribute('name').'</a>',
                $dataTable->buildActions([
                    $dataTable->buildEditAction($editLink),
                    $dataTable->buildDeleteAction(
                        URL::route('category.destroy', $id),
                        'category',
                        $id
                    ),
                ]),
            ];
        })->setOrderColumns([
            0 => 'id',
            1 => 'name',
        ])->build();

        return new JsonResponse($data);
    }

    /**
     * @param \App\Models\Category $category
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Category $category): ViewContract
    {
        return View::make('category.edit', [
            'category' => $category,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): ViewContract
    {
        return View::make('category.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * @param \App\Http\Requests\Category\StoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        Category::create($request->all());

        Session::flash('status', Lang::get('category.messages.stored'));

        return new RedirectResponse(URL::route('category.index'), 302);
    }

    /**
     * @param \App\Http\Requests\Category\UpdatedRequest $request
     * @param \App\Models\Category $category
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatedRequest $request, Category $category): RedirectResponse
    {
        $category->update($request->all());

        Session::flash('status', Lang::get('category.messages.updated'));

        return new RedirectResponse(URL::route('category.index'), 302);
    }

    /**
     * @param \App\Models\Category $category
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Exception
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        Session::flash('status', Lang::get('category.messages.deleted'));

        return new RedirectResponse(URL::route('category.index'), 302);
    }
}
