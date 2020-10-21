<style>
    .ss-container {
        background-color: #fff;
    }
    .ss-header {
        padding-top: 16px;
    }
</style>
<section class="content">
    <div class="ss-container container-fluid">
        <div class="ss-header">
            <div class="card">
                <div class="card-body">
                    <h4>Suggestion List</h4>
                </div>
            </div>
        </div>
        <ul class="list-group">
            @forelse ($suggestedList as $item)
                <li class="list-group-item">{{$item->answer_text}}</li>
            @empty
                <p>No Have Suggestion</p>
            @endforelse
          </ul>
    </div>
</section>
