<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\LaravelData\Data;

abstract class ServiceTemplate
{

    public function index(): LengthAwarePaginator
    {
        return $this->model::paginate(10);
    }

    public function getById(int $id): Model|null
    {
        return $this->model::where('id', $id)->first();
    }

    public function create(Data $data): Model
    {
        return $this->model::create($data->toArray());
    }

    public function update(Data $dto, int $id): bool|null
    {
        return $this->model::query()->where('id',$id)->first()?->update($dto->toArray());
    }

    public function delete(int $id): bool|null
    {
        return $this->model::where('id', $id)->first()?->delete();
    }
}
