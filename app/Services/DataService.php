<?php

namespace App\Services;

use App\Models\UpdateTable;
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
        ])
            ->when($request->filled('g'), fn($query) => $query->where('g', $request->g))
            ->when($request->filled('tc'), fn($query) => $query->where('tc', $request->tc))
            ->when($request->filled('mc'), fn($query) => $query->where('mc', $request->mc))
            ->when($request->filled('rm'), fn($query) => $query->where('rm', $request->rm))
            ->when($request->filled('oc'), fn($query) => $query->where('oc', $request->oc))
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->where('rno', 'LIKE', "%{$request->search}%")->orWhereRelation('viewProfile', 'refname', 'LIKE', "%{$request->search}%");
                });
            })
            ->orderBy($sortBy, $orderBy)->where('dtype', 'H');
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
        ])
            ->whereIn('dtype', ['P', 'N'])
            ->when($request->filled('g'), fn($query) => $query->where('g', $request->g))
            ->when($request->filled('tc'), fn($query) => $query->where('tc', $request->tc))
            ->when($request->filled('mc'), fn($query) => $query->where('mc', $request->mc))
            ->when($request->filled('rm'), fn($query) => $query->where('rm', $request->rm))
            ->when($request->filled('oc'), fn($query) => $query->where('oc', $request->oc))
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->where('rno', 'LIKE', "%{$request->search}%")
                        ->orWhere('refname', 'LIKE', "%{$request->search}%");
                });
            })

            ->orderBy($sortBy, $orderBy);
        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }

    public function allWebsiteData($request)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy  = $request->has('sortBy') ? $request->sortBy : 'id';
        $query =  UpdateTable::with(['viewProfile'])
            ->when($request->filled('rno'), fn($query) => $query->where('rno', 'LIKE', "%{$request->rno}%"))
            ->when($request->filled('status'), fn($query) => $query->where('status', $request->status))
            ->when($request->filled('name'), fn($query) => $query->whereRelation('viewProfile', 'refname', 'LIKE', "%{$request->name}%"))
            ->when($request->filled('phone'), fn($query) => $query->whereRelation('personal', 'contactphone', 'LIKE', "%{$request->phone}%"))
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->where('rno', 'LIKE', "%{$request->search}%")
                        ->orWhereRelation('viewProfile', 'refname', 'LIKE', "%{$request->search}%")
                        ->orWhereRelation('personal', 'contactphone', 'LIKE', "%{$request->search}%");
                });
            })

            ->orderBy($sortBy, $orderBy);
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
        ])
            ->when($request->filled('g'), fn($query) => $query->where('g', $request->g))
            ->when($request->filled('tc'), fn($query) => $query->where('tc', $request->tc))
            ->when($request->filled('mc'), fn($query) => $query->where('mc', $request->mc))
            ->when($request->filled('rm'), fn($query) => $query->where('rm', $request->rm))
            ->when($request->filled('oc'), fn($query) => $query->where('oc', $request->oc))
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->where('rno', 'LIKE', "%{$request->search}%")->orWhereRelation('viewProfile', 'refname', 'LIKE', "%{$request->search}%");
                });
            })
            ->orderBy($sortBy, $orderBy)
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
        ])
            ->when($request->filled('g'), fn($query) => $query->where('g', $request->g))
            ->when($request->filled('tc'), fn($query) => $query->where('tc', $request->tc))
            ->when($request->filled('mc'), fn($query) => $query->where('mc', $request->mc))
            ->when($request->filled('rm'), fn($query) => $query->where('rm', $request->rm))
            ->when($request->filled('oc'), fn($query) => $query->where('oc', $request->oc))
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->where('rno', 'LIKE', "%{$request->search}%")->orWhereRelation('viewProfile', 'refname', 'LIKE', "%{$request->search}%");
                });
            })
            ->orderBy($sortBy, $orderBy)
            ->where('ost', '<>', 'N')
            ->where('status', 'A')
            ->where('dtype', 'P');
        if (!in_array($userId, [3033, 1111])) {
            $query->where('rm', $userId);
        }
        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }

    public function bouncedEmail($request)
    {
        $sortBy  = $request->has('sortBy') ? $request->sortBy : 'id';
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $query = \App\Models\Bouncedmail::with([
            'viewProfile',
        ])
            ->orderBy($sortBy, $orderBy)
            ->when($request->filled('rm'), fn($query) => $query->whereRelation('viewProfile', 'rm', $request->rm))
            ->when($request->filled('email'), fn($query) => $query->where('email', 'LIKE', "%{$request->email}%"))
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->where('rno', 'LIKE', "%{$request->search}%")
                        ->orWhere('email', 'LIKE', "%{$request->search}%")
                        ->orWhereRelation('viewProfile', 'refname', 'LIKE', "%{$request->search}%");
                });
            });
        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }


    public function toggleWebData($id)
    {
        $data = UpdateTable::find($id);
        $data->status = $data->status == 1 ? 0 : 1;
        if ($data->save()) {
            return true;
        }
        return false;
    }
}
