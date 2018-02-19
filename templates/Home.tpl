<div class="container">
    <div class="row">
        <div class="col golive-wrapper">
            <a href="index.php?view=LiveStream">
                <button type="button" class="btn btn-primary">Go live</button>
            </a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <h5>Scheduled Events/Broadcasts (ListBroadCasts API used)</h5>
            {if !empty($BROADCAST_ITEMS)}
                <ul>
                    {foreach from=$BROADCAST_ITEMS item=BROADCAST_ITEM}
                        <li><a href="javascript:void(0)">{$BROADCAST_ITEM['snippet']['title']}</a></li>
                    {/foreach}
                </ul>
            {else}
                <div class="alert alert-primary" role="alert">
                    No events scheduled
                </div>
            {/if}

        </div>
    </div>
</div>