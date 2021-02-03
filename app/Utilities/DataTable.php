<?php

declare(strict_types = 1);

namespace App\Utilities;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Request as RequestFacade;
use View;
use const null;

/**
 * Class DataTable
 *
 * @package App\Utilities
 */
class DataTable
{
    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * @var mixed
     */
    protected $query;

    /**
     * @var \Closure|null
     */
    protected $filter;

    /**
     * @var \Closure|null
     */
    protected $map;

    /**
     * @var array
     */
    protected $orderColumns;

    /**
     * @var array
     */
    protected $with;

    /**
     * @var mixed
     */
    private $baseQuery;

    /**
     * DataTablesHelper constructor.
     *
     * @param mixed $query
     * @param \Illuminate\Http\Request|null $request
     */
    public function __construct($query, Request $request = null)
    {
        $this->baseQuery = clone $query;
        $this->query = $query;
        $this->request = $request ?: RequestFacade::instance();
    }

    /**
     * @param mixed $query
     * @param \Illuminate\Http\Request|null $request
     *
     * @return static
     */
    public static function make($query, Request $request = null)
    {
        return new static($query, $request);
    }

    /**
     * @return array
     */
    public function build(): array
    {
        list($filtered, $data) = $this->getFiltered();

        return [
            'draw' => $this->getDraw(),
            'recordsFiltered' => $filtered,
            'data' => $data,
        ];
    }

    /**
     * @param array $actions
     *
     * @return string
     */
    public function buildActions(array $actions = []): string
    {
        return (string) View::make('common.action.index', [
            'actions' => $actions,
        ]);
    }

    /**
     * @param string $url
     *
     * @return string
     */
    public function buildEditAction(string $url): string
    {
        return (string) View::make('common.action.edit', [
            'url' => $url,
        ]);
    }

    /**
     * @param string $url
     * @param string $type
     * @param int $key
     *
     * @return string
     */
    public function buildDeleteAction(
        string $url,
        string $type,
        int $key
    ): string {
        return (string) View::make('common.action.destroy', [
            'url' => $url,
            'key' => $key,
            'type' => $type,
        ]);
    }

    /**
     * @param \Closure|null $filter
     *
     * @return $this
     */
    public function setFilter(Closure $filter = null): self
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * @param \Closure $map
     *
     * @return $this
     */
    public function setMap(Closure $map = null): self
    {
        $this->map = $map;

        return $this;
    }

    /**
     * @param array $columns
     *
     * @return $this
     */
    public function setOrderColumns(array $columns): self
    {
        $this->orderColumns = $columns;

        return $this;
    }

    /**
     * @param array $relations
     *
     * @return $this
     */
    public function setWith(array $relations): self
    {
        $this->with = $relations;

        return $this;
    }

    /**
     * @return int
     */
    protected function getCount(): int
    {
        return $this->baseQuery->count();
    }

    /**
     * @return int
     */
    protected function getDraw(): int
    {
        return (int) $this->request->get('sEcho', 1);
    }

    /**
     * @return array
     */
    protected function getFiltered(): array
    {
        $this->addFilter();
        $filtered = $this->query->count();

        $this->addPager()->addWith()->addOrdering();

        /** @var \Illuminate\Support\Collection $results */
        $results = $this->query->get();

        if (null === $this->map) {
            $data = $results->toArray();
        } else {
            $data = $results->map($this->map)->all();
        }

        return [$filtered, $data];
    }

    /**
     * @return $this
     */
    protected function addFilter(): self
    {
        if (null === $this->filter) {
            return $this;
        }

        $keyword = $this->request->get('sSearch') ?: null;

        $this->query->when($keyword, $this->filter);

        return $this;
    }

    /**
     * @return $this
     */
    protected function addOrdering(): self
    {
        $by = $this->request->get('iSortCol_0');

        if (null === $by) {
            return $this;
        }

        $by = (int) $by;

        if (empty($this->orderColumns[$by])) {
            return $this;
        }

        $direction = $this->request->get('sSortDir_0', 'asc');

        $this->query->orderBy($this->orderColumns[$by], $direction);

        return $this;
    }

    /**
     * @return $this
     */
    protected function addPager(): self
    {
        $perPage = 150;
        $page = (((int) $this->request->get('iDisplayStart')) / $perPage) + 1;

        if ($perPage > 0) {
            $this->query->forPage($page, $perPage);
        }

        return $this;
    }

    /**
     * @return $this
     */
    protected function addWith(): self
    {
        if (empty($this->with)) {
            return $this;
        }

        $this->query->with($this->with);

        return $this;
    }
}
