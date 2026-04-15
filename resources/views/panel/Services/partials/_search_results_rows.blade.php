@php
    if (!function_exists('msValue')) {
        function msValue($msInt)
        {
            $ms = '';
            switch ($msInt) {
                case '1':
                    $ms = 'N';
                    break;
                case '2':
                    $ms = 'D';
                    break;
                case '3':
                    $ms = 'W';
                    break;
                case '4':
                    $ms = 'S';
                    break;
            }
            return $ms;
        }
    }

    if (!function_exists('rsValue')) {
        function rsValue($rs)
        {
            $rs_value = '';
            switch ($rs) {
                case '1':
                    $rs_value = 'I';
                    break;
                case '2':
                    $rs_value = 'T';
                    break;
                case '3':
                    $rs_value = 'N';
                    break;
            }
            return $rs_value;
        }
    }
@endphp

@foreach ($results as $data)
    <tr data-rno="{{ $data->rno }}">
        <td>
            <div class="form-check"><input class="form-check-input chkrno"
                    type="radio" name="formRadios" data-vc="{{ $data->vc }}"
                    data-refname="{{ $data->refname }}" value="{{ $data->rno }}"
                    data-cachekey="{{ $cacheKey }}" data-oc="{{ $data->oc }}"
                    data-ost="{{ $data->ost }}"></div>
        </td>
        <td style="word-break: keep-all"><a href="#" class="biodata_modal"
                data-bs-toggle="modal" data-bs-target="#Modal_biodata"
                data-rno="{{ $data->rno }}">{{ $data->rno }}</a></td>
        <td>{{ $data->g }}</td>
        <td class="{{ $data->status == 'F' ? 'td-bg-pink' : '' }}">
            @php
            $textColor = '';

            if ($data->dtype == 'P' && $data->ost == ''){
                $textColor = '#090';
            }elseif($data->dtype == 'P' && $data->ost == 'F'){
                $textColor = '#93C';
            }elseif($data->dtype == 'N' && $data->ost == 'F'){
                $textColor = '#C30';
            }elseif($data->dtype == 'N' && $data->ost == ''){
                $textColor = '#000';
            }elseif($data->dtype == 'P' && $data->ost == 'N'){
                $textColor = '#F90';
            }
            @endphp
            <div style="color: {{ $textColor }}">{{ $data->refname }}</div>
            {!! $data->vc == 1 ? '<i class="bi bi-vimeo"></i>' : '' !!}
            {!! $data->oc == 1 ? '<i class="text-danger"><strong>O</strong></i>' : '' !!}
            {!! strlen($data?->bio?->dd) > 6 ? '<i class="text-black bi bi-person-wheelchair"></i>' : '' !!}
            {!! $data->rs > 1 ? '<i class="bi bi-airplane-fill"></i>' : '' !!}
        </td>
        <td style="word-break: keep-all">
            {{ \Carbon\Carbon::parse($data?->bio?->dob)->format('Y') }}
        </td>
        <td>{{ \Carbon\Carbon::parse($data?->bio?->dob)->age }}</td>
        <td>{{ msValue($data->ms) }}</td>
        <td>{{ $data->cst }}</td>
        <td>{{ $data->hg }}</td>
        <td>{{ $data?->bio?->astrostatus->label()[0] }}</td>
        <td>{{ $data?->bio?->education->label() }}</td>
        <td>{{ $data->personal->budget }}</td>
        <td>{{ $data?->income?->income }}</td>
        <td>{{ $data->personal->arealocation }}</td>
        <td>{{ $data->occupation?->name }}</td>
        <td>{{ rsValue($data->rs) }}</td>
        <td style="word-break: keep-all">{{ $data->mc }}</td>
        <td style="word-break: keep-all">{{ $data->tc }}</td>
        <td style="word-break: keep-all">{{ $data->rm }}</td>
        <td>{{ \Carbon\Carbon::parse($data->last_call)->format('M d Y') }}</td>
        <td>{{ \Carbon\Carbon::parse($data->last_mail)->format('M d Y') }}</td>
        <td>{{ \Carbon\Carbon::parse($data->last_mtng)->format('M d Y') }}</td>
        <td>{{ \Carbon\Carbon::parse($data?->bio?->profiledate)->format('M d Y') }}
        </td>
        <td>
            <div class="btn-group dropstart me-1 mt-2">
                <span class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                    <i data-feather="more-vertical"></i></span>
                <div class="dropdown-menu">
                    <a class="dropdown-item"
                        href="{{ route('customer.edit', ['customer' => $data->rno]) }}"
                        target="_blank">Edit
                        Profile</a>
                    <a class="dropdown-item"
                        href="{{ route('customer.uplod-photo', ['rno' => $data->rno]) }}"
                        target="_blank">Upload
                        Photo</a>
                </div>
            </div>
        </td>
    </tr>
@endforeach
