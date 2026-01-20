<?php

namespace App\Services;

use App\Models\Sendmail;
use App\Models\ViewProfile;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SendMailService
{
    public function index($request)
    {
        $query = $this->loadData($request);
        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }

    protected function loadData($request)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy = $request->has('sortBy') ? $request->sortBy : 'dated';

        return Sendmail::with(['sender', 'receiver'])->orderBy($sortBy, $orderBy)
            ->when($request->rno, fn($query) => $query->where('rno', $request->rno))
            ->when($request->proposal, fn($query) => $query->where('proposal', $request->proposal))
            ->when($request->status, fn($query) => $query->where('status', $request->status))
            ->when($request->sentmail, fn($query) => $query->where('rno', $request->sentmail)->orWhere('proposal', $request->sentmail));
    }

    public function sendMailProposals($rno, $status)
    {
        return Sendmail::with(['receiver'])
            ->where('rno', $rno)
            ->where('status', $status)
            ->get();
    }

    public function store(array $data)
    {
        // dd($data);
        return DB::transaction(function () use ($data) {
            if ($data['side'] == 0 || $data['side'] == 2) {
                Sendmail::create([
                    'dated' => now()->format('Y-m-d'),
                    'time' => now()->format('H:i:s'),
                    'rno' => $data['rno'],
                    'proposal' => $data['proposal'],
                    'photos' => implode(',', $data['photo']),
                    'matter' => $data['matter'],
                    'wc' => $data['wc'] ?? 0,
                    'pdftype' => $data['pdf_type'],
                    'empid' => auth()->user()->username,
                    'status' => 0,
                    'addl_st' => '',
                ]);
                ViewProfile::where('rno', $data['rno'])->update(['last_mail' => now()->format('Y-m-d')]);
            }
            if ($data['side'] == 1 || $data['side'] == 2) {
                Sendmail::create([
                    'dated' => now()->format('Y-m-d'),
                    'time' => now()->format('H:i:s'),
                    'rno' => $data['proposal'],
                    'proposal' => $data['rno'],
                    'photos' => implode(',', $data['photo']),
                    'matter' => $data['matter'],
                    'wc' => $data['wc'] ?? 0,
                    'pdftype' => $data['pdf_type'],
                    'empid' => auth()->user()->username,
                    'status' => 0,
                    'addl_st' => '',
                ]);
                ViewProfile::where('rno', $data['proposal'])->update(['last_mail' => now()->format('Y-m-d')]);
            }
        });
    }
    public function pendingMails($request)
    {

        $query = \DB::table('sendmail as s')
            ->leftJoin('viewprofile as v', 's.rno', '=', 'v.rno')
            ->leftJoin('viewprofile as v1', 'v1.rno', '=', 's.proposal')
            ->select(
                's.rno',
                's.dated',
                'v.refname',
                's.proposal',
                DB::raw('v1.refname as refname1'),
                's.photos',
                's.empid'
            )
            ->where('s.status', '<>', 1)
            ->orderBy('s.rno');
    return $request->limit ? $query->paginate($request->limit) : $query->get();
            

    }
    public function selfprofileStore($request){
        $request->validate([
            'rno' => 'required',
            'pdftype' => 'required'
        ]);
        return Sendmail::insert([
            'dated'=>Carbon::now()->format('Y-m-d'),
            'time'=>Carbon::now()->format('H:i:s'),
            'rno'=>$request->rno,
            'proposal'=>$request->rno,
            'photos'=>'Self Profile',
            'matter'=>'',
            'wc'=>0,
            'pdftype'=>$request->pdftype,
            'empid'=>auth()->user()->id,
            'status'=>0,
            'addl_st'=>'',
        ]);
    }
}
