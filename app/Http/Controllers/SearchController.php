<?php

namespace App\Http\Controllers;

use App\Enums\SearchType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('website.search.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    public function query(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'query' => [
                    'required',
                    'string',
                    'min:3'
                ],
                'type' => [
                    'sometimes',
                    'nullable',
                    'string'
                ]
            ]
        );

        $validatedData = $validator->validate();

        $searchTypes = collect(SearchType::cases())
            ->mapWithKeys(function (SearchType $searchType) {
                return [
                    $searchType->value => $searchType
                ];
            });

        $results = collect($searchTypes)
            ->mapWithKeys(function (SearchType $searchType, $key) {
                return [
                    $key => []
                ];
            });

        $type = null;

        if (
            isset($validatedData['type']) &&
            !is_null($validatedData['type']) &&
            !is_null(SearchType::tryFrom($validatedData['type']))
        ) {
            $type = SearchType::from($validatedData['type']);
            $results->put(
                $type->value,
                $type->search($validatedData['query'])
                    ->get()
                    ->slice(0, 13)
            );

            $unsortedResults = $results;

            $results = $unsortedResults->filter(function ($resultData, $resultKey) use ($type) {
                return $resultKey == $type->value;
            })->concat(
                $unsortedResults->filter(function ($resultData, $resultKey) use ($type) {
                    return $resultKey != $type->value;
                })
            );
        } else {
            foreach ($searchTypes as $searchType) {
                $results->put(
                    $searchType->value,
                    $searchType
                        ->search($validatedData['query'])
                        ->get()
                        ->slice(0, 13)
                );
            }
        }

        $results = $results->filter(function ($resultData, $resultKey) {
            return count($resultData) > 0;
        });

        return view('website.search.query', [
            'results' => $results,
            'query' => $validatedData['query'],
            'type' => $type,
            'searchTypes' => $searchTypes,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
