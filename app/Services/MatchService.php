<?php

namespace App\Services;

use App\Enums\ClientSLStatusEnum;
use App\Models\ClientSL;
use App\Models\ProfileMatch;
use App\Models\ViewProfile;
use App\Traits\CommonTrait;

class MatchService
{
    use CommonTrait;

    public function getSingleCustMatchPrefrences($rno)
    {
        return  ProfileMatch::where('rno', $rno)->first();
    }

    public function load_search($data = [],  $page = 1, $per_page = null)
    {
        $query = ProfileMatch::query();
        if (!empty($data)) {
            $query = $query->where($data);
        }

        if ($per_page) {
            return $query->limit($per_page)->paginate($page);
        }

        return $query->get();
    }


    public function saveMatchPrefrence($rno, $data)
    {
        return ProfileMatch::updateOrCreate(['rno' => $rno], $data);
    }

    public function searchMatchList($input)
    {
        // dump($input);
        $query = ViewProfile::with([
            'personal',
            'bio',
            'occupation',
            'income',
            // 'education',
            // 'organisation',
            // 'payment',
            'personal.zone'
        ]);

        // if (isset($input['agefrom']) && isset($input['ageupto'])) {
        //     $query = $query->whereBetween('y', [$input['agefrom'], $input['ageupto']]);
        // }
        // if (isset($input['hghtfrom']) && isset($input['hghtto'])) {
        //     $hghtfrom = self::convertcmtoft($input['hghtfrom']);
        //     $hghtto = self::convertcmtoft($input['hghtto']);
        //     $query = $query->whereBetween('hg', [$hghtfrom, $hghtto]);
        // }
        $query->when(isset($input['gender']), function ($query) use ($input) {
            $query->where('g', '!=', $input['gender']);
        });

        $query->when(isset($input['religion']), function ($query) use ($input) {
            $query->whereIn('rl', $input['religion']);
        });

        $query->when(isset($input['caste']), function ($query) use ($input) {
            $query->whereHas('bio', fn($q) => $q->whereIn('caste', $input['caste']));
        });

        $query->when(isset($input['zonepref']), function ($query) use ($input) {
            $query->whereHas('personal', fn($q) => $q->whereIn('contactzone', $input['zonepref']));
        });

        $query->when(isset($input['education']), function ($query) use ($input) {
            $query->where('ed', '>=', $input['education']);
        });

        $query->when(isset($input['eatingpref']), function ($query) use ($input) {
            $query->whereIn('eh', $input['eatingpref']);
        });

        $query->when(isset($input['astropref']), function ($query) use ($input) {
            $query->whereIn('ast', $input['astropref']);
        });

        $query->when(isset($input['rspref']), function ($query) use ($input) {
            $query->whereIn('rs', $input['rspref']);
        });

        $query->when(isset($input['mspref']), function ($query) use ($input) {
            $query->whereIn('ms', $input['mspref']);
        });

        $query->when(isset($input['childpref']), function ($query) use ($input) {
            if ($input['childpref'] == '0') {
                $query->where('ch',  0);
            } else {
                $query->where('ch', '>=', 1);
            }
        });

        $query->when(isset($input['incomepref']), function ($query) use ($input) {
            $query->where('pi', '>=', $input['incomepref']);
        });

        // $query->when(isset($input['familyincomepref']), function ($query) use ($input) {
        //     $query->where('fi', '>=', $input['familyincomepref']);
        // });

        $query->when(isset($input['occupref']), function ($query) use ($input) {
            $query->whereIn('oc', $input['occupref']);
        });


        $query->when(isset($input['budget']), function ($query) use ($input) {
            $query->whereHas('personal', fn($q) => $q->where('budget', '>=', $input['budget']));
        });

        // TODO: mail reminder to implemented later when table got imported

        return $query->paginate(10);
    }

    public function saveClientSL($validate_data)
    {
        $data['proposal'] = $validate_data['proposal'];
        $data['dated'] = date('Y-m-d');
        $data['time'] = date('H:i');
        $data['slby'] = auth()->user()->username;
        $data['rno'] = $validate_data['rno'];
        return ClientSL::create($data);
    }

    public function verifyClientSL($rno, $proposal)
    {
        return ClientSL::where(function ($q) use ($rno, $proposal) {
            $q->where('rno', $rno)
                ->where('proposal', $proposal);
        })
            ->orWhere(function ($q) use ($rno, $proposal) {
                $q->where('rno', $proposal)
                    ->where('proposal', $rno);
            })
            ->exists();
    }

    public function getClientSLList($conditions, $page = null, $limit = null)
    {
        $query =  ClientSL::with('vp')->where($conditions);
        if ($limit) {
            $query = $query->paginate($limit, ['*'], 'page', $page);
        } else {
            $query = $query->get();
        }
        return $query;
    }

    public function updateClientSL($id, $data)
    {
        return ClientSL::where('id', $id)->update($data);
    }

