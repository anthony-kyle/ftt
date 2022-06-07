@include ('partials.head')

<h1>Tradie Details</h1>

<section class="info">
    <div class="info__row">
        <div class="info__row--title">Name:</div>
        <div class="info__row--detail">{{$user->name}}</div>
    </div>
    <div class="info__row">
        <div class="info__row--title">Email:</div>
        <div class="info__row--detail">{{$user->email}}</div>
    </div>
    <div class="info__row">
        <div class="info__row--title">Company:</div>
        <div class="info__row--detail">{{$user->company_name}}</div>
    </div>
    <div class="info__row">
        <div class="info__row--title"></div>
        <div class="info__row--detail"></div>
    </div>
    <div class="info__row">
        <div class="info__row--title"></div>
        <div class="info__row--detail"></div>
    </div>
    <div class="info__row">
        <div class="info__row--title"></div>
        <div class="info__row--detail"></div>
    </div>
    <div class="info__row">
        <div class="info__row--title"></div>
        <div class="info__row--detail"></div>
    </div>
    <div class="info__row">
        <div class="info__row--title"></div>
        <div class="info__row--detail"></div>
    </div>
</section>

<table id="table_id" class="display">
    <thead>
        <tr>
            <th>Job Code</th>
            <th>Job Name</th>
            <th>Job Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($user->jobs as $job)
        <tr>
            <td>{{$job->code}}</td>
            <td>{{$job->name}}</td>
            <td>{{$job->status}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@include('partials.foot')