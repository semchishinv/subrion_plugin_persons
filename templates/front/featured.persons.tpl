{if !empty($featured_persons)}
    <table class="table table-inverse">
        <thead>
        <tr>
            <th>Person Name</th>
            <th>Gender</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
            {foreach $featured_persons as $key => $item}
                <tr>
                    <td>{$item.fullname}</td>
                    <td>{$item.gender}</td>
                    <td>{$item.status}</td>
                </tr>
            {/foreach}
        </tbody>
    </table>
{else}
    <div class="alert alert-info">{lang key='no_persons'}</div>
{/if}