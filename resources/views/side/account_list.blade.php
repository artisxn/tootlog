<div class="panel panel-default">
    <div class="panel-heading">Account List</div>

    <div class="panel-body">
        <div class="list-group">
            @foreach($accounts as $account)
                <a href="{{ $account->url }}"  class="list-group-item">
                    <span class="badge">{{ $account->statuses_count }}</span>
                    {{ $account->acct }}
                </a>
            @endforeach
        </div>
    </div>
</div>
