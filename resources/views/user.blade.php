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



@include('partials.foot')