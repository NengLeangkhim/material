@if (count($status) > 0)
    <div class="col-md-12">
        <div class="nav-tab">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="myTab_plan" role="tablist">
                @foreach ($status as $key => $item)
                    @if ($key == 0)
                        <li class="nav-item">
                            <input type="hidden" name="StatusFirstChild" value="{{ $item->name_en ?? 'Unknown' }}">
                            <a class="nav-link active" data-toggle="tab"
                                onclick="changeStatus('{{ $item->name_en?? 'Unknown' }}')"
                                href="javascript:void(0);">{{ $item->name_en ?? 'Unknown' }}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab"
                                onclick="changeStatus('{{ $item->name_en?? 'Unknown' }}')"
                                href="javascript:void(0);">{{ $item->name_en ?? 'Unknown' }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
@else
<input type="hidden" name="StatusFirstChild" value="{{ $prev_status ?? 'Unknown' }}">
@endif
