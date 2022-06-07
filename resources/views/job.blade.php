{{-- Job view for displaying job details and notes --}}

@include ('partials.head')

<h1>Job Details</h1>
<p><a href="/users/{{ $job->user->id }}">
        << Back</a>
</p>
<section class="info">
    <div class="info__row">
        <div class="info__row--title">Code:</div>
        <div class="info__row--detail">{{$job->code}}</div>
    </div>
    <div class="info__row">
        <div class="info__row--title">Job Name:</div>
        <div class="info__row--detail">{{$job->name}}</div>
    </div>
    <div class="info__row">
        <div class="info__row--title">Description:</div>
        <div class="info__row--detail">{{$job->description}}</div>
    </div>
    <div class="info__row">
        <div class="info__row--title">Job Site Address:</div>
        <div class="info__row--detail">{{$job->address}}</div>
    </div>
    <div class="info__row">
        <div class="info__row--title">Job Created Date:</div>
        <div class="info__row--detail">{{$job->created_at->format('d/m/Y h:m a')}}</div>
    </div>
    <div class="info__row">
        <div class="info__row--title">Site Contact:</div>
        <div class="info__row--detail">{{$job->contact_name}}</div>
    </div>
    <div class="info__row">
        <div class="info__row--title">Site Contact Phone:</div>
        <div class="info__row--detail">{{$job->contact_phone}}</div>
    </div>
    <div class="info__row">
        <div class="info__row--title">Status:</div>
        <div class="info__row--detail">
            <select id="status-selector" name="status" class="capitalize" data-job-id="{{$job->code}}">
                @foreach($statuses as $status)
                <option value="{{$status}}" @if($status==$job->status)
                    selected
                    @endif
                    >{{$status}}</option>
                @endforeach
            </select>
            <span id="status-message" class="success hidden">Status Updated</span>
        </div>
    </div>
</section>

<section class="notes">
    <h2>Notes</h2>
    <form action="/jobs/{{$job->code}}/note" method="post">
        @csrf
        <textarea class="w-80" name="note" placeholder="Add a new note"></textarea>
        <button class="w-20" type="submit">Save Note</button>
    </form>
    @foreach($job->notes as $note)
    <div class="note" id="note-wrapper-{{$note->id}}">
        <form id="form-{{$note->id}}" action="/jobs/{{$job->code}}/note/{{$note->id}}" method="post" class="d-none w-100">
            @csrf
            <textarea name="note" class="w-80">{{$note->note}}</textarea>
            <button type="submit" class="w-20">Update Note</button>
        </form>
        <div id="note-{{$note->id}}" class="note__display">
            <p class="note--content">{{$note->note}}</p>
            <div class="note--edited">
                <p>Last Modified: {{$note->updated_at->format('d/m/Y')}}</p>
                <p><button id="edit-{{$note->id}}" type="button" class="note-button">Edit</button> | <button id="delete-{{$note->id}}" type="button" class="delete-note-button" data-job-id="{{$job->code}}">Delete</button></p>
            </div>
        </div>
    </div>
    @endforeach
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        watchStatus()
        watchButtons('.note-button', toggleNoteForm)
        watchButtons('.delete-note-button', deleteNote)
    })
</script>

@include('partials.foot')