<?php

namespace App\Services;

use App\Models\ViewProfile;

class DataService
{


    public function showallotherdata($request, $userId)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy  = $request->has('sortBy') ? $request->sortBy : 'id';
        $query =  ViewProfile::with([
            'personal',
            'bio',
            'occupation',
            'income',
            'education',
            'organisation',
            'payment',
            'profilebs',
            'personal.zone'
        ])->orderBy($sortBy, $orderBy)->where('dtype', 'H');
        if (!in_array($userId, [3033, 1018, 1111, 5002])) {
            $query->where('rm', $userId);
        }
        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }

    public function showwebsiteData($request)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy  = $request->has('sortBy') ? $request->sortBy : 'id';
        $query =  ViewProfile::with([
            'personal',
            'bio',
            'occupation',
            'income',
            'education',
            'organisation',
            'payment',
            'profilebs',
            'personal.zone'
        ])->orderBy($sortBy, $orderBy)->where('dtype', 'W');
        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }

    public function showmyNaData($request, $userId)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy  = $request->has('sortBy') ? $request->sortBy : 'id';
        $query =  ViewProfile::with([
            'personal',
            'bio',
            'occupation',
            'income',
            'education',
            'organisation',
            'payment',
            'profilebs',
            'personal.zone'
        ])->orderBy($sortBy, $orderBy)
            ->where('ost', 'N')
            ->where('status', 'A');
        if (!in_array($userId, [3033, 1111])) {
            $query->where('rm', $userId);
        }
        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }

    public function showallnonnadata($request, $userId)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy  = $request->has('sortBy') ? $request->sortBy : 'id';
        $query =  ViewProfile::with([
            'personal',
            'bio',
            'occupation',
            'income',
            'education',
            'organisation',
            'payment',
            'profilebs',
            'personal.zone'
        ])->orderBy($sortBy, $orderBy)
            ->where('ost', '<>', 'N')
            ->where('status', 'A')
            ->where('dtype', 'P');
        if (!in_array($userId, [3033, 1111])) {
            $query->where('rm', $userId);
        }
        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }
}
