<style>
.error {
    border: 1px solid red;
    background-color: #f9b5af;
    color: red ;
    text-align:center;
    padding-left: 60px;
}

.error ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.success {
    border: 1px solid green;
    background-color: #d1f9da;
    color: green;
    text-align:center;
}

#hideMe {
    -moz-animation: cssAnimation 0s ease-in 5s forwards;
    /* Firefox */
    -webkit-animation: cssAnimation 0s ease-in 5s forwards;
    /* Safari and Chrome */
    -o-animation: cssAnimation 0s ease-in 5s forwards;
    /* Opera */
    animation: cssAnimation 0s ease-in 5s forwards;
    -webkit-animation-fill-mode: forwards;
    animation-fill-mode: forwards;
}
@keyframes cssAnimation {
    to {
        width:0;
        height:0;
        overflow:hidden;
    }
}
@-webkit-keyframes cssAnimation {
    to {
        width:0;
        height:0;
        visibility:hidden;
    }
}

</style>
@if(count($errors) > 0)
    <div class="row" id="hideMe">
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                     <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if(Session::has('message'))
<div class="row" id="hideMe">
    <div class="success">
        {{ Session::get('message')}}
    </div>
</div>
@endif
