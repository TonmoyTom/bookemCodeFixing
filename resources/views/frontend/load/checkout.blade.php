    @forelse($slots as $slot)
    @php
        $center = ''
    @endphp
    @empty
    @php
        $center = 'justify-content-center'
    @endphp
    @endforelse

<div class="row {{$center}}">
    @php
        function slotAvailable($from, $to, $events)
        {
            foreach ($events as $event) {
                $eventStart = \Carbon\Carbon::instance(new DateTime($event['start_time']));
                $eventEnd = \Carbon\Carbon::instance(new DateTime($event['end_time']));
                if ($from->between($eventStart, $eventEnd) ) {
                    return false;
                }
                elseif( $to->between($eventStart, $eventEnd))
                return false;
            }
            return true;
        }
    @endphp
    @forelse  ($slots as $slot)

        @php
            $totime = $slot->copy()->add($reqInterval);
            $to = $totime->subMinutes(1);
        @endphp
        <div class="col-md-3">

            @if (slotAvailable($slot, $to, $events))

                <input style="display: none"  type="radio" id="date_{{ \Carbon\Carbon::parse($slot->toDateTimeString())->format('h:i A') }}"
                    name="date_time" value="{{ \Carbon\Carbon::parse($slot->toDateTimeString())->format('Y-m-d H:i:s') }} {{ \Carbon\Carbon::parse($to->toDateTimeString())->format('Y-m-d H:i:s') }}" id="date_time"
                   >

                <label class=""  id="date_time_select" for="date_{{ \Carbon\Carbon::parse($slot->toDateTimeString())->format('h:i A') }}"
                  >{{ \Carbon\Carbon::parse($slot->toDateTimeString())->format('h:i A') .' - ' .\Carbon\Carbon::parse($to->toDateTimeString())->format('h:i A') }}</label>
            @else
                <label
                    class="text-light bg-danger booked-time" style="cursor: not-allowed">{{ \Carbon\Carbon::parse($slot->toDateTimeString())->format('h:i A') .' - ' .\Carbon\Carbon::parse($to->toDateTimeString())->format('h:i A') }}</label>
            @endif

        </div>

        @empty
            <div class="col-lg-8 text-center">
                <div class="subs-step">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Service Off </strong>I Will Not Provide my Service today.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                </div>
            </div>
    </div>
    @endforelse