    public function getProposalsForSendMail($rno, $filter = 'all')
    {
        // $rno is the Current User Loopup ID

        $query = ClientSL::where('status', ClientSLStatusEnum::OK)
            ->with(['vp', 'client'])
            ->where(function ($q) use ($rno) {
                $q->where('rno', $rno)
                    ->orWhere('proposal', $rno);
            });

        // Add existence checks using subqueries
        // Mail Sent by User ($rno) to the Other Party
        $query->addSelect([
            'sent_mail_id' => \App\Models\Sendmail::select('id')
                ->whereColumn('rno', 'client_sl.rno') // Assuming client_sl.rno is User if match
                ->whereColumn('proposal', 'client_sl.proposal')
                ->whereRaw('client_sl.rno = ?', [$rno]) // Strict check: User must be sender
                ->unionAll(
                    \App\Models\Sendmail::select('id')
                        ->whereColumn('rno', 'client_sl.proposal')
                        ->whereColumn('proposal', 'client_sl.rno')
                        ->whereRaw('client_sl.proposal = ?', [$rno]) // User is 'proposal' col in SL, so User is Sender
                )
                ->limit(1)
        ]);

        // Mail Received by User ($rno) from the Other Party
        $query->addSelect([
            'received_mail_id' => \App\Models\Sendmail::select('id')
                ->whereColumn('rno', 'client_sl.proposal')
                ->whereColumn('proposal', 'client_sl.rno')
                ->whereRaw('client_sl.rno = ?', [$rno]) // User is SL.rno (Receiver), Other is SL.proposal (Sender)
                ->unionAll(
                    \App\Models\Sendmail::select('id')
                        ->whereColumn('rno', 'client_sl.rno')
                        ->whereColumn('proposal', 'client_sl.proposal')
                        ->whereRaw('client_sl.proposal = ?', [$rno]) // User is SL.proposal (Receiver), Other is SL.rno (Sender)
                )
                ->limit(1)
        ]);

        // Apply Filters
        if ($filter === 'exists') {
            $query->where(function ($q) use ($rno) {
                // Check if ANY mail exists involving this pair?
                // Original request: "It exists in sendMail Model"
                // This usually means "Have I interacted with them?"
                $q->whereHas('sendMail', function ($sub) use ($rno) {
                    $sub->where('rno', $rno)->orWhere('proposal', $rno);
                })->orWhereHas('receiveMail', function ($sub) use ($rno) { // Model relations might be weak, use subquery logic generally
                    $sub->where('rno', $rno)->orWhere('proposal', $rno);
                });
                // Re-using the logic from select might be cleaner but whereHas is safer for purely existence
                // Let's rely on the subselects being not null if we want specific sent/recv
                // Or better, let's just stick to the subqueries we built?
                // But we can't 'where' on addSelect columns easily in simple Eloquent without having

                // Simpler approach for "Exists":
                // Check if there is a Sendmail record where (rno=A AND proposal=B) OR (rno=B AND proposal=A)

                $q->whereExists(function ($sub) use ($rno) {
                    $sub->select(\Illuminate\Support\Facades\DB::raw(1))
                        ->from('sendmail')
                        ->where(function ($w) {
                            $w->whereColumn('sendmail.rno', 'client_sl.rno')
                                ->whereColumn('sendmail.proposal', 'client_sl.proposal');
                        })->orWhere(function ($w) {
                            $w->whereColumn('sendmail.rno', 'client_sl.proposal')
                                ->whereColumn('sendmail.proposal', 'client_sl.rno');
                        });
                });
            });
        } elseif ($filter === 'not_exists') {
            $query->whereNotExists(function ($sub) use ($rno) {
                $sub->select(\Illuminate\Support\Facades\DB::raw(1))
                    ->from('sendmail')
                    ->where(function ($w) {
                        $w->whereColumn('sendmail.rno', 'client_sl.rno')
                            ->whereColumn('sendmail.proposal', 'client_sl.proposal');
                    })->orWhere(function ($w) {
                        $w->whereColumn('sendmail.rno', 'client_sl.proposal')
                            ->whereColumn('sendmail.proposal', 'client_sl.rno');
                    });
            });
        }

        return $query->get()
            ->map(function ($item) use ($rno) {
                // Determine the "Other" party
                $other_id = ($item->rno == $rno) ? $item->proposal : $item->rno;
                // dd($item);
                // Get other profile
                $other_profile = ($item->rno == $rno) ? $item->vp : $item->client;
                $other_refname = $other_profile ? $other_profile->refname : null;
                $other_status = $item->vp ? $item->vp->status : $item->client->status;

                return [
                    'id' => $item->id,
                    'my_id' => $rno,
                    'other_id' => $other_id,
                    'other_refname' => $other_refname,
                    'other_status' => $other_status,
                    'dated' => $item->dated,
                    'status' => $item->status->label(),

                    // Relation Objects (if loaded via normal relations, but we used subqueries for IDs)
                    'vp' => $item->vp,
                    'client' => $item->client,

                    // Computed Status
                    'has_sent_mail' => !is_null($item->sent_mail_id),
                    'has_received_mail' => !is_null($item->received_mail_id),
                ];
            });
    }
}
