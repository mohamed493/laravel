<style>
    .second {
        background-color:#FEC2C2;
        text-align: start;
        padding:20px 0;
        font-size: 20px;
    }
    .first {
        color:#7C2727;
        text-align: start;

    }
</style>

@if(count($errors)>0)
    <div class="second" style="grid-auto-flow: row;">
        <ul>
            @foreach($errors->all() as $error)
                <li class="first">
                    {{$error}}
                </li>
            @endforeach
        </ul>

</div>
@endif
