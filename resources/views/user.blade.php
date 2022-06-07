{{-- User View, displays user information and job list --}}

@include ('partials.head')

<h1>Tradie Details</h1>

<p><a href="/">
        << Back</a>
</p>

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
        <div class="info__row--title">Job Code Prefix:</div>
        <div class="info__row--detail">{{strtoupper($user->job_prefix)}}</div>
    </div>
</section>

<table id="user-jobs-datatable" class="display">
    <thead>
        <tr>
            <th>Job Code</th>
            <th>Job Name</th>
            <th>Job Status</th>
            <th>Job Created</th>
        </tr>
    </thead>
    <tbody>
        @foreach($user->jobs as $job)
        <tr>
            <td><a href="/jobs/{{$job->code}}">{{$job->code}}</a></td>
            <td>{{$job->name}}</td>
            <td>{{$job->status}}</td>
            <td>{{$job->created_at->format('d/m/y h:m a')}}
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        $('#user-jobs-datatable').DataTable();
    });
</script>

@include('partials.foot')