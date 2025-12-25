<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendMailRequest;
use App\Http\Resources\BasicSentMailResource;
use App\Services\SearchService;
use App\Services\SendMailService;
use App\Services\MatchService;
use Illuminate\Http\Request;

class SendMailController extends Controller
{
    protected $sendMailService, $searchService, $matchService;
    public function __construct(SendMailService $sendMailService, SearchService $searchService, MatchService $matchService)
    {
        $this->sendMailService = $sendMailService;
        $this->searchService = $searchService;
        $this->matchService = $matchService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $rno)
    {
        $request->merge(['sentmail' => $rno, 'limit' => $request->limit ?? 10, 'page' => $request->page ?? 1]);
        $data['sendMails'] = $this->sendMailService->index($request);
        $data['customer'] = $this->searchService->searchByrno($rno);
        $all = $this->matchService->getProposalsForSendMail($rno, 'all');
        // dd($all->first()->vp->refname);

        $data['fresh'] = collect($all)->filter(fn($i) => !$i['has_sent_mail']);
        $data['sent']  = collect($all)->filter(fn($i) => $i['has_sent_mail']);

        return view('panel.mail.sent-mail', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SendMailRequest $request)
    {
        $data = $request->validated();
        $sendMail = $this->sendMailService->store($data);
        // TODO: create a queue job to send mail
        return response()->json(['status' => 'success', 'message' => 'Mail sent successfully', 'data' => $sendMail]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $request = request();
        $request->sentmail = $id;
        $request->status = 1;
        $data = $this->sendMailService->index($request);
        // return $data;
        foreach ($data as $item) {
            $item->cid = $id;
        }
        $result =  BasicSentMailResource::collection($data);
        $data = collect($result->resolve())->unique('id')->values();
        return response()->json($data);
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
