{if !empty($blockPersons)}
    <div class="ia-items latest-persons">
        {foreach $blockPersons as $entry}
            <div class="media ia-item ia-item--border-bottom">
                {if !empty($entry.pictures)}
                    <span class="pull-left">
                        {ia_image file=$entry.pictures[0] width=50 type='thumbnail' title=$entry.title class='media-object'}
                    </span>
                {/if}
                <div class="media-body">
                    <h5 class="media-heading">{$entry.title|escape}</h5>
                </div>
            </div>
        {/foreach}
    </div>
{/if}