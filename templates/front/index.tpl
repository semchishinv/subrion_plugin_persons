{if !empty($persons)}
    <table class="table table-inverse">
        <thead>
            <tr>
                <th>#</th>
                <th>Person Name</th>
                <th>Gender</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            {foreach $persons as $key => $item}
                <tr>
                    <td>{$key+1}</td>
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